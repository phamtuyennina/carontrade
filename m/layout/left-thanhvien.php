<?php 
	$d->reset();
	$sql = "select photo from #_background where type='logo3' limit 0,1";
	$d->query($sql);
	$row_banner3 = $d->fetch_array();	
?>
<div class="bx_tv_logo">
	<a href="">
    	<img src="<?=_upload_hinhanh_l.$row_banner3['photo']?>" alt="<?=$company['ten']?>" />
    </a>
</div>
<div class="mm_tv">
	<ul>
    	<li><a class="" href="dang-tin/chon-mau-xe">Bán xe của tôi</a></li>
        <li><a class="<?php if($_GET['step']=='tin-dang-ban'){echo 'act';} ?>" href="thanh-vien/tin-dang-ban">Quản lý tin đang bán <span class="mauxanh"><?=get_tindang_byUser(1,$_SESSION['user_w']['id'])?></span></a></li>
         <li><a class="<?php if($_GET['step']=='tin-cho-duyet'){echo 'act';} ?>" href="thanh-vien/tin-cho-duyet">Quản lý tin chờ chuyệt <span class="mauvang"><?=get_tindang_byUser(0,$_SESSION['user_w']['id'])?></span></a></li>
        <li><a class="<?php if($_GET['step']=='tin-bi-tu-choi'){echo 'act';} ?>" href="thanh-vien/tin-bi-tu-choi">Quản lý tin bị từ chối <span class="maudo"><?=get_tindang_byUser(2,$_SESSION['user_w']['id'])?></span></a></li>
        <li><a class="<?php if($_GET['step']=='tin-da-luu'){echo 'act';} ?>" href="thanh-vien/tin-da-luu">Quản lý tin đã lưu <span class="mauxam"><?=get_luunhap_byUser(1,$_SESSION['user_w']['id'])?></span></a></li>
        <li><a class="<?php if($_GET['step']=='tin-da-luu'){echo 'act';} ?>" href="javascript:void()">Quản lý tin hết hạn <span class="mauden">0</span></a></li>
        <li><a class="<?php if($_GET['step']=='danh-gia'){echo 'act';} ?>" href="thanh-vien/danh-gia">Đánh giá</a></li>
        <li><a class="<?php if($_GET['step']=='thong-tin-ca-nhan'){echo 'act';} ?>" href="thanh-vien/thong-tin-ca-nhan">Thông tin tài khoản</a></li>
        <li><a href="dang-xuat">Đăng xuất</a></li>
    </ul>
    
</div>