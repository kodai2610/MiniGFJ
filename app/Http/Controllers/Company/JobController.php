<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\EmploymentType;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Occupation;
use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //middlewareによる認証制限
    public function __construct()
    {
        $this->middleware('auth:companies');
    }
    
    public function index()
    {
        //
        $jobs = Job::all();
        return view('company.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $occupations = Occupation::all();
        $employmentTypes = EmploymentType::all();
        return view('company.job.create',compact('occupations', 'employmentTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|max:50',
            'display_message' => 'required|max:255',
            'occupation_id' => 'required',
            'content' => 'required|max:255',
            'salary_min' => 'required',
            'location' => 'required|max:255',
            'work_hour' => 'required|max:255',
        ]);
        $inputValue = $request->all();
        if($request->hasFile('img')){
            $inputValue['img'] = $request->file('img')->store('images');//fileで操作してstoreに保存Pathが返る
        }
        //現在ログインしている企業を取得
        $inputValue['company_id'] = Auth::id();
        $job = Job::create($inputValue);
        $job->empTypes()->sync($inputValue['empTypes']);
        return redirect()->route('company.job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
