<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    
    public function index()
    {
        return view('front.index');
    }
    

    public function about()
    {
        return view('front.about');
    }
    
    public function contact()
    {
        return view('front.contact');
    }
    
    public function contactStore(Request $request)
    {
        // Handle the contact form submission logic here
        // For example, validate the request and send an email
        
        return redirect()->route('front.contact')->with('success', 'Message sent successfully!');
    }
}
