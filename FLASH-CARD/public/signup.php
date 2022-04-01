<?php
require_once("../app/connect.php");
require_once("../app/User.php");
require_once("../app/function.php");

$pdo = new User();
$err=[];

$name = filter_input(INPUT_POST,"name");
$pass = filter_input(INPUT_POST,"password");
$token = filter_input(INPUT_POST,"token");

$_SESSION["token"] = $token;

if(empty($_SESSION["token"])||$token !== $_SESSION["token"]){
    exit("不正なリクエスト");
}
unset($_SESSION["token"]);

if(empty($name)){
    $err["name"]="ユーザーネームが入力されていません";
}
if(empty($pass)){
    $err["pass"]="パスワードが入力されていません";
}

if(count($err)===0){
    $pdo->makeUser($name,$pass);
}
if(count($err)>0){
    $_SESSION = $err;
    header("Location:login_page.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>s</title>
</head>
<body>
    <?php if(count($err)>0):?>
      <?php foreach($err as $e):?>
        <p><?php echo $e?></p>
      <?php endforeach;?>
      <?php else:?>
      <p>ユーザー登録完了</p>
      <a href="https://tech-base.net/tb-230072/tango/public/login_page.php">戻る</a>
    <?php endif?>
    <p></p>
</body>
</html>
