<?php

namespace Shuvosd\Contact\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shuvosd\Contact\Models\Contact;
use Shuvosd\Contact\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
	
	public function index()
	{
		#here first contact is package name and 2nd contact is file name
		return view('contact::contact'); 
	}

	public function send(Request $request)
	{
		Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message, $request->name));
		Contact::create($request->all());
        return redirect()->back()->with("success","Password changed successfully !");
	}
}