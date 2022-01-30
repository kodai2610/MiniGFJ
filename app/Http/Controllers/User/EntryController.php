<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Message;
use App\Models\User;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Mail;

class EntryController extends Controller
{
    //
    public function index() {
        $entries = Entry::where('user_id',Auth::id())->get();
        return view('user.entry.index', compact('entries'));
    }

    public function show($id)
    {   
        $entry = Entry::find($id);
        $messages = Message::where('entry_id', $id)->get();
        return view('user.entry.show', compact('entry','messages'));
    }

    public function store(Request $request,$id) {
        $jobId = $id;
        $userId = Auth::id();
        $insertData = [
            'user_id' => $userId,
            'job_id' => $jobId,
            'status' => 0
        ];
        $entry = Entry::create($insertData);
        
        $user = User::find($userId);
        $job = Job::find($jobId);
        $company = $job->company()->get();

        $data = [
            'name' => $user->name,
            'ruby' => $user->ruby,
            'email' => $user->email,
            'tell' => $user->tell,
            'birth' => $user->birth_day,
            'gender' => $user->gender,
            'job' => $job->title,
            'company' => $company[0]->name,
        ];


        
        Mail::send('emails.userSend',$data,function($message) use ($user) {
            $message->to($user->email, $user->name)->subject('応募ありがとうございます');
        });

        Mail::send('emails.companySend',$data,function($message) use ($company) {
            $message->to($company[0]->email, $company[0]->name)->subject('システムから応募が有りました。');
        });

        return redirect()->route('user.entry.show', $entry->id);
    }

    public function add(Request $request,$id) {
        $message = $request->input('message');
        $isUser = Auth::guard('users')->check();
        Message::create([
            'entry_id' => $id,
            'is_user' => $isUser,
            'message' => $message,
        ]);
        return redirect()->route('user.entry.show',$id);
    }

    public function destroy($id) {
        $entry = Entry::find($id);
        $entry->delete();
        return redirect()->route('user.entry.index');
    }
}


