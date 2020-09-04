<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// class ContactMessageController extends Controller
// {
//     public function create() {
//         return view('contact');
//     }
//     public function store(Request $request) {

//         $this->validate($request, [


//             'name' => 'required',
//             'email' => 'required|email',
//             'message' => 'required'
//         ]);
//         Mail::send('emails.contact-message', [

//             'msg' => $request->message
//         ], function ($mail) use($request) {

//             $mail->from($request->mail, $request->name);

//             $mail->to('admin@exemple.com')-> subject('Contact Message');
//         });

//         return redirect()->back()->width('flash_message', 'thank you for your message');


//     }
// }
