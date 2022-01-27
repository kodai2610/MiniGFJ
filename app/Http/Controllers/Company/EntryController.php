<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Company;
use App\Models\Job;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    //
    public function index() {
        //jobIdsの作成
        $companyId = Auth::guard('companies')->id();
        $jobs = Job::where('company_id',$companyId)->get();
        return view('company.entry.index',compact('jobs'));
    }

    public function show($id) {
        $entry = Entry::find($id);
        $messages = Message::where('entry_id', $id)->get();
        return view('company.entry.show', compact('entry','messages'));
    }

    public function add(Request $request,$id) {
        $message = $request->input('message');
        $isUser = false; //ここを名前に変えればいけそう
        Message::create([
            'entry_id' => $id,
            'is_user' => $isUser,
            'message' => $message,
        ]);
        return redirect()->route('company.entry.show',$id);
    }

    
}
