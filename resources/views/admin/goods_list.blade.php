@extends('layout.admin')

@section('title', '前台')

@section('content')
<form action="">
         <input type="text" name="goods_price">
         <input type="submit" value="搜索">
</form>
<table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <td>商品名称</td>
                <td>商品价格</td>
                <td>商品图片</td>
                <td>添加时间</td>
                <td>操作</td>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $v)
                <tr> 
                    <td>{{$v->goods_name}}</td>
                    <td>{{$v->goods_price}}</td>
                    <td><img src="{{$v->goods_pic}}" alt="" width="100" width="50"></td>
                    <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
                    <td>
                        <a href="{{url('goods_delete')}}?id={{$v->id}}">删除</a> |
                        <a href="{{url('goods_edit')}}?id={{$v->id}}">修改</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data->appends(['goods_price' => $goods_price])->links()}}
    @endsection