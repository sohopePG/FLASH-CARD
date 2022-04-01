<?php

function connect(){
    $user = "tb-230072";
    $pass = "LnLBsdMTF6";
    $dsn = 'mysql:dbname=tb230072db;host=localhost;charset=utf8mb4';
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