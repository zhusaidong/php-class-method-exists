# php-class-method-exists
php class-method-exists

## Introduction

> php 动态调用类和方法时，需要2步：先`class_exists`，再`method_exists`。

> 该组件将这2步合二为一。

## Usage

```php
require('src/ClassMethodExists.php');

class foo
{
	public function public_fun(){}
	private function private_fun(){}
}

if(ClassMethodExists::class_method_exists('foo1','public_fun') === false)
{
	echo 'error:'.ClassMethodExists::errmsg();
}
if(ClassMethodExists::class_method_exists('foo','public_fun') === false)
{
	echo 'error:'.ClassMethodExists::errmsg();
}
if(ClassMethodExists::class_method_exists('foo','private_fun') === false)
{
	echo 'error:'.ClassMethodExists::errmsg();
}
```
