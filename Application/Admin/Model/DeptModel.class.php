<?php
namespace Admin\Model;
use Think\Model;
class DeptModel extends Model{

	// 开启批量验证
	protected $patchValidate = true;

	// 字段映射
	protected $_map = array(
			// 表单name => 数据表字段
			'abc' => 'name'
		);

	// 自定认验证属性
	// protected $_validate  = array(

	// 		// 针对部门名称
	// 		array('name','require','部门名称不能为空'),
	// 		array('name','','部门名称已经在',0,'unique'),
	// 		// 排序字段的验证
	// 		// array('sort','number','排序必须是数字'),
	// 		// 使用函数的方式来验证排序是数字
	// 		array('sort','is_numberic','排序必须是数字',0,'function'),

	// 	);


}