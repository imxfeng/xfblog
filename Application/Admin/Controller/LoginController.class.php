<?php
namespace Admin\Controller;
use Think\Controller;

Class LoginController extends Controller{
	Public function index(){
		$this->display();
	}

	//登陆表单操作
	Public function login(){

	}

	//验证码
	Public function Verify(){
		$config =    array(
	    'fontSize'    =>    20,    // 验证码字体大小
	    'length'      =>    4,     // 验证码位数
	   // 'useNoise'    =>    false, // 关闭验证码杂点
	);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}

	// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
	function check_verify($code, $id = ''){
    	$verify = new \Think\Verify();
    	return $verify->check($code, $id);
	}

}