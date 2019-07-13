<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Goodss;
use DB;
class IndexController extends Controller
{
    public function index_add()
    {
        return view('home.index_add');
    }

    public function index(Request $request)
    {    
        $res=$request->all();
        if(isset($res['find_name'])){
            $data=Goodss::where('goods_name','like','%'.$res['find_name'].'%')->paginate(2);
        }else{
            $res['find_name']='';
            $data=Goodss::paginate(4);
        }
        return view('home.index_add',['data'=>$data],['name'=>$res['find_name']]);
    }

    //商品详情
    public function wish(Request $request)
    {
        $id=$request->all();
        // dd($data);
        $res=Goodss::where('id',$id)->first()->toArray();
        // dd($res);     
        return view('home.wish',['res'=>$res]);
        
    }
}
