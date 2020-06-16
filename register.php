<?php
$uni = sha1(uniqid(rand(),true)); //唯一標識符
$_SESSION['uniqid']=$uni;

?>
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
         <script src="js/chk.js" type="text/javascript" charset="utf-8">

        </script>

    </head>

    <body>
        

        <form class="form-signin" style="border: 2px solid #fff; border-radius: 12px;" name="send" method="POST" action="bk/main.php" onsubmit="return gis_chk()">
            <input type="hidden" name="uni" value="<?php echo $uni;  ?>" />
                <div class="text-center mb-4" >
                    <img class="mb-4" src="img/logo.png" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">註冊</h1>
                </div>

                <div class="form-label-group">
                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="信箱" style="background-color:#343a40; color: #ffffff;" required autofocus >
                        <label for="inputEmail">信箱</label>
                </div>

                <div class="form-label-group">
                    <input type="text" name="nickname" id="inputname" class="form-control" placeholder="帳號" style="background-color:#343a40; color: #ffffff;" required autofocus>
                    <label for="inputUsername">暱稱</label>
                </div>

                <div class="form-label-group">
                    <input type="text" name="account" id="inputUsername" class="form-control" placeholder="帳號" style="background-color:#343a40; color: #ffffff;" required autofocus>
                    <label for="inputUsername">帳號</label>
                </div>
    
                <div class="form-label-group">
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密碼" style="background-color:#343a40; color: #ffffff;" required>
                    <label for="inputPassword">密碼</label>
                </div>

                <div class="form-label-group">
                        <input type="password" name="repassword" id="re-inputPassword" class="form-control" placeholder="再次輸入密碼" style="background-color:#343a40; color: #ffffff;" required>
                        <label for="re-inputPassword">再次輸入密碼</label>
                    </div>
                <button name="register" class="btn btn-lg btn-dark btn-block" type="submit" style="margin-bottom:10px">註冊</button>
                <p style="text-align: center"><a href="login.php">已有帳號?</a></p>
                <p class="mt-5 mb-3 text-muted" style="text-align:center">&copy; 2019 DarkCalamity</p>
            </form>
    </body>
</html>

