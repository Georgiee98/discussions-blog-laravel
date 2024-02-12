<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class ContactViaEmailController extends Controller
{
    public function showContactForm()
    {
        // Return the view containing your form
        return view('emails.contact');
    }

    public function contact(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Get the email address from the form submission
        $email = $request->input('email');

        // Send the email to the address provided in the form
        Mail::to($email)->send(new SendEmail($email));

        // Redirect back with a success message
        return back()->with('success', 'Email sent successfully to ' . $email);
    }
}