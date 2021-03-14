<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function GetForm()
    {
        return view('front.contact');
    }

    public function SubmitForm(AddContactRequest $request)
    {

     DB::table('contacts')->insert([
         'name'=>$request->name,
         'email'=>$request->email,
         'phone'=>$request->phone,
         'message'=>$request->message,
     ]);

     return redirect()->back()->with([
         'alert-type'=>'success',
         'message'=>'Thank you for Contacting us, we will reply to your message as soon as possible'
     ]);
    }

    public function index()
    {
        $messages = DB::table('contacts')->get();
        return view('admin.contact.index', compact('messages'));
    }


}
