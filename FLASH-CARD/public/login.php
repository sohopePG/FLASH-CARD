<?php
require_once("../app/connect.php");
require_once("../app/User.php");

session_start();
$pdo = new User();

$err=[];

$namelog = filter_input(INPUT_POST,"namelog");
$passlog = filter_input(INPUT_POST,"passlog");

if(empty($namelog)){
    $err["namelog"]="ユーザーネームが入力されていません";
}
if(empty($passlog)){
    $err["passlog"]="パスワードが入力されていません";
}
if(count($err)==0){
    $pdo->Checkpw($namelog,$passlog);
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
      <a href="https://tech-base.net/tb-230072/tango/public/index.php">マイページへ</a>
    <?php endif?>
    <p></p>
</body>
</html>