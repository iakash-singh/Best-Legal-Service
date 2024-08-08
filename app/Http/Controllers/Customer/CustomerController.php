<?php

namespace App\Http\Controllers\Customer;

use App\Models\customerUser;
use App\Http\Controllers\Controller;
use App\Mail\LoginOtpVerifyMail;
use App\Mail\OtpVerifyMail;
use App\Models\{CustTicket, Service};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function register()
    {
        return view('front.customer.register');
    }

    public function register_create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customer_users,email',
            'agree' => 'required',
            'mobile' => 'nullable|numeric'
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must contain @ and .',
            'email.unique' => 'Email Id ' . $request->email . ' is already registered. Please SignIn now',
            'agree.required' => 'Please Agree to our Terms and Condition & Privacy Policy',
            'mobile.numeric' => 'Mobile No. must be in Numeric Format'
        ]);
        $otp = rand(1000, 9999);
        $token = Str::random(30);
        $user = new customerUser();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->agree = $request->agree;
        $user->mobile = $request->mobile;
        $user->email_verified = '0';
        $user->otp = $otp;
        $user->token = $token;
        $user->otp_expires_at = now()->addMinutes(3);
        $data = $user->save();
        if ($data) {
            $details = [
                'title' => 'You’re almost ready to start using your dashboard. Verify your email address using this OTP now!',
                'name' => $request->name,
                'otp' => $otp,
                'token' => $token
            ];
            Mail::to($request->email)->send(new OtpVerifyMail($details));
            return redirect()->route('customer.helpdesk.register.verifyOtp', ['token' => $details['token']])->with('success', 'Verification mail sent, please check your email inbox.');
        } else {
            return redirect()->back()->with('failure', 'Registration Failed!!!');
        }
    }

    public function verifyOtp(Request $request)
    {
        $input = $request->token;
        return view('front.customer.OtpVerify', compact('input'));
    }

    public function OtpSuccess(Request $request)
    {
        $input = $request->validate([
            'otp' => 'required|integer',
            'token' => 'required|string'
        ], [
            'otp.required' => 'Otp is required',
            'otp.integer' => 'Otp must be a Number only'
        ]);
        $user = customerUser::where('token', $input['token'])->where('email_verified', '0')->first();
        if ($user != null) {
            customerUser::where('token', $input['token'])
                ->update([
                    'email_verified' => '1',
                    'token' => '',
                    'otp' => NULL,
                    'otp_expires_at' => now()
                ]);
            Auth::login($user);
            return redirect()->route('customer.helpdesk.dashboard')->with('success', 'You are successfully registered.');
        }
        return redirect()->back()->with('failure', 'The Otp code you have entered does not match');
    }

    public function login()
    {
        return view('front.customer.login');
    }

    public function login_create(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = customerUser::where('email', $request->email)->first();

        if (!empty($user) && $user != '') {
            if ($user->email_verified == 1) {
                $token = Str::random(30);
                $otp = rand(1000, 9999);
                customerUser::where('email', $user->email)
                    ->update([
                        'token' => $token,
                        'otp' => $otp,
                        'otp_expires_at' => now()->addMinutes(3)
                    ]);

                $details = [
                    'title' => 'You’re almost ready to start using your dashboard. Enter your Dashboard  using this OTP now!',
                    'name' => $user->name,
                    'otp' => $otp,
                    'token' => $token,
                    'email' => $user->email
                ];
                Mail::to($user->email)->send(new LoginOtpVerifyMail($details));

                return redirect()->route('customer.helpdesk.login.loginOtp', ['token' => $token, 'email' => $user->email])->with('success', 'Login Otp link sent, please check your email inbox.');
            } else {
                $user = customerUser::where('email', $request->email)->first();
                $token = Str::random(30);
                $otp = rand(1000, 9999);
                customerUser::where('email', $user->email)
                    ->where('email_verified', '0')
                    ->update([
                        'token' => $token,
                        'otp' => $otp,
                        'otp_expires_at' => now()->addMinutes(3),
                    ]);

                $details = [
                    'title' => 'You’re almost ready to start using your dashboard. Enter your Dashboard  using this OTP now!',
                    'name' => $user->name,
                    'otp' => $otp,
                    'token' => $token,
                    'email' => $user->email
                ];
                Mail::to($user->email)->send(new LoginOtpVerifyMail($details));

                return redirect()->route('customer.helpdesk.login.loginOtp', ['token' => $token, 'email' => $user->email])->with('success', 'Your Email ' . $user->email . ' is Unverified, We have sent Login otp, please check your email inbox.');
            }
        } else {
            return redirect()->back()->with('failure', "Email Id " . $request->email . " is not registered yet.");
        }
    }

    public function loginOtp(Request $request)
    {
        $token = $request->token;
        $email = $request->email;
        return view('front.customer.OtpLogin', compact('token', 'email'));
    }

    public function LoginOtpSuccess(Request $request)
    {
        $request->validate([
            'otp' => 'required|integer',
        ], [
            'otp.required' => 'Otp is required',
            'otp.integer' => 'Otp must be a Number only'
        ]);
        $otp = $request->otp;
        $email = $request->email;
        // $token = $request->token;
        $user = customerUser::where('otp', $otp)->where('email', $email)->first();
        if (!empty($user) && $user != '') {
            if ($request->otp == $user->otp) {
                customerUser::where('email', $email)
                    ->update([
                        'token' => '',
                        'otp' => NULL,
                        'otp_expires_at' => now(),
                        'email_verified' => '1'
                    ]);
                Auth::guard('customer')->login($user);
                return redirect()->route('customer.helpdesk.dashboard');
            }
        } else {
            return redirect()->back()->with('failure', 'The Login Otp code you have entered does not match');
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect(route('customer.helpdesk.login'));
    }

    public function dashboard()
    {
        $getAuthId = auth()->guard('customer')->user()->id;
        $getTicketsById = DB::table('cust_tickets')
            ->select('cust_tickets.*', 'customer_users.name as customer_name', 'services.ser_name as service_name')
            ->join('customer_users', 'cust_tickets.customer_user_id', '=', 'customer_users.id')
            ->join('services', 'cust_tickets.service_id', '=', 'services.id')
            ->ORDERBY('cust_tickets.id')->where('cust_tickets.customer_user_id', $getAuthId)->get();
        $ticket_ids = CustTicket::where('customer_user_id', $getAuthId)->get();
        $services = Service::orderBy('ser_name', 'ASC')->where('status', 1)->get();
        return view('front.customer.cust_dashboard', compact('services', 'getTicketsById', 'ticket_ids'));
    }

    public function document()
    {
        $AllticketId = CustTicket::query()->with(['services' => function ($query) {
            $query->select('id', 'ser_name');
        }])->get();
        return view('front.customer.document', compact('AllticketId'));
    }
}
