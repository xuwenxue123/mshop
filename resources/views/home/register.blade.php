@extends('layout.home')

@section('title', '前台')

@section('content')
<!-- register -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>REGISTER</h3>
			</div>
			<div class="register">
				<div class="row">
					<form class="col s12" method="post" action="{{url('do_register')}}">
                      @csrf
						<div class="input-field">
							<input type="text" class="validate" placeholder="NAME" name="name"required>
						</div>
						<div class="input-field">
							<input type="password" placeholder="PASSWORD" class="validate" name="pwd"required>
						</div>
						<button class="btn button-default">REGISTER</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- end register -->
@endsection
	


	
