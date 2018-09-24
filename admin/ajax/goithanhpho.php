<?php
session_start();
	@define ( '_template' , '../templates/');
	@define ( '_source' , '../sources/');
	@define ( '_lib' , '../lib/');
		
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."pclzip.php";
	include_once _lib."class.database.php";	
	include_once _lib."config.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	$act = $_POST['act'];
	switch($act){
		case "city":
			city($_POST['id']);
			break;
		case "hangxe":
			hangxe($_POST['id']);
			break;
		case "kieuxe":
			mauxe($_POST['id']);
			break;
		
		default:
			break;
	}
function hangxe($id){
	global $d;
	$id=(int)$_POST['id'];
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='kieu-dang' and FIND_IN_SET(".$id.",id_thuonghieu) order by stt,id desc";
	$d->query($sql);
	$kieudang=$d->result_array();	
	$return='<option value="">Chọn kiểu dáng</option>';
	foreach($kieudang as $v){
		$return.='<option value="'.$v['id'].'">'.$v['ten'].'</option>';
	}
	$rs['kieudang']=$return;
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='mau-xe' and FIND_IN_SET(".$id.",id_thuonghieu) order by stt,id desc";
	$d->query($sql);
	$mauxe=$d->result_array();	
	$return1='<option value="">Chọn mẫu xe</option>';
	foreach($mauxe as $v){
		$return1.='<option value="'.$v['id'].'">'.$v['ten'].'</option>';
	}
	
	$rs['mauxe']=$return1;
	echo json_encode($rs);
}	
function mauxe(){
	global $d;
	$id=(int)$_POST['id'];
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='mau-xe' and FIND_IN_SET(".$id.",id_kieudang) order by stt,id desc";
	$d->query($sql);
	$mauxe=$d->result_array();	
	$return1='<option value="">Chọn mẫu xe</option>';
	foreach($mauxe as $v){
		$return1.='<option value="'.$v['id'].'">'.$v['ten'].'</option>';
	}
	
	$rs['mauxe']=$return1;
	echo json_encode($rs);
}
function city($id){
	global $d;
	$sql="select * from table_place_dist where id_city=".$id."  order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="dist" name="dist" class="main_select select_danhmuc">
			<option>Chọn quận huyện</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			$str.='<option value='.$row["id"].'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		echo $str;
}
 ?>