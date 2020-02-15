<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller{

	// 显示列表
	public function index()
	{
		$model = M('User');
		$count = $model->count();			// 总记录数
		$page  =new \Think\Page($count,1);		// 总记录数，分页数据

		// 配置分页样式
		$page -> rollPage = 5;
		$page -> lastSuffix = false;
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$page -> setConfig('last','最后一页');
		$page -> setConfig('first','首页');

		// 生成分页url
		$show = $page -> show();	

		// 生成分页数据
		$data = $model -> limit($page -> firstRow,$page -> listRows) -> select();

		$this->assign('show',$show);
		$this->assign('data',$data);
		$this->display();
	}

	// 添加功能
	public function add()
	{
		// 添加数据
		if(IS_POST){

			$model = M('User');
			$data = $model->create();
			// 添加时间
			$data['createtime'] = time();
		
			$result = $model->add($data);

			if($result){

				$this->success('添加成功',U('index'),3);
			}else{
				$this->error('添加失败');
			}
		}else{
			// 显示添加表单
			$data = M('dept')->select();
			$this->assign('data',$data);
			$this->display();
		}
	}
}