<?php
session_start();
 function h($str){
     echo htmlspecialchars($str,ENT_QUOTES,"utf-8");
 }
 function createToken(){
    $csrf = bin2hex(random_bytes(32));
    $_SESSION["token"] = $csrf;
    return $csrf;
 }
    
  function validateToken(){
    if(empty($_SESSION["token"])||$_SESSION["token"]!== filter_input(INPUT_POST,"token")){
        var_dump("a");
      }
    }
?>