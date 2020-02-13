<?php
namespace Admin\Controller;
use Think\Controller;
class DeptController extends Controller{

	public function show(){

		$model = M('Dept');

		// 查询数据
		$data = $model-> order('sort asc')-> select();
		// 获取顶级部门
		foreach ($data as $key => $value) {
			
			if( $value['pid'] > 0){
				// 查找上级部门
				$info = $model->find($value['pid']);

				$data[$key]['deptname'] = $info['name'];
			}
		}

		$this->assign('data',$data);
		$this->display();
	}

	public function add(){
		// 提交表单
		if(IS_POST){

			// $post = I('post.');
			// $post['createtime'] = time();

			$model = D('Dept');

			$data = $model->create();	// 不传递参数，则默认使用post数据

			// 不符合规则
			if(!$data){

				$this->error($model->getError());
				exit;
			}

			$data['createtime'] = time();
				
			// print_r($data);
			// exit;

			$result = $model->add($data);

			if($result){
				
				$this->success('添加成功',U('show'));

			}else{

				$this->error('添加失败');
			}
		}else{

			$model = M('Dept');
			$data = $model->where('pid = 0')->select();

			$this->assign('data',$data);
			$this->display();
		}
	}
}