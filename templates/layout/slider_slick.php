<?php
	$d->reset();
	$sql_slider = "select ten$lang as ten,link,photo from #_slider where hienthi=1 and type='slider' order by stt,id desc";
	$d->query($sql_slider);
	$slider=$d->result_array();
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='loaixe' order by stt,id desc";
	$d->query($sql);
	$nhasanxuat=$d->result_array();
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='kieu-dang' order by stt,id desc";
	$d->query($sql);
	$kieudang=$d->result_array();	
	
	$d->reset();
	$sql="select ten$lang as ten,id from #_place_city order by id asc";
	$d->query($sql);
	$khuvuc=$d->result_array();	
	
	$d->reset();
	$sql="select id,ten$lang as ten,gia from #_quanly_danhmuc where hienthi=1 and type='giaxe' order by stt desc";
	$d->query($sql);
	$giaxe=$d->result_array();			
?>
<div id="slider_slick">
	<?php  for($i=0,$count_slider=count($slider);$i<$count_slider;$i++){ ?>
    	<div>
        	<p>
			<?php if($slider[$i]['link']!='')echo '<a href="'.$slider[$i]['link'].'" target="_blank">' ?>	
                <img src="<?=_upload_hinhanh_l.$slider[$i]['photo']?>" title="<?=$slider[$i]['ten']?>"/>
            <?php if($slider[$i]['link']!='')echo '</a>' ?>
    		</p>
        </div>
	<?php } ?>
</div>
<div class="from_timkiem">
	<p class="tt_timkiem">Tìm xe theo ý bạn</p>
    <form action="index.php" enctype="multipart/form-data" method="get" id="frm_search_index">
    	<input type="hidden" name="com" value="tim-kiem"  />
        <div class="main-search-form-header">
        	<input type="radio" name="tinhtrang" onchange="dem_xetimkiem()" id="adTypeallRadio"  value="all" checked="checked">
            <label for="adTypeallRadio">Tất cả</label>
            <input type="radio" name="tinhtrang" onchange="dem_xetimkiem()" id="adTypenewRadio1"  value="xe-moi">
            <label for="adTypenewRadio1">Mới</label>
            <input type="radio" name="tinhtrang" onchange="dem_xetimkiem()" id="adTypeusedRadio2" value="xe-da-su-dung">
            <label for="adTypeusedRadio2">Đã sử dụng</label>
            <span class="main-search-form-header__ad-type-indicator"></span>
        </div>
        <div class="body_search">
        	<div class="select_search">
            	<select onchange="dem_xetimkiem()" id="hangxe" data-placeholder="Chọn hãng xe" name="id_hang" class="js-example-responsive">
                	<option></option>
                    <?php foreach($nhasanxuat as $v){ ?>
                    <option value="<?=$v['id']?>"><?=$v['ten']?></option>
                    <?php }?>
                </select>
            </div>
             <div class="select_search">
            	<select onchange="dem_xetimkiem()" id="kieudang" name="id_kieudang" data-placeholder="Chọn kiểu dáng" class="js-example-responsive">
                	<option></option>
                	<?php foreach($kieudang as $v){ ?>
                    <option value="<?=$v['id']?>"><?=$v['ten']?></option>
                    <?php }?>
                    
                </select>
            </div>
            <div class="select_search">
            	<select onchange="dem_xetimkiem()" id="mauxe" data-placeholder="Chọn mẫu xe" name="id_mauxe" class="js-example-responsive">
                	<option></option>
                    
                </select>
            </div>
           
            <div class="select_search clearfix">
            	<div class="w_s50">
                	<select onchange="dem_xetimkiem()" id="giatu" name="giatu" data-placeholder="Giá thấp nhất" class="js-example-responsive">
                		<option></option>
                        <?php foreach($giaxe as $v){ ?>
                        <option value="<?=$v['gia']?>"><?=number_format($v['gia'],0, ',', '.')?></option>
                        <?php }?>
                	</select>
                </div>
                <div class="w_s50">
                	<select onchange="dem_xetimkiem()" id="giaden" name="giaden" data-placeholder="Giá cao nhất" class="js-example-responsive">
                		<option></option>
                        <?php foreach($giaxe as $v){ ?>
                        <option value="<?=$v['gia']?>"><?=number_format($v['gia'],0, ',', '.')?></option>
                        <?php }?>
                	</select>
                </div>
            	
            </div>
            <div class="select_search">
            	<select onchange="dem_xetimkiem()" id="khuvuc" name="quan" data-placeholder="Chọn khu vực" class="js-example-responsive">
                	<option></option>
                    <?php foreach($khuvuc as $v){ ?>
                    <option value="<?=$v['id']?>"><?=$v['ten']?></option>
                    <?php }?>
                </select>
            </div>
            <div class="select_search">
            	<input type="text" name="tukhoa" id="tukhoa" placeholder="Nhập từ khóa tìm kiếm"  />
            </div> 
            <p><a href="tim-xe.html">Tìm kiếm nâng cao</a></p>
        </div>
        <div class="text-center">
        	<p class="click_sform">Hiển thị tất cả: <span><?=number_format(demallcar('all'),0, ',', '.')?> xe  </span> <i class="fa fa-angle-right" aria-hidden="true"></i></p>
        </div>
    </form>
</div>
<?php 
	$d->reset();
	$sql_contact1 = "select noidung$lang as noidung from #_about where type='link' limit 0,1";
	$d->query($sql_contact1);
	$company_contact1 = $d->fetch_array();
?>
<div class="ww_danhgia">
	<div class="wapper clearfix">
    	<div class="row">
        	<div class="col-xs-6 col-ppz text-left">
            	<p><a class="act" href="dang-tin/chon-mau-xe">Bán xe của tôi</a></p>
                <p><a href="dinh-gia-xe.html">Định giá xe</a></p>
            </div>
            <div class="col-xs-6 text-right pull-right" style="margin-top:29px;margin-right:-63px;">
            	<div><?=$company_contact1['noidung']?></div>
            </div>
        </div>
    </div>
</div>


