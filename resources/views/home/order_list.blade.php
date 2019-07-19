@extends('layout.home')

@section('title', '前台')

@section('content')	
	<!-- cart -->
	<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h3>订单列表</h3>
			</div>
			<div class="content">
            @foreach($uid as $v)
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
							<h5>订单编号</h5>
						</div>
						<div class="col s7">
                            <h5><a href="">{{$v->oid}}</a></h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>订单状态</h5>
						</div>
						<div class="col s7">
							<h5><a href="">{{$v->state}}</a></h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>订单金额</h5>
						</div>
						<div class="col s7">
							<h5>{{$v->pay_money}}</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>操作</h5>
						</div>
						<div class="col s7">
							<h5><i class="fa fa-trash"></i></h5>
						</div>
					</div>
				</div>
				@endforeach
			</div>
      
			<button class="btn button-default">Process to Checkout</button>
		</div>
	</div>
	<!-- end cart -->

	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
@endsection