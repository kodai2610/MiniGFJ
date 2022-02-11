<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\Company; //Eloquent エロくアント
use App\Models\Industry;
use App\Models\Prefecture;
use App\Models\City;
use App\Http\Requests\StoreCompany;
use App\Http\Requests\UpdateCompany;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{   

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
        $companies = DB::table('companies')->orderBy('created_at', 'DESC')->paginate(6);
        // $companies = Company::paginate(6);
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $industries = Industry::all();
        $prefectures = Prefecture::all();
        // $cities = City::all();
        return view('admin.company.create', compact('industries', 'prefectures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        //
        $inputValue = $request->all(); //array
        $inputValue['logo'] = $request->file('logo')->store('images');//画像のパスが返る
        $inputValue['password'] = Hash::make($inputValue['password']);
        //file = アップロードしたファイルにアクセス
        //store = storage>app>public 内にimagesディレクトリを作成して保存
        $company = Company::create($inputValue);
        session()->flash('msg_create', '✔︎ 作成が完了しました'); 
        return redirect()->route('admin.company.index',);
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
        $company = Company::find($id);
        return view('admin.company.show', compact('company'));
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
        $industries = Industry::all();
        $prefectures = Prefecture::all();
        $company = Company::find($id);
        return view('admin.company.edit',compact('company','industries','prefectures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompany $request, $id)
    {   
        //編集前のcompanyを取得
        $previousCompany = Company::find($id);
        $update = $request->all();
        $update['password'] = Hash::make($request['password']);
        $image = $request->file('logo');
        if(!isset($image)) {
            $update['logo'] = $previousCompany->logo;
        }else {
            \Storage::disk('public')->delete($previousCompany->logo);//画像の削除
            $update['logo'] = $image->store('images');
        }
        unset($update['password_confirmation']);
        unset($update['_token']);
        unset($update['_method']);
        Company::where('id', $id)->update($update);
        session()->flash('msg_update', '✔︎ 更新が完了しました'); 
        return redirect()->route('admin.company.index');
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
        Company::where('id', $id)->delete();
        session()->flash('msg_destroy', '✔︎ 削除が完了しました');
        return redirect()->route('admin.company.index');
    }
}
