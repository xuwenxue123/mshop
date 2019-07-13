
@extends('layout.home')

@section('title', '前台')

@section('content')	
	<!-- end cart menu -->

	<!-- product -->
	<div class="section product product-list">
		<div class="container">
			<div class="pages-head">
				<h3>PRODUCT LIST</h3>
			</div>
			<div class="input-field">
				<select>
					<option value="">Popular</option>
					<option value="1">New Product</option>
					<option value="2">Best Sellers</option>
					<option value="3">Best Reviews</option>
					<option value="4">Low Price</option>
					<option value="5">High Price</option>
				</select>
			</div>
			<div class="row">
            @foreach($data as $v)
				<div class="col s6">
					<div class="content">
                    <a href="{{url('wish')}}?id={{$v->id}}"><img src="{{$v->goods_pic}}" alt=""></a>
						<h6><a href="{{url('wish')}}?id={{$v->id}}">{{$v->goods_name}}</a></h6>
						<div class="price">
                        {{$v->goods_price}} <span>$28</span>
						</div>
						<button class="btn button-default">ADD TO CART</button>
					</div>
				</div>
                @endforeach
			<div class="pagination-product">
				<ul>
					<li class="active">1</li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">4</a></li>
					<li><a href="">5</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end product -->

	
	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
	
@endsection