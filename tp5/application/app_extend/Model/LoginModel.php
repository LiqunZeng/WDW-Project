<?php

namespace index\Model;
use Think\Model;

class LoginModel extends Model{
	
	protected $tableName = 'users';
	
	protected $_validate = array(
	array('username', 'require', 'username cannot be empty'),
	array('password', 'require', 'password cannot be empty'),
	//array('verify', 'verify_check', '验证码错误', 0, 'function'), // 判断验证码是否正确
	);

}
