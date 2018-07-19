<?php

    error_reporting(E_ERROR | E_WARNING | E_PARSE );
    header("Content-type: text/html; charset=utf-8");
    date_default_timezone_set("PRC"); 

	include_once 'Db.class.php';
	
	
	//1,insert
	//****************************************************************************************	
	
	//方式1
	$res = Db::insert( "insert into jdp_user(`username`,`nickname`) values('zhangsan','高手的名字都很短')" ); 
	
	//方式2,预处理
	$res = Db::insert("insert into jdp_user(`username`,`nickname`) values(?,?)", ['tt', '高手的名字都很短']); 
	
	//方式3	
	$data = array(
		"username" => "ttt",
		"nickname" => "TTT",
	);		
	
	$res = Db::table('user')->insert($data);
	
	
	
	//2,update
	//****************************************************************************************	
	
	//方式1
	$res = Db::update("update jdp_user set `user2name`='aaa',`nickname`='AAA' where id=1");

	//方式2
	$res = Db::update("update jdp_user set `username`=?,`nickname`=? where id=?", ['bbb', 'BBB', 2]);

	//方式3
	$up = array(
		"username" => "nnn",
		"nickname" => "NNN",
	);

	$res = Db::table('user')->where("id >= ? and nickname = ? ", [5, 'TTT'])->update($up);

	//****************************************************************************************		
	
	
	
	
	
	
	$dbConfig = array(
		'type'     => 'mysql', //数据库类型
		'host'     => 'localhost', //数据库连接地址
		'user'     => 'root', //数据库用户名
		'password' => '', //数据库密码
		'dbname'   => 'test', //数据库名称
		'prefix'   => 'jdp_', //数据库表前缀
		'charset'  => 'utf8',
	
	);
	
	
	
	