<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Company;
use App\Models\Job;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class EntryController extends Controller
{
    //
    public function index(Request $request) {
        //jobIdsの作成
        $companyId = Auth::guard('companies')->id();
        $jobs = Job::where('company_id',$companyId)->get();
        $jobIds = [];
        foreach ($jobs as $job) {
            $jobIds[] = $job->id;
        }
        $entries = Entry::whereIn('job_id',$jobIds)->paginate(1);
        // $entries = [];
        // foreach ($jobs as $job) {
        //     foreach ($job->entries as $entry) {
        //         $entries[] = $entry;
        //     }
        // }
        return view('company.entry.index',compact('entries'));
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

    public function destroy($id) {
        $entry = Entry::find($id);
        $entry->delete();
        return redirect()->route('company.entry.index');
    }    
}
