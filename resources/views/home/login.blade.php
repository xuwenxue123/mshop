@extends('layout.home')

@section('title', '前台')

@section('content')	
	<!-- login -->
	<div class="pages section">
		<div class="container">
			<div class="pages-head">
				<h3>LOGIN</h3>
			</div>
			<div class="login">
				<div class="row">
					<form class="col s12" method="post" action="{{url('do_login')}}">
                    @csrf
						<div class="input-field">
							<input type="text" class="validate" placeholder="USERNAME" name="name"required>
						</div>
						<div class="input-field">
							<input type="password" class="validate" placeholder="PASSWORD" name="pwd" required>
						</div>
						<a href=""><h6>Forgot Password ?</h6></a>
						<button href="" class="btn button-default">LOGIN</button>
                        
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end login -->
@endsection