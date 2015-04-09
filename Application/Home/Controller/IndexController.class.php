<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {
    public function index(){
    	echo "这是Home模块下index控制器index方法";
    }
 

    public function model(){
    	$admin = new Model('Admin');
    	var_dump($admin->select());
    }


}