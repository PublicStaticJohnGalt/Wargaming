<?php

class Fibonacci 
{
	private $redis;
	
	function __construct($redis = null) {
		$this->redis = $redis;
	}
	
	function getFibonacci($fibFrom, $fibTo) {
		if($fibFrom && $fibTo) {
			// Получение ряда Фибоначчи из кэша Redis или вычисление нового
			if(!is_null($this->redis)) {
				$fibArray = json_decode($this->redis->get($fibTo)) ?? $this->getFibArray($fibTo);
				$this->redis->set($fibTo, json_encode($fibArray)); // Сохранение результата в кэш
			} else {
				$fibArray = $this->getFibArray($fibTo);
			}
			
			// Срез
			$slicedFibArray = array_slice($fibArray, $fibFrom);
			
			$result = array();
			$result['status'] = 'success';
			$result['fib'] = $slicedFibArray;
			echo json_encode($result);
		} else {
			$result = array();
			$result['status'] = 'error';
			$result['message'] = 'Invalid args';
			echo json_encode($result);
		}
		
		return $result;
	}
	
	// Вычисление ряда Фибоначчи
	function getFibArray($n) {	
		$fib = array(0,1);
		
		for($i = 1; $i < $n; $i++) {
			$fib[] = array_sum(array_slice($fib, -2));
		}

		return $fib;
	}
}
	
	


