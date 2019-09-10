<?php
/**
 * 重写session的存储机制
 * 默认session数据存储到session文件，我们将其修改为存储到数据库
 */
class MySessionHandler implements SessionHandlerInterface
{
    private $mysqli;

    //1. 以前打开的是文件，现在打开数据库连接，因为我们要将数据写入到数据库
    public function open($save_path, $session_name)
    {
        // TODO: Implement open() method.
        $this -> mysqli = new mysqli('localhost','root','1234','test',3306);
        $this -> mysqli -> set_charset('utf8');
        return true;
    }
    //2. 关闭链接时
    public function close()
    {
        // TODO: Implement close() method.
        return true;
    }

    //3. 当你读取session数据时处理，var_dump($_SESSION)
    //当你读取session数据的时候，自动把浏览器传递的PHPSESSID自动传递到该函数中
    public function read($session_id)
    {
        // TODO: Implement read() method.
        $sql = "SELECT * FROM tn_session WHERE sess_id = '$session_id'";
        $result = $this -> mysqli -> query($sql);
        if($res = $result -> fetch_assoc()){
            return $res['sess_content'];
        }else{
            return '';
        }

    }
    //4. 当我们执行session_destroy的时候，以前是根据浏览器背着的钥匙（PHPSESSID）找到session文件删除
    //现在存储到数据库了，再次执行destroy的时候，就会根据$session_id删除数据库的记录
    public function destroy($session_id)
    {
        // TODO: Implement destroy() method.
        $sql = "DELETE FROM tn_session WHERE sess_id='$session_id'";
        return $this -> mysqli -> query($sql);
    }
    //5. 以前当session文件过期的时候，触发垃圾回收，过期之后，删除数据表记录
    //$maxlifetime，读取的php.ini配置文件的最长的生命周期,默认是1440秒，假设现在设置为5秒
    public function gc($maxlifetime)
    {
        // TODO: Implement gc() method.
        //   25 26 27 28 29  30  31  32 33 34 35
        $sql = "DELETE FROM tn_session WHERE time < ".time()." - $maxlifetime";
        return $this -> mysqli -> query($sql);
    }
    //6. 当我们执行$_SESSION['name'] = 张三,会把数据存储到数据库
    public function write($session_id, $session_data)
    {
        // TODO: Implement write() method.
        $sql = "INSERT INTO tn_session VALUES('$session_id','$session_data',".time().")";
        //$sql = "INSERT INTO tn_session VALUES('$session_id','$session_data',$time)";
        //$sql = "UPDATE tn_session SET sess_content='$session_data',time=".time()." WHERE sess_id='$session_id'";
        return $this -> mysqli -> query($sql);
    }
}
$handler = new MySessionHandler();
session_set_save_handler($handler,true);

session_start();
$_SESSION['name'] = '阿狗';

sleep(28);