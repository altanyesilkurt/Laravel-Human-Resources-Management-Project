<?php
namespace App\Http\Controllers;
use App\Http\Requests\EmailFormRequest;
use App\Mail\OrderShipped;
use Webklex\IMAP\Client;
class EmailController extends Controller
{
    public function index(){

        return view('emails.index');
    }

    public function sendmail(EmailFormRequest $request)
    {
        \Mail::raw($request->input('content'), function ($message) {
        $user = request()->input('to');
        $message->to($user)->subject(\request()->input('subject'));
    });
        return redirect('/sendEmail')->with('messages','email send successfully');
    }


}
