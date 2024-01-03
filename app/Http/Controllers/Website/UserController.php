<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Exception;
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
        if ($request->input('ubah_password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }
        // dd($request->all());
        $request->validate($rules);
        try{
            $user = User::where('uuid', $request->input('uuid'))->first();
            // dd($user->toArray());
            // $user->update($request->only(['nama','email']));
            $user->name= $request->input('nama');
            $user->email= $request->input('email');
            $user->save();
            if ($request->input('ubah_password')) {
                $user->update(['password' => bcrypt($request->input('password'))]);
            }
            // $user->save();
        }catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
        return redirect()->route('website.users.index')->with('success','Sukses mengubah data user!');


    }
}
