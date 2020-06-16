<?php

    require "bk/db_connect.php";

    if(!isset($_GET['job']) || $_GET['job'] == ''){
        _alert('發生錯誤,請重新選擇','DarkCalamity/job.php');
    }

switch($_GET['job']){
    case 'archer':
        $job = '弓箭手';
        $ability = array(15,12,10,8,6);         //體力智敏幸
        break;
    case 'warrior':
        $job = '戰士';
        $ability = array(20,12,4,6,6);
        break;
    case 'knight':
        $job = '騎士';
        $ability = array(30,10,10,8,6);
        break;
}

        $performance = _ability($_GET['job'],$ability);


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
                <h1 class="h3 mb-3 font-weight-normal">創立角色</h1>
            </div>

            <div class="form-label-group">
                <div style="text-align:center;font-size:24px;">職業 :
                <input style=" font-size:20px; border:0; padding-bottom:20px; background-color:#343a40; color: #ffffff; width:200px; height:30px;" type="text"  value="<?php echo $job;?>" readonly='readonly'>
                <input type="hidden" name="job" value="<?php echo $_GET['job'];?>" readonly='readonly'>
                </div>
            </div>

             <div class="form-label-group">
                <div style="text-align:center;font-size:24px;">種族 :
                <input style=" font-size:20px; border:0; padding-bottom:20px; background-color:#343a40; color: #ffffff; width:200px; height:30px;" type="text" name="race" value="<?php echo '獸人'?>" readonly='readonly'>
                </div>
            </div>

            <div class="form-label-group">
                <div style="margin-left:12px;font-size:24px;">基本能力
                    <div style="margin-left:-50px;">
                        <div style="font-size:20px; text-align:center;">&nbsp; 體力 : 
                            <input style=" font-size:16px; border:0; padding-bottom:20px; background-color:#343a40; color: #ffffff; width:30px; height:30px;" type="text" name="physique" value="<?php echo $ability[0];?>" readonly='readonly'>
                            生命 : <?php echo $performance[0];?>
                        </div>
                        <div style="font-size:20px; text-align:center;"><?php if(strlen($performance[1])>2){echo'&nbsp';}?> 力量 :
                            <input style=" font-size:16px; border:0; padding-bottom:20px; background-color:#343a40; color: #ffffff; width:30px; height:30px;" type="text" name="power" value="<?php echo $ability[1];?>" readonly='readonly'>
                            攻擊 : <?php echo $performance[1];?>
                        </div>
                        <div style="font-size:20px; text-align:center;">智慧 : 
                            <input style=" font-size:16px; border:0; padding-bottom:20px; background-color:#343a40; color: #ffffff; width:30px; height:30px;" type="text" name="wisdom" value="<?php echo $ability[2];?>" readonly='readonly'>
                            倍率 : <?php echo $performance[2];?>
                        </div>
                        <div style="font-size:20px; text-align:center;">敏捷 : 
                            <input style=" font-size:16px; border:0; padding-bottom:20px; background-color:#343a40; color: #ffffff; width:30px; height:30px;" type="text" name="agile" value="<?php echo $ability[3];?>" readonly='readonly'>
                            命中 : <?php echo $performance[3];?>
                        </div>
                        <div style="font-size:20px; text-align:center;">幸運 : 
                            <input style=" font-size:16px; border:0; padding-bottom:20px; background-color:#343a40; color: #ffffff; width:30px; height:30px;" type="text" name="lucky" value="<?php echo $ability[4];?>" readonly='readonly'>
                            爆擊 : <?php echo $performance[4];?>
                        </div>
                    </div>
                </div>
            </div>



            <!-- <div class="checkbox mb-3">
                <label style="float:right">
                    <input type="checkbox" value="remember-me">記住我
                </label>
            </div> -->
            <button class="btn btn-lg btn-dark btn-block" name="bulid" type="submit">繼續</button>
            <button class="btn btn-lg btn-dark btn-block" type="button" onclick="location.href='job.php'">重新選擇</button>
            <p class="mt-5 mb-3 text-muted" style="text-align:center">&copy; 2019 DarkCalamity</p>
        </form>
        
    
</body>
</html>