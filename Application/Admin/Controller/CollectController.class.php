<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/23
 * Time: 23:59
 */

namespace Admin\Controller;
use Common\Controller;

class CollectController extends Controller\AdminController  {
    public function getList(){
        header('content-type:text/html;charset=utf-8');
        $micro = M('collect');
        $list = $micro->select();
        $this->assign('getList',$list);
//        $this->F_jump('http://www.baidu.com');
        $this->display('getList');
    }
    /**
     * 消费列表
     */
    public function add(){
        header('content-type:text/html;charset=utf-8');
        if(IS_POST){

            $data['name'] = I('post.name','',htmlspecialchars);
            $data['type'] = I('post.type','',htmlspecialchars);
            $data['keywords'] = I('post.keywords','',htmlspecialchars);
            $data['url'] = I('post.url','',htmlspecialchars);
            $data['note'] = I('post.note','',htmlspecialchars);
            $data['date'] = time();
            $collect = M('Collect');
//            $result = $model->create($data);
//            if($result){
//                $this->success('添加成功','getList',1);
//            }else{
//                $this->error('添加失败！');
//            }
            dump($collect);
            if (!$collect->create($data)){ // 登录验证数据
                // 验证没有通过 输出错误提示信息
                exit($collect->getError());
            }else{
                // 验证通过 执行登录操作
                $re = $collect->add();
                if($re){
                    echo '成功！';
                }else{
                    echo '失败！';
                }


            }

//            $btype = M('bill_type');
//            $where['name'] = $type;
//            $count = $btype->field('t_id')->where($where)->count();
//            if($count>0){
//                $data['type'] = $btype->field('t_id')->where($where)->find();
//            }
//            $data['instruction'] = I('post.instruction','',htmlspecialchars);
//            $data['money'] = I('post.money','',htmlspecialchars);
//            $data['date'] = I('post.consumetime','',htmlspecialchars);
//            $data['city'] = I('post.consumecity','',htmlspecialchars);
//            $bill = M('bill');
//            $result = $bill->data($data)->add();
//            if($result){
//                $this->success('添加成功','index',1);
//            }else{
//                $this->error('添加失败！');
//            }
//        }else{
//            $this->error('非法操作！');
        }
    }
}