<?php
/**
* ClassMethodExists
* 
* @author zhusaidong [zhusaidong@gmail.com]
*/
class ClassMethodExists
{
	/**
	* @var int $errno
	*/
	private static $errno = 0;
	/**
	* @var array $errmsgArr
	*/
	private static $errmsgArr = [
		0 =>'',
		-1=>'the class not exists',
		-2=>'the class method not exists',
	];
	/**
	* get errno
	* 
	* @static
	* 
	* @return int errno
	*/
	public static function errno()
	{
		return self::$errno;
	}
	/**
	* get errmsg
	* 
	* @static
	* 
	* @return string errmsg
	*/
	public static function errmsg()
	{
		return self::$errmsgArr[self::$errno];
	}
	/**
	* class_method_exists
	* 
	* @param string $object_name
	* @param string $method_name
	* 
	* @return boolean
	*/
	public static function class_method_exists($object_name,$method_name)
	{
		if(!class_exists($object_name))
		{
			self::$errno = -1;
			return FALSE;
		}
		
		$object = self::reflection($object_name);
		if(!method_exists($object,$method_name) or !is_callable([$object,$method_name]))
		{
			unset($object);
			self::$errno = -2;
			return FALSE;
		}
		
		unset($object);
		self::$errno = 0;
		return TRUE;
	}
	/**
	* reflection
	* 
	* @param string $object_name
	* 
	* @return object
	*/
	private static function reflection($object_name)
	{
		$class = new ReflectionClass($object_name);
		$constructor = $class->getConstructor();
		if($constructor === NULL)
		{
			return new $object_name;
		}
		
		$args = [];
		foreach($constructor->getParameters() as $param)
		{
			if($param->isOptional())
			{
				continue;
			}
			
			$v = NULL;
			$param->getType() !== NULL and settype($v,$param->getType());
			
			$args[$param->getName()] = $v;
		}
		return call_user_func_array([$class,'newInstance'],$args);
	}
}
