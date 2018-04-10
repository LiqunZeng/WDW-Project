
<?php
namespace index\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }

    public function top(){
        $this->display();
    }

    public function left(){
        $message=D('Message');
        $count=$message->count();//获取数据的总数
        $Page = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(3)
        $show = $Page->show();// 分页显示输出
        $arr=$message->relation(true)->order('time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$arr);
        $this->assign('show',$show);
        $this->display();
    }

    public function right(){
        $this->display();
    }
}
?>