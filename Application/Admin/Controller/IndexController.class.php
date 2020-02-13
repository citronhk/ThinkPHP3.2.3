<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
	// index方法
    public function index()
    {
    	// 显示页面
       $this->display();
    }

    // home 方法
    public function home()
    {
    	// 显示页面
    	$this->display();
    }
}