<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle registration request
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $admin = $this->create($request->all());

        return redirect()->route('login.form')->with('success', 'Registration successful. Please login.');
    }

    // Validate the registration request
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'gmail' => ['required', 'string', 'email', 'max:255', 'unique:admin'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // Create a new admin instance
    protected function create(array $data)
    {
        return Admin::create([
            'nama_lengkap' => $data['nama_lengkap'],
            'gmail' => $data['gmail'],
            'password' => bcrypt($data['password']),
        ]);
    }
}