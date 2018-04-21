<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
		
		return $this->redirect(dirname(dirname(__FILE__))'/index/index.html');
	}
}
