<?php

namespace Robertgarrigos\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Robertgarrigos\Contact\Mail\MessageSent;
use Robertgarrigos\Contact\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact::contact');
    }

    public function store(Request $request)
    {

        $attributes = $this->validateContact();

        $name = $attributes['name'];
        $email = $attributes['email'];
        $message = $attributes['message'];
        //SendMail

        try {
            Mail::to(config('contact.email'))
                ->send(new MessageSent($name, $email, $message));

            // Save the message details to database
            Contact::create($attributes);

            return redirect(route('contact'))->with(['message' => __('contact.message_sent')]);
        } catch (\Swift_TransportException $e) {
            // email address from contacter is not a real one, even it is well formed
            session()->flashInput($request->input());

            return Redirect::back()->withErrors(['email' => __('contact.email_not_valid')]);
        }

    }

    public function validateContact()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:3',
            'captcha' => 'required|captcha',
        ]);
    }

}
