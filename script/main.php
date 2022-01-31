<?php 
	
	// Connecttion server
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="test";
	$link=mysqli_connect($servername,$username,$password,$dbname);

	if($connect -> conncet_error){
		die("Bo'glanishda xatolik: ".conncet_error);
	}


// Connecttion server
	$servername="sql100.epizy.com";
	$username="epiz_30781538";
	$password="xtBDyJaF982";
	$dbname="epiz_30781538_test";
	$link=mysqli_connect($servername,$username,$password,$dbname);

	if($connect -> conncet_error){
		die("Bo'glanishda xatolik: ".conncet_error);
	}



 ?>