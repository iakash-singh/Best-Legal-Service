<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\front\AffiliateRequest;
use App\Models\{affiliate, blogCategory, blogTag, category, contact, Invoice, Post, Service, testimonial};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;

class HomeController extends Controller
{
    public function index()
    {
        $services = DB::table('services')
            ->select('services.id as service_id', 'services.slug as service_slug', 'services.ser_name as service_name', 'categories.category_name as service_sub_catname', 'services.is_checked as service_checked')
            ->join('categories', 'services.sub_cat', '=', 'categories.id')
            ->where('services.status', '1')->where('parents_id', '!=', '0')->where('is_checked', '=', '1')->where('categories.status', '1')
            ->get();
        $reviewServices = Service::orderBy('ser_name', 'ASC')->where('status', '1')->get();
        $posts = Post::where('status', 1)->with('categories')->orderBy('created_at', 'DESC')->get();
        $testi = testimonial::latest('id', 'DESC')->where('status', 1)->get();
        $ourServices = Service::latest()->where('status', 1)->where('is_checked', '=', '1')->get(['ser_name', 'slug', 'short_description']);
        return view('front.index', compact('services', 'posts', 'testi', 'ourServices', 'reviewServices'));
    }

    public function blog()
    {
        $posts = Post::latest()->with(['categories' => function ($query) {
            $query->select('name', 'slug')->groupBy('name');
        }])->with(['tags' => function ($query) {
            $query->select('name', 'slug')->groupBy('name');
        }])->where('status', '1')->get();
        return view('front.blog', compact('posts'));
    }

    public function tag(blogTag $tag)
    {
        $posts = $tag->posts();
        return view('front.blog', compact('posts'));
    }

    public function category(blogCategory $category)
    {
        $posts = $category->posts();
        return view('front.blog', compact('posts'));
    }

    public function allServices()
    {
        $categories = category::where('parents_id', NULL)->with('sub_category')->get();
        return view('front.allServices', compact('categories'));
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
        ], [
            'name.required' => 'Name field is required',
            'email.required' => 'Email field is required',
            'email.email' => 'Email must contain @ and .',
            'phone.required' => 'Phone field is required',
            'phone.numeric' => 'Phone number should be in numeric format',
            'message.required' => 'Message field is required'
        ]);
        $contact = new contact();
        $contact->name = ucwords($request->name);
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();
        if ($contact) {
            return redirect()->back()->with('success', 'Thankyou for your response, We will get back to you Shortly');
        } else {
            return redirect()->back()->with('failure', 'Something went wrong while submitting form, Please try again');
        }
    }

    public function affiliateStore(AffiliateRequest $request)
    {
        $affiliate = affiliate::create($request->all());
        if ($affiliate) {
            return redirect()->back()->with('success', 'Thankyou for your response, We will get back to you Shortly');
        } else {
            return redirect()->back()->with('failure', 'Something went wrong, Please try again');
        }
    }

    public function reviewStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'service_select' => 'required',
            's_desc' => 'required'
        ], [
            'name.required' => 'Full Name is required',
            'address.required' => "Short Address is required like 'Los Angeles, CA' ",
            'service_select.required' => 'Service selection is required',
            's_desc.required' => 'Short Description is required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()->getMessages()
            ]);
        } else {
            $test_review = new testimonial();
            $test_review->name = $request->input('name');
            $test_review->address = $request->input('address');
            $test_review->content = $request->input('s_desc');
            $test_review->service = $request->input('service_select');
            $test_review->save();
            return response()->json([
                'status' => 200,
                'message' => 'Thanks for your Review'
            ]);
        }
    }

    public function viewAllTestimonial()
    {
        $reviewServices = Service::orderBy('ser_name', 'ASC')->where('status', '1')->get();
        $fetchTesti = testimonial::latest()->where('status', 1)->get();
        return view('front.testimonial', compact('fetchTesti', 'reviewServices'));
    }

    public function thankyou(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            $payment = $api->payment->fetch($input['razorpay_payment_id']);
            Invoice::where('inv_id', $payment->notes['autogenkey'])->update([
                'payment_type' => $payment['id'],
                'payment_status' => 'Paid',
                'order_id' => $payment['order_id']
            ]);
        } else {
            return redirect()->back()->with('failure', 'Something went wrong. Please try after few minutes');
        }

        return view('front.thankyou', compact('payment'));
    }

    public function thankyouStore(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            $payment = $api->payment->fetch($input['razorpay_payment_id']);
            Invoice::where('inv_id', $payment->notes['autogenkey'])->update([
                'payment_type' => $payment['id'],
                'payment_status' => 'Paid',
                'order_id' => $payment['order_id']
            ]);
        } else {
            return redirect()->back()->with('failure', 'Something went wrong. Please try after few minutes');
        }

        return view('front.thankyou');
    }
}
