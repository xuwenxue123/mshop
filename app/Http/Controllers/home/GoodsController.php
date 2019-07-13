<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class GoodsController extends Controller
{   
    //商品详情
    public function goods_detail(Request $request)
    {   
 
       $data=$request->all();
       $res=DB::table('goodss')->get();
       return view('home.goods_detail',['data'=>$res]); 
    }
}
