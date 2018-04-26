<?php

class View{

    protected $variables = array();

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

        $view = str_replace('Controller','View',$this->controller);
        $view .= '.php';
        require_once $view;


    }





}

?>