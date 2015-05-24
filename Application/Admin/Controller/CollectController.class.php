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
        $id = I('request.search','','htmlspecialchars');
        $key = I('request.key');
        $where = array();
        if(!empty($key)){
            if($id==1){
                $where['t.typename'] = array('like',"%$key%");
            }
            if($id==2){
                $where['c.name'] = array('like',"%$key%");
            }
        }
        $type = M('collect_type');
        $t = $type->select();
        $this->assign('type',$t);// 赋值分页输出
        $collect = M('collect');
        // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $list = $collect->alias('c')->join('left join freddy_collect_type t on c.t_id = t.id')->field('c.id,t.typename,c.name,c.keywords,c.date,c.url')->where($where)->order('c.date')->page($_GET['p'].',10')->select();
        $this->assign('getList',$list);// 赋值数据集
        $count = $collect->alias('c')->join('left join freddy_collect_type t on c.t_id = t.id')->where($where)->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板


    }
    /**
     * 消费列表
     */
    public function add(){
        header('content-type:text/html;charset=utf-8');
        if(IS_POST){
            $data['name'] = I('post.name','',htmlspecialchars);
            $data['keywords'] = I('post.keywords','',htmlspecialchars);
            $data['url'] = I('post.url','',htmlspecialchars);
            $data['note'] = I('post.note','',htmlspecialchars);
            $data['date'] = time();
            $data['t_id'] = I('post.type','',htmlspecialchars);
            $collect = M('Collect');
            if($collect->data($data)->add()){
                $this->ajaxReturn($this->data(1,'添加成功！'));
            }else{
                $this->ajaxReturn($this->data(-1,'添加失败！'));
            }

        }
    }
    public function del(){
        if(!empty($_REQUEST)){
            $id = I('post.id','',htmlspecialchars);
            $collect = M('collect');
            $where['id']=$id;
            $result = $collect->where($where)->delete();
            if($result){
                $this->ajaxReturn($this->data(1,'删除成功！'));
            }else{
                $this->ajaxReturn($this->data(1,'删除失败！'));
            }
        }
    }
}

?>