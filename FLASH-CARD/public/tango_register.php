
<?php
require_once("../app/User.php");
require_once("../app/function.php");
require('../app/tango.php');
$pdo = new User();
$tango = new Tango();

$Alltango = $tango->getAllTango($_SESSION["login_user"]);

$result = $pdo->CheckLogin();
$user = $_SESSION["login_user"];
$action = filter_input(INPUT_GET,"action");
$eng = filter_input(INPUT_POST,"eng");
$jpn = filter_input(INPUT_POST,"jpn");
$id = filter_input(INPUT_POST,"id");
$imp = filter_input(INPUT_POST,"imp");

 if(!$result){
    $_SESSION["login_err"] = "ユーザを登録してログインしてください";
    header("Location:login_page.php");
    return;
 }
 if($_SERVER["REQUEST_METHOD"] === "POST"){
        switch($action){
            case "delete":
                $tango->deleteTango($id);
                break;
            case "register":
                $tango->makeTango($imp,$eng,$jpn,$user);
                break;
            
        }
        header("Location:tango_register.php");
  }
?>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="generator" content="Hugo 0.79.0">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
          <!-- Favicons -->
  　　　　<link href="img/favicon.png" rel="icon">
  　　　　<link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  　　　　<link href="../css/style.css"rel="stylesheet">
  <!-- Google Fonts -->
  　　　　<link href="https://fonts.googleapis.com/css?family=Raleway:400,700,900|Lato:400,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
 　　　 　 <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  　　　　<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 　　　 　 <link href="lib/prettyphoto/css/prettyphoto.css" rel="stylesheet">
 　　　 　 <title>Bootstrap Test</title>
  </head>
  <header>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<!-- navbar-inverse で黒系ナビゲーションの指定をしています。-->
<!-- navbar-fixed-top でヘッダー固定の指定をしています。-->
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
</header>
  <body>
<div class="p-5">
 <div class="container">
      <form action="?action=register"method="POST">
        <div class="form-group">
        <h3>単語を登録してください</h3>
        <label for="inputName">重要度</label><br>
        <select name="imp">
            <option value="&#9734">&#9734</option>
            <option value="&#9734&#9734">&#9734&#9734</option>
            <option value="&#9734&#9734&#9734">&#9734&#9734&#9734</option>
            </select><br>
          <label for="inputName">表</label>
          <input type="text" class="form-control" name="eng" id="inputName" placeholder="表に表示する単語">
        </div>
        <div class="form-group">
          <label for="inputText">裏</label>
          <textarea id="inputText" class="form-control" name="jpn" placeholder="表に表示する単語"></textarea>
           
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
      </form>

<div th:replace="book/search"></div>
 
 <div class="container">
    <div th:text="${deleteError}"></div>
    <div th:if="${books}">
      <div th:if="${books.size() > 0}">
          <h3>登録単語一覧</h3>
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr><th>重要度</th><th>表</th><th>裏</th><th colspan="4"></th></tr>
          </thead>
          <tbody>
              <?php foreach($Alltango as $key => $value):?>
            <tr>
              <td><?php echo $value["imp"]?></td><td><?php echo $value["eng"]?></td><td><?php echo $value["jpn"]?></td>
              <td>
                <form action="?action=delete" method="POST">
                <div class="text-right">
                  <input type="hidden"value="<?php echo $value["id"];?>"name="id">
                  <button class="delete-action btn btn-outline-danger btn-sm" type="submit">削除</button>
                  </div>
                </form>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </div>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>