<?php

function _ability($job,$ability){
	if($job == 'archer' || $job == '弓箭手'){	/* 體x3 / 力x1.6 / 智x0.05 / 敏x0.3 / 幸x0.2 */
		$value[0] = round($ability[0]*3);
		$value[1] = round($ability[1]*1.6);
		$value[2] = round($ability[2]*1.05);
		$value[3] = round($ability[3]*1.3);
		$value[4] = round($ability[4]*1.2);
	}

	if($job == 'warrior' || $job == '戰士'){		/* 體x4 / 力x1.4 / 智x0.05 / 敏x0.3 / 幸x0.2 */
		$value[0] = round($ability[0]*4);
		$value[1] = round($ability[1]*1.4);
		$value[2] = round($ability[2]*1.05);
		$value[3] = round($ability[3]*1.3);
		$value[4] = round($ability[4]*1.2);
	}

	if($job == 'knight' || $job == '騎士'){		/* 體x5 / 力x1.2 / 智x0.05 / 敏x0.2 / 幸x0.2 */
		$value[0] = round($ability[0]*5);
		$value[1] = round($ability[1]*1.2);
		$value[2] = round($ability[2]*1.05);
		$value[3] = round($ability[3]*1.2);
		$value[4] = round($ability[4]*1.2);
	}

	return $value;
}

	function _fetch_array($sql) {
	// mysqli_connect('localhost','root','','darkcalamity');
	return mysqli_fetch_array(filterTable($sql));
	}

	function _fetch_array_value($sql) {
	// mysqli_connect('localhost','root','','darkcalamity');
	$row = mysqli_fetch_array(filterTable($sql));
	return $row[0];
	}

	function _alert($str,$path){
		echo "<script> alert(\"$str\");parent.location.href='../$path';</script>";
	}

?>