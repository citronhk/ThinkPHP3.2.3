<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller{

	// 后台登录
	public function login()
	{
		$this->display();
	}

	// 验证码
	public function captcha()
	{
		// 配置文件
		$config = array(
			'fontSize'  =>  12,              // 验证码字体大小(px)
	        'useCurve'  =>  false,            // 是否画混淆曲线
	        'useNoise'  =>  false,            // 是否添加杂点	
	        'imageH'    =>  39,               // 验证码图片高度
	        'imageW'    =>  80,               // 验证码图片宽度
	        'length'    =>  4,               // 验证码位数
        	'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取

		);

		// 实例化
		$verify = new \Think\Verify($config);

		// 输出
		$verify->entry();
	}

	public function checkLogin()
	{
		$post	= I('post.');

		// 校验验证码
		$verify = new \Think\Verify();

		$result = $verify->check($post['captcha']);

		// 信息比对 
		if($result){

			// 删除验证码
			unset($post['captcha']);

			$model = M('User');

			// 查询一个
			$data = $model-> where($data)-> find();

			if($data){

				session('id',$data['id']);
				session('username',$data['username']);
				session('role_id',$data['role_id']);

				$this->success('登录成功',U('Index/index'),3);
			}else{
				$this->error('用户或密错误	');
			}

		}else{
			$this->error('验证码不正确');
		}

	}

	// 退出登录
	public function logout()
	{
		// 清除session
		session(null);
		$this->success('退出成功',U('login'),3);
	}
}