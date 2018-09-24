<?php
	$d->reset();
	$sql = "select ten$lang as ten,link,photo from #_slider where hienthi=1 and type='kieudang' order by stt,id desc";
	$d->query($sql);
	$slider_kd_nsx=$d->result_array();
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='kieu-dang' order by stt,id desc";
	$d->query($sql);
	$kieudang=$d->result_array();
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='loaixe' order by stt,id desc";
	$d->query($sql);
	$loaixe=$d->result_array();		
?>

    <div class="slider_thuonghieu">
        <div class="slick_sl">
            <?php foreach($slider_kd_nsx as $v){ ?>
            <div>
                <p>
                    <a href="<?=$v['link']?>" title="<?=$v['ten']?>">
                        <img src="<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" />
                    </a>
                </p>
            </div>
            <?php }?>
        </div>
    </div>
	<div class="wap_in wap_white">
    <div class="wapper">
        <div class="tt_thuonghieu">
            <p>Khám phá xe đang bán</p>
        </div>
        <div class="text-center">
        	<ul class="ul_kd_th clearfix">
                <li class="<?php if($_GET['com']=='kieu-dang'){echo 'act';} ?>">Kiểu dáng</li>
                <li class="<?php if($_GET['com']=='nha-san-xuat'){echo 'act';} ?>">Thương hiệu</li>
            </ul>
        </div>
        <div class="tabs_in_kd_th">
        	<div class="tab_in_kd_th">
            	<div class="row1">
                	<?php foreach($kieudang as $v){ ?>
                    <div class="col-xs-4 text-center col-tt">
                    	<a href="kieu-dang/<?=$v['tenkhongdau']?>">
                        	<img src="<?=_upload_sanpham_l.$v['photo']?>" alt="<?=$v['ten']?>" />
                            <p><?=$v['ten']?></p>
                        </a>
                    </div>
                    <?php }?>
                </div>
            </div>
            <div class="tab_in_kd_th">
            	<div class="row1">
                	<?php foreach($loaixe as $v){ ?>
                    <div class="col-xs-3 text-center col-tt">
                    	<a href="nha-san-xuat/<?=$v['tenkhongdau']?>">
                        	<img src="<?=_upload_sanpham_l.$v['photo']?>" alt="<?=$v['ten']?>" />
                            <p><?=$v['ten']?></p>
                        </a>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>