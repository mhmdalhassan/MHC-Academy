<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        // Use paginate so that Blade's {{ $requests->links() }} works
        $requests = Contact::latest()->paginate(9);

        return view('requests.index', compact('requests'));
    }

    public function sendMail($id): RedirectResponse
    {
        $request = Contact::findOrFail($id);

        $messageText = "Thank you for reaching out to us.  
Your message has been successfully received and is currently being processed.  
Our team will get back to you shortly.  

Best regards,  
[MH-Code Academy]";

        Mail::raw($messageText, function ($message) use ($request) {
            $message->from('mhcacadimy@gmail.com', 'MH-Code Academy')
                    ->to($request->email)
                    ->subject("Thank you for contacting MH-Code Academy, We will message you");
        });

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function destroy($id): RedirectResponse
{
    $contact = Contact::findOrFail($id);
    $contact->delete();

    return redirect()->route('requests.index')
        ->with('success', 'Request deleted successfully.');
}
}
