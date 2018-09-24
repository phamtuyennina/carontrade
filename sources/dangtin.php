<?php  if(!defined('_source')) die("Error");
	
	error_reporting(0);
	if(empty($_SESSION[$login_name_w])){
		redirect("../dang-nhap.html");
	}
	
	switch($_GET['step']){
		case 'chon-mau-xe':
			batdau();
			$template="dangtin/chonmauxe";
			$title = "Đăng tin - Chọn mẫu xe";
			$title_cat = "Đăng tin - Chọn mẫu xe";
			
			break;
		case 'chon-tinh-nang':
			$template="dangtin/chontinhnang";
			$title = "Đăng tin - Chọn tính năng";
			$title_cat = "Đăng tin - Chọn tính năng";
			break;
		case 'mota-chi-tiet':
			$template="dangtin/motachitiet";
			$title = "Đăng tin - Mô tả chi tiết";
			$title_cat = "Đăng tin - Mô tả chi tiết";
			break;
		case 'dang-tai-hinh-anh':
			$template="dangtin/dangtaihinhanh";
			$title = "Đăng tin - Đăng tải hình ảnh";
			$title_cat = "Đăng tin - Đăng tải hình ảnh";
			break;
		case 'xac-nhan':
			$template="dangtin/xacnhan";
			$title = "Đăng tin - Xác nhận";
			$title_cat = "Đăng tin - Xác nhận";
			break;
		default: 
			break;
	}
	
	if(empty($_SESSION['dangtin']['id_tmp'])){
		$data['ngaytao'] = time();
		$d->setTable('dangtin');
		$d->insert($data);
		$_SESSION['dangtin']['id_tmp']=mysql_insert_id();
	}
	if(!empty($_POST)){
		if($_POST['pjax']==1){
			$_SESSION['dangtin']['nhasanxuat']=$_POST['hangxe'];
			$_SESSION['dangtin']['kieudang']=$_POST['kieudang'];
			$_SESSION['dangtin']['mauxe']=$_POST['mauxe'];
			$_SESSION['dangtin']['nam']=$_POST['nam'];
		}
		if($_POST['pjax']==2){
			$_SESSION['dangtin']['hopso']=$_POST['hopso'];
			$_SESSION['dangtin']['soghe']=$_POST['soghe'];
			$_SESSION['dangtin']['dongco']=$_POST['dongco'];
			$_SESSION['dangtin']['tinhtrang']=$_POST['tinhtrang'];
			$_SESSION['dangtin']['nhienlieu']=$_POST['nhienlieu'];
			$_SESSION['dangtin']['socua']=$_POST['socua'];
			$_SESSION['dangtin']['sokm']=$_POST['sokm'];
			$_SESSION['dangtin']['mausac']=$_POST['mausac'];
			$_SESSION['dangtin']['giatien']=$_POST['giatien'];
			
		}
		if($_POST['pjax']==3){
			$_SESSION['dangtin']['mota']=$_POST['mota'];
			$_SESSION['dangtin']['ten']=$_POST['ten'];
		}
		if($_POST['pjax']==4){
			echo '<pre style="display:none">';print_r($_FILES);echo '</pre>';
			if(!empty($_FILES)){
			include(_lib.'class.uploader.php');
			$uploader = new Uploader();
			$datax = $uploader->upload($_FILES['files'], array(
				'limit' => 20,
				'maxSize' => 5,
				'extensions' => array("jpg","png","gif","JPG","jpeg","JPEG"), 
				'required' => false,
				'uploadDir' => _upload_tmp_l,
				'title' => array('auto', 10), 
				'removeFiles' => true, 
				'onRemove' => 'onFilesRemoveCallback' 
			));
		
			foreach($datax['data']['metas'] as $k=>$v){	
				$image = $v['name'];
				$arr_img[] = $image;
			}
			$hinhanh=implode('|',$arr_img);
			$d->reset();
			$sql="select hinhanh FROM #_dangtin where id=".$_SESSION['dangtin']['id_tmp']."";
			$d->query($sql);
			$name_tmp=$d->result_array();
			if(!empty($name_tmp)){
				if(!empty($hinhanh)){$tmp_=$name_tmp[0]['hinhanh']."|".$hinhanh;}
			}else{
				if(!empty($hinhanh)){$tmp_=$hinhanh;}
			}
			
			if(!empty($tmp_)){
				$d->query("update table_dangtin set hinhanh='".$tmp_."' where id=".$_SESSION['dangtin']['id_tmp']."");
			}
			}
		}
		if($_POST['pjax']==5){
			$_SESSION['dangtin']['tinhthanh']=$_POST['tinhthanh'];
			$_SESSION['dangtin']['quanhuyen']=$_POST['quanhuyen'];
		}
		$_SESSION['dangtin']['max']=$_POST['pjax'];
		
	}
	
	
	
function batdau(){
	global $d,$kieudang12,$mauxe;
	
	
	if(!empty($_SESSION['dangtin']['nhasanxuat'])){
		$d->reset();
		$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='kieu-dang' and FIND_IN_SET(".$_SESSION['dangtin']['nhasanxuat'].",id_thuonghieu) order by stt,id desc";
		$d->query($sql);
		$kieudang12=$d->result_array();
		
		if(!empty($_SESSION['dangtin']['kieudang'])){
			$d->reset();
			$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='mau-xe' and FIND_IN_SET(".$_SESSION['dangtin']['kieudang'].",id_kieudang) and id_thuonghieu=".$_SESSION['dangtin']['nhasanxuat']." order by stt,id desc";
			$d->query($sql);
			$mauxe=$d->result_array();
			
		}else{
			
		}
		
	}
	
}

?>