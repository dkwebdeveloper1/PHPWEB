<?php
//error_reporting(E_ERROR | E_PARSE);
/**
 * @author Dinesh
 * @copyright 2011
 */
include_once('dbconfig.php');

class db
{
	private $connection;
	private $selectdb;
	private $lastQuery;
	private $config;

	function __construct($config)
	{
		$this->config = $config;
	}
	
	function __destruct()
	{
		
	}

	public function openConnection()
	{
		try
		{
			if($this->config->connector == "mysql")
			{
				$this->connection = mysql_connect($this->config->hostname, $this->config->username, $this->config->password);
				$this->selectdb = mysql_select_db($this->config->database);
			}
			elseif($this->config->connector == "mysqli")
			{
				$this->connection = mysqli_connect($this->config->hostname, $this->config->username, $this->config->password);
				$this->selectdb = mysqli_select_db($this->connection, $this->config->database)
					or die(mysqli_error($this->connection));
			}
		}
		catch(exception $e)
		{
			return $e;
		}
	}

	public function closeConnection()
	{
		try
		{
			if($this->config->connector == "mysql")
			{
				mysql_close($this->connection);
			}
			elseif($this->config->connector == "mysqli")
			{
				mysqli_close($this->connection);
			}
		}
		catch(exception $e)
		{
			return $e;
		}
	}
	
	public function ecapeString($string)
	{
		return addslashes($string);
	}

	public function query($query)
	{
		$query = str_replace("}", "", $query);
		$query = str_replace("{", $this->config->prefix, $query);
						
		try
		{
			
			if(empty($this->connection))
			{
				
				$this->openConnection();

				if($this->config->connector == "mysql")
				{
					$this->lastQuery = mysql_query($this->ecapeString($query)) or die (mysql_error());
				}
				elseif($this->config->connector == "mysqli")
				{
					$this->lastQuery = mysqli_query($this->connection, $this->ecapeString($query)) or die (mysql_error());
				}
			
				$this->closeConnection();
				
				return $this->lastQuery;
			}
			else
			{
				
				if($this->config->connector == "mysql")
				{
					$this->lastQuery = mysql_query($this->ecapeString($query) or mysql_error());
				}
				elseif($this->config->connector == "mysqli")
				{
					//mysqli_query($this->connection,$query) or die(mysqli_error($this->connection));
					//$this->lastQuery = mysqli_query($this->connection, $this->ecapeString($query));
					$this->lastQuery = mysqli_query($this->connection, $query);
					//or (mysqli_error($this->ecapeString($query)));
				}
				
				return $this->lastQuery;
			}
			
		}
		catch(exception $e)
		{
			return $e;
		}
	}

	public function lastQuery()
	{
		return $this->lastQuery;
	}

	public function pingServer()
	{
		try
		{
			if($this->config->connector == "mysql")
			{
				if(!mysql_ping($this->connection))
				{
					return false;
				}
				else
				{
					return true;
				}
			}
			elseif($this->config->connector == "mysqli")
			{
				if(!mysqli_ping($this->connection))
				{
					return false;
				}
				else
				{
					return true;
				}
			}
		}
		catch(exception $e)
		{
			return $e;
		}
	}
	
	public function hasRows($result)
	{
		try
		{
			if($this->config->connector == "mysql")
			{
				if(mysql_num_rows($result)>0)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			elseif($this->config->connector == "mysqli")
			{
				if(mysqli_num_rows($result)>0)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(exception $e)
		{
			return $e;
		}
	}
	
	public function countRows($result)
	{		
		
		try
		{
			if($this->config->connector == "mysql")
			{
				return mysql_num_rows($result);
			}
			elseif($this->config->connector == "mysqli")
			{
				//echo "KUMMMMMM".$result;
				return mysqli_num_rows($result);
			}
		}
		catch(exception $e)
		{
			return $e;
		}
	}
	
	public function insertIdRows($result)
	{		
		
		try
		{
			if($this->config->connector == "mysql")
			{
				return mysql_insert_id($result);
			}
			elseif($this->config->connector == "mysqli")
			{
				//echo "KUMMMMMM".$result;
				return mysqli_insert_id($result);
			}
		}
		catch(exception $e)
		{
			return $e;
		}
	}

	//$last_row = mysqli_insert_id($connection);

	public function fetchAssoc($result)
	{
		//print_r($result);
		try
		{
			if($this->config->connector == "mysql")
			{
				return mysql_fetch_assoc($result);
			}
			elseif($this->config->connector == "mysqli")
			{
				//return mysqli_fetch_assoc($result, MYSQL_BOTH);
				//return mysqli_fetch_assoc($result);
				$result_array = array();
				while ($row = mysqli_fetch_assoc($result)) {
				$result_array[] = $row;
				}
				return $result_array;
				//print_r($result_array);
			}
		}
		catch(exception $e)
		{
			return $e;
		}
	}
	
	public function fetchArray($result)
	{
		//print_r($result);
		try
		{
			if($this->config->connector == "mysql")
			{
				return mysql_fetch_array($result);
			}
			elseif($this->config->connector == "mysqli")
			{
				return mysqli_fetch_array($result, true);
			}
		}
		catch(exception $e)
		{
			return $e;
		}
	}
}

class config
{
	public $hostname;
	public $username;
	public $password;
	public $database;
	public $prefix;
	public $connector;
	
	function __construct($hostname = NULL, $username = NULL, $password = NULL, $database = NULL, $prefix = NULL, $connector = NULL)
	{
		$this->hostname = !empty($hostname) ? $hostname : "";
		$this->username = !empty($username) ? $username : "";
		$this->password = !empty($password) ? $password : "";
		$this->database = !empty($database) ? $database : "";
		$this->prefix = !empty($prefix) ? $prefix : "";
		$this->connector = !empty($connector) ? $connector : "mysqli";
	}
	
	function __destruct()
	{
		
	}
}

$config = new config(DATABASE_SERVER, DATABASE_USERNAME, DATABASE_PASSWORD, DATABASE_NAME, "prefix", $connector); //type in your data here… 	

?>