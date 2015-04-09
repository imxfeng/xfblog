<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>管理登陆</title>
	<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/css/signin.css">
<style>
	.verifyimg{
		height: 50px;
	}
</style>
</head>
<body>
	<div class="container">

	<form class="form-signin">
		<div class="rorm-group">
			<img src="/Public/image/imxfeng.jpg" class="img-responsive img-circle center-block" alt="">
			<!-- <label for="username">用户名</label> -->
			<input type="text" class="form-control" placeholder="用户名">
			<input type="password" class="form-control" placeholder="密码">
			<input type="text" class="form-control" placeholder="验证码">
			<img src="<?php echo U('Verify');?>" class="verifyimg reloadverify" alt="">
			<div class="checkbox">
			<label>
				<input type="checkbox" value="remember-me">记住密码
			</label>
			</div>			
		</div>

		
		<button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
	</form>
	</div>

	<script src="/Public/js/jquery-2.1.3.min.js"></script>
	<script src="/Public/js/bootstrap.min.js"></script>

<script>

	$(function(){
		//初始化选中用户名输入框
		$("#login").find("input[name=username]").focus();
		//刷新验证码
		var verifyimg = $(".verifyimg").attr("src");
		$(".reloadverify").click(function(){
			if( verifyimg.indexOf('?')>0){
				$(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
			}else{
				$(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
			}
		});
	});
</script>

</body>
</html>