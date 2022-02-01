<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Http\Requests\StoreFeature;
use App\Models\Feature;


class FeatureController extends Controller
{   
    /**
     * 新しいIndustryControllerインスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $features = Feature::all();
        return view('admin.feature.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFeature $request)
    {
        //
        $inputValue= $request->all();
        Feature::create($inputValue);
        session()->flash('msg_create', '✔︎ 作成が完了しました'); 
        return redirect()->route('admin.feature.index');
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
        $feature = Feature::find($id);
        return view('admin.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFeature $request, $id)
    {
        //
        $update = [
            'name' => $request->name,
        ];
        Feature::where('id',$id)->update($update);
        session()->flash('msg_update', '✔︎ 更新が完了しました');
        return redirect()->route('admin.feature.index');
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
        Feature::where('id',$id)->delete();
        session()->flash('msg_destroy', '✔︎ 削除が完了しました');
        return redirect()->route('admin.feature.index');
    }
}
