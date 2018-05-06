<?php

class AutoLoad {
    public $c;//controller
    public $a;//action

    public function main()
    {
        $c = isset($_GET['c']) ? $_GET['c'] : "Index"; //get controller from url
        $a = isset($_GET['a']) ? $_GET['a'] : "Index"; //get action from url

        $classname = ucfirst($c)."Controller";

        $file = 'Controller/'.$classname.'.php';

        if(file_exists($file)){
            require_once $file;
        }else{
            $file = 'Controller/IndexController.php';
            require_once $file;
        }

        $controller = new $classname($classname,$a);

        if(method_exists($controller,$a)){
            $controller->$a();
        }else{
            $controller->index();
        }
    }
}

$app = new AutoLoad();
$app ->main();

?>