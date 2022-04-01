<?php
require('../app/tango.php');
require_once("../app/User.php");
require_once("../app/function.php");
$pdo = new User();
$tango = new Tango();

$imp = filter_input(INPUT_POST,"imp");
$Alltango = $tango->getAllTango($_SESSION["login_user"]);
$leveltango = $tango->getTangoLevel($imp,$_SESSION["login_user"]);
$result = $pdo->CheckLogin();
if(!$result){
    $_SESSION["login_err"] = "ユーザを登録してログインしてください";
    header("Location:login_page.php");
    return;
 }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.79.0">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
          <!-- Favicons -->
  　　　　<link href="img/favicon.png" rel="icon">
  　　　　<link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  　　　　<link href="https://fonts.googleapis.com/css?family=Raleway:400,700,900|Lato:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
 　　　 　 <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  　　　　<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 　　　 　 <link href="lib/prettyphoto/css/prettyphoto.css" rel="stylesheet">
<style>
body {
		margin: 0;
		background: #fff;
		font-family: Verdana, sans-serif;
		color:#000000;
	}
	h3{
	    margin-top:50px;
	}
	main{
	    background: #e0e0e0;
	    padding:10px;
	    width:100%;
	    border-radius: 5px;
	}
	#card {
		margin: 20px;
		width: 400px;
		height: 100px;
		cursor: pointer;
		font-size: 36px;
		line-height: 37px;
		perspective: 100px;
		transform-style: preserve-3d;
		transition: transform .8s;
	}
	#card-front, #card-back {
		display: block;
		width: 100%;
		padding:20px,30px,40px;
		height: 100%;
		border-radius: 5px;
		position: absolute;
		backface-visibility: hidden;
	}
	#card-front {
		background: #fff;
		color: #333;
	}
	#card-back {
		background: #00aaff;
		transform: rotateY(180deg);
	}
	.open {
		transform: rotateY(180deg);
	}
	.size{
	    font-size:15px;
	}
</style>
</head>
<header>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<!-- navbar-inverse で黒系ナビゲーションの指定をしています。-->
<!-- navbar-fixed-top でヘッダー固定の指定をしています。-->
<div class="container">
<div class="navbar-header">
<a href="#"><button type="button"class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button></a>
<!--button~はウインドウのサイズが780px以下になった時に表示されます。-->
<a class="navbar-brand" href="https://tech-base.net/tb-230072/tango/public/index.php">Flash Cards</a>
<!--こちらにサイト名を入れます。-->
</div>
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li class="active"><a href="logout.php">ログアウト</a></li>
<li class="active"><a href="tango_register.php">単語を登録する</a></li>
<li class="active"><a href="tango.php">単語帳を使用する</a></li>
<li class="active"><a href="test.php">ランダムモード</a></li>
</ul>
</div>
<!--/.nav-collapse -->
</div>
</div>
</header>
<body>
    <div class="container">
           <h3>カードをクリックすると裏が表示されます</h3> 
    <main>
        <form action=""method="post">
            <select name="imp">
            <option value="">すべて</option>
            <option value="&#9734">&#9734のみ</option>
            <option value="&#9734&#9734">&#9734&#9734のみ</option>
            <option value="&#9734&#9734&#9734">&#9734&#9734&#9734のみ</option>
            <input type="submit"value="絞り込む">
        </select><?php echo $imp?><br><br>
        </form>
    <button class="btn btn-primary"id="btn">全部回す</button>
      <?php if(empty($imp)):?>
    <?php foreach($Alltango as $key => $value):?>
	<div id="card" class="card"> 
		<div id="card-front"class="card-front"><span class="size">重要度:<?php echo $value["imp"]?></span><br><?php echo $value["eng"]?></div>
		<div id="card-back"class="card-back"><span class="size">重要度:<?php echo $value["imp"]?></span><br><?php echo $value["jpn"]?></div>
	</div>
	<?php endforeach;?>
	<?php endif;?>
    <?php if(!empty($imp)):?>
    <?php foreach($leveltango as $key => $value):?>
	<div id="card" class="card"> 
		<div id="card-front"class="card-front"><span class="size">重要度:<?php echo $value["imp"]?></span><br><?php echo $value["eng"]?></div>
		<div id="card-back"class="card-back"><span class="size">重要度:<?php echo $value["imp"]?></span><br><?php echo $value["jpn"]?></div>
	</div>
	<?php endforeach;?>
	<?php endif;?>
  

	</main>
	</div>
	
	<script src="../js/main.js"></script>
</body>
</html>