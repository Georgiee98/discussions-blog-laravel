<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function logoutForm()
    {
        Auth::logout();
        return view('auth.logout');
    }



    public function sendEmail(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Create an instance of the Mailable, passing the validated data to its constructor
        $email = new SendEmail($data);

        // Send the email to the provided address with the custom subject
        Mail::to($request->email)->send($email);

        // Redirect back with a success message
        return back()->with('success', 'Email sent successfully.');
    }
}