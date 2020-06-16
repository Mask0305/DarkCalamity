<?php

	
function filterTable($query)
	{
		$dbType   = 'MySQL';
		$host     = 'localhost';
		$dbName   = 'darkcalamity';
		$userName = 'root';
		$pwd      = '0000';
		
		$dbh = mysqli_connect($host, $userName, $pwd, $dbName) or die("Error " . mysqli_error($dbh));
		//$dbh = mysqli_connect($host, $userName, $pwd, $dbName);
	    mysqli_query($dbh, "SET NAMES 'utf8'");
	    $filter_Result = mysqli_query($dbh, $query);
	    return $filter_Result;
	}
	require "main.fuc.php";

	?>