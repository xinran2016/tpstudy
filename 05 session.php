<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2019/8/29
 * Time: 9:41
 */

//ini_set('session.save_handler','memcache');
//ini_set('session.save_path','tcp://localhost:11211');
//正常的存储session数据即可
//session_start();
//$_SESSION['username'] = 'dabao bei alter le';
//$_SESSION['age']=15;
//echo session_id();//输出一个session的id;


ini_set('session.save_handler','redis');
ini_set('session.save_path','tcp://localhost:6379?auth=alex');
////获取session数据，还是正常获取即可
session_start();

$_SESSION['username'] = 'dabao bei alter le';

//$username = $_SESSION['username'];
//echo $username;
//echo '<hr>';
//$age = $_SESSION['age'];
//echo $age;

//var_dump($_SESSION['username']);

$redis=new Redis();
$redis->connect('127.0.0.1',6379);
$redis->auth('alex');

//$redis->setTimeout('goods_store',60);

if(isset($_SESSION['isGet'])){
    echo 'success1';
}else if($c_id = $redis->lPop('goods_store')){
    $_SESSION['isGet'] = true;
    echo 'success2';
}else{
    echo 'failed';
}
var_dump(session_id());

// get PHPREDIS_SESSION:sl23os0tp7svnndpt9486uv03r

