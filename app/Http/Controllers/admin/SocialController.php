<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:social-list|social-create|social-edit|social-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:social-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:social-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:social-delete', ['only' => ['destroy']]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'fb' => 'required',
        //     'li' => 'required',
        //     'ig' => 'required'
        // ],[
        //     'fb.required' => 'facebook field is required',
        //     'li.required' => 'LinkedIn field is required',
        //     'ig.required' => 'Instagram field is required'
        // ]);
        if ($request->all()) {
            social::truncate();
            social::create($request->all());
            return redirect()->back()->with('success', 'Social Links Inserted/Updated Successfully');
        }
        $social = social::first();
        return view('admin.social.socialList', compact('social'));
    }
}
