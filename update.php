<?php 
	error_reporting(0);
	session_start();
	$session=session_id();

	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";	
	include_once _lib."class.database.php";
	include_once _lib."functions_user.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."breadcrumb.php";
	include_once _lib."file_requick.php";
	include_once _source."counter.php";	
	
	
	$d->reset();
	$sql = "select * from #_dangtin where trangthailuu='0'";
	$d->query($sql);
	$tinmoi = $d->result_array();
	foreach($tinmoi as $v){
		
		$arr=explode('|',$v['hinhanh']);
		foreach($arr as $c){
			delete_file(_upload_tmp_l.$c);
		}
		$d->reset();
		echo $sql = "delete from #_dangtin where id=".$v['id']."";
		$d->query($sql);
	}

?>