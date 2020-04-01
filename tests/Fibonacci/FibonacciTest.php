<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require '././app/api/Fibonacci.php';

final class FibonacciTest extends TestCase
{
    private $fibonacci;
	
	protected function setUp() : void {
		$this->fibonacci = new Fibonacci();
	}
	
	public function testGetFibonacci() {
		$this->setOutputCallback(function() {});
		
		$result = $this->fibonacci->getFibonacci(1, 15);
		$this->assertEquals($result['status'], 'success');
		$this->assertEquals($result['fib'][14], 610);
		
		$result = $this->fibonacci->getFibonacci(3, 5);
		$this->assertEquals($result['status'], 'success');
		$this->assertEquals($result['fib'][2], 5);
		
		$result = $this->fibonacci->getFibonacci(0, 1);
		$this->assertEquals($result['status'], 'error');
	}
	
	public function testFibArray() {
		$fibArray = $this->fibonacci->getFibArray(20);
		$this->assertEquals($fibArray[10], 55);
	}
}
