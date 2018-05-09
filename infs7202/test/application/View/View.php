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

?>