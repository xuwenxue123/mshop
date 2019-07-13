<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class GoodsController extends Controller
{   
    //后台商品显示
    public function goods_add()
    {
        return view('admin.goods_add');
    }

    //后台商品入库
    public function goods_add_do(Request $request)
    {
        $data=$request->all();
        $path = $request->file('goods_pic')->store('');
        // dd($path);
        $goods_pic=asset('storage'.'/'.$path);
        //dd($goods_pic);
        $res=DB::table('goodss')->insert([
            'goods_name'=>$data['goods_name'],
            'goods_price'=>$data['goods_price'],
            'goods_pic'=>$goods_pic,
            'add_time'=>time(),
        ]);
        if($res){
            return redirect('goods_list');
        }
    }
    //商品列表展示
    public function goods_list(Request $request)
    {   
        
        $res = $request->all();
        if(!empty($res['goods_price'])){
            $data = DB::table('goodss')->where('goods_price','like','%'.$res['goods_price'].'%')->paginate(2);
        }else{
            $res['goods_price'] = '';
            $data = DB::table('goodss')->paginate(2);
        }
        return view('admin.goods_list',['data'=>$data],['goods_price'=>$res['goods_price']]);
    }

    //商品删除
    public function goods_delete(Request $request)
    {
        $id=$request->all();
        $data=DB::table('goodss')->delete($id);
        // dd($data);
        return redirect('goods_list');
    }

    //商品修改
    public function goods_edit(Request $request)
    {
        $info=$request->all();
        $res=DB::table('goodss')->where('id',$info['id'])->first();
        return view('admin.goods_edit',['info'=>$res]);
    }

    //商品修改执行
    public function goods_edit_do(Request $request)
    {
        $data=$request->all();
        $path = $request->file('goods_pic');
        // dd($path);
        if($path){
            $path = $request->file('goods_pic')->store('');
            $goods_pic=asset('storage'.'/'.$path);
            // dd($path);
            $res=DB::table('goodss')->where(['id'=>$data['id']])->update([
                'goods_name'=>$data['goods_name'],
                'goods_price'=>$data['goods_price'],
                'goods_pic'=>$goods_pic,
                'add_time'=>time(),
            ]);
        }else{
            $res=DB::table('goodss')->where(['id'=>$data['id']])->update([
                'goods_name'=>$data['goods_name'],
                'goods_price'=>$data['goods_price'],
                'goods_pic'=>$goods_pic,
                'add_time'=>time(),
            
            ]);
        }
            return redirect('goods_list');
    }
}
