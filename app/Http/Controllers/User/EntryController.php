<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    //
    public function show($id)
    {   
        $entry = Entry::find($id);
        $messages = Message::get();
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



}
