<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\EmploymentType;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Occupation;
use App\Models\Feature;
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
        $features = Feature::all();
        return view('company.job.create',compact('occupations', 'employmentTypes','features'));
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
            'img' => 'required',
            'salary_min' => 'required',
            'location' => 'required|max:255',
            'work_hour' => 'required|max:255',
            'empTypes' => 'required',
            'feature_ids' => 'required',
        ]);
        $inputValue = $request->all();
            $inputValue['img'] = $request->file('img')->store('images');//fileで操作してstoreに保存Pathが返る
        //現在ログインしている企業を取得
        $inputValue['company_id'] = Auth::id();
        $job = Job::create($inputValue);
        $job->empTypes()->sync($inputValue['empTypes']);//中間テーブルに保存
        $job->features()->sync($inputValue['feature_ids']);//中間テーブルに保存
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
        $job = Job::find($id);
        return view('company.job.show', compact('job'));
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
        $job = Job::find($id);
        $occupations = Occupation::all();
        $employmentTypes = EmploymentType::all();
        $features = Feature::all();
        return view('company.job.edit', compact('job','occupations','employmentTypes','features'));
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

        $request->validate([
            'title' => 'required|max:50',
            'display_message' => 'required|max:255',
            'occupation_id' => 'required',
            'content' => 'required|max:255',
            'salary_min' => 'required',
            'location' => 'required|max:255',
            'work_hour' => 'required|max:255',
            'empTypes' => 'required',
            'feature_ids' => 'required',
        ]);
        $previousJob = Job::find($id);
        $update = $request->all();
        $img = $request->file('img');
        //画像の処理
        if(!isset($img)) {
            $update['img'] = $previousJob->img;
        }else {
            \Storage::disk('public')->delete($previousJob->img);//画像の削除
            $update['img'] = $request->file('img')->store('images'); //画像の更新
        }

        //syncのupdate
        $previousJob->empTypes()->sync($update['empTypes']);
        $previousJob->features()->sync($update['feature_ids']);
        unset($update['empTypes']);
        unset($update['feature_ids']);
        unset($update['_token']);
        unset($update['_method']);
        Job::where('id', $id)->update($update);
        return redirect()->route('company.job.show', $id);
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
        // Job::where('id', $id)->delete();
        $job = Job::find($id);
        $job->entries()->each(function($post) {
            $post->delete();
        });
        $job->delete();
        return redirect()->route('company.job.index');
    }
}
