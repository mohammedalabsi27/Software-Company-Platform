<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function about()
    {
        return view('front.about');
    }

    public function service()
    {
        return view('front.service');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function subscribersStore(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);
        Subscriber::create($data);
        return back()->with('subscriber_success_msg', 'Subscribed Successfully');
    }

    public function contactStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        Message::create($data);
        return back()->with('success', 'Your Message sent Successfully');
    }
}
