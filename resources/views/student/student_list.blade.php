<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>
      <form action="">
         <input type="text" name="age">
         <input type="submit" value="搜索">
      </form>
      <table border="1">
         <tr>
            <td>#</td>
            <td>学生姓名</td>
            <td>学生年龄</td>
            <td>学生性别</td>
            <td>添加时间</td>
            <td>操作</td>
         </tr>
         @foreach($data as $k=>$v)
         <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->name}}</td>
            <td>{{$v->age}}</td>
            <td>{{$v->sex}}</td>
            <td>{{ date('Y-m-d H:i:s',$v->addtime) }}</td>
            <td>
               <a href="{{url('student_del')}}?id={{$v->id}}">删除</a>
               <a href="{{url('student_edit')}}?id={{$v->id}}">修改</a>
            </td>
         </tr>
         @endforeach
      </table>
      {{$data->appends(['age' => $age])->links()}}
</body>
</html>


