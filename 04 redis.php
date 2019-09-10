<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2019/6/21
 * Time: 22:18
 */

//$re  = new Redis();
//$re->connect('192.168.38.8', 6379);
//
//$re->auth('alex');
//
//var_dump($re->get('name'));
//
//$re->hmset('hash1',array('id'=>100,'name'=>'xiaohei','age'=>12));
////var_dump($re->hGetAll('hash1'));
//$re->setTimeout('myage', 50);


$store=1000;
$redis=new Redis();
$result=$redis->connect('192.168.38.8',6379);
$redis->auth('alex');
//$goods_number = 100;
//for($i=0;$i<$goods_number;$i++){
//    $redis->lpush('goods_store',1);
//}
echo $redis->llen('goods_store');

var_dump($redis->lRange('goods_store', 0, -1));
