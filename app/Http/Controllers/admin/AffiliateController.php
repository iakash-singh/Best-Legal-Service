<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\affiliate;

class AffiliateController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:aff-list|aff-create|aff-edit|aff-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:aff-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:aff-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:aff-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $affiliateList = affiliate::latest()->get();
        return view('admin.affiliateShow', compact('affiliateList'));
    }
}
