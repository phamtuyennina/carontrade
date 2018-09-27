<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	
	#Thông tin 
	$d->reset();
	$sql_company = "select lang_default from #_company limit 0,1";
	$d->query($sql_company);
	$company1= $d->fetch_array();
	
	#Gọi ngôn ngữ
	$lang_default = array("","en");
	if(!isset($_SESSION['lang']) or !in_array($_SESSION['lang'], $lang_default))
	{
		$_SESSION['lang'] = $company1['lang_default'];
	}
	$lang=$_SESSION['lang'];
	require_once _source."lang$lang.php";
	$d->reset();
	$sql_company = "select *,ten$lang as ten,diachi$lang as diachi from #_company limit 0,1";
	$d->query($sql_company);
	$company= $d->fetch_array();
	if (class_exists('breadcrumb')) {
		$bread = new breadcrumb();
		$bread->add(_trangchu,"index.html");		
	}
	switch($com)
	{
		case 'gioi-thieu':
			$type = "about";
			$title = _gioithieu;
			$title_cat = _gioithieu;
			$source = "about";
			$template = "about";
			$comt=1;
			break;
		case 'tuyen-dung':
			$type = "tuyen-dung";
			$title = "Tuyển dụng";
			$title_cat = "Tuyển dụng";
			$source = "about";
			$template = "about";
			$comt=1;
			break;
		case 'hop-tac':
			$type = "hop-tac";
			$title = "Hợp tác";
			$title_cat = "Hợp tác";
			$source = "about";
			$template = "about";
			$comt=1;
			break;
		case 'chinh-sach-bao-mat':
			$type = "baomat";
			$title = "Chính sách bảo mật";
			$title_cat = "Chính sách bảo mật";
			$source = "about";
			$template = "about";
			$comt=1;
			break;
			
		case 'tro-giup-nguoi-ban':
			$type = "tro-giup-nguoi-ban";
			$title = "Trợ giúp người bán";
			$title_cat = "Trợ giúp người bán";
			$source = "about";
			$template = "about";
			$comt=1;
			break;
		case 'quy-dinh-dang-tin':
			$type = "quy-dinh-dang-tin";
			$title = "Quy định đăng tin";
			$title_cat = "Quy định đăng tin";
			$source = "about";
			$template = "about";
			$comt=1;
			break;
		case '':
		case 'index':
			$title = $company['title'];
			$title_cat = $company['title'];
			$source = "index";
			$template = "index";
			break;
			
		case 'danh-gia-chung-toi':
			$type ="website"; 
			$title = "Đánh giá chúng tôi";
			$title_cat = "Đánh giá chúng tôi";
			$source = "danhgia";
			$template = "danhgiaweb";
			break;
		
		case 'dinh-gia-xe':
			$title = "Định giá xe của bạn";
			$title_cat = "Định giá xe của bạn";
			$template = "dinhgiaxe";
			break;
		
		case 'danh-gia-tai-khoan':
			$type ="user"; 
			$title = "Đánh giá thành viên";
			$title_cat = "Đánh giá thành viên";
			$source = "danhgia";
			$template = "danhgiauser";
			break;
			
		case 'ajax':
			$source = "ajax";
			break;
		
		case 'dang-tin':
			$source = "dangtin";
			break;
		
		case 'sua-tin':
			$source = "dangtin";
			break;
		
		case 'thanh-vien':
			$source = "thanhvien";
			break;
		
		case 'mau-xe':
			$source = "mauxe";
			$template = "product";
			break;
		
		case 'tim-xe':
			$template = "timxe";
			$title = "Tìm xe của bạn";
			$title_cat = "Tìm xe của bạn";
			break;
			
		case 'kich-hoat-tai-khoan':
			$source = "kichhoat";
			$title = "Kích hoạt tài khoản";
			$title_cat = "Kích hoạt tài khoản";
			break;
		
		case 'nha-san-xuat':
			$type='loaixe';
			$template = "thuonghieu";
			$source = "kieudang";
			$title = "Nhà sản xuất";
			$title_cat = "Nhà sản xuất";
			break;	
		
		case 'kieu-dang':
			$type='kieu-dang';
			$source = "kieudang";
			$title = "Kiểu dáng xe";
			$title_cat = "Kiểu dáng xe";
			$template = "thuonghieu";
			break;			
		
		case 'tin-tuc':
			$type = "tin-tuc";
			$title = _tintuc;
			$title_cat = _tintuc;
			$source = "news";
			$par_=$title;
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
		
		case 'tro-giup-nguoi-dung':
			$type = "tro-giup-nguoi-dung";
			$title = "Trợ giúp người dùng";
			$title_cat = "Trợ giúp người dùng";
			$source = "news";
			$par_=$title;
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;	
		
		case 'danh-gia':
			$type = "danh-gia";
			$title = "Đánh giá";
			$title_cat = "Đánh giá";
			$source = "news";
			$par_=$title;
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
		
		case 'hoi-dap':
			$type = "hoi-dap";
			$title = "Hỏi đáp về xe";
			$title_cat = "Hỏi đáp về xe";
			$source = "news";
			$par_=$title;
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
		
		case 'bai-viet':
			$type = "bai-viet";
			$title = "Bài viết";
			$title_cat = "Bài viết";
			$source = "news";
			$par_=$title;
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
		
		case 'tro-giup':
			$type = "tro-giup";
			$title = "Trợ giúp";
			$title_cat = "Trợ giúp";
			$source = "news";
			$par_=$title;
			$template = "trogiup";
			break;
			
		case 'chinh-sach-khach-hang':
			$type = "chinh-sach-khach-hang";
			$title = "Chính sách khách hàng";
			$title_cat = "Chính sách khách hàng";
			$source = "news";
			$comt=1;
			$par_=$title;
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
			
		case 'ho-tro-khach-hang':
			$type = "ho-tro-khach-hang";
			$title = "Hỗ trợ khách hàng";
			$title_cat = "Hỗ trợ khách hàng";
			$source = "news";
			$comt=1;
			$par_=$title;
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;		
			
		case 'dich-vu':
			$type = "dichvu";
			$title = _dichvu;
			$title_cat = _dichvu;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
			
		case 'tuyen-dung':
			$type = "tuyendung";
			$title = _tuyendung;
			$title_cat = _tuyendung;
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
			
		case 'lien-he':
			$type = "lienhe";
			$title = _lienhe;
			$title_cat = _lienhe;
			$source = "contact";
			$template = "contact";
			break;

		case 'tim-kiem':
			$title = _ketquatimkiem;
			$title_cat = _ketquatimkiem;
			$source = "search";
			$template = "product";
			break;
						
		case 'chi-tiet':
			$source = "product";
			$template = "product_detail";
			break;
		
		case 'xe-ca-nhan':
			$title = "Xe cá nhân";
			$title_cat ="Xe cá nhân";
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "product";
			break;
		
		case 'xe-dai-ly':
			$title = "Xe đại lý";
			$title_cat ="Xe đại lý";
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "product";
			break;
			
		case 'video':
			$type = "video";
			$title = 'Video';
			$title_cat = "Video";
			$source = "news";
			$par_=$title;
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
		
		case 'gio-hang':
			$type = "giohang";
			$title = _giohang;
			$title_cat = _giohang;
			$source = "giohang";
			$template = "giohang";
			break;	
			
		case 'thanh-toan':
			$type = "thanhtoan";
			$title = _thanhtoan;
			$title_cat = _thanhtoan;
			$source = "thanhtoan";
			$template = "thanhtoan";
			break;
			
		case 'dang-nhap':
			$type = "dangnhap";
			$title = _dangnhap;
			$title_cat = _dangnhap;
			$source = "dangnhap";
			$template = "dangnhap";
			break;
			
		case 'dang-ky':
			$type = "dangky";
			$title = _dangky;
			$title_cat = _dangky;
			$source = "dangky";
			$template = "dangky";
			break;
		case 'quen-mat-khau':
			$type = "quenmatkhau";
			$title = "Lấy lại mật khẩu";
			$title_cat = "Lấy lại mật khẩu";
			$template = "quenmatkhau";
			$source = "dangky";
			break;

	
		case 'dang-xuat':
			logout();
			break;
				
		case 'add-user':
			$source = "user";
			$template = "user";
			break;
			
		case 'ngonngu':
			if(isset($_GET['lang']))
			{
				switch($_GET['lang'])
					{
						case '':
							$_SESSION['lang'] = '';
							break;
						case 'en':
							$_SESSION['lang'] = 'en';
							break;
						default: 
							$_SESSION['lang'] = '';
							break;
					}
			}
			else{
				$_SESSION['lang'] = '';
			}
			redirect($_SERVER['HTTP_REFERER']);
		break;	
										
		default: 
			$source = "index";
			$template = "index";
			break;
	}

	

	if($_SERVER["REQUEST_URI"]=='/index.php' or $_SERVER["REQUEST_URI"]=='/index.html'){
        header("location://".$config_url."/");
    }

	if($source!="") include _source.$source.".php";	

	if($_REQUEST['com']=='logout')
	{
		session_unregister($login_name);
		header("Location:index.php");
	}
	if(isset($_POST['pjax'])){
		include _template.$template."_tpl.php";
		die;	
	}
	
	if($source=='index'){$vcom='';}else{$vcom=$com;}
	$d->reset();
	$sql = "select photo$lang as photo,link,ten$lang as ten,id from #_slider where type='slider4' and giaodien='".$vcom."' and hienthi=1";
	$d->query($sql);
	$row_qc = $d->result_array();
	
	$d->reset();
	$sql = "select photo$lang as photo,link,ten$lang as ten,id from #_slider where type='slider5' and giaodien='".$vcom."' and hienthi=1 ";
	$d->query($sql);
	$row_qc1 = $d->result_array();
	
	$arr_animate =array("bounce","flash","pulse","rubberBand","shake","swing","tada","wobble","jello","bounceIn","bounceInDown","bounceInLeft","bounceInRight","bounceInUp","bounceOut","bounceOutDown","bounceOutLeft","bounceOutRight","bounceOutUp","fadeIn","fadeInDown","fadeInDownBig","fadeInLeft","fadeInLeftBig","fadeInRight","fadeInRightBig","fadeInUp","fadeInUpBig","fadeOut","fadeOutDown","fadeOutDownBig","fadeOutLeft","fadeOutLeftBig","fadeOutRight","fadeOutRightBig","fadeOutUp","fadeOutUpBig","flip","flipInX","flipInY","flipOutX","flipOutY");	
?>
