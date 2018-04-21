<?php


namespace index\Model;
use Think\Model;

class RegisterModel extends Model{
	protected $_validate = array(
	
		array('username', 'require', 'username cannot be empty'),
		array('username', ' this username already exists.', 0, 'unique', 1),//检验username是否存在
		array('repasswrod', 'password', 'password does not same.', 0, 'confirm'),//检验确认密码
		
	
	)
}