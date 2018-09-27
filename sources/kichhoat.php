<?php 
	if($_SESSION[$login_name_w]){
		redirect('dang-nhap.html');
	}
	$id=$_GET['id'];
	$d->reset();
	$sql = "select kichhoat,hoten,email,nguoigioithieu from table_thanhvien where maxacnhan='".$id."'";
	$d->query($sql);
	$row = $d->result_array();
	if(!empty($row[0]['nguoigioithieu'])){
		$d->reset();
		$sql = "select hoten,email from table_thanhvien where nguoigioithieu='".$row[0]['nguoigioithieu']."'";
		$d->query($sql);
		$nguoiduoithieu = $d->detch_array();
		$makhuyenmai=taomakhuyenmai('select * from #_makhuyenmai where makhuyenmai=',$nguoiduoithieu['email'],$row[0]['email']);
		guicodekhuyenmai($nguoiduoithieu['email'],$nguoiduoithieu['hoten'],$makhuyenmai);
		guicodekhuyenmai($row[0]['email'],$row[0]['hoten'],$makhuyenmai);
	}
	
	if($row[0]['kichhoat']==1){
		redirect('//'.$config_url.'/dang-nhap.html');
	}
	
	$sql = "update table_thanhvien SET kichhoat=1,ngaytao=".time()." WHERE  maxacnhan = '".$id."'";
	$data = mysql_query($sql) or die("Not query sql");
	transfer("Tài khoản của bạn đã được kích hoạt thành công.", '//'.$config_url.'/dang-nhap.html');

?>
