<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录-有点</title>
<link rel="stylesheet" type="text/css" href="{{asset('/lay/css/public.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/lay/css/page.css')}}" />
<script type="text/javascript" src="{{asset('/lay/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/lay/js/public.js')}}"></script>
</head>
<body>

	<!-- 登录页面头部 -->
	<div class="logHead">
		<img src="{{asset('/lay/img/logLOGO.png')}}" />
	</div>
	<!-- 登录页面头部结束 -->

	<!-- 登录body -->
    <form action="{{url('login_add')}}" method="post">
    @csrf
	<div class="logDiv">
		<img class="logBanner" src="{{asset('/lay/img/logBanner.png')}}" />
		<div class="logGet">
			<!-- 头部提示信息 -->			<div class="logD logDtip">
				<p class="p1">登录</p>
				<p class="p2">有点人员登录</p>
			</div>
			<!-- 输入框 -->
			<div class="lgD">
				<img class="img1" src="{{asset('/lay/img/logName.png')}}" /><input type="text"
					placeholder="输入用户名" name="name"/>
			</div>
			<div class="lgD">
				<img class="img1" src="{{asset('/lay/img/logPwd.png')}}" /><input type="password"
					placeholder="输入用户密码" name="pwd"/>
			</div>
			<!-- <div class="lgD logD2">
				<input class="getYZM" type="text" />
				<div class="logYZM">
					<img class="yzm" src="{{asset('/lay/img/logYZM.png')}}" />
				</div>
			</div> -->
			<div class="logC">
				<button>登 录</button>
			</div>
		</div>
	</div>
    </form>
	<!-- 登录body  end -->

	<!-- 登录页面底部 -->
	<div class="logFoot">
		<p class="p1">版权所有：南京设易网络科技有限公司</p>
		<p class="p2">南京设易网络科技有限公司 登记序号：苏ICP备11003578号-2</p>
	</div>
	<!-- 登录页面底部end -->
</body>
</html>