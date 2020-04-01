<?php
	// Подключаемся к redis
	$redis = new Redis();
	$redis->connect('redis', 6379);
 
	// Роутинг
	if(key($_GET) == 'fibonacci') {
		$fibFrom = is_numeric($_GET['from']) ? $_GET['from'] : false;
		$fibTo = is_numeric($_GET['to']) ? $_GET['to'] : false;
		
		require('api/Fibonacci.php');
		$fibonacci = new Fibonacci($redis);
		$fibonacci->getFibonacci($fibFrom, $fibTo);
	} else {
		// Нет роута - возвращаем тестовый UI
		require_once('ui.php');
	}
	
	$redis->close();