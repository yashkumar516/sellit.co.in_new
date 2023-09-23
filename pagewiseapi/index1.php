<?php
  require_once __DIR__ . '/config.php';

  class API {
      function select(){
          $db = new connect;
          $users = array();
          $data = $db->prepare('SELECT * FROM users ORDER BY id');
          $data->execute();
           while($outputdata = $data->fetch(PDO::FETCH_ASSOC)){
              $users[] = $outputdata;
          }
          return json_encode([$users]);
      }
  }  
  
  $api = new API;
  header('content-type:application/json');
  echo $api->select();
?>