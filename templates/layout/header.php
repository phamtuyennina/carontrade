<?php
 	error_reporting(0);
	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='logo' limit 0,1";
	$d->query($sql_banner);
	$row_logo = $d->fetch_array();

	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='banner' limit 0,1";
	$d->query($sql_banner);
	$row_banner = $d->fetch_array();
	
	$d->reset();
	$sql_bannerin = "select photo$lang as photo from #_background where type='banenr2' limit 0,1";
	$d->query($sql_bannerin);
	$row_bannerin = $d->fetch_array();	
	
	

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='kieu-dang' order by stt,id desc limit 0,10";
	$d->query($sql);
	$kieudang=$d->result_array();
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='loaixe' order by stt,id desc limit 0,10";
	$d->query($sql);
	$loaixe=$d->result_array();	
	
	$d->reset();
	$sql= "select id,ten$lang as ten,tenkhongdau from #_news where type='menudanhgia' and hienthi=1 order by stt,id desc";
	$d->query($sql);
	$menudanhgia = $d->result_array();
	
	$d->reset();
	$sql= "select id,ten$lang as ten,tenkhongdau from #_news where type='menutintuc' and hienthi=1 order by stt,id desc";
	$d->query($sql);
	$menutintuc = $d->result_array();
	
	$d->reset();
	$sql= "select id,ten$lang as ten,tenkhongdau from #_news where type='menutrogiup' and hienthi=1 order by stt,id desc";
	$d->query($sql);
	$menutrogiup = $d->result_array();					
			
?>
<div class="nav_top">
	<div class="wapper clearfix">
    	<ul>
        	<li class="li_car1"><a href="" class="a_home"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="li_car2"><a href="tim-xe.html">Xe đang bán <i class="fa fa-caret-down" aria-hidden="true"></i></a>
            	<div class="menu-panel clearfix">
                	<i class="arrow"></i>
                    <ul class="menu-links">
                    	<li class="vip"><a href="tim-kiem.html">Tất cả xe</a></li>
                        <li class="vip"><a href="xe-dai-ly.html">Xe đại lý</a></li>
                        <li class="vip"><a href="xe-ca-nhan.html">Xe cá nhân</a></li>
                        <li class="vip"><a href="index.php?com=tim-kiem&tinhtrang=xe-moi">Xe mới</a></li>
                    </ul>
                        <div class="menu-content">
                        <div class="category cata-body"><h3>Kiểu dáng</h3>
                        <div class="bb_body">
                            <?php foreach($kieudang as $v){ ?>
                                <div>
                                    <a href="kieu-dang/<?=$v['tenkhongdau']?>">
                                        <img src="thumb/80x40x2x90/<?=_upload_sanpham_l.$v['photo']?>" alt="<?=$v['ten']?>" />
                                        <p><?=$v['ten']?></p>
                                    </a>
                                </div>
                            <?php }?>
                        </div>
                        </div>
                        
                        <div class="category cata-brand"><h3>Nhà sản xuất</h3>
                        <div class="bb_body">
                            <?php foreach($loaixe as $v){ ?>
                                <div>
                                    <a href="nha-san-xuat/<?=$v['tenkhongdau']?>">
                                        <img src="thumb/80x40x2x90/<?=_upload_sanpham_l.$v['photo']?>" alt="<?=$v['ten']?>" />
                                        <p><?=$v['ten']?></p>
                                    </a>
                                </div>
                            <?php }?>
                        </div>
                        </div>
                        
                    </div>
                </div>
            </li>
            <li class="li_car3"><a href="dang-tin/chon-mau-xe">Bán xe của tôi <i class="fa fa-caret-down" aria-hidden="true"></i></a>
            	<div class="menu-panel clearfix">
                	<i class="arrow"></i>
                    <ul class="menu-links">
                    	<li class="vip"><a href="dang-tin/chon-mau-xe">Tạo tin đăng bán</a></li>
                        <li class="vip"><a href="thanh-vien/tin-dang-ban">Quản lý tin đăng</a></li>
                        <li class="vip"><a href="tro-giup-nguoi-ban.html">trợ giúp người bán</a></li>
                        <li class="vip"><a href="dinh-gia-xe.html">Định giá xe</a></li>
                        <li class="vip"><a href="quy-dinh-dang-tin.html">Quy định đăng tin</a></li>
                    </ul>
                </div>
            </li>
            <li class="li_car4"><a href="danh-gia-chung-toi.html">Đánh Giá CarOntrade</a></li>
            <li class="li_car5"><a href="tin-tuc.html">Tin tức </a></li>
            <li class="li_car6"><a href="tro-giup.html">Trợ giúp </a></li>
        </ul>
        <div class="in_log text-right">
        	<p>Welcome back!</p>
            <?php if($_SESSION[$login_name_w]==false){ ?>
            <p><a href="dang-nhap.html">Đăng nhập</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="dang-ky.html">Đăng ký</a></p>
            <?php }else{?>
            <p><a href="thanh-vien/tin-dang-ban"><?=($_SESSION['user_w']['loaithanhvien']=='Đại lý')?$_SESSION['user_w']['congty']:$_SESSION['user_w']['hoten']?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
            </p>
            <div class="menu-panel clearfix">
                	<i class="arrow"></i>
                    <ul class="menu-links">
                    	<li class="vip"><a href="thanh-vien/tin-dang-ban">Quản lý tin đang bán</a></li>
                    	<li class="vip"><a href="thanh-vien/tin-cho-duyet">Quản lý tin chờ duyệt</a></li>
                    	<li class="vip"><a href="thanh-vien/tin-bi-tu-choi">Quản lý tin bị từ chối</a></li>
                        <li class="vip"><a href="thanh-vien/tin-da-luu">Quản lý tin đã lưu</a></li>
                        <li class="vip"><a href="thanh-vien/danh-gia">Đánh giá</a></li>
                        <li class="vip"><a href="thanh-vien/thong-tin-ca-nhan">Thông tin cá nhân</a></li>
                        <li class="vip"><a href="dang-xuat.html">Thoát</a></li>
                    </ul>
                </div>
            <?php }?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<?php if($source!='dangky' && $source!='dangnhap' && $source!='thanhvien'){ ?>
<div class="head <?php if($source!='index'){echo 'headin';} ?>">
	<div class="wapper clearfix">
    	<?php if($source=='index'){?>
            <div class="logo">
                <a href=""><img src="<?=_upload_hinhanh_l.$row_banner['photo']?>" alt="<?=$company['ten']?>" /></a>
            </div>
        <?php }else{?>
        <div class="logo logo1">
        	<a href=""><img src="<?=_upload_hinhanh_l.$row_bannerin['photo']?>" alt="<?=$company['ten']?>" /></a>
        </div>
        <?php } if($source!='index'){?>
        <div class="banner_qc">
        	<div class="slick_vv">
            	<?php foreach($row_qc as $v){ ?>
                <div>
                	<p><a href="<?=$v['link']?>"><img src="thumb/550x80x1x90/<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a></p>
                </div>
                <?php }?>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php }?>