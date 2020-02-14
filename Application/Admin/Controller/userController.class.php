<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{

	public function index()
	{
		$data = M('User')->select();

		$this->assign('data',$data);
		$this->display();
	}
	public function add()
	{
		// 添加数据
		if(IS_POST){

			$model = M('User');
			$data = $model->create();


			$data['createtime'] = time();
		
			$result = $model->add($data);

			if($result){

				$this->success('添加成功',U('index'),3);
			}else{
				$this->error('添加失败');
			}
		}else{

			$data = M('dept')->select();
			$this->assign('data',$data);
			$this->display();
		}
	}
}