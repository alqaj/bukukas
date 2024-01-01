<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('website.pages.users.index');
    }

    public function add()
    {
        return view('website.pages.users.add');
    }

    public function edit($uuid)
    {
        return view('website.pages.users.edit');
    }
}
