<?php

class Model extends Sql {

    protected $table;

    function __construct($table){
        $this->table = $table;

    }

}
?>