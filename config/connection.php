<?php
//session_start();
 //for Local Server 
/*$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'pwddb';

define('DBHR', 'db_hr');
define('DBPMS', 'pwdpms3');*/ 


/* for online server */
/*$host = 'localhost';
$user = 'pwdcdshelltechno_deepta';
$pass = ';AB7[-S[k+a_';
$db = 'pwdcdshelltechno_contractor';


define('DBHR', 'pwdcdshelltechno_contractor');
define('DBPMS', 'pwdcdshelltechno_contractor');*/

	/*$dblink = mysql_connect($host,$user,$pass)
	or
	die("Can't connect to database");
	mysql_select_db($db, $dblink)
	or
	die("Can't find the database");
	mysql_query('SET CHARACTER SET utf8');
mysql_query("SET SESSION collation_connection ='utf8_general_ci'") or die (mysql_error());*/


$servername = "localhost";
$username = "root";
$password = "";
$db = 'pwddb';

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>