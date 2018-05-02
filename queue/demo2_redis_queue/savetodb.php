<?php

   $redis = new \Redis();//连接本地的 Redis 服务
   $redis->connect('127.0.0.1', 6379);
   $redis_name = 'miaosha';

	$pdo = new PDO('mysql:host=localhost;dbname=test','root','skyuse2017');

	//死循环
	while(1){
		$user = $redis->rPop($redis_name);

		//如果值不存在或者为空的时候
		if(!$user || $user=='nil'){
			sleep(2);
			continue;
		}

		//save to database
		$arr = explode('%', $user);
		$result = $pdo->prepare('insert into redis_queue(uid,time_stamp)values(?,?);');
		$res = $result->execute($arr);

		//插入数据库失败的回滚机制
		if(!$res){
			$redis->lPush($redis_name,$user);
		}
		
		//方便测试查看
		sleep(2);
	}