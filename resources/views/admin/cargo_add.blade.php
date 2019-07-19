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
   <form role="form" action="{{url('cargo_add_do')}}" method="post" enctype="multipart/form-data">
   <table border="1">
            @csrf
            <div class="form-group">
                <label>货物名称</label>
                <input class="form-control" type="text" name="cargo_name">
            </div>
            <div class="form-group">
                <label>货物库存</label>
                <input class="form-control" type="text" name="cargo_num">
          
            </div>
            <div class="form-group">
                <label>货物图片</label>
                <input  type="file" name="cargo_pic">
            </div>
            <button type="submit" class="btn btn-info">提交 </button>
    </table>
    </form>
</body>
</html>
@endsection