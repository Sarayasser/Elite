<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Http\Controllers\HomeController;

class ContactController extends Controller
{
    public function create() {
        $test = (new HomeController)->note();
        return view('contact',['test'=>$test]);
    }


    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|profanity',
            'phone_number' => 'required',
            'message' => 'required|profanity'
        ]);

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;

        $contact->save();
        \Mail::send('contact_email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'phone_number' => $request->get('phone_number'),
                'user_message' => $request->get('message'),
            ), function($message) use ($request)
            {
                $message->from($request->email);
                if($request->instructor){
                    $message->to($request->instructor);
                }else{
                    $message->to('logeenhassanmostafa96@gmail.com');
                }
                    
            }
        );
        toastr()->success('Thank you for contact us!');

        return redirect()->back();

    }

    public function quick_store(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'required|profanity'
        ]);

        $contact = new Contact;

        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();

        \Mail::send('quick_contact_email',
            array(
                'email' => $request->get('email'),
                'user_message' => $request->get('message'),
            ), function($message) use ($request)
            {
                $message->from($request->email);
                $message->to('logeenhassanmostafa96@gmail.com');
            }
        );
        toastr()->success('Thank you for contact us!');
        return redirect()->back();

    }
}
