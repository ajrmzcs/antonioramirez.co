<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = date('Y');

        return view('contact',compact('year'));
    }

    /**
     * Send email from contact form.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required | min:5 | max:100',
            'email' => 'required | email',
            'message' => 'required| string | min:5 | max:5000',
        ]);

        try {


            return redirect()->route('contact')->with('status', 'Message sent');

        } catch (\Exception $e) {

            return back()->withInput()->withErrors($e->getMessage());

        }

    }
}
