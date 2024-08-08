<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SingleServiceForm;
class SingleServiceController extends Controller
{
    public function index()
    {
        $singleSrvList = collect(SingleServiceForm::select('id', 'name', 'email', 'phone', 'message', 'page')->get())->except('created_at', 'updated_at');
        return view('admin.singleServiceShow', compact('singleSrvList'));
    }
}
