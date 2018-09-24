<?php
session_start();
@define('_source', '../sources/');
@define('_lib', '../lib/');
error_reporting(0);
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "library.php";
include_once _lib . "class.database.php";
$d = new database($config['database']);

$d->reset();
$sql1="select hinhanh FROM table_dangtin where id=".(int)$_POST['id']."";
$d->query($sql1);
$name_tmp1=$d->result_array();
if(!empty($name_tmp1[0]['hinhanh'])){
	$chuoi=explode('|',$name_tmp1[0]['hinhanh']);
}
foreach($chuoi as $v){	
	if(($v!=(string)$_POST['name'])&& $v!=''){
		$image = $v;
		$arr_img[] = $image;
	}
	
}
$hinhanh=implode('|',$arr_img);
delete_file(_upload_tmp_l.(string)$_POST['name']);
$d->query("update table_dangtin set hinhanh='".$hinhanh."' where id=".(int)$_POST['id']."");
echo md5((string)$_POST['name']);
?>
