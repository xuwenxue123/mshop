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

    public function buyCart(Request $request)
    {
        $id=$request->all();
        // dd($id);     
        $uid=session('id');
        // dd($uid);
        $data=DB::table('goodss')->where('id',$id)->first();
        // dd($data);
        // $info = json_decode($data, true);
        $res=DB::table('cart')->where('id',$id)->insert([
            'uid'=>$uid,
            'goods_name'=>$data->goods_name,
            'goods_id'=>$data->id,
            'goods_pic'=>$data->goods_pic,
            'goods_price'=>$data->goods_price,
            'add_time'=>time()
        ]);
       
        if($res){
            return redirect()->action('home\IndexController@do_buyCart');
        }
    }

    public function do_buyCart(Request $request)
    {
        $uid=session('id');
        // dd($uid);
        $data=DB::table('cart')->where('uid',$uid)->get();
        // dd($data);
        $price=DB::table('cart')->where('uid',$uid)->select('goods_price')->get();
        // dd($price);
        $total=0;
        foreach($price as $k=>$v){
            // var_dump($v);
            // $prices=$v;
            // $total=array_sum($v);
            $total += $v->goods_price;
        }
        return view('home/buyCart',['data'=>$data],['total'=>$total]);
        
    }

    public function order(Request $request)
    {
        //接受购物车穿过来的id
        $id=$request->get('id');
        // dd($id);
        //去除点右边拼接的，
        $id=trim($id,',');
        //  dd($id);
        //接受用户id
        $uid=session('id');
        // dd($uid);
        //生成订到号
        $oid=time().rand(1000,4000).$uid;
        //dd($oid);
        //查询单价
        $price=DB::table('cart')->where('uid',$uid)->select('goods_price')->get();
        // dd($price);
        $pay_money=0;
        //循环遍历出来单价相加 求出总价
        foreach($price as $k=>$v){
            $pay_money += $v->goods_price;
        }
        // dd($pay_money);
        //入库 order
        $res=DB::table('order')->insert([
            'oid'=>$oid,
            'uid'=>$uid,
            'pay_money'=>$pay_money,
            'add_time'=>time()
        ]);
        // dd($res);
        //根据商品id查询商品信息
        $id=explode(',',$id); //因为whereIn里面的参数必须是数组
        // dd($id);
        $data=DB::table('cart')->whereIn('id',$id)->get();
        // dd($data);
        //因为查询出来的是二维数组，需要循环遍历出来
        $info=[];
        foreach($data as $v){
            $info[]=[
                'oid'=>$oid,
                'goods_id'=>$v->id,
                'goods_name'=>$v->goods_name,
                'goods_pic'=>$v->goods_pic,
                'goods_price'=>$v->goods_price,
                'add_time'=>time()
            ];
        }
        $result=DB::table('order_detail')->insert($info);
        if($result){
            return redirect()->action('home\IndexController@do_order',['oid'=>$oid]);
        }
    }

    public function do_order(Request $request)
    {
        $oid=$request->get('oid'); //一个值用get get接值必须要有参数 如果用all接受是数组的形式
        // dd($oid);
        $res=DB::table('order_detail')->where('oid',$oid)->get();
        // dd($res);
        return view('home/order',['res'=>$res]);
    }
    
    public function order_list()
    {  
       $uid=session('id');
       //dd($uid);
       $info=DB::table('order')->get();
       //dd($info);
       return view('home.order_list',['uid'=>$info]);
    }
    
}
