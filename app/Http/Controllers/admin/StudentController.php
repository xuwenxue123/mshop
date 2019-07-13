<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
class StudentController extends Controller
{   
    //学生添加
    public function student_add()
    {
        return view('student.student_add');
    }
    
    //学生添加入库
    public function student_add_do(Request $request)
    {   
        $data=$request->all();
        // dd($data);
        $validatedData=$request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'必填',
        ]);
        $res=DB::table('students')->insert([
            'name'=>$data['name'],
            'age'=>$data['age'],
            'sex'=>$data['sex'],
            'addtime'=>time(),
        ]);
        if($res){
            return redirect('student_list');
        }
    }

    //学生列表
    public function student_list(Request $request)
    {   
        $redis=new \Redis();
        $redis->connect('127.0.0.1','6379');
        $redis->incr('num');
        $num=$redis->get('num');
        echo $num;
        $res = $request->all();
        if(!empty($res['age'])){
            $data = DB::table('students')->where('age','like','%'.$res['age'].'%')->paginate(2);
        }else{
            $res['age'] = '';
            $data = DB::table('students')->paginate(2);
        }
        return view('student.student_list',['data'=>$data],['age'=>$res['age']]);
    }
    //学生删除
    public function student_del(Request $request)
    {
        $id=$request->all();
        // dd($id);
        $data=DB::table('students')->delete($id);
        // dd($data);
        return redirect('student_list');
    }
    //学生修改
    public function student_edit(Request $request)
    {   
        $info=$request->all();
        $res=DB::table('students')->where('id',$info['id'])->first();
        return view('student.student_edit',['info'=>$res]);
    }

    //学生修改执行
    public function student_edit_do(Request $request)
    {
        $data=$request->all();
        $res=DB::table('students')->where('id',$data['id'])->update([
           'name'=>$data['name'],
           'age'=>$data['age'],
        ]);
        return redirect('student_list');
    }


    
    //数组处理
    public function aa()
    {
        $num =1;
        for($i=1;$i<=5;$i++){
            $num *=$i;
        }
        echo $num;
    }
    
    public function bb()
    {
        $number=[1,2,3,4,5,6,7,8,9,10];
        echo max($number);
    }

    public function cc()
    {
        $arr=[2,5,6,1,9,7,8,];
        sort($arr);
        print_r($arr);
    }

    public function dd()
    {
        $aray = array(5,4,3,2,6,7,9,8,1,10);
        for($i=0;$i<count($aray);$i++){
            for($j=$i+1;$j<count($aray);$j++){
                $a=$aray[$i];
                $b=$aray[$j];
                if($a>$b){
                    $aray[$i]=$b;
                    $aray[$j]=$a;
                }

            }
        }
        //输出排序好的
        for($k=0;$k<count($aray);$k++){
            echo $aray[$k].',';

        }
    }

    //时间处理
    public function ee()
    {
        // $a='2019-07-09 10:00:00';
        // $b=strtotime($a);
        // var_dump($b);

        // $c=date('Y-m-d H:i:s',0);
        // var_dump(date('Y-m-d H:i:s',strtotime('-1 months')));

        // echo strtotime("09 july 2019"), "\n";
        // $time = time();
        //\var_dump($time);
        // $time_str='2019-07-09';
        // $time_int = strtotime($time_str);  // 将时间字符串转化为时间戳
        // var_dump($time_int); // int(1516155874)
        // echo strtotime('-1 day');
        // echo strtotime(date("Y-m-d"),time());
    }

 
}
