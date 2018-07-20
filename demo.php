<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set("PRC");

include_once 'Db.class.php';

// +----------------------------------------------------------------------
// | [1] 插入数据：insert,insertAll
// +----------------------------------------------------------------------

// //方式1
// $insertId = Db::insert( "insert into jdp_user(`username`,`phone`) values('zhangsan','10086')" );

// //方式2,预处理
// $insertId = Db::insert("insert into jdp_user(`username`,`phone`) values(?,?)", ['zhangsan','10086']);

// //方式3
// $data = array(
//     "username" => "zhangsan",
//     "phone" => "10086",
// );

// $insertId = Db::table('user')->insert($data);

// //插入多条数据

// $datas = array(
//     array('username'=>'zhangsan','phone'=>'10086'),
//     array('username'=>'lisi','phone'=>'10087')
// );

// $rowscount = Db::table('user')->insertAll($datas);

// +----------------------------------------------------------------------
// | [2] 更新数据：update
// +----------------------------------------------------------------------

// //方式1
// $res = Db::update("update jdp_user set `username`='aaa',`phone`='1001' where id=1");

// //方式2
// $res = Db::update("update jdp_user set `username`=?,`phone`=? where id=?", ['bbb', '1002', 2]);

// //方式3
// $up = array(
//     "username" => "ccc",
//     "phone" => "1003",
// );

// $res = Db::table('user')->where("id = ?", [3])->update($up);

// +----------------------------------------------------------------------
// | [3] 删除数据：delete
// +----------------------------------------------------------------------

// //删除数据1
// $res = Db::delete("delete from jdp_user where `id`=1 ");

// //删除数据2
// $res = Db::delete("delete from jdp_user where `username`=? and `phone`=? ",['bbb','1002']);

// //删除数据3
// $res = Db::table('user')->where("id = ? ", [3])->delete();

// +----------------------------------------------------------------------
// | [4] 查询数据：select,find
// +----------------------------------------------------------------------

// //查找1
// $rows = Db::select("select * from jdp_user where id>5 ");

// //查找2
// $rows = Db::select("select id,username,phone from jdp_user where id>?",[5]);

// //查找3

// $rows = Db::table('user')->fields('username,count(username) as count')->where("id >= ? ",[5])->groupBy('username')->having('count(username) >= ?',[1])->orderBy('username desc')->limit('0,1')->select();

// //查找4,只要一条
// $row = Db::table('user')->where("username = ? and phone = ? ",['zhangsan','10086'])->find();

// +----------------------------------------------------------------------
// | [5] 自增：increment 默认增量为1
// +----------------------------------------------------------------------

// //单字段
// $res = Db::table('user')->where('id=?', [5])->increment(['money']);
// $res = Db::table('user')->where('id=?', [5])->increment(['money'], [2]);
// //多字段
// $res = Db::table('user')->where('id=?', [5])->increment(['money', 'score'], [2, 5]);

// +----------------------------------------------------------------------
// | [6] 自减：decrement 默认减量为1
// +----------------------------------------------------------------------

// //单字段
// $res = Db::table('user')->where('id=?', [5])->decrement(['money']);
// $res = Db::table('user')->where('id=?', [5])->decrement(['money'], [2]);
// //多字段
// $res = Db::table('user')->where('id=?', [5])->decrement(['money', 'score'], [2, 5]);

// +----------------------------------------------------------------------
// | [7] 事务，beginTransaction,rollback,commit
// +----------------------------------------------------------------------

// //开启事务
// Db::beginTransaction();
// $lastid = Db::table('user')->insert($data);

// $lastid2 = Db::table('user_info')->insert($data_info);

// if ($lastid && $lastid2) {
//     Db::commit();//提交

// } else {
//     Db::rollback();//回滚
// }

// +----------------------------------------------------------------------
// | [8] getQueryLog, 当前执行的sql语句
// +----------------------------------------------------------------------

//$sql_log = Db::getQueryLog();

// +----------------------------------------------------------------------
// | [9] query,exec, 原生操作
// +----------------------------------------------------------------------

//$sql_query = 'select * from jdp_user where id>5 '
//$st = Db::query($sql_query);

// $sql_insert = "insert into jdp_user(`username`,`phone`) values('zhangsan','10086')";
// $rwocount = Db::exec($sql_insert);

// +----------------------------------------------------------------------
// | [10] 连接另外一个数据库
// +----------------------------------------------------------------------

// $dbConfig = array(
//     'type' => 'mysql', //数据库类型
//     'host' => 'localhost', //数据库连接地址
//     'user' => 'root', //数据库用户名
//     'password' => '', //数据库密码
//     'dbname' => 'test2', //数据库名称
//     'prefix' => 'jdp_', //数据库表前缀
//     'charset' => 'utf8',

// );

// $db_obj = Db::connect($dbConfig);
