<?php	if(!defined('_source')) die("Error");
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$urlcu = "";
	$urlcu .= (isset($_REQUEST['p'])) ? "&p=".addslashes($_REQUEST['p']) : "";
	switch($act){
		case "man":
			get_items();
			$template = "thanhvien/items";
			break;
		case "add":
			$template = "thanhvien/item_add";
			break;
		case "edit":
			get_item();
			$template = "thanhvien/item_add";
			break;
		case "save":
			save_item();
			break;
		case "delete":
			delete_item();
			break;
		default:
			$template = "index";
	}
function get_items(){
	global $d, $items, $url_link,$totalRows , $pageSize, $offset,$paging,$urlcu;
	
	if($_REQUEST['keyword']!='')
	{
		$where.=" and email like '%".$_REQUEST['keyword']."%' or hoten like '%".$_REQUEST['keyword']."%' or dienthoai like '%".$_REQUEST['keyword']."%'";
	}
	$where.=" order by email";

	$sql="SELECT count(id) AS numrows FROM #_thanhvien where id<>0 $where";
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
	
	$sql = "select * from #_thanhvien where id<>0 $where limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();	
	$url_link="index.php?com=thanhvien&act=man".$urlcu;
}	
function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=thanhvien&act=man");
	
	$sql = "select * from #_thanhvien where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=thanhvien&act=man");
	$item = $d->fetch_array();
}


function save_item(){
	global $d,$config;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=thanhvien&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){
		$id =  themdau($_POST['id']);
		if($_POST['oldpassword']!=""){
			$data['matkhau'] =encrypt_password($_POST['oldpassword'],$config['salt']);
		}
		$data['email'] = $_POST['email'];
		$data['hoten'] = $_POST['hoten'];
		$data['tencongty'] = $_POST['tencongty'];
		$data['ngaysinh'] = $_POST['ngaysinh'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['cmnd'] = $_POST['cmnd'];
		$data['loaithanhvien'] = $_POST['loaithanhvien'];
		$data['masothue'] = $_POST['masothue'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['diachi'] = $_POST['diachi'];
		$data['id_dist'] = $_POST['id_dist'];
		$data['id_city'] = $_POST['id_city'];
		$data['ngaytao'] = time();
		$data['kichhoat'] = isset($_POST['kichhoat']) ? 1 : 0;
		$d->reset();
		$d->setTable('thanhvien');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Dữ liệu đã được cập nhật", "index.php?com=thanhvien&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=thanhvien&act=man");
	
	}else{ // them moi
	
		// kiem tra ten trung
		$d->reset();
		$d->setTable('thanhvien');
		$d->setWhere('email', $_POST['email']);
		$d->select();
		if($d->num_rows()>0) transfer("Tên dăng nhập nay đã có.<br>Xin chọn tên khác.", "index.php?com=thanhvien&act=add");
		
		if($_POST['oldpassword']=="") transfer("Chưa nhập mật khẩu", "index.php?com=thanhvien&act=add");
	
		$data['matkhau'] = encrypt_password($_POST['oldpassword'],$config['salt']);
		$data['email'] = $_POST['email'];
		$data['hoten'] = $_POST['hoten'];
		$data['tencongty'] = $_POST['tencongty'];
		$data['cmnd'] = $_POST['cmnd'];
		$data['loaithanhvien'] = $_POST['loaithanhvien'];
		$data['masothue'] = $_POST['masothue'];
		$data['ngaysinh'] = $_POST['ngaysinh'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['diachi'] = $_POST['diachi'];
		$data['id_dist'] = $_POST['id_dist'];
		$data['id_city'] = $_POST['id_city'];
		$data['kichhoat'] = isset($_POST['kichhoat']) ? 1 : 0;

		$d->setTable('thanhvien');
		if($d->insert($data)){

			transfer("Dữ liệu đã được lưu", "index.php?com=thanhvien&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=thanhvien&act=man");
	}
}


function delete_item(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		// kiem tra
		$d->reset();
		$d->setTable('user');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()>0){
			$row = $d->fetch_array();
		}
		
		// xoa item
		$sql = "delete from #_thanhvien where id='".$id."'";
		if($d->query($sql))
			transfer("Dữ liệu đã được xóa", "index.php?com=thanhvien&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=thanhvien&act=man");
	}
	elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);	
			$d->reset();
			$d->setTable('thanhvien');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
			$row = $d->fetch_array();
			if($row['role'] ==3) transfer("Bạn không có quyền trên tài khoản này.<br>Mọi thắc mắc xin liên hệ quản trị website.", "index.php?com=thanhvien&act=man");
		}
		$sql = "delete from #_thanhvien where id='".$id."'";	
		$d->query($sql);	
		} 
		redirect("index.php?com=thanhvien&act=man".$urlcu);
	}
	else transfer("Không nhận được dữ liệu", "index.php?com=thanhvien&act=man");
}
?>
