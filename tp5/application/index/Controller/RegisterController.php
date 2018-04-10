<?php
namespace index\Controller;
use Think\Controller;
class RegisterController extends Controller {
    //显示注册页面
    public function reg(){
        $this->display();
    }

    //检查用户是否注册过
    public function checkName(){
        $username=$_GET['username'];
        $user=M('User');
        $where['username']=$username;
        $count=$user->where($where)->count();
        if($count){
            echo '不允许';
        }else{
            echo '允许';
        }
    }
    //注册
    public function doReg(){
    
        $user=D('User');
        if(!$user->create()){
            $this->error($user->getError());
        }
    
        $lastId=$user->add();
        if($lastId){
            $this->redirect('Index/index');
        }else{
            $this->error('用户注册失败');
        }

    }
}
?>
复制代码
建立了PublicController.class.php控制器，设置验证码的属性。代码如下：

复制代码
<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function code(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 16;  
         $Verify->length   = 4;
        $Verify->imageW = 130;  
         $Verify->imageH = 30;
        $Verify->entry();
}
}
?>
