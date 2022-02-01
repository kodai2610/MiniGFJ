<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Occupation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOccupation;

class OccupationController extends Controller
{   
    /**
     * 新しいOccupationControllerインスタンスの生成
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
        $occupations = Occupation::all();
        return view('admin.occupation.index',compact('occupations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Cから先に作り始める
        return view('admin.occupation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOccupation $request)
    {
        //
        $post = $request->all();//入力値受け取り
        Occupation::create($post);
        session()->flash('msg_create', '✔︎ 作成が完了しました'); 
        return redirect()->route('admin.occupation.index');
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
        $occupation = Occupation::find($id);
        return view('admin.occupation.edit', compact('occupation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOccupation $request, $id)
    {
        //
        $post = $request->all();
        unset($post['_method']);
        unset($post['_token']);
        Occupation::where(['id' => $id])->update($post);
        session()->flash('msg_update', '✔︎ 更新が完了しました');
        return redirect()->route('admin.occupation.index');
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
        Occupation::where(['id' => $id])->delete();
        session()->flash('msg_destroy', '✔︎ 削除が完了しました');
        return redirect()->route('admin.occupation.index');
    }
}
