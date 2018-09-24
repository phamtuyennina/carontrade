<?php
	//error_reporting(0);
	session_start();
	$session=session_id();

	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	include_once _lib."Mobile_Detect.php";
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ?  'phone' : 'computer');
	if($deviceType == 'phone'){
		@define ( '_template' , './m/');		
	}else{
		@define ( '_template' , './templates/');
	}

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";	
	include_once _lib."class.database.php";
	include_once _lib."functions_user.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."breadcrumb.php";
	include_once _lib."file_requick.php";
	include_once _source."counter.php";	
	if($com!='sua-tin' && !empty($_SESSION['dangtin']['fix'])){
		unset($_SESSION['dangtin']);
	}
	if($deviceType=='computer'){
		include_once "index_computer.php";
	}else{
		include_once "index_mobile.php";
	}
?>
