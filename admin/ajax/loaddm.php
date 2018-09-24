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
$act = $_REQUEST['act'];
switch ($act) {
	case 'list':
		list_($_POST['table'],$_POST['id']);
		break;
	case 'cat':
		cat($_POST['table'],$_POST['id']);
		break;
	case 'kieudang':
		kieudang($_POST['table'],$_POST['id']);
		break;
	case 'item':
		item($_POST['table'],$_POST['id']);
		break;
}
function kieudang($table,$id){
	$sql="select * from table_".$table."_danhmuc where find_in_set(".$id.",id_thuonghieu) and type='kieu-dang' order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_kieudang" name="id_kieudang" data-placeholder="Chọn kiểu dáng" class="main_select select_danhmuc chzn-select">
			<option></option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		echo $str;
}
function list_($table,$id)
	{
		$sql="select * from table_".$table."_list where id_danhmuc=".$id."  order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" data-placeholder="Chọn danh mục" class="main_select select_danhmuc chzn-select">
			<option></option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		echo $str;
	}
function cat($table,$id)
	{
		$sql="select * from table_".$table."_cat where id_list=".$id."  order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" data-placeholder="Chọn danh mục" class="main_select select_danhmuc chzn-select">
			<option></option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		echo $str;
	}
function item($table,$id)
	{
		$sql="select * from table_".$table."_item where id_cat=".$id."  order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_item" name="id_item" data-placeholder="Chọn danh mục" class="main_select select_danhmuc chzn-select">
			<option></option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		echo $str;
	}
?>