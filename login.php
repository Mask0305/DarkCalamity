<?php

?>
<!doctype html>
<html lang="zh_TW">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="DarkCalamity黑禍">
        <meta name="author" content="Ren_Design&Mask0309">
        <link rel="icon" href="../../../../favicon.ico">
        <title>DarkCalamity</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/login.css" rel="stylesheet">
         <script src="js/chk.js" type="text/javascript" charset="utf-8"></script>

    </head>
    <body>
    
        <form class="form-signin" style="border: 2px solid #fff; border-radius: 12px;" method="POST" action="bk/main.php" name="send" onsubmit="return login_chk()">
            <div class="text-center mb-4" >
                <img class="mb-4" src="img/logo.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">登入</h1>
            </div>

            <div class="form-label-group">
                <input type="text" name="account" id="inputUsername" class="form-control" placeholder="帳號" style="background-color:#343a40; color: #ffffff;" required autofocus>
                <label for="inputUsername">帳號</label>
            </div>

            <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密碼" style="background-color:#343a40; color: #ffffff;" required>
                <label for="inputPassword">密碼</label>
            </div>

            <!-- <div class="checkbox mb-3">
                <label style="float:right">
                    <input type="checkbox" value="remember-me">記住我
                </label>
            </div> -->
            <button class="btn btn-lg btn-dark btn-block" name="login" type="submit">登入</button>
            <button class="btn btn-lg btn-dark btn-block" type="button" onclick="location.href='register.php'">註冊</button>
            <p class="mt-5 mb-3 text-muted" style="text-align:center">&copy; 2019 DarkCalamity</p>
        </form>
        
    
</body>
</html>