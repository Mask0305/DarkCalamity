<?php
include "db_connect.php";
session_start();

	if(isset($_POST['register'])){
		$email=$_POST['email'];
		$account=$_POST['account'];
		$name=$_POST['nickname'];
		$password=md5(sha1(md5($_POST['password'])));
		$uni=$_POST['uni'];
		$sql="SELECT `account` FROM `user` WHERE `account`='".$account."'";		//檢測帳號有無重複
		$sql1="SELECT `name` FROM `user` WHERE `name`='".$name."'";				//檢測名稱有無重複
		if(!_fetch_array($sql)){
			if(!_fetch_array($sql1)){
			$sql="INSERT INTO `user`(`email`,`name`,`account`,`password`,`unicode`) VALUES ('".$email."','".$name."','".$account."','".$password."','".$uni	."')";		//存入使用者資料
			$result=filterTable($sql);
			$sql1="SELECT `Id` FROM `user` WHERE `account`='".$account."'";		//取出剛註冊的使用者ID
			$row = _fetch_array($sql1);
			echo $row[0];
			$sql2="INSERT INTO `characters`(`Id`,`unicode`) VALUES ('".$row[0]."','".$uni."')";		//預先建立角色資料
			$result=filterTable($sql2);
			$verification='http://'.$_SERVER["HTTP_HOST"].substr($_SERVER['PHP_SELF'],0,13).'/active.php'.'?action=ok&amp;active='.$uni;
			mailer($email,$verification);

		_alert('註冊成功,請至註冊信箱收取認證信以完成註冊','login.php');
			}else{
				echo "<script> alert('名稱已有人使用!');history.go(-1);</script>";
			}
		}else{
			echo "<script> alert('帳號已有人使用!');history.go(-1);</script>";
		}
	}

	if(isset($_POST['login'])){
		$account=$_POST['account'];
		$password=md5(sha1(md5($_POST['password'])));
		$sql0="SELECT `active` FROM `user` WHERE `account`='".$account."'";		//撈信箱認證
		$sql1="SELECT `account` FROM `user` WHERE `account`='".$account."'";	//撈帳號
		$sql2="SELECT `password` FROM `user` WHERE `account`='".$account."'";	//撈密碼
		$sql3="SELECT `name` FROM `user` WHERE `account`='".$account."'";		//撈遊戲暱稱
		$sql4="SELECT `unicode` FROM `user` WHERE `account`='".$account."'";	//撈unicode
			
			if(_fetch_array($sql1)){					//判斷有沒有此帳號
				$row=_fetch_array($sql2);
					if($row[0]==$password){				//判斷帳號對應的密碼是否與輸入的相符
						$act=_fetch_array($sql0);
						if($act[0]=='ok'){				//檢查有沒有通過信箱認證
							$result=_fetch_array($sql3);
							$uni = _fetch_array($sql4);
							setcookie('user',$result[0],time()+606024*30,"/Darkcalamity");
							setcookie('savecode',$uni[0],time()+606024*30,"/Darkcalamity");
							$_SESSION['user']=$account;
							$_SESSION['nickname']=$result[0];
							$sql="SELECT `job` FROM `characters` WHERE `unicode` = '".$uni[0]."'";
							$job =  _fetch_array_value($sql);
							if($job != null){
								$_SESSION['job'] = $job;
								_alert("歡迎回來!冒險者".$_SESSION['nickname'],'game/index.php');			//導入遊戲首頁

							}else{
								_alert("初來乍到的勇者,你是誰?",'job.php');
							}
							}else{
								$sql4="SELECT `email` FROM `user` WHERE `account`='".$account."'";
								$temp=_fetch_array($sql4);
								$_SESSION['tempemail']=$temp[0];
								echo "<script> alert('您尚未認證信箱,無法進行遊戲,將導向信箱認證頁面');parent.location.href='../active.php';</script>";
							}
						}else{
							_alert('登入失敗,帳號或密碼錯誤','login.php');
						}
				}else{
					_alert('登入失敗,帳號或密碼錯誤','login.php');
				}
	}

	if(isset($_POST['sendmail'])){
		$email=$_POST['email'];
		$sql="SELECT `unicode` FROM `user` WHERE `email`='".$email."'";
		$uni=_fetch_array($sql);
		$verification='http://'.$_SERVER["HTTP_HOST"].substr($_SERVER['PHP_SELF'],0,13).'/active.php'.'?action=ok&amp;active='.$uni[0];
		mailer($email,$verification);
		_alert('驗證信已寄出,請至信箱查看','login.php');
	}

	if(isset($_POST['bulid'])){
		$_data[0] = $_POST['job'];			//職業
		$_data[1] = $_POST['race'];			//種族
		$_data[2] = $_POST['physique'];		//體質
		$_data[3] = $_POST['power'];		//力量
		$_data[4] = $_POST['wisdom'];		//智慧
		$_data[5] = $_POST['agile'];		//敏捷
		$_data[6] = $_POST['lucky'];		//幸運

		$sql0 = "SELECT `Id` FROM `user` WHERE `unicode` = '".$_COOKIE['savecode']."'";
		$row = _fetch_array($sql0);

		$sql = "UPDATE `characters` SET 
				`characters`.`job` = '$_data[0]',
				`characters`.`race` = '$_data[1]',
				`characters`.`physique` = '$_data[2]',
				`characters`.`power` = '$_data[3]',
				`characters`.`wisdom` = '$_data[4]',
				`characters`.`agile` = '$_data[5]',
				`characters`.`lucky` = '$_data[6]'
				WHERE `Id` = '".$row[0]."'";
		$_SESSION['job'] = $_data[0];
		$result = filterTable($sql);
		switch($_data[0]){
		    case 'archer':
		        $job = '弓箭手';
		        break;
		    case 'warrior':
		        $job = '戰士';
		        break;
		    case 'knight':
		        $job = '騎士';
		        break;
			}
		_alert('原來是萬餘年前驍勇的'.$job.',請拯救滄瀾大陸吧！','game/index.php');
	}



function mailer($addres,$ver){

		require_once('PHPMailer_5.2.4/class.phpmailer.php');
			         $mail = new PHPMailer();
			         $mail->isSMTP();
			         $mail->SMTPAuth = true;
			         $mail->SMTPSecure = 'ssl';
			         $mail->Host = 'smtp.gmail.com';
			         $mail->Port = '465';
			         $mail->isHTML();
			         $mail->Username = 'DarkcalamityTM@gmail.com';
			         $mail->Password = 'dark099553';
			         $mail->SetFrom('no-reply@DarkCalamity.com');
			         $mail->Subject = "DarkCalamity";
			         $mail->Body = "<p>歡迎加入DarkCalamity!請點擊以下連結啟用帳號</p><a href='$ver'>按我啟用</a>";
			         $mail->AddAddress($addres);
			         $mail->Send();
}

?>