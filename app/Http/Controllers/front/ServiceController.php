<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\{Service, SingleServiceForm};
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function singleService(Service $slug)
    {
        return view('front.singleService', compact('slug'));
    }

    public function singleServiceForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required'
        ], [
            'name.required' => 'Name field is required',
            'email.required' => 'Email field is required',
            'email.email' => 'Email must contain @ and .',
            'phone.required' => 'Phone field is required',
            'phone.numeric' => 'Phone number should be in numeric format',
            'message.required' => 'Message field is required',
        ]);

        $SingleSrvForm = new SingleServiceForm();
        $SingleSrvForm->name = $request->name;
        $SingleSrvForm->email = $request->email;
        $SingleSrvForm->phone = $request->phone;
        $SingleSrvForm->message = $request->message;
        $SingleSrvForm->page = $request->hiddenPage;
        $SingleSrvForm->save();
        if ($SingleSrvForm) {
            return redirect()->back()->with('success', 'Thankyou for your response, We will get back to you shortly');
        } else {
            return redirect()->back()->with('failure', 'Something went wrong, Please try again');
        }
    }
}
