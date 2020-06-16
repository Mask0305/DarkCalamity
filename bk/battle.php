<?php
	session_start();
	$_SESSION['job']="warrior";

	include "battle.fuc.php";
	include "db_connect.php";

//戰士
	//戰士數值計算
	function warrior($turn){
		global $fatal;
		global $skill_trigger;
		global $user_ability;
		$ability = array(202,120,40,60,60);				//體力智敏幸
		$equipment = array(0,0,0,0,0,0,0,0);		//裝備賦予能力	生命,攻擊,技能倍率,命中,閃避,爆率,防禦

		$skill_trigger=	warrior_skill($turn,1);				//觸發的技能
		$health = $equipment[0]+($ability[0]*4);									//生命=100+(體*4)
		$att = $equipment[1]+round($ability[1]*1.4)+$skill_trigger[1];				//攻擊力=武器攻擊力+round(力*1.4)  四捨五入
		$skill = ($equipment[2]+round($ability[2]*0.05)+$skill_trigger[0])/100;		//技能倍率加成=round(智*0.05)		每20點+1%
		$hit = $equipment[3]+round($ability[3]*0.3); 								//命中=round(敏捷*0.3)			每10點+3%
		$dodge = $equipment[4]+round($ability[3]*0.2);								//閃避=round(敏捷*0.2)			每10點+2%
		$fatal = $equipment[5]+round($ability[4]*0.2)+$skill_trigger[3];			//爆擊=round(幸運*0.2)			每10點+2%
		$reduce = 0+$equipment[7]+$skill_trigger[2];								//減傷=減傷%
		$user_ability=array($health,$att,$skill,$hit,$dodge,$fatal,$equipment[6],$reduce);
		return $user_ability;
		//生命、攻擊力、技能倍率、命中、閃避、爆及
	}
	//戰士技能觸發
	function warrior_skill($turn,$who){
		$learnskill = array(1,1,1,1,1);							//有學的技能	
			if($who == 1){										//呼叫被動技
				//echo '這是'.$who.'呼叫的<br>';
				if($learnskill[1]==1){
					$skill02 = 1.1;		//+10%

					if(@$_SESSION['chk']==1){					//只在第一回合echo一次
					echo "<font style='color:#5500FF'><b>戰吼</b><br></font>";
						$_SESSION['chk']+=1;
						}else{
							$_SESSION['chk']+=1;
						}
				}else{
					$skill02 = 0;
				}

				if($learnskill[3]==1){
					if($turn >=6){
						$skill04 = 20;
						if($turn==6){echo "<font style='color:#5500FF'><b>越戰越勇</b><br></font>";}	//只在第6回合echo一次
					}else{
						$skill04=0;
					}
				}else{
					$skill04=0;
				}

				$skill01=0;
				$skill03=0;
				$skill05=0;
				goto b;
			}

			if($who == 2){								//呼叫主動技
				//echo '這是'.$who.'呼叫的<br>';
					if($learnskill[0]==1){				//劈斬
						if($turn % 2 == 0){
							$skill01 = 1.25;			//造成額外125%傷害
							echo '<font style="color:#5500FF;"><b>劈斬</b></font><br>';
						}else{
							$skill01 = 0;
						}
					}else{
						$skill01 = 0;
					}

				if($learnskill[2]==1){
					$rate = rand(0,100);
					if($rate<=20){
						if($_SESSION['blood']==0){				//$_SESSION['blood']表示有無流血狀態
						$skill03=1;								//造成流血
						$_SESSION['blood']=1;
						echo '<font style="color:#5500FF;"><b>利斧</b></font><br>';
						goto a;
						}elseif($_SESSION['blood']==1){			//已流血則造成額外傷害
						echo '<font style="color:#FF3333;"><b>利斧傷害</b></font><br>';
						$skill03=1.1;						 	//造成額外110$傷害 
						}
						
					}else{
						$skill03=0;
					
					}
					a:;
				}else{
					$skill03 = 0;
				}
				
				if($learnskill[4]==1){
					if($turn % 5 ==0 && $turn !=0){
						$skill05 = 2;
						echo '<font style="color:#5500FF;"><b>斬殺!</b></font><br>';
					}else{
						$skill05 = 0;
					}
				}else{
					$skill05 = 0;
				}
				$skill02 = 0;
				$skill04 = 0;
			}
			
			b:;
				$skill_check=array($skill01,$skill02,$skill03,$skill04,$skill05);
				//print_r($skill_check);
				return $skill_check;
	}

	//戰士傷害計算
	function warrior_damage($turn,$user,$enemy){
		//公式:攻擊力*(if觸發技能倍率)*(if爆擊*2)*(if(閃避-命中*0.7))-防禦力=傷害
		$user_damage = $user[1];
		$skill_trigger=	warrior_skill($turn,2);
		if($skill_trigger[0]!=0 || $skill_trigger[4] != 0){				//劈斬or斬殺有觸發
			if($skill_trigger[0]!=0 && $skill_trigger[4]==0){			//只觸發劈斬
				$user_damage = $user[1]*($skill_trigger[0]+$user[2]);
			}else if($skill_trigger[0]==0 && $skill_trigger[4]!=0){		//只觸發斬殺
				$user_damage = $user[1]*($skill_trigger[4]+$user[2]);
				//echo $user[1].'*('.$skill_trigger[4].'+'.$user[2].'<br>';
			}else if($skill_trigger[0]!=0 && $skill_trigger[4]!=0){		//斬殺和劈斬都觸發
				$user_damage = $user[1]*($skill_trigger[4]+$user[2])*($skill_trigger[0]+$user[2]);
				//echo $user[1].'*('.$skill_trigger[4].'+'.$user[2].')*('.$skill_trigger[0].'+'.$user[2].')<br>';
			}
		}

		if($skill_trigger[2]==1.1){
			$user_damage = $user[1]*($skill_trigger[2]+$user[2]);		//判定利斧的額外傷害
			//echo $user[1].'*('.$skill_trigger[2].'+'.$user[2].')';
		}

		$x=fatal($user[5]);
		if($x==1){
			//echo $user_damage.'*'.'1.5'.'<br>';
		 	echo'<font style="color:#FF0000">爆擊!</font><br>';
			$user_damage *= 1.5; 										//判定有無爆擊
		}

		$y=dodge($user[4],$enemy[4]);									//判定敵人有無閃躲
		if($y==1){
			//echo $user_damage.'*'.'0.7'.'<br>';
			$user_damage *=0.7;
			echo "<font style='color:#AAAAAA'>閃躲!</font><br>";
		}
		//echo $user_damage.'-'.$enemy[2].'<br>';
		$user_damage -= $enemy[2];
		if($user_damage<=0){
			$user_damage = 1;
		}
		return intval($user_damage);
	}

	//戰士戰鬥計算
	function warrior_battle($turn,$user,$enemy,$u_lose,$e_lose){
		do{
		echo '第'.$turn.'回合<br>';
		$user=warrior($turn);
		$u_damage = warrior_damage($turn,$user,$enemy);
		$e_damage = enemy_damage($turn,$user,$enemy);
		$u_life=$user[0]- $u_lose;	//我方總生命-總受傷害,意思即是我方在受到上回合傷害後所剩的血量
		echo '敵人生命'.$enemy[0]." | ";
		//error_reporting(0);
		echo '我方生命'.$u_life;	//扣除我方生命
		echo '<br>';
		echo '對敵人造成'.$u_damage.'點傷害<br>';
		 if($_SESSION['blood']==1){

		 	@$i++;
		 	if($i % 4 !=0){
		 	 $enemy[0]-= round($user[1]*0.08);
		 	 	if($i % 3 ==0){ $_SESSION['blood']=0; $i=0;}
		 	 //	if($i % 4 ==0){goto c;}// 第三回合結束變成0，第4回合開始變成1
		 	 	echo '<font style="color:#FF3333;">造成'.round($user[1]*0.08).'流血傷害</font><br>';
		 	}else{
		 		$_SESSION['blood']=0;
		 	}
		 }
		 c:
		echo '敵人對我方造成'.$e_damage.'點傷害<br>';

		$e_lose = $u_damage;		//敵人損失的生命
		$enemy[0] -= $e_lose;		//扣除敵人生命
		$u_lose += $e_damage;		//總計我方損失的生命
		$turn++;
		// echo '流血狀態'.$_SESSION['blood'].'<br>';
		
		echo '<hr style="border: 0;height: 1px;width:350px; float:left; background: #333; background-image: linear-gradient(to right, #333, #333, #fff);"><br>';

		if($user[0]-$u_lose<=0 || $enemy[0]<=0){
		   if($user[0]-$u_lose<=0 && $enemy[0]<=0){
		   		echo '敵人生命'.'0'.' | ';
		   		echo '我方生命0';
		   		echo '<p style="color:red"><b>戰鬥平手!<p>';
		   }else if($user[0]-$u_lose<=0){
		   		echo '敵人生命'.$enemy[0].' | ';
		   		echo '我方生命0';
				echo '<p style="color:red"><b>戰鬥失敗!<p>';
				}else if($enemy[0]<=0){
				echo '敵人生命'.'0'.' | ';
		   		echo '我方生命';
		   		echo @$u_life-$e_damage;
				echo '<p style="color:red"><b>戰鬥勝利!<p>';

				echo '獲得了:'.article(1).' !<br>';
				}
			}

		}while($enemy[0]>0 && $user[0]-$u_lose>0);
	}


//騎士
	//騎士數值計算
	function knight($turn){
		global $fatal;
		global $skill_trigger;
		global $user_ability;
		$ability = array(125,40,55,40,80);				//體力智敏幸
		$equipment = array(648,104,15,16,25,31,55,5);		//裝備賦予能力	生命,攻擊,技能倍率,命中,閃避,爆率,防禦,減傷

		$skill_trigger=	knight_skill($turn,1);			//觸發的技能
		$health = round(($equipment[0]+($ability[0]*6))*$skill_trigger[1]);				//生命=100+(體*6)
		$att = $equipment[1]+round($ability[1]*1.2);								//攻擊力=武器攻擊力+round(力*1.2)  四捨五入
		$skill = ($equipment[2]+round($ability[2]*0.05))/100;						//技能倍率加成=round(智*0.05)		每20點+1%
		$hit = $equipment[3]+round($ability[3]*0.3); 								//命中=round(敏捷*0.3)			每10點+3%
		$dodge = $equipment[4]+round($ability[3]*0.2);								//閃避=round(敏捷*0.2)			每10點+2%
		$fatal = $equipment[5]+round($ability[4]*0.2);								//爆擊=round(幸運*0.2)			每10點+2%
		//這裡只有堅毅的減傷
		$reduce = $equipment[7]+$skill_trigger[2];						//減傷=100-減傷%
		$user_ability=array($health,$att,$skill,$hit,$dodge,$fatal,$equipment[6],$reduce);
		return $user_ability;
		//生命、攻擊力、技能倍率、命中、閃避、爆及
	}
	//騎士技能觸發
	function knight_skill($turn,$who){
		$learnskill = array(1,1,1,1,1);
		if($who==1){		//能力值

			if($learnskill[1]==1){		//虔誠
				$skill02 = 1.1;
				if(@$_SESSION['chk']==1){					//只在第一回合echo一次
					echo "<font style='color:#5500FF'><b>虔誠!</b><br></font>";
						$_SESSION['chk']+=1;
						}else{
							$_SESSION['chk']+=1;
						}
			}else{
				$skill02 = 0;
			}

			if($learnskill[2]==1){		//堅毅
				$rate = rand(0,100);
				if($rate<=35){
					$skill03 = 20;
					if(@$_SESSION['chke']==1){					//只在第一回合echo一次
					echo "<font style='color:#5500FF'><b>堅毅!</b><br></font>";
						$_SESSION['chk']+=1;
						}else{
							$_SESSION['chke']+=1;
						}
				}else{
					$skill03 = 0;
				}
			}else{
				$skill03 = 0;
			}

			$skill01=0;
			$skill04=0;
			$skill05=0;
		}

		if($who==2){		//傷害
			if($learnskill[0]==1){		//揮砍
				if($turn % 2 ==0){
				$skill01 = 1.15;
				echo "<font style='color:#5500FF'><b>揮砍!</b><br></font>";
				}else{
					$skill01 = 0;
				}
			}else{
				$skill01 = 0;
			}

			if($learnskill[4]==1){		//懲戒
				if($turn % 5 == 0){
				$skill05 = 1.5;
				echo "<font style='color:#5500FF'><b>懲戒!</b><br></font>";
				}else{
					$skill05 = 0;
				}
			}else{
				$skill05 = 0;
			}
			$skill02=0;
			$skill03=0;
			$skill04=0;
		}

		if($who==3){
			if($_SESSION['healing']!=1){	//判斷有沒有觸發過
				if($learnskill[3]==1){		//光輝			另外處理
					$skill04 = 1;
					$_SESSION['healing']=1;
				}else{
					$skill04 = 0;
				}
			}else{
				$skill04 = 0;
			}

			$skill01=0;
			$skill02=0;
			$skill03=0;
			$skill05=0;
		}

		$skill_check=array($skill01,$skill02,$skill03,$skill04,$skill05);
				//print_r($skill_check);
				return $skill_check;
	}
	//騎士傷害計算
	function knight_damage($turn,$user,$enemy){
		//公式:攻擊力*(if觸發技能倍率)*(if爆擊*2)*(if(閃避-命中*0.7))-防禦力=傷害
		$user_damage = $user[1];
		$skill_trigger=	knight_skill($turn,2);
		
		if($skill_trigger[0]!=0){			//揮砍
			//echo $user_damage.'*'.$skill_trigger[0].'+'.$user[2].'=';
			$user_damage *= ($skill_trigger[0]+$user[2]);
			$_SESSION['blade-drag']=5;
			
		}
		//echo $user_damage.'<br>';

		if($skill_trigger[4]!=0){			//懲戒
		//	echo $user_damage.'*'.$skill_trigger[4].'+'.$user[2].'=';
			$user_damage *= ($skill_trigger[4]+$user[2]);
		
		}
		//echo $user_damage.'<br>';
		$x=fatal($user[5]);
		if($x==1){
			//echo $user_damage.'*'.'1.5'.'<br>';
		 	echo'<font style="color:#FF0000">爆擊!</font><br>';
			$user_damage *= 1.5; 										//判定有無爆擊
		}

		$y=dodge($user[4],$enemy[4]);									//判定敵人有無閃躲
		if($y==1){
			//echo $user_damage.'*'.'0.7'.'<br>';
			$user_damage *=0.7;
			echo "<font style='color:#AAAAAA'>敵人閃躲!</font><br>";
		}
		//echo $user_damage.'-'.$enemy[2].'<br>';
		$user_damage -= $enemy[2];
		if($user_damage<=0){
			$user_damage = 1;
		}
		return round($user_damage);
	}
	//騎士戰鬥計算
	function knight_battle($turn,$user,$enemy,$u_lose,$e_lose){
		do{
		echo '第'.$turn.'回合<br>';
		$user=knight($turn);
		$u_damage = knight_damage($turn,$user,$enemy);
		$e_damage = enemy_damage($turn,$user,$enemy);
		$u_life=$user[0]- $u_lose;			//我方總生命-總受傷害,意思即是我方在受到上回合傷害後所剩的血量
		if($u_life<=($user[0]/2)){

			$healing = knight_skill($turn,3);//call光輝技能
			if($healing[3]==1){
				
				$u_lose -= round($user[0]*0.2);	//把我方總受傷害減掉我方總生命的20%,變向補血
				$u_life=$user[0]- $u_lose;
				echo '<font style="color:#00FF00;">光輝!恢復'.round($user[0]*0.2).'點血量<br></font>';
			}
		}
		echo '敵人生命'.$enemy[0]." | ";
		//error_reporting(0);
		echo '我方生命'.$u_life;	//扣除我方生命
		echo '<br>';
		echo '對敵人造成'.$u_damage.'點傷害<br>';
		echo '敵人對我方造成'.$e_damage.'點傷害<br>';

		$e_lose = $u_damage;		//敵人損失的生命
		$enemy[0] -= $e_lose;		//扣除敵人生命
		$u_lose += $e_damage;		//總計我方損失的生命
		$turn++;

		echo '<hr style="border: 0;height: 1px;width:350px; float:left; background: #333; background-image: linear-gradient(to right, #333, #333, #fff);"><br>';

		if($user[0]-$u_lose<=0 || $enemy[0]<=0){
		   if($user[0]-$u_lose<=0 && $enemy[0]<=0){
		   		echo '敵人生命'.'0'.' | ';
		   		echo '我方生命0';
		   		echo '<p style="color:red"><b>戰鬥平手!<p>';
		   }else if($user[0]-$u_lose<=0){
		   		echo '敵人生命'.$enemy[0].' | ';
		   		echo '我方生命0';
				echo '<p style="color:red"><b>戰鬥失敗!<p>';
				}else if($enemy[0]<=0){
				echo '敵人生命'.'0'.' | ';
		   		echo '我方生命';
		   		echo @$u_life-$e_damage;
				echo '<p style="color:red"><b>戰鬥勝利!<p>';
				echo '獲得了:'.article(1).' !<br>';
				}
			}

		}while($enemy[0]>0 && $user[0]-$u_lose>0);
	}



//弓箭手
	//弓箭手數值計算
	function archer($turn){
		global $fatal;
		global $skill_trigger;
		global $user_ability;
		$ability = array(125,40,55,40,80);					//體力智敏幸
		$equipment = array(648,154,15,16,25,31,55,5);		//裝備賦予能力	生命,攻擊,技能倍率,命中,閃避,爆率,防禦,減傷

		$skill_trigger=	archer_skill($turn,1);				//觸發的技能
		$health = round(($equipment[0]+($ability[0]*3)));							//生命=100+(體*3)
		$att = $equipment[1]+round($ability[1]*1.6);								//攻擊力=武器攻擊力+round(力*1.6)  四捨五入
		$skill = ($equipment[2]+round($ability[2]*0.05)+$skill_trigger[1])/100;		//技能倍率加成=round(智*0.05)		每20點+1%
		$hit = $equipment[3]+round($ability[3]*0.3)+$skill_trigger[3]; 				//命中=round(敏捷*0.3)			每10點+3%
		$dodge = $equipment[4]+round($ability[3]*0.2);								//閃避=round(敏捷*0.2)			每10點+2%
		$fatal = $equipment[5]+round($ability[4]*0.2);								//爆擊=round(幸運*0.2)			每10點+2%
		$reduce = $equipment[7];													//減傷=100-減傷%
		$user_ability=array($health,$att,$skill,$hit,$dodge,$fatal,$equipment[6],$reduce);
		return $user_ability;
		//生命、攻擊力、技能倍率、命中、閃避、爆及
	}
	//archer技能觸發
	function archer_skill($turn,$who){
		$learnskill = array(1,1,1,1,1);
		if($who==1){		//能力值
			if($learnskill[1]==1){		//獵手印記
				$skill02 = 8;
				if(@$_SESSION['chk']==1){					//只在第一回合echo一次
					echo "<font style='color:#5500FF'><b>獵手印記!</b><br></font>";
						$_SESSION['chk']+=1;
						}else{
							$_SESSION['chk']+=1;
						}
			}else{
				$skill02 = 0;
			}

			if($learnskill[3]==1){		//箭無虛發
				$skill04 = 12;
				if(@$_SESSION['chke']==1){					//只在第一回合echo一次
					echo "<font style='color:#5500FF'><b>箭無虛發!</b><br></font>";
						$_SESSION['chke']+=1;
						}else{
							$_SESSION['chke']+=1;
						}
			}else{
				$skill04 = 0;
			}

			$skill01=0;
			$skill03=0;
			$skill05=0;

		}

		if($who==2){		//傷害
			if($learnskill[0]==1){		//穩固射擊
				if($turn % 2 ==0){
					$skill01 = 1.3;
					echo "<font style='color:#5500FF'><b>穩固射擊!</b><br></font>";
					}else{
						$skill01=0;
					}
			}else{
				$skill01 = 0;
			}

			if($learnskill[2]==1){		//動如脫兔
				$skill03 = 1.18;
			}else{
				$skill03 = 0;
			}

			if($learnskill[4]==1){		//屏氣凝神
				if($turn % 5 ==0){
				$skill05 = 2.5;
				echo "<font style='color:#5500FF'><b>屏氣凝神!</b><br></font>";
				}else{
					$skill05 = 0;
				}
			}else{
				$skill05 = 0;
			}

			$skill02=0;
			$skill04=0;
		}

		$skill_check=array($skill01,$skill02,$skill03,$skill04,$skill05);
				//print_r($skill_check);
				return $skill_check;
	}
	//archer傷害計算
	function archer_damage($turn,$user,$enemy){
		//公式:攻擊力*(if觸發技能倍率)*(if爆擊*2)*(if(閃避-命中*0.7))-防禦力=傷害
		$user_damage = $user[1];
		$skill_trigger=	archer_skill($turn,2);

		if($skill_trigger[4]!=0 || $_SESSION['cross']==1){
			if($_SESSION['cross']==0){										//屏氣凝神
				$_SESSION['cross']=1;
				$user_damage=0;
				goto o;
			}else if($_SESSION['cross']==1){
				$user_damage *= (2.5+$user[2])*1.5;			//250%傷害+必定爆擊,直接打數字是因為此時屏氣凝神的技能判定已變成0
				$_SESSION['cross']=0;										//重置判定
				goto p;
			}
		}

		if($skill_trigger[0]!=0){											//穩固射擊
			$user_damage *= ($skill_trigger[0]+$user[2]);
		}

	

		//echo $user_damage.'<br>';
		$x=fatal($user[5]);
		if($x==1){
			//echo $user_damage.'*'.'1.5'.'<br>';
		 	echo'<font style="color:#FF0000">爆擊!</font><br>';
			$user_damage *= 1.5; 										//判定有無爆擊
		}

		p:;																//已計算過爆擊,所以跳過爆擊
		if($_SESSION['dodge']==1){
			echo "<font style='color:#5500FF'><b>動如脫兔!</b><br></font>";
			$user_damage *= ($skill_trigger[2]+$user[2]);				//動如脫兔
			$_SESSION['dodge']=0;
		}
		$y=dodge($user[4],$enemy[4]);									//判定敵人有無閃躲
		if($y==1){
			//echo $user_damage.'*'.'0.7'.'<br>';
			$user_damage *=0.7;
			echo "<font style='color:#AAAAAA'>敵人閃躲!</font><br>";
		}
		//echo $user_damage.'-'.$enemy[2].'<br>';
		$user_damage -= $enemy[2];
		if($user_damage<=0){
			$user_damage = 1;
		}
		o:;																//觸發屏氣凝神,當回合暫停攻擊
		return round($user_damage);
	}
	//archer戰鬥計算
	function archer_battle($turn,$user,$enemy,$u_lose,$e_lose){
		do{
		echo '第'.$turn.'回合<br>';
		$user=archer($turn);
		$e_damage = enemy_damage($turn,$user,$enemy);
		$u_damage = archer_damage($turn,$user,$enemy);
		$u_life=$user[0]- $u_lose;			//我方總生命-總受傷害,意思即是我方在受到上回合傷害後所剩的血量

		echo '敵人生命'.$enemy[0]." | ";
		//error_reporting(0);
		echo '我方生命'.$u_life;	//扣除我方生命
		echo '<br>';
		echo '對敵人造成'.$u_damage.'點傷害<br>';
		echo '敵人對我方造成'.$e_damage.'點傷害<br>';

		$e_lose = $u_damage;		//敵人損失的生命
		$enemy[0] -= $e_lose;		//扣除敵人生命
		$u_lose += $e_damage;		//總計我方損失的生命
		$turn++;

		echo '<hr style="border: 0;height: 1px;width:350px; float:left; background: #333; background-image: linear-gradient(to right, #333, #333, #fff);"><br>';

		if($user[0]-$u_lose<=0 || $enemy[0]<=0){
		   if($user[0]-$u_lose<=0 && $enemy[0]<=0){
		   		echo '敵人生命'.'0'.' | ';
		   		echo '我方生命0';
		   		echo '<p style="color:red"><b>戰鬥平手!<p>';
		   }else if($user[0]-$u_lose<=0){
		   		echo '敵人生命'.$enemy[0].' | ';
		   		echo '我方生命0';
				echo '<p style="color:red"><b>戰鬥失敗!<p>';
				}else if($enemy[0]<=0){
				echo '敵人生命'.'0'.' | ';
		   		echo '我方生命';
		   		echo @$u_life-$e_damage;
				echo '<p style="color:red"><b>戰鬥勝利!<p>';
				echo '獲得了:'.article(1).' !<br>';
				}
			}

		}while($enemy[0]>0 && $user[0]-$u_lose>0);
	}





/* 

	charged-arrow穩固射擊:全神貫注射出一箭，造成 130% 傷害，每 2 回合施放一次。	2

	arrow-scope射手印記:追殺目標直至獵物死亡，提升 8% 技能傷害。	1

	sprint動如脫兔:習慣於林中穿梭而練就敏捷的身手，閃避攻擊時，當回傷害提高 18% 。	2

	william-tell-skull箭無虛發:經過無數次的狩獵已不會失誤，戰鬥開始時，提高 12% 命中。	1

	crosshair-arrow屏氣凝神:仔細瞄準，射出關鍵的一箭，暫停攻擊一回合，下一回必定爆擊並造成額外 250% 傷害。	2

*/

	mainbattle();

?>