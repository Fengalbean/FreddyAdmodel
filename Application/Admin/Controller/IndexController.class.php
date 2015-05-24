<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display('Public/login');
    }
    public function dealLogin(){
        if(!IS_POST)  $this->error('非法操作');
        $data['username'] = I('post.username','','htmlspecialchars');
        $data['passwords'] = md5(I('post.passwords','','htmlspecialchars'));
        $model = M('user');
        $result = $model->field('id')->where($data)->count();
        dump($result);
        if($result > 0){
            $this->success('登录成功', 'manage');
        }else{
            $this->error('操作失败');
        }
    }
    public function manage(){
        $this->display('Public/base');

    }


}