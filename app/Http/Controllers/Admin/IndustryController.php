<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIndustry;
use App\Models\Industry;
// use Illuminate\Http\Request;

class IndustryController extends Controller
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
        $industries = Industry::paginate(1);
        // $industries = Industry::all();
        return view('admin.industry.index', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.industry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIndustry $request)
    {
        //
        $request->validate([
            'name' => 'required|max:50',
        ]);
        $post = $request->all();
        Industry::create($post);
        session()->flash('msg_create', '✔︎ 作成が完了しました'); 
        return redirect()->route('admin.industry.index');
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
        $industry = Industry::find($id);
        return view('admin.industry.edit', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreIndustry $request, $id)
    {
        //
        $update = [
            'name' => $request->name,
        ];
        Industry::where('id',$id)->update($update);
        session()->flash('msg_update', '✔︎ 更新が完了しました');
        return redirect()->route('admin.industry.index');
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
        Industry::where('id',$id)->delete();
        session()->flash('msg_destroy', '✔︎ 削除が完了しました');
        return redirect()->route('admin.industry.index');
    }
}
