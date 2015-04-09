<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;

Class LoginController extends Controller{
	Public function index(){
		$this->display();
	}

	//登陆表单操作
	Public function login(){
		if (!IS_POST) $this->error('非法请求');
		if (!check_verify($_POST['verify'])){
			$this->error('验证码错误！');
		}
		$db = M('User');
		$user = $db->where(array('username' => I('username')))->find();
		if(!$user || $user['password'] != I('password')){
			$this->error('帐号或密码错误');
		}
		//更新最后一次登陆时间和IP
		$data = array(
			'id' => $user['id'],
			'logintime' => time(),
			'loginip' => get_client_ip()
			);
		$db->save($data);
		session('uid',$user['id']);
		session('username',$user['username']);
		session('logintime', date('Y-m-d H:i:s', $user['logintime']));
		session('loginip', $user['loginip']);
		redirect(__MODULE__);

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



}