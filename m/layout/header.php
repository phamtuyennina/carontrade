<?php
 	error_reporting(0);
	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='mobile' limit 0,1";
	$d->query($sql_banner);
	$row_logo = $d->fetch_array();
	
	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='mobile2' limit 0,1";
	$d->query($sql_banner);
	$row_logo2 = $d->fetch_array();	

	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='banner' limit 0,1";
	$d->query($sql_banner);
	$row_banner = $d->fetch_array();
	
	$d->reset();
	$sql_bannerin = "select photo$lang as photo from #_background where type='banenr2' limit 0,1";
	$d->query($sql_bannerin);
	$row_bannerin = $d->fetch_array();	
	
	if($source=='index'){$vcom='';}else{$vcom=$com;}
	
	$d->reset();
	$sql = "select photo$lang as photo,link,ten$lang as ten from #_slider where type='slider4' and giaodien='".$vcom."' limit 0,1";
	$d->query($sql);
	$row_qc = $d->result_array();
	
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

<?php if($com!='thanh-vien'){ ?>
<div class="nav_top">
	<div class="header"><a href="#menu_mobi" class="hien_menu"><i class="fa fa-bars" aria-hidden="true"></i></a></div>
    <div class="logo_mobile">
        <a href="">
            <img src="<?=_upload_hinhanh_l.$row_logo['photo']?>" alt="<?=$company['ten']?>" />
        </a>
    </div>
    <p class="my_sell"><a href="dang-tin/chon-mau-xe">Bán xe của tôi</a></p>
</div>
<?php }else{?>
<div class="nav_top nav_top1">
	<div class="header"><a href="#menu_mobi" class="hien_menu"><i class="fa fa-bars" aria-hidden="true"></i></a></div>
    <div class="logo_mobile">
        <a href="">
            <img src="<?=_upload_hinhanh_l.$row_logo2['photo']?>" alt="<?=$company['ten']?>" />
        </a>
    </div>
</div>
<?php }?>