<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\model\Index;
use DB;
class LoginController extends Controller
{
    //前台注册
    public function register()
    {
       return view('home.register');
    }

    //前台注册执行
    public function do_register(Request $request)
    {
        $data=$request->all();
        $res=DB::table('regster')->insert([
            'name'=>$data['name'],
            'pwd'=>$data['pwd'],
        ]);
        if($res){
            return redirect('login');
        }
    }
    
    //登录视图
    public function login()
    {  
        return view('home.login');
    }

    //登录执行
    public function do_login(Request $request)
    {   
        // $data = $request->session()->all();
        // dd($data);
        $data=$request->all();
        // dd($data);
        $name=$data['name'];
        $res=Index::where('name','=',$data['name'])->first();
        // $request->session()->put('name',$name);
        //dd($request->session());
        if($res){
            if($res['pwd'] == $data['pwd']){
                session([
                    'id'=>$res['id'],
                    'name'=>$res['name'],
                 ]);
              
                return redirect('home/index_add');
            }else{
                return redirect('login');
            }
        }else{
                return redirect('login');
        }
    }
}

