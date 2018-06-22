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
		return self::$errno === 0 ? '' : self::$errmsgArr[self::$errno];
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
		if(!method_exists(new $object_name,$method_name) or !is_callable([new $object_name,$method_name]))
		{
			self::$errno = -2;
			return FALSE;
		}
		self::$errno = 0;
		return TRUE;
	}
}
