<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('website.pages.users.index', compact('data'));
    }

    public function add()
    {
        return view('website.pages.users.add');
    }

    public function edit($uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        return view('website.pages.users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ];

        // Tambahkan validasi password jika checkbox dicentang
        if ($this->input('ubah_password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $request->validate($rules);
        
        $user = User::where('uuid', $request->input('uuid'))->first();

    }
}
