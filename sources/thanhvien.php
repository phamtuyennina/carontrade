<?php  if(!defined('_source')) die("Error");
	error_reporting(0);
	if(empty($_SESSION[$login_name_w])){
		redirect("../dang-nhap.html");
	}	
	switch($_GET['step']){
		case 'quan-ly':
		  
			$template="thanhvien/man";
			$title = "Quản lý tài khoản thành viên";
			$title_cat = "Quản lý tài khoản thành viên";
			break;
		case 'tin-dang-ban':
			get_tindangban();
			$template="thanhvien/quanlytin";
			$title = "Quản lý tin đang bán";
			$title_cat = "Quản lý tin đang bán";
			break;
		case 'tin-luu':
			get_tinyeuthich();
			$template="thanhvien/luutin";
			$title = "Quản lý tin đã lưu";
			$title_cat = "Quản lý tin đã lưu";
			break;
		case 'tin-cho-duyet':
			get_tindoiduyet();
			$template="thanhvien/quanlytin";
			$title = "Quản lý tin chưa duyệt";
			$title_cat = "Quản lý tin chưa duyệt";
			break;
		case 'tin-bi-tu-choi':
			get_tinbituchoi();
			$template="thanhvien/tintuchoi";
			$title = "Quản lý tin bị từ chối";
			$title_cat = "Quản lý tin bị từ chối";
			break;
		case 'tin-da-luu':
			get_tinluunhap();
			$template="thanhvien/quanlytinnhap";
			$title = "Quản lý tin đã lưu";
			$title_cat = "Quản lý tin đã lưu";
			break;
		case 'danh-gia':
			get_danhgia();
			$template="thanhvien/danhgia";
			$title = "Quản lý đánh giá";
			$title_cat = "Quản lý đánh giá";
			break;
		
		case 'thong-tin-ca-nhan':
			get_user();
			$template="thanhvien/taikhoan";
			$title = "Quản lý thông tin cá nhân";
			$title_cat = "Quản lý thông tin cá nhân";
			break;
		
		default: 
			$template="thanhvien/man";
			$title = "Quản lý tài khoản thành viên";
			$title_cat = "Quản lý tài khoản thành viên";
			break;
	}
function get_tinyeuthich(){
	global $d,$item_yeuthich;
	$d->reset();
	$sql="select id,ten$lang as ten, tenkhongdau FROM table_dangtin where hienthi=1 and kiemduyet=1 and id in(select luutin from table_thanhvien where id=".$_SESSION['user_w']['id'].")";
	$d->query($sql);
	$item_yeuthich = $d->result_array();
}	
function get_user(){
	global $d,$items;
	$d->reset();
	$sql = "select * from #_thanhvien where id='".$_SESSION['user_w']['id']."'";
	$d->query($sql);
	$items = $d->fetch_array();
}
function get_danhgia(){
	global $d, $count_dg, $url_link,$totalRows , $pageSize, $offset,$paging,$urlcu,$loaidanhgia,$item_user;
	$d->reset();
	$sql = "select id,ten$lang as ten from #_loaidanhgia where type='user' order by stt asc";
	$d->query($sql);
	$loaidanhgia = $d->result_array();	
	$where="type='user' and user_danhgia=".$_SESSION['user_w']['id']." group by id_user order by ngaytao desc";
	$item_user=get_user();

	$d->reset();
	$sql = "SELECT id AS numrows FROM #_danhgia where $where";
	$d->query($sql);	
	$dem = $d->result_array();
	
	$totalRows = count($dem);
	$page = $_GET['p'];
	$pageSize = 20;
	$offset = 5;
	if ($page == "")$page = 1;
	else $page = $_GET['p'];
	$page--;
	$bg = $pageSize*$page;	
	
	$d->reset();
	$sql = "select * from #_danhgia where $where limit $bg,$pageSize";
	$d->query($sql);
	$count_dg = $d->result_array();
	
	$url_link = getCurrentPageURL();
}	
function get_tindangban(){
	global $d, $items1, $url_link,$totalRows , $pageSize, $offset,$paging,$urlcu;
	$where =" and id_user=".$_SESSION['user_w']['id']." and trangthailuu=2 and kiemduyet=1 and hienthi=1";
	$where.=" order by stt,id desc";
	$sql="SELECT count(id) AS numrows FROM #_dangtin where id<>0 $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=20;
	$offset=10;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_dangtin where id<>0 $where limit $bg,$pageSize";		
	$d->query($sql);
	$items1 = $d->result_array();
	$url_link = getCurrentPageURL();
	
}
function get_tinluunhap(){
	global $d, $items1, $url_link,$totalRows , $pageSize, $offset,$paging,$urlcu;
	$where =" and id_user=".$_SESSION['user_w']['id']." and trangthailuu=1 and kiemduyet=0 and hienthi=1";
	$where.=" order by stt,id desc";
	$sql="SELECT count(id) AS numrows FROM #_dangtin where id<>0 $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=20;
	$offset=10;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_dangtin where id<>0 $where limit $bg,$pageSize";		
	$d->query($sql);
	$items1 = $d->result_array();
	$url_link = getCurrentPageURL();
	
}
function get_tinbituchoi(){
	global $d, $items1, $url_link,$totalRows , $pageSize, $offset,$paging,$urlcu;
	$where =" and id_user=".$_SESSION['user_w']['id']." and trangthailuu=2 and kiemduyet=2 and hienthi=1";
	$where.=" order by stt,id desc";
	$sql="SELECT count(id) AS numrows FROM #_dangtin where id<>0 $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=20;
	$offset=10;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_dangtin where id<>0 $where limit $bg,$pageSize";		
	$d->query($sql);
	$items1 = $d->result_array();
	$url_link = getCurrentPageURL();
	
}
function get_tindoiduyet(){
	global $d, $items1, $url_link,$totalRows , $pageSize, $offset,$paging,$urlcu;
	$where =" and id_user=".$_SESSION['user_w']['id']." and trangthailuu=2 and kiemduyet=0 and hienthi=1";
	$where.=" order by stt,id desc";
	$sql="SELECT count(id) AS numrows FROM #_dangtin where id<>0 $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=20;
	$offset=10;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_dangtin where id<>0 $where limit $bg,$pageSize";		
	$d->query($sql);
	$items1 = $d->result_array();
	$url_link = getCurrentPageURL();
	
}		
?>
