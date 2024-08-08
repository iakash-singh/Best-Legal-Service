<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contact-list|contact-create|contact-edit|contact-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:contact-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:contact-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $contactList = contact::latest()->get();
        return view('admin.contactShow', compact('contactList'));
    }
}
