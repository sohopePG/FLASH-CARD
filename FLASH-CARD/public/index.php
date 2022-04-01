<?php
require_once("../app/User.php");
require_once("../app/function.php");
$pdo = new User();
$result = $pdo->CheckLogin();

if(!$result){
    $_SESSION["login_err"] = "ユーザを登録してログインしてください";
    header("Location:login_page.php");
    return;
}
$login_user = $_SESSION["login_user"];
?>
<html>
    <head>
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
 　　　 　 <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">-->
  <!-- Libraries CSS Files -->
  　　　　<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 　　　 　 <link href="lib/prettyphoto/css/prettyphoto.css" rel="stylesheet">
 　　　 　 <link href="lib/hover/hoverex-all.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
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
<li class="active"><a href="tango_register.php">つくる</a></li>
<li class="active"><a href="tango.php">つかう</a></li>
</ul>
</div>
<!--/.nav-collapse -->
</div>
</div>
</header>
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
      <!-- <h1 class="jumbotron-heading">Album example</h1> -->
      <h3 class="jumbotron-heading">ようこそ！これは<?php echo h($login_user)?>さんのページです。</h3>
      　　　<p>
                <a href="tango_register.php" class="btn btn-primary btn-lg">つくる</a>
                <a href="tango.php" class="btn btn-success btn-lg">つかう</a>
                <a href="test.php" class="btn btn-warning btn-lg">ランダムモード</a>
            </p>
    </div>
  </section>
 
    
       </main> 
        <div id="footerwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h4>About</h4>
          <div class="hline-w"></div>
          <p>This is an application created by a college student learning PHP.<br>You can create your own flashcards.</p>
        </div>
        <div class="col-lg-4">
          <h4>my gmail Address</h4>
          <div class="hline-w"></div>
          <p>
            lemon100s.w@gmail.com
          </p>
        </div>

      </div>
    </div>
  </div>

  <div id="copyrights">
    <div class="container">
      <p>
        &copy; Copyrights <strong>Solid</strong>. All Rights Reserved
      </p>
      <div class="credits">
        <!--
          You are NOT allowed to delete the credit link to TemplateMag with free version.
          You can delete the credit link only if you bought the pro version.
          Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/solid-bootstrap-business-template/
          Licensing information: https://templatemag.com/license/
        -->
        Created by souma</a>
      </div>
    </div>
  </div>
  <!-- / copyrights -->
  <!-- / copyrights -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/php-mail-form/validate.js"></script>
  <script src="lib/prettyphoto/js/prettyphoto.js"></script>
  <script src="lib/isotope/isotope.min.js"></script>
  <script src="lib/hover/hoverdir.js"></script>
  <script src="lib/hover/hoverex.min.js"></script>

      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
　　　<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <body>
</html>