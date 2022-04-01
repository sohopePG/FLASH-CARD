<?php
require_once("connect.php");
class User{
    
    public function makeUser($name,$pass){
     $pdo = connect();
     $sql = "SELECT * FROM user_date WHERE name = ?";
     $arr = [];
     $arr[] = $name;
     $stmt = $pdo -> prepare($sql);
     $stmt -> execute($arr);
     $data = $stmt->fetchAll();
     
     if(count($data) > 0){
       header("Location:login_page.php");
       $_SESSION["errmsg_sign"] = "このユーザー名は既に登録されています";
     }else{
       $sql = "INSERT INTO user_date (name, password) VALUES (:name, :pass)";
       $stmt = $pdo -> prepare($sql);
       $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
       $stmt -> bindParam(':pass', $pass, PDO::PARAM_STR);
       $stmt -> execute();
     }
    }
    
    public function Checkpw($name,$pass){
     $pdo = connect();
     $sql = "SELECT * FROM user_date WHERE name = ?";
     
     $arr = [];
     $arr[] = $name;
     
     $stmt = $pdo -> prepare($sql);
     $stmt -> execute($arr);
     $data = $stmt->fetchAll();
     
     if(count($data)==0){
         header("Location:login_page.php");
         $_SESSION["errmsg"] = "パスワードまたはユーザー名が違います！";
     }
    
     foreach ($data as $key => $value){
        if($pass == $value["password"]){
            session_regenerate_id(true);
            $_SESSION["login_user"] = $name;
             echo "ログイン成功!";
            }
            else{
             header("Location:login_page.php");
             $_SESSION["errmsg"] = "パスワードまたはユーザー名が違います！";
            }
        }
    }
    
    public function CheckLogin(){
        $result = false;
        if(!empty($_SESSION["login_user"])){
            return $result = true;
        }
        return $result;
    }
}
?>