<<<<<<< HEAD
<?php

class View{

    public $variables = array();

    protected $controller ;

    protected $action;

    function __construct($controller,$action){
        $this->controller = $controller;
        $this->action = $action;
    }

    function assign($name,$value){

        $this->variables[$name] = $value;
    }

    function display(){

        extract($this->variables);
        $view = str_replace('Controller','',$this->controller);
        $view .= '.php';
        include $view;

    }





}

=======
<?php

class View{

    public $variables = array();

    protected $controller ;

    protected $action;

    function __construct($controller,$action){
        $this->controller = $controller;
        $this->action = $action;
    }

    function assign($name,$value){

        $this->variables[$name] = $value;
    }

    function display(){

        extract($this->variables);
        $view = str_replace('Controller','',$this->controller);
        $view .= '.php';
        include $view;

    }





}

>>>>>>> c010ba7d4f045e61e385cf35aed1ba67d6082e3f
?>