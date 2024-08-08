<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\TicketCreationAlertMail;
use App\Models\{CustTicket, Message, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function createTicket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state_select' => 'required',
            'service_select' => 'required',
            's_desc' => 'required'
        ], [
            'state_select.required' => 'State selection is required',
            'service_select.required' => 'Service selection is required',
            's_desc.required' => 'Short Description is required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages()
            ]);
        } else {
            $admin = User::where('is_admin', '1')->first();
            $Cust_ticket = new CustTicket();
            $Cust_ticket->customer_user_id = Auth::guard('customer')->user()->id;
            $Cust_ticket->state = $request->input('state_select');
            $Cust_ticket->service_id = $request->input('service_select');
            $Cust_ticket->cust_desc = $request->input('s_desc');
            $Cust_ticket->admin_id = $admin->id;
            $Cust_ticket->save();

            $details = [
                'title' => 'You received a new message for Ticket generate from : '. Auth::guard('customer')->user()->name,
                'ticket' => $Cust_ticket->id,
                'name' => Auth::guard('customer')->user()->name,
                'state' => $request->input('state_select'),
                'service' => $request->input('service_select'),
                'content' => $request->input('s_desc'),
            ];

            Mail::to(Config('mail.mailers.smtp.username'))->send(new TicketCreationAlertMail($details));
            return response()->json([
                'status' => 200,
                'message' => 'Ticket Created Successfully.'
            ]);
        }
    }

    public function fetchActiveTickets()
    {
        $getAuthId = auth()->guard('customer')->user()->id;
        $ActiveticketList = CustTicket::query()->with(['services' => function ($query) {
            $query->select('id', 'ser_name', 'created_at');
        }])->where('customer_user_id', $getAuthId)->where('status', 'Opened')->get();
        return response()->json($ActiveticketList);
    }

    public function fetchCompletedTickets()
    {
        $getAuthId = auth()->guard('customer')->user()->id;
        $CompletedticketList = CustTicket::query()->with(['services' => function ($query) {
            $query->select('id','ser_name', 'created_at');
        }])->where('status', 'Closed')->where('customer_user_id', $getAuthId)->get();
        return response()->json($CompletedticketList);
    }

    public function fetchAllTickets()
    {
        $getAuthId = auth()->guard('customer')->user()->id;
        $AllticketList = CustTicket::query()->with(['services' => function ($query) {
            $query->select('id','ser_name', 'created_at');
        }])->where('customer_user_id', $getAuthId)->get();
        return response()->json($AllticketList);
    }

    public function viewTicket(Request $request, $id)
    {
        $getTktId = $request->id;
        $fetchTkt = CustTicket::with('users', 'services')->find($getTktId);
        return view('front.customer.viewTicketMsg', compact('fetchTkt'));
    }

    public function replyTo(Request $request)
    {
        $imageName = '';
        if ($request->hasfile('file')) {
            $image = $request->file('file');
            $ImageName = date('YmdHis') . "_" . $image->getClientOriginalName();
            $image->move(public_path() . '/images/ChatFile/', $ImageName);
            $imageName = $ImageName;
        }
        $chatData = new Message();
        $chatData->message = $request->chat_msg;
        $chatData->customer_user_id = $request->cust_user_id;
        $chatData->CustTicket_id = $request->tkt_id;
        $chatData->user_id = $request->user_id;
        $chatData->sender_id = auth()->guard('customer')->user()->id;
        $chatData->receiver_id = $request->user_id;
        $chatData->type = 'customer';
        $chatData->file = $imageName;
        $chatData->created_at = now();
        $chatData->updated_at = now();

        $chatData->save();
        if ($chatData) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['failure' => false]);
        }
    }

    public function getMsgs(Request $request)
    {
        $data = DB::table('messages')->select('messages.*', 'customer_users.name as customer_name', 'users.name as user_name')
        ->join('customer_users', 'messages.customer_user_id', '=', 'customer_users.id')
        ->join('users', 'messages.user_id', '=', 'users.id')
        ->where('customer_user_id', $request->cust_user_id)
        // ->orwhere('customer_user_id', 1)
        ->where('CustTicket_id', $request->tkt_id)
        ->where('user_id', $request->user_id)->orderBy('id', 'ASC')->get();
        return response()->json([
            'data' => $data
        ]);
    }
}
