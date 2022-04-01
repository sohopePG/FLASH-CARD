<?php

function connect(){
    $user = "";
    $pass = "";
    $dsn = '';
    try{
      $pdo = new PDO($dsn, $user, $pass,[
      PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
       ]);
      return $pdo;
    }catch(PDOException $e){
        echo $e->getMessage();
        exit();
    }
}
?>
