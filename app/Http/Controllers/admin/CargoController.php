<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CargoController extends Controller
{
    public function cargo_add()
    {
        return view('admin.cargo_add');
    }

    public function cargo_add_do(Request $request)
    {
        $data=$request->all();
        $path = $request->file('cargo_pic')->store('');
        $cargo_pic=asset('storage'.'/'.$path);
        $res=DB::table('cargo')->insert([
            'cargo_name'=>$data['cargo_name'],
            'cargo_num'=>$data['cargo_num'],
            'cargo_pic'=>$cargo_pic,
            'add_time'=>time(),

        ]);
        if($res){
            return redirect('cargo_list');
        }
    }

    public function cargo_list(Request $request)
    { 
    //     $redis=new \Redis();
    //     $redis->connect('127.0.0.1','6379');
    //     $num=$redis->incr('num');
    //     $num=$redis->get('num');
    //     echo '访问次数：'.$num;
        $res = $request->all();
        if(!empty($res['cargo_name'])){
            $data = DB::table('cargo')->where('cargo_name','like','%'.$res['cargo_name'].'%')->paginate(2);
        }else{
            $res['cargo_name'] = '';
            $data = DB::table('cargo')->paginate(2);
        }
       return view('admin.cargo_list',['data'=>$data],['cargo_name'=>$res['cargo_name']]);
    }

    public function cargo_delete(Request $request)
    {
        $id=$request->all();
        $data=DB::table('cargo')->delete($id);
        // dd($data);
        return redirect('cargo_list');
    }

    public function cargo_edit(Request $request)
    {  
       $data=$request->all();
       $res=DB::table('cargo')->where('id',$data['id'])->first();
       return view('admin.cargo_edit',['data'=>$res]);
    }


    public function cargo_edit_do(Request $request)
    {
        $data=$request->all();
        $path = $request->file('cargo_pic');
        // dd($path);
        if($path){
            $path = $request->file('cargo_pic')->store('');
            $cargo_pic=asset('storage'.'/'.$path);
            // dd($path);
            $res=DB::table('cargo')->where(['id'=>$data['id']])->update([
                'cargo_name'=>$data['cargo_name'],
                'cargo_num'=>$data['cargo_num'],
                'cargo_pic'=>$cargo_pic,
                'add_time'=>time(),
            ]);
        }else{
            $res=DB::table('cargo')->where(['id'=>$data['id']])->update([
                'cargo_name'=>$data['cargo_name'],
                'cargo_num'=>$data['cargo_num'],
                'cargo_pic'=>$cargo_pic,
                'add_time'=>time(),
            
            ]);
        }
            return redirect('cargo_list');
    }
}


