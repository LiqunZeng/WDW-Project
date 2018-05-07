<?php

require_once "Controller.php";
require_once "application/Model/BlogModel.php";

class BlogController extends Controller {


    public function showblog(){
        $blogmodel = new BlogModel();
        $value = $blogmodel->selectAll("test");


        $this->assign("value",$value);
    }

    public function blog(){
        $this->showblog();
        $this->display();
    }

}
?>