<?php
session_start();

// Create connection
//$dbhost="magadhagroups.com.mysql";
//$dbuser="magadhagroups_com";    // specify the sever details for mysql
//$dbpass="kyHmWrtu";
//$dbname="magadhagroups_com";

//magadhadb - Database
//mysqlappdatabase - server
$con=mysqli_init(); 
mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL); 
if (!mysqli_real_connect($con, "mysqlappdatabase.mysql.database.azure.com", "magadhadb@mysqlappdatabase", "JULY@2011", "magadhadb", 3306))
  {
  die("Connect Error: " . mysqli_connect_error());
  }


$PHPSESSID=session_id();


$dbipname=$_SERVER['REMOTE_ADDR'];

////// Enter Database Server //////
define("DATABASE_SERVER",$dbhost);

////// Enter Database Name //////
define("DATABASE_NAME",$dbname);

////// Enter Database UserName /////
define("DATABASE_USERNAME",$dbuser);

////// Enter IP Database Name //////
define("IP_DATABASE_NAME",$dbipname);

////// Enter Database password //////
define("DATABASE_PASSWORD",$dbpass);


////// Enter Database password //////
define("PHPSESSID",$PHPSESSID);
  
?>