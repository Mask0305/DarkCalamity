<?php

	//角色資訊
	function test($value){
		echo '角色資料<br>';
		echo '生命力='.$value[0].'<br>';
		echo '攻擊力='.$value[1].'<br>';
		echo '技能倍率加成='.$value[2].'%<br>';
		echo '命中率='.$value[3].'%<br>';
		echo '閃避率='.$value[4].'%<br>';
		echo '爆擊率='.$value[5].'%<br>';
		echo '防禦力='.$value[6].'<br>';
		echo '減傷='.$value[7].'%<br>';
		echo '<hr style="border: 0;height: 1px;width:350px; float:left; background: #333; background-image: linear-gradient(to right, #333, #333, #fff);"><br>';
	}

	//爆擊function
	function fatal($fatal){
		$rate = rand(100,0);
		if($rate<=$fatal){
			//echo '爆擊判定: '.$rate.'/'.$fatal.'<br>';
			return true;	//1
		}else{
			return 0;
		}

	}

	//閃避function
	function dodge($att_hit,$def_dodge){
		$value = $att_hit - $def_dodge;	
		//echo '閃避='.$att_hit.'-'.$def_dodge.'<br>';
		//如果結果<0,代表防禦方的閃避較高,則有結果值的機率閃避攻方攻擊 ex:10-15=-5,則有5%機率閃避
		$rate = rand(0,100);
		if($value<0){
			if($rate<=abs($value))		//因為value是負數，需要變成絕對值
			{
				return true;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	//敵人function
	function enemy(){

		return $enemy_ability = array(830,100,50,30,12,40);		//敵人狀態 體攻防命閃爆

	}
	//掉落物function
	function article($chapter){			//傳入的參數代表章節
		//物品存在資料庫
		//這邊寫各章節能得到物品
		
		if($chapter==1){			//第一章能得到的物品
		$art_equ = array(
			111001,111002,111003,111004,111005,111006,
			112001,112002,112003,112004,112005,112006,
			113001,113002,113003,113004,113005,113006);		 //裝備	equipment
		$art_mat = array(210001);	//材料	material
		$art_gro = array(310001,310002,310003);	//雜貨	groceries
		}

		$rate=rand(0,100);
		if($rate<=10){
			$equ = rand(0,count($art_equ)-1);
			$got=$art_equ[$equ];
		}

		if($rate>10 && $rate<=55){
			$mat = rand(0,count($art_mat)-1);
			$got=$art_mat[$mat];
		}

		if($rate>55 && $rate<=100){
			$gro = rand(0,count($art_gro)-1);
			$got=$art_gro[$gro];
		}

			$sql="SELECT `name` FROM `article` WHERE `num`='".$got."'";
			$row=_fetch_array($sql);
			return $row[0];
	}

	//戰鬥function
	function mainbattle(){

		$turn=1;
		$enemy=enemy();			//呼叫敵人資料
		$u_lose = 0;			//初始化我方受到傷害
		$e_lose = 0;			//初始化敵方受到傷害
		if($_SESSION['job']=="warrior"){		//判斷職業決定呼叫的function
			$_SESSION['blood']=0;				//紀錄'流血'觸發
			$_SESSION['chk']=0;					//為了讓'戰吼'只在第一回合echo一次技能名稱
			$user=warrior($turn);				//計算角色資料
			warrior_battle($turn,$user,$enemy,$u_lose,$e_lose);
		}
	
		if($_SESSION['job']=="knight"){		//判斷職業決定呼叫的function
			$_SESSION['blade-drag']=0;		//'揮砍'的減傷，為了傳值給enemy_damage()計算
			$_SESSION['healing']=0;			//判斷有沒有觸發過'光輝',每次戰鬥初始化
			$_SESSION['chk']=0;				//為了讓'虔誠'只在第一回合echo一次技能名稱
			$_SESSION['chke']=0;			//為了讓'堅毅'不要在第一次call角色資料時echo技能名稱
			$user=knight($turn);			//計算角色資料
			knight_battle($turn,$user,$enemy,$u_lose,$e_lose);
		}


		if($_SESSION['job']=="archer"){		//判斷職業決定呼叫的function
			$_SESSION['chk']=0;				//為了讓'動如脫兔'只在第一回合echo一次技能名稱
			$_SESSION['chke']=0;			//為了讓'箭無虛發'只在第一回合echo一次技能名稱
			$_SESSION['cross']=0;			//使用於'屏氣凝神',使其當回合能不發動攻擊,而在下回合發動技能
			$user=archer($turn);			//計算角色資料
			archer_battle($turn,$user,$enemy,$u_lose,$e_lose);
		}
			test($user);			//查看角色資料
		
	}

	//敵人傷害計算
	function enemy_damage($turn,$user,$enemy){

		if($_SESSION['job']=='knight'){
			$reduce = ((100-$_SESSION['blade-drag']-$user[7])/100);		//騎士的技能需額外減傷
			$_SESSION['blade-drag']=0;
			if($turn % 5 ==0){
				$enemy_damage = 0;
				echo'<font style="color:#7700BB">敵人暈眩!</font><br>';	//騎士的技能
				goto j;
			}
		}else{
			$reduce = ((100-$user[7])/100);
		}

		$enemy_damage=$enemy[1];

		$x=fatal($enemy[5]);
		if($x==1){
		 	echo'<font style="color:#FF0000">敵人爆擊!</font><br>';
			$enemy_damage *= 1.5; 
		}
		$x=dodge($enemy[4],$user[4]);		//判斷我方有無閃避
		if($x==1){
			echo "<font style='color:#00DD00'><b>我方閃避!</b><br></font>";
			$enemy_damage *=0.8;
			if($_SESSION['job']=='archer'){$_SESSION['dodge']=1;}
		}
		$enemy_damage -= $user[6];
		//echo '防禦力扣除敵人攻擊'.$enemy_damage.'-'.$user[6].'<br>';
		if($enemy_damage<=0){
			$enemy_damage=1;
		}
		//echo '減傷'.$enemy_damage.'*'.$reduce.'=';
		$enemy_damage *= $reduce;	//計算減傷
		//echo $enemy_damage.'<br>';

		j:
		return round($enemy_damage);

	}


		

/*
axe-swing劈斬:用力揮舞手中的斧頭，造成 125% 傷害，每 2 回合施放一次

shouting戰吼:發出震耳欲聾的咆嘯，戰鬥開始時，增加 10% 攻擊力

battered-axe利斧:造成傷害時， 25% 造成流血，流血每回合造成 8% 攻擊力傷害，持續3回合，重複觸發額外造成110%傷害。

pyromaniac戰意:越戰越勇，戰鬥開始 6 回合後，增加 20% 爆擊率。

decapitation斬殺:給予敵人致命一擊，造成 200% 傷害，每 5 回合施放一次
 */
 
?>