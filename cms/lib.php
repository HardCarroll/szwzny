<?php
header("Content-type:text/html; charset:utf-8;");
date_default_timezone_set("Asia/Shanghai");

//数据库操作类
class DBOperator {
//    主机名
  public $hostname;
//    数据库用户名
  public $username;
//    数据库密码
  public $password;
//    数据库名称
  public $dbname;
//    数据库连接字符串
  public $links;
//    数据库操作的状态信息
  public $state;

//    构造函数
  function __construct($hostname, $username, $password, $dbname) {
    $this->hostname = $hostname;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;
    $this->links = mysqli_connect($hostname, $username, $password, $dbname);
    $this->state = array("err_no"=>mysqli_connect_errno(), "err_code"=>mysqli_connect_error());
  }

//    析构函数
  function __destruct() {
    $this->hostname = null;
    $this->username = null;
    $this->password = null;
    $this->dbname = null;
    $this->state = null;
    !$this->links or $this->links->close();
  }

  /**
  * 执行MYSQL操作
  * $sql: 要执行的SQL语句;
  * $return: 将执行结果返回
  */
  public function execute($sql) {
    $ret = mysqli_query($this->links, $sql);
    $this->state = array("err_no"=>mysqli_errno($this->links), "err_code"=>mysqli_error($this->links));
    return $ret;
  }
  /**
  * 执行MYSQL查询操作
  * @param $sql: 要执行的SQL语句;
  * @returen $ret: 将执行结果返回
  */
  public function exec_query($sql) {
    $result = mysqli_query($this->links, $sql);
    if($result) {
      if ($result->num_rows) {
//        查询结果行数不为0，，将值格式化到数组中返回
        $ret = array();
        while ($tmp = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//          $ret[] = $tmp;
          array_unshift($ret, $tmp);
        }
      }
      else {
//          查询结果行数为0，即没有查询到数据
        $ret = false;
      }
    }
    else {
//        查询语句有误
//        通过检查mysqli_error($this->links)的返回值判断语句是否有误
//        $ret = mysqli_error($this->links);
      $ret = false;
    }

//      更新操作后状态信息
    $this->state = array("err_no"=>mysqli_errno($this->links), "err_code"=>mysqli_error($this->links));
    return $ret;
  }

  /**
  * 执行MYSQL插入操作
  * @param $sql: 要执行的SQL语句;
  * @returen $ret: 将执行结果返回
  * INSERT INTO table(key1, key2, ..., keyN) VALUES(value1, value2, ..., valueN)
  */
  public function exec_insert($sql) {
    return $this->execute($sql);
  }
  /**
  * 执行MYSQL修改操作
  * @param $sql: 要执行的SQL语句;
  * @returen $ret: 将执行结果返回
  * UPDATE table SET key1=value1, key2=value2, ..., keyN=valueN
  */
  public function exec_update($sql) {
    return $this->execute($sql);
  }
  /**
  * 执行MYSQL删除操作
  * @param $sql: 要执行的SQL语句;
  * @returen $ret: 将执行结果返回
  * DELETE FROM table WHERE key=value
  */
  public function exec_delete($sql) {
    return $this->execute($sql);
  }
}