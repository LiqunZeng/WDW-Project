<<<<<<< HEAD
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
=======
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
>>>>>>> c010ba7d4f045e61e385cf35aed1ba67d6082e3f
?>