<?php

   $redis = new \Redis();//连接本地的 Redis 服务
   $redis->connect('127.0.0.1', 6379);
   $redis_name = 'miaosha';

//模拟100个请求
for($i=0;$i<100;$i++){
	$uid = rand(1000,9999);

   //接收用户id
   // $uid = $_GET['uid'];
   
   //设置秒杀数量
   $num = 10;

   if($redis->lLen($redis_name) < $num){
   		$redis->lPush($redis_name,$uid.'%'.microtime(true));
   		echo $uid.'秒杀 success!!!<br>';
   }else{
   	 echo '秒杀已完成<br>';
   }
}