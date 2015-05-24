<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/1/21
 * Time: 22:47
 */
namespace Admin\Model;
use Think\Model;
class CollectModel extends Model{
    public function check($array=[]){
        for($i=0;$i<strlen($array);$i++){
            if(empty($array[$i])){
                return $array[$i]."不能为空";
            }
        }
    }
}
