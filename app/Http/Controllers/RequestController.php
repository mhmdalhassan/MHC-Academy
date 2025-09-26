<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Contact::latest()->get();
        return view('requests.index', compact('requests'));
    }

//     public function sendMail($id)
//     {
//         $request = Contact::findOrFail($id);

//         $messageBody = <<<EOT
// Thank you for reaching out to us.  
// Your message has been successfully received and is currently being processed.  
// Our team will get back to you shortly.  

// Best regards,  
// MH-Code Academy Support Team
// EOT;

//         Mail::raw($messageBody, function($message) use ($request) {
//             $message->to($request->email)
//                     ->subject("Thank you for contacting MH-Code Academy");
//         });

//         return redirect()->back()->with('success', 'Confirmation email sent successfully!');
//     }


public function sendMail($id)
    {
        $request = Contact::findOrFail($id);

        $messageText = "Thank you for reaching out to us.  
Your message has been successfully received and is currently being processed.  
Our team will get back to you shortly.  

Best regards,  
[MH-Code Academy]";

        Mail::raw($messageText, function($message) use ($request) {
            $message->from('mhcacadimy@gmail.com', 'MH-Code Academy') 
                    ->to($request->email) 
                    ->subject("Thank you for contacting MH-Code Academy");
        });

        return redirect()->back()->with('success', 'Massege sent successfuly ');
    }








}
