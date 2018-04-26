<?php

require_once 'Controller.php';

class IndexController extends Controller {

	function index(){

	    $file = dirname(dirname(__FILE__));

	    str_replace('\\','/',$file);
	    $file .= '../View/IndexView.php';

      	//$file.= 'View/index.php';
		//$file = 'View/index.html';
		//$file = 'test.php';
      	include $file;

      	$this->display();
	}

}


?>
