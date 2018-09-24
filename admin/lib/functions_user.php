<?php if(!defined('_lib')) die("Error");

	function info_user($id)
	{
		global $d;		
		$sql = "select * from #_thanhvien where id='".$id."'";
		$d->query($sql);
		$item = $d->fetch_array();
		return $item;
	}
	
	function logout(){	
		unset($_SESSION[$login_name_w]);
		unset($_SESSION['user_w']);
		unset($_SESSION['dangtin']);
		transfer(_dangxuatthanhcong, "index.html");
	}
	function getten_user($id=0){
		global $d;		
		$sql = "select hoten,email,loaithanhvien from #_thanhvien where id='".(int)$id."'";
		$d->query($sql);
		$item = $d->fetch_array();
		if($item['loaithanhvien']=='Đail lý'){
			return ($item['tencongty']!='')?$item['tencongty']:$item['email'];	
		}else{
			return ($item['hoten']!='')?$item['hoten']:$item['email'];	
		}
	}
	function getphoto_user($id=0){
		global $d;		
		$sql = "select photo from #_thanhvien where id='".(int)$id."'";
		$d->query($sql);
		$item = $d->fetch_array();
		return $item['photo'];	
	}
	function getdanhgia_userw($id=0,$id_user=0){
		global $d;		
		$sql = "select diem from #_danhgia where id_danhgia='".(int)$id."' and id_user=".(int)$id_user." and type='website'";
		$d->query($sql);
		$item = $d->fetch_array();
		if($item['diem']==1){return true;}else{return false;}
		
	}
	function demsao_($id=0){
		global $d,$chuoi;		
		$sql = "select giatri from #_danhgiasao where id_user='".(int)$id."' and type='website'";
		$d->query($sql);
		$item = $d->fetch_array();
		return $item['giatri'];
		
	}
	function demsao_user($id_user=0,$id=0){
		global $d,$chuoi;		
		$sql = "select diem from #_danhgia where id_user='".(int)$id_user."' and id_danhgia=".(int)$id." and type='user'";
		$d->query($sql);
		$item = $d->fetch_array();
		return $item['diem'];
		
	}
	function demtongsao_user($id_user=0){
		global $d,$chuoi;		
		$sql = "select sum(diem) as tong from #_danhgia where user_danhgia='".(int)$id_user."' and type='user'";
		$d->query($sql);
		$item = $d->fetch_array();
		return $item['tong'];
		
	}
	function demsao_mota($id_user=0){
		global $d,$chuoi;		
		$sql = "select mota from #_danhgiasao where id_user='".(int)$id_user."'  and type='user'";
		$d->query($sql);
		$item = $d->fetch_array();
		return $item['mota'];
	}
	function tinhdanhgia($id=0){
		global $d,$ketqua;	
		$d->reset();
		$sql = "select * from #_danhgia where type='user' and user_danhgia=".(int)$id." group by id_user  order by ngaytao desc";
		$d->query($sql);
		$count_dg = $d->result_array();
		
		$ketqua=round((demtongsao_user($id)*100)/(count($count_dg)*20),1);	
		return $ketqua;
	}

?>