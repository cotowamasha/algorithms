<?php

Class MyStack
{
  protected $stack = [];
	protected $limit;

	public function __construct($limit = 5)
	{
		$this->limit = $limit;
	}

	//push
	public function push($element)
	{
		if (count($this->stack) < $this->limit) {
			array_unshift($this->stack, $element);
		}
		else {
			throw  new RuntimeException('Стек переполнен');
		}

	}

	//pop
	public function pop()  {
		if (!empty($this->stack)) {
			return array_shift($this->stack);
		}
		throw new RuntimeException('Стек пустой');
	}

	//top
	public function top() {
		return reset($this ->stack);
	}
}

$stack = new MyStack();

$stack->push('123');
$stack->push('asd');
$stack->push('qwe');

$stack->pop();
$stack->top();
$stack->pop();

print_r($stack);



