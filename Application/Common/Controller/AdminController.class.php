<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/24
 * Time: 0:09
 */
namespace Common\Controller;
use Think\Controller;
class AdminController extends Controller {
    /**
     * js跳转
     * @param string $url 目标URL 格式为：http://www.baidu.com或者https://www.baidu.com
     * @param string $param 参数 默认为空 格式为: param = '参数1'，两个则为:param1 = '参数1'&param2 = '参数2'
     * @return result;
     */
    public function F_jump($url,$param=''){
        if(empty($param)){
            echo '<script>window.location.href="'.$url.'"</script>';
        }else{
            echo '<script>window.location.href="'.$url.'?'.$param.'"</script>';
        }

    }
    public function data($status=1,$string=""){
        $array = [];
        if($status == 1){
            $array = [
                'status' => $status,
                'msg' => $string,
            ];
        }else{
            $array = [
                'status' => $status,
                'msg' => $string,
            ];
        }
        return json_encode($array);

    }
}