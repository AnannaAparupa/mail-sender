<?php

namespace App\Http\Controllers;

use App\EmailList;
use App\EmailSend;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        return view('admin.mail.send-mail');
    }

    public function actionPostSendMail(Request $request)
    {
        $this->validate($request, [
            'subject'=>'required|min:3|max:191|string',
            'emails'=>'required',
            'template'=>'required',
        ]);
        $emails = explode(',', $request->emails);

        $email_lists = [];
        foreach ($emails as $email)
        {
            $trim_email = trim($email);
            if (filter_var($trim_email, FILTER_VALIDATE_EMAIL))
            {
                $email_lists[] = trim($trim_email);
            }
        }

        if (count($email_lists) > 0)
        {
            $email_send = EmailSend::create([
                'user_id'=>auth()->user()->id, //Auth::user()->name
                'subject'=>$request->subject,
                'template'=>$request->template
            ]);

            $when = now();

            foreach ($email_lists as $email_list)
            {
                $when = $when->addSecond(10);


                $find_email = EmailList::where('user_id', auth()->user()->id)
                    ->where('email', $email_list)
                    ->first();

                if (!$find_email)
                {
                    $find_email = EmailList::create([
                        'user_id'=>auth()->user()->id,
                        'email'=>$email_list
                    ]);
                }

                Mail::to($email_list)->later($when, new SendMail($request->subject, $request->template));

                DB::table('email_send_individuals')
                    ->insert([
                        'email_send_id'=>$email_send->id,
                        'email_list_id'=>$find_email->id,
                    ]);
            }

            return redirect()
                ->route('all-mail')
                ->with('message', 'New Mail Send To Users');
        }else{
            return redirect()
                ->back()
                ->with('message', 'Please enter valid emails');
        }


    }

    public function allSendMail()
    {
        $emails = EmailSend::where('user_id', auth()->user()->id)
            ->paginate(15);
        return view('admin.mail.all-mails', compact('emails'));
    }

    public function actionShowEmailDetails($id)
    {
        $email = EmailSend::with('emails')->find($id);
        return view('admin.mail.email-details', compact('email'));
    }

    public function actionDeleteMail($id)
    {
        EmailSend::destroy($id);
        return redirect()
            ->route('all-mail')
            ->with('message', 'Record Successfully deleted');
    }
}
