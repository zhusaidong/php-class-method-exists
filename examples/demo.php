<?php
/**
* demo
* @author zhusaidong [zhusaidong@gmail.com]
*/
require('../vendor/autoload.php');

//demo class
class foo
{
	public function public_fun(){}
	private function private_fun(){}
}

//test foo1::public_fun
if(!ClassMethodExists::class_method_exists('foo1','public_fun'))
{
	var_dump("foo1::public_fun",ClassMethodExists::errmsg());
}

//test foo::private_fun
if(!ClassMethodExists::class_method_exists('foo','private_fun'))
{
	var_dump("foo::private_fun",ClassMethodExists::errmsg());
}

//test foo::public_fun
if(!ClassMethodExists::class_method_exists('foo','public_fun'))
{
	var_dump("foo::public_fun",ClassMethodExists::errmsg());
}
