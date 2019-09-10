<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2019/9/1
 * Time: 17:49
 */

//namespace php;
require_once '05.php';
//use itbull\php\web;
//class Beauty
//{
//    public function __construct()
//    {
//        echo '1.php';
//    }
//}

//function showCaptcha()
//{
//    echo '1.php';
//}
//在php5.3之后，既可以在类里面定义常量，也可以在类外面定义常量
//const 在php脚本编译阶段就会定义好常量保存到静态数据区，而define是在代码执行阶段才定义的
//const ROOT = '1.php';

//function var_dump($var)
//{
//    echo $var;
//}

//使用全局空间的var_dump()
//\var_dump('hello');

//echo web\PI;

define('ROOT', 3.14);

echo ROOT;