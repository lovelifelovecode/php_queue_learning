<?php

	//step3:把处理完成的记录更改为已处理。（解锁）
	
	$pdo = new PDO('mysql:host=localhost;dbname=test','root','skyuse2017');

	//step1:先把要处理的记录更改为正在处理。（加锁）
	$result = $pdo->prepare('select * from php_queue where status = ? limit 2;');
	$result -> execute([0]);
    $list = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($list as $key => $value) {
    	$result = $pdo->prepare('update php_queue set status=2 where id=?');
    	var_dump($result->execute([$value['id']]));
    }

    //step2:配送系统处理主要过程
    /*
    ......
     */
    
    //step3:把处理完成的记录更改为已处理。（解锁）
    foreach($list as $key => $value) {
    	$result = $pdo->prepare('update php_queue set status=1,updated_at=? where id=?');
    	var_dump($result->execute([date('Y-m-d H:i:s'),$value['id']]));
    }