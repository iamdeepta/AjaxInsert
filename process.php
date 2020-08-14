<?php

//process.php

//$connect = new PDO("mysql:host=localhost; dbname=puchuheartsguttu", "root", "");

require("config/json_db.php");

$database = new Database\Database;
        $connection = $database->connect();

if(isset($_POST["album_name"]))
{
 $data = array(
  ':album_name'  => trim($_POST["album_name"])
  //':panel_id'  => trim($_POST["panel_id"])
  //':last_name'  => trim($_POST["last_name"])
 );


 $query = "
 INSERT INTO album 
 (album_name) 
 VALUES (:album_name)
 ";

 $statement = $connection->prepare($query);

 $statement->execute($data);


 echo 'done';
 
}

if(isset($_POST["panel_id"]))
{
$data1 = array(
  //':album_name'  => trim($_POST["album_name"]),
  ':panel_id'  => trim($_POST["panel_id"])
  //':last_name'  => trim($_POST["last_name"])
 );


$query1 = "
 INSERT INTO post 
 (panel_id) 
 VALUES (:panel_id)
 ";

 $statement1 = $connection->prepare($query1);

 $statement1->execute($data1);

  echo 'done';

}

?>
