<?php
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='kieu-dang' order by stt,id desc limit 0,10";
	$d->query($sql);
	$kieudang=$d->result_array();
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='loaixe' order by stt,id desc limit 0,10";
	$d->query($sql);
	$loaixe=$d->result_array();	
	
?>
<link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css" />

<nav id="menu_mobi" style="height:0; overflow:hidden;">
    <ul>	
    	<li><a href="" class="a_home">Trang chủ</a></li>
         <?php if($_SESSION[$login_name_w]==false){ ?>
         <li class="out_mm"><a href="dang-nhap.html">Đăng nhập</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="dang-ky.html">Đăng ký</a></li>
         <?php }else{?>
         <li><a href="thanh-vien/tin-dang-ban"><?=($_SESSION['user_w']['loaithanhvien']=='Đại lý')?$_SESSION['user_w']['congty']:$_SESSION['user_w']['hoten']?></a>
         	<ul>
            	<li><a href="thanh-vien/tin-dang-ban">Quản lý tin đang bán</a></li>
                <li><a href="thanh-vien/tin-cho-duyet">Quản lý tin chờ duyệt</a></li>
                <li><a href="thanh-vien/tin-bi-tu-choi">Quản lý tin bị từ chối</a></li>
                <li><a href="thanh-vien/tin-da-luu">Quản lý tin đã lưu</a></li>
                <li><a href="thanh-vien/danh-gia">Đánh giá</a></li>
                <li><a href="thanh-vien/thong-tin-ca-nhan">Thông tin cá nhân</a></li>
                <li><a href="dang-xuat.html">Thoát</a></li>
            </ul>
         </li>
         <?php }?>
        <li><a href="tim-xe.html">Xe đang bán</a>
        	<ul>
            	<li><a href="tim-kiem.html">Tất cả xe</a></li>
                <li><a href="xe-dai-ly.html">Xe đại lý</a></li>
                <li><a href="xe-ca-nhan.html">Xe cá nhân</a></li>
                <li><a href="index.php?com=tim-kiem&tinhtrang=xe-moi">Xe mới</a></li>
                <li><a href="javascriptLvoid(0)">Kiểu dáng</a>
                	<ul>
                    	<?php foreach($kieudang as $v){ ?>
                        <li> <a href="kieu-dang/<?=$v['tenkhongdau']?>"><?=$v['ten']?></a></li>
                        <?php }?>
                    </ul>
                </li>
                <li><a href="javascriptLvoid(0)">Nhà sản xuất</a>
                	<ul>
                    	<?php foreach($loaixe as $v){ ?>
                        <li> <a href="nha-san-xuat/<?=$v['tenkhongdau']?>"><?=$v['ten']?></a></li>
                        <?php }?>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="dang-tin/chon-mau-xe">Bán xe của tôi</a>
        	<ul>
            	<li><a href="dang-tin/chon-mau-xe">Tạo tin đăng bán</a></li>
                <li><a href="thanh-vien/tin-dang-ban">Quản lý tin đăng</a></li>
                <li><a href="tro-giup-nguoi-ban.html">Trợ giúp người bán</a></li>
                <li><a href="dinh-gia-xe.html">Định giá xe</a></li>
                <li><a href="quy-dinh-dang-tin.html">Quy định đăng tin</a></li>
            </ul>
        </li>
        <li><a href="danh-gia-chung-toi.html">Đánh giá chúng tôi</a></li>
        <li><a href="tin-tuc.html">Tin tức</a></li>
        <li><a href="tro-giup.html">Trợ giúp</a></li>
    </ul>
</nav>