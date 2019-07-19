@extends('layout.admin')

@section('title', '前台')

@section('content')
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
         <input type="text" name="cargo_name">
         <input type="submit" value="搜索">
</form>
    <table border="1">
        <tr>
           <td>货物名称</td>
           <td>货物图片</td>
           <td>库存</td>
           <td>添加时间</td>
           <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
           <td>{{$v->cargo_name}}</td>
           <td><img src="{{$v->cargo_pic}}" width="100" height="50"></td>
           <td>{{$v->cargo_num}}</td>
           <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
           <td>
                <a href="{{url('cargo_delete')}}?id={{$v->id}}">删除</a> |
                <a href="{{url('cargo_edit')}}?id={{$v->id}}">修改</a>
           </td>
        </tr>
        @endforeach
    </table>
    {{$data->appends(['cargo_name' => $cargo_name])->links()}}
</body>
</html>
@endsection