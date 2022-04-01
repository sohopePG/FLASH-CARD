<?php
require_once("../app/function.php");
$err = $_SESSION;
$_SESSION = array();
session_destroy();

$login_err = isset($_SESSION["login_err"]) ? $_SESSION["login_err"] : NULL;
unset($_SESSION["login_err"]);
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.79.0">

        <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/navbar-fixed/">
        <!-- Bootstrap core CSS -->
        <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
        <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
        <meta name="theme-color" content="#7952b3">

        <!-- Custom styles for this template -->
        <link href="navbar-top-fixed.css" rel="stylesheet">
        <link href="./style.css" rel="stylesheet">
    </head>
    <body>
<body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Flash Cards</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="exit.php"></a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <main class="container">
        <div class="bg-light p-5 rounded">
            <h1>This is Login Page</h1>
            <p class="lead">ログインフォームです</p>
            <form action="login.php" method="post">
                <fieldset>
                    <legend>LOGIN</legend>
                    <?php if(isset($err["errmsg"])):?>
                          <p><?php echo $err["errmsg"]?></p>
                        <?php endif;?>
                    <div class="mb-3">
                        <label for="TextInput" class="form-label">Name</label>
                        <input type="text" id="disabledTextInput" name="namelog" class="form-control" placeholder="Enter Your Name">
                        <?php if(isset($err["namelog"])):?>
                          <p><?php echo $err["namelog"]?></p>
                        <?php endif;?>
                    </div>
                    <div class="mb-3">
                        
                        <label for="TextInput" class="form-label">Password</label>
                        <input type="password" id="disabledTextInput" name="passlog" class="form-control" placeholder="Enter Your Password">
                        <?php if(isset($err["passlog"])):?>
                          <p><?php echo $err["passlog"]?></p>
                        <?php endif;?>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </fieldset>
            </form>
                
            <br>
            <form action="signup.php" method="post">
                <fieldset>
                    <legend>REGISTER</legend>
                    <div class="mb-3">
                        <?php if(isset($err["login_err"])):?>
                          <p><?php echo $err["login_err"]?></p>
                        <?php endif;?>
                        
                        <label for="TextInput" class="form-label">Name</label>
                        <input type="text" id="disabledTextInput" name="name" class="form-control" placeholder="Enter Your Name">
                        <?php if(isset($err["name"])):?>
                          <p><?php echo $err["name"]?></p>
                        <?php endif;?>
                        <?php if(isset($err["errmsg_sign"])):?>
                          <p><?php echo $err["errmsg_sign"]?></p>
                        <?php endif;?>
                    </div>
                    <div class="mb-3">
                        <label for="TextInput" class="form-label">Password</label>
                        <input type="password" id="disabledTextInput" name="password" class="form-control" placeholder="Enter Your Password">
                        <?php if(isset($err["pass"])):?>
                        <p><?php echo $err["pass"]?></p>
                        <?php endif;?>
                        <input type="hidden" name="token" value="<?php echo h(createToken())?>">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    
                </fieldset>
            </form>
        </div>
        <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <body>
</html>