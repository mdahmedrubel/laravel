<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;

class ContactControllers extends Controller
{


    public function Contact(){
        return view('frontend.contact');
    }//End method




    public function StoreMessage(Request $request){

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),

        ]);

        $notification    = array(
            'message'    => 'Your Message Submitted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//end method



    public function ContactMessage(){
  
            $contacts = Contact::latest()->get();
            return view('admin.contact.allcontact', compact('contacts'));

    }//End Method



    //delete method of message of contact page
    public function DeleteMessage($id){

        Contact::findOrFail($id)->delete();

        $notification    = array(
            'message'    => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//end method




}
