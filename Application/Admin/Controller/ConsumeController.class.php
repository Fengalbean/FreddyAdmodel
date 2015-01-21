<?php
namespace Admin\Controller;
use Think\Controller;
class ConsumeController extends Controller {
    /**
     * 消费列表
     */
    public function index(){
        $bill = M('bill');
        $id = I('request.search','','htmlspecialchars');
        dump($id);
        $key = I('request.key');
        $where = array();
        if(!empty($key)){
            if($id==1){
                $where['t.name'] = array('like',"%$key%");
            }
            if($id==2){
                $where['b.instruction'] = array('like',"%$key%");
            }
        }
        $list = $bill->alias('b')->join('left join albean_bill_type t on b.type = t.t_id')->field('b.id,t.name,b.instruction,b.money,b.date,b.city')->order('date desc')->where($where)->select();
        dump($bill->getLastSql());
        $this->assign('list',$list);
        $count = $bill->field('id')->count();
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    /**
     * 消费列表
     */
    public function add(){
        if(IS_POST){
            $type = I('post.consumetype','',htmlspecialchars);
            $btype = M('bill_type');
            $where['name'] = $type;
            $count = $btype->field('t_id')->where($where)->count();
            if($count>0){
                $data['type'] = $btype->field('t_id')->where($where)->find();
            }
            $data['instruction'] = I('post.instruction','',htmlspecialchars);
            $data['money'] = I('post.money','',htmlspecialchars);
            $data['date'] = I('post.consumetime','',htmlspecialchars);
            $data['city'] = I('post.consumecity','',htmlspecialchars);
            $bill = M('bill');
            $result = $bill->data($data)->add();
            if($result){
                $this->success('添加成功','index',1);
            }else{
                $this->error('添加失败！');
            }
        }else{
            $this->error('非法操作！');
        }
    }
    /**
     * 编辑页面
     */
    public function edit(){

    }
    /**
     * 删除操作
     */
    public function del(){
        if(!empty($_REQUEST)){
            $id = I('get.id','',htmlspecialchars);
            $bill = M('bill');
            $where['id']=$id;
            $result = $bill->where($where)->delete();
            if($result){
                $this->success('删除成功');
            }else{
                $this->error('删除失败！');
            }
        }
    }

}