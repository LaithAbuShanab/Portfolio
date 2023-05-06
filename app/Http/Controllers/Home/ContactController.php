<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function ContactMe()
    {
        return view('frontend.contact');
    }

    public function StoreMessage(Request $request)
    {
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'massage' => $request->massage,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Your Massage Submit Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ContactMessage()
    {
        $contacts = Contact::all();
        return view('admin.contact.allcontact', compact('contacts'));
    }

    public function DeleteMessage($id)
    {
        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Message Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
