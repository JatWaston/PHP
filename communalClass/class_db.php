<?php

/**
* 
*/
class class_dboperation
{
	private $host;
	private $user;
	private $pwd;
	private $db;
	private $charset;
	
	// function __construct(argument)
	// {
	// 	# code...
	// }

	function class_dboperation($host,$user,$pwd,$db,$charset)
	{
		$this->host = $host;
		$this->user = $user;
		$this->pwd = $pwd;
		$this->db = $db;
		$this->charset = $charset;

		$conn = mysql_connect($this->host,$this->user,$this->pwd) or die('connect error:'. mysql_error());
		mysql_select_db($this->db,$conn) or die('select db error:'. mysql_error());
		$sql = "set names " . $charset;
		mysql_query($sql) or die('set charset error:'. mysql_error());
		echo "mysql_connect success!" . '<br />';
	}

	function query($sql)
	{
		$result = mysql_query($sql) or die('query error:' . mysql_error());
		return $result;
	}

	function fetch_array($sql)
	{
		$result = mysql_query($sql) or die('fetch_array error:' . mysql_error());
		$result_array = mysql_fetch_array($result);
		return $result_array;
	}

	function fetch_obj_arr($sql)
	{
		$obj_arr = array();
		$result = $this->query();
		while ($row = mysql_fetch_object($result)) 
		{
			$obj_arr[] = $row;
		}
		return $obj_arr;
	}

	function fetch_obj($result)
	{
		return mysql_fetch_object($result);
	}
}
?>