<?php
require('../app/tango.php');
require_once("../app/User.php");
require_once("../app/function.php");
$pdo = new User();
$tango = new Tango();
$randamtango = $tango->getRandomTango($_SESSION["login_user"]);
$result = $pdo->CheckLogin();
if(!$result){
    $_SESSION["login_err"] = "ユーザを登録してログインしてください";
    header("Location:login_page.php");
    return;
 }
if(isset($_POST["success"])){
    $tango->successTango("&#10003;",$_POST["randomeng"]);
    header("Location:test.php");
}
if(isset($_POST["warong"])){
    $tango->warongTango("&#10006;",$_POST["randomeng"]);
    header("Location:test.php");
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
	.tango{
	    margin:10px;
	}
	main{
	    background: #e0e0e0;
	    padding:10px;
	    width:100%;
	    margin-top:60px;
	    border-radius: 5px;
	    text-align:center;
	}
	#card {
		margin:0 auto;
		width: 400px;
		height: 100px;
		cursor: pointer;
		font-size: 36px;
		line-height: 97px;
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
	    font-size:20px;
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
<li class="active"><a href="tango.php">ランダムモード</a></li>
</ul>
</div>
<!--/.nav-collapse -->
</div>
</div>
</header>
<body>
    <div class="container">
    <main>
<form action=""method="post">
	<div id="card" class="card">
		<div id="card-front"class="card-front"><?php echo $randamtango["scwr"]?><?php echo $randamtango["eng"]?></div>
		<input type="hidden"name="randomeng"value="<?php echo $randamtango["eng"]?>">
		<div id="card-back"class="card-back"><?php echo $randamtango["jpn"]?></div>
	</div>
	    <button type="submit" class="btn btn-success tango" name="success">バッチリ!&#10003;</button>
	    <button type="submit" class="btn btn-danger tango" name="warong">間違えた、、&#10006;</button>
	</form>
	</main>
	</div>
	</main>
	<script src="../js/main.js"></script>
</body>
</html>