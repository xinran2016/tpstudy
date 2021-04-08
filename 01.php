<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2019/6/21
 * Time: 22:18
 */

//演示3种常见的错误：
//$dir = './App';
//$dir_handle = opendir($dir);
//
//while ($file = readdir($dir_handle)){
//    echo $file. '<br/>';
//}

//phpinfo();die;
$mem  = new Memcache();//实例化一个类，创建一个对象

$mem->connect('localhost',11211);//连接memcache服务器

//var_dump($mem);die;
//添加一个username的键，值是libai,不压缩，缓存周期时120秒
$mem->add('username','libai',0,120);
//$mem->set('username', ['name'=>'xiongda','age'=>12, 'sex'=>1], 0, 1200);

var_dump($mem->get('username'));

//$mem->add('age','12',0,120);
//获取存储的值
//$username = $mem->get('username');
//var_dump($username);
//echo '<hr>';
//$age = $mem->get('age');
//echo $age;

//非标量数据，存储到memcache里面；
//对象类型
class Dog{

}

//数组类型
//$mem->set('array',['name'=>'xiongda','age'=>12],1,1200);

//$dog = new Dog();
//$dog->name = 'saihu';
//$dog->age = 2;
//$mem->set('object',$dog,0,1200);
////资源类型
//$resource = fopen('./01.php','r');
//$mem->set('resource',$resource,0,1200);
////null类型
//$mem->set('null',null,0,1200);

//获取非标量类型的数据
//$array = $mem->get('array');
//var_dump($array);
//echo '<hr>';
//$object = $mem->get('object');
//var_dump($object);
//echo '<hr>';
//$resource = $mem->get('resource');
//var_dump($resource);
//echo '<hr>';
//$null = $mem->get('null');
//var_dump($null);

echo '<hr>';
echo 'ok';

//$res = $mem->getStats();
//echo '<pre>';
//print_r($res);

// add a test.

