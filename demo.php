<?php
/**
* demo
* @author zhusaidong [zhusaidong@gmail.com]
*/
require('src/ClassMethodExists.php');

class foo
{
	public function public_fun(){}
	private function private_fun(){}
}

$boolean = ClassMethodExists::class_method_exists('foo1','public_fun');
$errno = ClassMethodExists::errno();
$errmsg = ClassMethodExists::errmsg();
var_dump("\$boolean=".var_export($boolean,TRUE),"\$errno=".$errno,"\$errmsg=".$errmsg);

$boolean = ClassMethodExists::class_method_exists('foo','private_fun');
$errno = ClassMethodExists::errno();
$errmsg = ClassMethodExists::errmsg();
var_dump("\$boolean=".var_export($boolean,TRUE),"\$errno=".$errno,"\$errmsg=".$errmsg);

$boolean = ClassMethodExists::class_method_exists('foo','public_fun');
$errno = ClassMethodExists::errno();
$errmsg = ClassMethodExists::errmsg();
var_dump("\$boolean=".var_export($boolean,TRUE),"\$errno=".$errno,"\$errmsg=".$errmsg);
