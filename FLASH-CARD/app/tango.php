<?php
require_once("connect.php");
class Tango{
     public function makeTango($imp,$eng,$jpn,$user){
       $pdo = connect();
       
       if(empty($eng)){
           $_SESSION["noeng"] = "入力されていません";
       }
       if(empty($jpn)){
           $_SESSION["nojpn"] = "入力されていません";
       }
       
       if(!empty($eng) && !empty($jpn)){
       $sql = "INSERT INTO tango (imp, eng, jpn,user) VALUES (:imp, :eng, :jpn,:user)";
       $stmt = $pdo -> prepare($sql);
       $stmt -> bindParam(':imp', $imp, PDO::PARAM_STR);
       $stmt -> bindParam(':eng', $eng, PDO::PARAM_STR);
       $stmt -> bindParam(':jpn', $jpn, PDO::PARAM_STR);
       $stmt -> bindParam(':user', $user, PDO::PARAM_STR);
       $stmt -> execute();
       }
       
     }
      public function getAllTango($user){
        $pdo = connect();
        $sql = $pdo->prepare("SELECT*FROM tango WHERE user = :user");
        $sql -> bindParam(':user', $user, PDO::PARAM_STR);
        $sql -> execute();
        $data = $sql->fetchAll();
        return $data;
     }
      public function getTangoLevel($imp,$user){
        $pdo = connect();
        $sql = $pdo->prepare("SELECT*FROM tango WHERE imp = :imp AND user = :user");
        $sql -> bindParam(':imp', $imp, PDO::PARAM_STR);
        $sql -> bindParam(':user', $user, PDO::PARAM_STR);
        $sql -> execute();
        $data = $sql->fetchAll();
        return $data;
     }
      public function deleteTango($id){
        $pdo = connect();
        $stmt = $pdo->prepare("DELETE FROM tango WHERE id=:id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt -> execute();
     }
     public function getRandomTango($user){
        $pdo = connect();
        $sql = $pdo->prepare("SELECT*FROM tango WHERE user = :user");
        $sql -> bindParam(':user', $user, PDO::PARAM_STR);
        $sql -> execute();
        $data = $sql->fetchAll();
        $count = count($data);
        $randomTangonum = rand(0,$count-1);
        $randomTango = array_splice($data,$randomTangonum)[0];
        return $randomTango;
    }
    public function successTango($scwr,$eng){
       $pdo = connect();
       $sql = "UPDATE tango SET scwr = :scwr WHERE eng =:eng";
       $stmt = $pdo -> prepare($sql);
       $stmt -> bindParam(':scwr', $scwr, PDO::PARAM_STR);
       $stmt -> bindParam(':eng', $eng, PDO::PARAM_STR);
       $stmt -> execute();
    }
      public function warongTango($scwr,$eng){
       $pdo = connect();
       $sql = "UPDATE tango SET scwr = :scwr WHERE eng =:eng";
       $stmt = $pdo -> prepare($sql);
       $stmt -> bindParam(':scwr', $scwr, PDO::PARAM_STR);
       $stmt -> bindParam(':eng', $eng, PDO::PARAM_STR);
       $stmt -> execute();
    }
}