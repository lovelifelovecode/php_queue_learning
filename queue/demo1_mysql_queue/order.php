<?php

	if(!empty($_GET['mobile'])){
		//step1:把用户传过来的数据过滤
		//......
		
		//step2:订单中心的处理流程
		//......
		
		$order_id = time().rand(001,999);

		//把订单信息存入队列表中
		$pdo = new PDO('mysql:host=localhost;dbname=test','root','skyuse2017');
		$result = $pdo -> prepare('insert into php_queue(order_id,mobile,created_at,status)values(?,?,?,?);');
		$res = $result ->execute(array($order_id,$_GET['mobile'],date('Y-m-d H:i:s',time()),0));
	}