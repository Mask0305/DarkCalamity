<?php
    session_start();
    include "bk/db_connect.php";

    if(isset($_GET['action'])&&($_GET['active'])&&$_GET['action']=='ok'){
        $sql="SELECT `unicode` FROM `user` WHERE `unicode`='".$_GET['active']."'";
        if(_fetch_array($sql)){
            $sql="UPDATE `user` SET `user`.`active`='ok' WHERE `unicode` = '".$_GET['active']."'";
            $result=filterTable($sql);
            _alert('認證成功','DarkCalamity/login.php');
        }else{
           echo "<script> alert('認證失敗,請在下方填入註冊信箱並重新寄送驗證信');</script>";
        }
    }
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
    
        <form class="form-signin" style="border: 2px solid #fff; border-radius: 12px;" method="POST" action="bk/main.php" name="send">
            <div class="text-center mb-4" >
                <img class="mb-4" src="img/logo.png" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">信箱認證</h1>
            </div>

            <div class="form-label-group">
                <input type="text" name="email" id="inputUsername" class="form-control" placeholder="帳號" style="background-color:#343a40; color: #ffffff;" value="<?php echo $_SESSION['tempemail']; session_destroy();?>" required autofocus >
                <label for="inputUsername">信箱</label>
            </div>
            <button class="btn btn-lg btn-dark btn-block" name="sendmail" type="submit">點我重寄驗證信</button>
            <p class="mt-5 mb-3 text-muted" style="text-align:center">&copy; 2019 DarkCalamity</p>
        </form>
        
    
</body>
</html>