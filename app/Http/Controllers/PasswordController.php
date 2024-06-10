<?php

namespace App\Http\Controllers;

use App\Models\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function index()
    {
        $passwords = Auth::user()->passwords;
        return view('passwords.index', compact('passwords'));
    }

    public function create()
    {
        return view('passwords.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'site_name' => 'required',
            'site_url' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data['user_id'] = $request->user()->id;
        $password = Password::create($data);


        // Auth::user()->passwords->create($request->all());

        return redirect()->route('passwords.index')->with('success', 'Password saved successfully');
    }

    public function edit(Password $password)
    {
        return view('passwords.edit', compact('password'));
    }

    public function update(Request $request, Password $password)
    {
        $request->validate([
            'site_name' => 'required',
            'site_url' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $password->update($request->all());

        return redirect()->route('passwords.index')->with('success', 'Password updated successfully');
    }

    public function destroy(Password $password)
    {
        $password->delete();

        return redirect()->route('passwords.index')->with('success', 'Password deleted successfully');
    }
}
