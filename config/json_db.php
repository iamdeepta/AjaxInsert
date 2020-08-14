<?php
  require("autoload.php");


  function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

  function getJSON($sql)
  {
    	$database = new Database\Database;
    	$connection = $database->connect();
      $arr = array();

      $users = $connection->query($sql);
      $arr = $users->fetchAll(PDO::FETCH_ASSOC);
//json_encode(utf8ize($data))



      return json_encode(utf8ize($arr));
  }
?>
