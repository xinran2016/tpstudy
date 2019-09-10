<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2019/9/1
 * Time: 17:49
 */

//namespace itbull\php\web;
class Beauty
{
    public function __construct()
    {
        echo '2.php<br>';
    }
}

function showCaptcha()
{
    echo 'showCaptcha<br>';
}

//const ROOT = 'ROOT:2.php';

define('ROOT', 3.14);


// 正则

//$reg = '/./';
////2. 运来一车沙子
//$str = "\r!hellowrold";
////3. 开始筛选
//preg_match_all($reg,$str,$match);
//echo '<pre>';
//var_dump($match);


// mysqli

//1. 实例化mysqli对象，打开数据库连接
$mysqli = new mysqli('localhost','root','1234','test',3306);

if($mysqli -> connect_error){
    echo '连接失败,详细信息如下<br>:'.$mysqli -> connect_error;
    die;
}
$mysqli -> set_charset('utf8');

//拼接sql语句,返回一个结果集
$sql = "DELETE FROM `user` WHERE id = ?";

//$result = $mysqli -> query($sql);
$pre_obj = $mysqli -> prepare($sql);

$id = "6 || 1=1";
$pre_obj -> bind_param('i',$id);

$result = $pre_obj -> execute();

var_dump($pre_obj->affected_rows);
//if($result){
//    echo '执行成功';
//}else{
//    echo '执行失败';
//}