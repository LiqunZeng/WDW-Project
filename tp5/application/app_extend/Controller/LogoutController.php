
<?php
namespace index\Controller;
use Think\Controller;

class LogoutController extends Controller{

	public function index(){
	
	    $this->display();
	
	}
	
	public function logout(){
		session(null);
		redirect(U('Login/login'), 2, 'logout');
	}

}

>?