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
   <form role="form" action="{{url('goods_edit_do')}}" method="post" enctype="multipart/form-data">
   <input type="hidden" value="{{$info->id}}" name="id">
   <table border="1">
            @csrf
            <div class="form-group">
                <label>商品名称</label>
                <input class="form-control" type="text" name="goods_name" value="{{$info->goods_name}}">
            </div>
            <div class="form-group">
                <label>商品价格</label>
                <input class="form-control" type="text" name="goods_price" value="{{$info->goods_price}}">
          
            </div>
            <div class="form-group">
                <label>商品图片</label>
                <input  type="file" name="goods_pic">
                <img src="{{$info->goods_pic}}" width="100" height="50">
            </div>
            <button type="submit" class="btn btn-info">修改 </button>
    </table>
    </form>
</body>
</html>
@endsection