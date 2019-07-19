<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\model\Index;
use DB;
class LoginController extends Controller
{
    //后台登录
    public function login()
    {
        return view('admin.login');
    }

    //后台登录执行
    public function login_add(Request $request)
    {
        $data=$request->all();
        $name=$data['name'];
        $res=Index::where('name','=',$data['name'])->first();
        // $request->session()->put('name',$name);
        // dd($request->session());
        if($res){
            if($res->pwd == $data['pwd']){
                session(['name'=>$data['name']]);
                return redirect('goods_add');
            }else{
                return redirect('login');
            }
        }else{
                return redirect('login');
        }
    }
}
