<?php
/**
 * Created by PhpStorm.
 * User: zengl
 * Date: 6/04/2018
 * Time: 2:43 PM
 */

namespace mainphp;

//根目录
define('CORE_PATH') or define('CORE_PATH', __DIR__);

/**
 *核心
 */

class mainphp{

    //配置
    protected $config = [];

    public function _construct($config){
        $this->config = $config;
    }

    //运行程序
    public function run(){
        spl_autoload_register(array($this, 'loadClass'));
        $this->setReporting();
        $this->removeMagicQuotes();
        $this->unregisterGlobals();
        $this->setDbConfig();
        $this->route();
    }

}