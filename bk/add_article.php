<?php
include "db_connect.php";

		$art_equ = array(
			111001,111002,111003,111004,111005,111006,
			112001,112002,112003,112004,112005,112006,
			113001,113002,113003,113004,113005,113006);		 //裝備	equipment
		$name = array('稍舊的斧頭(斧)','村長的頭盔(鎧)','村長的胸甲(鎧)','村長的手甲(鎧)','村長的褲甲(鎧)','村長的鞋甲(鎧)',
					  '稍舊的長劍(劍)','村長的頭甲(鎖)','村長的鎖甲(鎖)','村長的臂甲(鎖)','村長的腿甲(鎖)','村長的脛甲(鎖)',
					  '稍舊的短弓(弓)','村長的皮帽(皮)','村長的皮甲(皮)','村長的手套(皮)','村長的褲子(皮)','村長的鞋子(皮)');
		$art_mat = array(210001);	//材料	material
		$art_gro = array(310001,310002,310003);

		//$fields = implode(",",array_keys($art_equ)); 
		$values = implode(",",$art_equ);
		$nname = implode(",",$name);
		//echo $fields;
		//echo'<br>';
		//echo $values; 
		//echo mb_substr($nname,0,8,"UTF-8");
		$j=0;
		$z=0;
		for($i=1;$i<=18;$i++){
			/*echo substr($values,$j,6);
			echo '/';
			echo mb_substr($nname,$z,8,"UTF-8");
			echo '/';
			echo substr($values,$j,1);
			echo ',';
			*/
			$sql_val1= substr($values,$j,6);
			$sql_val2= substr($values,$j,1);
			$sql_name= mb_substr($nname,$z,8,"UTF-8");
			if($sql_val2==1){$sql_val2="裝備";}
			$z+=9;
			$j+=7;
			//$sql="INSERT INTO `article`(`num`,`name`,`type`) VALUES ('".$sql_val1."','".$sql_name."','".$sql_val2."')" ;
			//$result=filterTable($sql);
		}
		//$sql=""

?>