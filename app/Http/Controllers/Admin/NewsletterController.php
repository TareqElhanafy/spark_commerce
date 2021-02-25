<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddNewsletterRequest;
use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $Subscribers = Newsletter::all();
        return view('admin.newsletter.index', compact('Subscribers'));
    }
    public function store(AddNewsletterRequest $request)
    {

        $newsletter = Newsletter::create([
            'email' => $request->email,
        ]);

        return redirect()->route('frontpage')->with([
            'message' => 'You added You Email successfully, Wait For Us :)',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $newsletter = Newsletter::find($id);
        if (!$newsletter) {
            return redirect()->route('admin.newsletters')->with([
                'message' => 'There is no subscriber with such an id'
            ]);
        }
        $newsletter->delete();
        return redirect()->route('admin.newsletters')->with([
            'message' => 'Subscriber deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}
