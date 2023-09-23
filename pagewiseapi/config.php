<?php

class Connect extends PDO
{
   public function _construct(){
          
          parent:: _construct("mysql:host-localhost;dbname=sellit",'sellit','ynYaW7wm+[&7',
          array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
          $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE);
          
    }
}

?>