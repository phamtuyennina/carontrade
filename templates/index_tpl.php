<?php 
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='kieu-dang' order by stt,id desc limit 0,6";
	$d->query($sql);
	$kieudang=$d->result_array();
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='loaixe' order by stt,id desc limit 0,6";
	$d->query($sql);
	$loaixe=$d->result_array();	
	
	$d->reset();
	$sql = "select ten$lang as ten,link,photo from #_slider where hienthi=1 and type='slider1' order by stt,id desc";
	$d->query($sql);
	$quangcao1=$d->result_array();	
	
	$d->reset();
	$sql = "select ten$lang as ten,link,photo from #_slider where hienthi=1 and type='slider2' order by stt,id desc";
	$d->query($sql);
	$quangcao2=$d->result_array();		
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,icon,mota$lang as mota from #_news where type='bai-viet' and hienthi=1 order by stt,id desc";
	$d->query($sql);
	$baiviet = $d->result_array();	
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,photo,mota$lang as mota from #_news where type='tin-tuc' and hienthi=1 and noibat=1 order by stt,id desc";
	$d->query($sql);
	$tintuc = $d->result_array();
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,photo from #_news where type='danh-gia' and hienthi=1 and noibat=1 order by stt,id desc";
	$d->query($sql);
	$hoidap = $d->result_array();
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,photo from #_news where type='video' and hienthi=1 and noibat=1 order by stt,id desc";
	$d->query($sql);
	$video = $d->result_array();	
	
	$d->reset();
	$sql = "select ten$lang as ten,link,photo from #_slider where hienthi=1 and type='slider3' order by stt,id desc";
	$d->query($sql);
	$quangcao3=$d->result_array();	
	
	$d->reset();
	$sql = "select id,ten$lang as ten from #_loaidanhgia where type='website' order by stt asc";
	$d->query($sql);
	$loaidanhgia = $d->result_array();		
?>
<div class="wap_bx1">
	<div class="wapper">
    	<div class="title_kieudanh_thuonghieu">
        	<p>Khám phá <span>Xe đang bán</span></p>
            <ul class="showroom-tabs__nav clearfix">
                    <li class="showroom-tabs__nav__item is-active">
                        Kiểu dáng
                    </li>
                    <li class="showroom-tabs__nav__item last-item">
                        Thương hiệu
                    </li>
                <li class="hr"></li>
            </ul>
        </div>
    	<div class="row">
        	<div class="col-xs-8 col-xe">
            	<div class="tab_col clearfix">
                	<div class="list_col clearfix">
                	<?php foreach($kieudang as $v){ ?>
                    <div class="col-kieudang">
                    	<a href="kieu-dang/<?=$v['tenkhongdau']?>">
                        	<img src="thumb/220x105x2x100/<?=_upload_sanpham_l.$v['photo']?>" alt="<?=$v['ten']?>" />
                            <p><?=$v['ten']?></p>
                        </a>
                    </div>
                    <?php }?>
                    </div>
                    <hr class="showroom__list" />
                    <a href="kieu-dang.html" class="showroom__more-link">Hiển thị tất cả</a>
                </div>
                <div class="tab_col clearfix">
                	<div class="list_col clearfix">
                	<?php foreach($loaixe as $v){ ?>
                    <div class="col-kieudang">
                    	<a href="nha-san-xuat/<?=$v['tenkhongdau']?>">
                        	<img src="thumb/91x91x2x100/<?=_upload_sanpham_l.$v['photo']?>" alt="<?=$v['ten']?>" />
                            <p><?=$v['ten']?></p>
                        </a>
                    </div>
                    <?php }?>
                    </div>
                    <hr class="showroom__list" />
                    <a href="nha-san-xuat.html" class="showroom__more-link">Hiển thị tất cả</a>
                </div>
            </div>
            <div class="col-xs-4 col-squangcao">
            	<div class="sl_quangcao1">
                	<?php foreach($quangcao1 as $v){ ?>
                    <div>
                    	<p><a href="<?=$v['link']?>"><img src="thumb/380x332x1x90/<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a></p>
                    </div>
                    
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wap_quangcao2">
    <div class="sl_quangcao1">
        <?php foreach($quangcao2 as $v){ ?>
        <div>
            <p><a href="<?=$v['link']?>"><img src="thumb/1366x300x1x90/<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a></p>
        </div>
        
        <?php }?>
    </div>
</div>

<div class="w_baiviet">
	<div class="wapper">
    	<div class="slick_bv">
        	<?php foreach($baiviet as $v){ ?>
                <div>
                    <div class="in_pad">
                        <div class="bx_baiviet">
                            <a class="posimg" href="bai-viet/<?=$v['tenkhongdau']?>.html"><img src="<?=_upload_tintuc_l.$v['icon']?>" alt="<?=$v['ten']?>" /></a>
                            <div class="cont_bv">
                                <p><a href="bai-viet/<?=$v['tenkhongdau']?>.html"><?=$v['ten']?></a></p>
                                <?=catchuoi($v['mota'],150)?>
                                <p class="xemthem"><a href="bai-viet/<?=$v['tenkhongdau']?>.html">Xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
        </div>
    </div>
</div>

<div class="wap_tintuc">
	<div class="wapper">
    	<div class="tt_tieude text-center"><p>Tin tức & đánh giá xe</p></div>
        <div class="row">
        	<div class="col-xs-8 col-news">
            	<div class="w_news">
                	<div class="slick_news">
                    	<?php foreach($tintuc as $v){ ?>
                        <div>
                        	<div class="bx_n_pad">
                            	<div class="sl_new">
                                	<a href="tin-tuc/<?=$v['tenkhongdau']?>.html">
                                    	<img src="thumb/790x400x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"  />
                                    </a>
                                    <div class="info_tintuc">
                                    	<p class="ten_tintuc"><a href="tin-tuc/<?=$v['tenkhongdau']?>.html"><?=$v['ten']?></a></p>
                                        <div><?=catchuoi($v['mota'],300)?></div>
                                        <p class="p_xemthem text-right">
                                        	<a href="tin-tuc/<?=$v['tenkhongdau']?>.html">Xem thêm</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                
                <div class="w_hoidap">
                	<p class="tt_hoidap">Đánh giá</p>
                    <div class="slick_hoidap">
                    	<?php foreach($hoidap as $v){ ?>
                        <div>
                        	<div class="pad_hd">
                            	<div class="bx_hoidap">
                                	<a href="danh-gia/<?=$v['tenkhongdau']?>.html">
                                    	<img src="thumb/173x110x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>" />
                                    </a>
                                    <p><a href="danh-gia/<?=$v['tenkhongdau']?>.html"><?=$v['ten']?></a></p>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="text-right text-xt"><a href="danh-gia.html">Hiển thị tất cả</a></div>
                </div>
            </div>
            <div class="col-xs-4 col-video">
            	<div class="col-v">
                	<p class="tt_videof">Videos</p>
                	<div class="first-video">
                    	<a href="video/<?=$video[0]['tenkhongdau']?>.html">
                        	<img src="thumb/380x210x1x90/<?=_upload_tintuc_l.$video[0]['photo']?>" alt="<?=$video[0]['ten']?>"  />
                        </a>
                        <p><a href="video/<?=$video[0]['tenkhongdau']?>.html"><?=$video[0]['ten']?></a></p>
                    </div>
                    <div class="list_video">
                    	<div class="slick_video">
                        	<?php foreach($video as $k => $v){if($k==0){continue;} ?>
                            <div>
                            	<div class="pad_video">
                               		<div class="bx_video clearfix">
                                    	<a href="video/<?=$v['tenkhongdau']?>.html">
                                        	<img src="thumb/110x70x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"  />
                                        </a>
                                        <p><a href="video/<?=$v['tenkhongdau']?>.html"><?=$v['ten']?></a></p>
                                    </div>
                                </div>
                            </div>
                             
                            <?php }?>
                        </div>
                        <div class="text-right text-xt"><a href="video.html">Hiển thị tất cả</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wap_s_quangcao">
	<div class="wapper">
    	<div class="slick_qc3">
        	<?php foreach($quangcao3 as $v){ ?>
            <div>
            	<div class="pad_sl3">
                	<p><a href="<?=$v['link']?>"><img src="thumb/357x120x1x90/<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a></p>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<div class="chart_us">
	<div class="wapper">
    	<div class="tt_danhgiaxe text-center"> <p>Người dùng đánh giá <?=$company['ten']?></p></div>
    	<div class="row">
        	<?php foreach($loaidanhgia as $v){ $pes=get_pes($v['id']);?>
        	<div class="col-xs-3 col-chart text-center t1">
            	 <div id="test-circle<?=$v['id']?>" data-pes=<?=$pes?> class="pes"></div>
                 <p><?=$v['ten']?></p>
            </div>
            <?php }?>
            
        </div>
    </div>
</div>