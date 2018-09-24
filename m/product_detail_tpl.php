<link href="magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="css/tab.css" type="text/css" rel="stylesheet" />
<?php 
	$d->reset();
	$sql = "select ten$lang as ten,link,photo from #_slider where hienthi=1 and type='slider3' order by stt,id desc";
	$d->query($sql);
	$quangcao3=$d->result_array();	
?>
<div class="wap_in">
	<div class="wapper clearfix">
    	<div class="col-mantin">
        <div class="wap_white">
        	<div class="ten_dulieu">
                 <p><a title="<?=$v['ten']?>" href="javascript:void(0)"><?=$row_detail['ten']?></a></p>
            </div>
            <div class="noidungchinh1">
            	<div class="row">
                	
                    <div class="col-xs-8 col-hinhanhcar pull-right">
                    	<div class="slick2">
                        	<?php foreach($ar_hinhanh as $v){if($v==''){continue;} ?>
                            <a href="<?=_upload_tmp_l.$v?>" title="<?=$row_detail['ten']?>">
                            	<img src="<?=_upload_tmp_l.$v?>" alt="<?=$row_detail['ten']?>"  />
                            </a>
                            <?php }?>
                        </div>
                        <div class="slick">
                        	<?php foreach($ar_hinhanh as $v){if($v==''){continue;} ?>
                            <p><img src="thumb/104x58x1x90/<?=_upload_tmp_l.$v?>" alt="<?=$row_detail['ten']?>"  /></p>
							<?php }?>
                        </div>
                    </div>
                    <div class="col-xs-4 col-thongsocoban pull-left">
                    	<ul class="clearfix">
                        	<li>
                            	<img src="images/i_dongco.png" alt="Odometer" onError="this.src='http://placehold.it/50x50';" />
                            	<div>
                            	<p><?=GetTenByType('quanly_danhmuc','loaidongco',$row_detail['dongco'])?></p>
                                <span>Động cơ</span>
                                </div>
                            </li>
                        	<li>
                            	<img src="images/i_odo.png" alt="Odometer" onError="this.src='http://placehold.it/50x50';" />
                            	<div>
                            	<p><?=number_format($row_detail['sokm'],0, ',', ',')?> km</p>
                                <span>Odometer</span>
                                </div>
                            </li>
                            <li>
                            	<img src="images/i_kieudang.png" alt="Kiểu dáng"  />
                            	<div>
                            	<p><?=GetTenById('product_danhmuc','kieu-dang',$row_detail['id_kieudang'])?></p>
                                <span>Kiểu dáng</span>
                                </div>
                            </li>
                            <li>
                            	<img src="images/i_hopso.png" alt="Hộp số"  />
                            	<div>
                            	<p><?=GetTenByType('quanly_danhmuc','loaihopso',$row_detail['hopso'])?></p>
                                <span>Hộp số</span>
                                </div>
                            </li>
                            <li>
                            	<img src="images/i_nhienlieu.png" alt="Nhiên liệu"  />
                            	<div>
                            	<p><?=GetTenByType('quanly_danhmuc','loainhienlieu',$row_detail['nhienlieu'])?></p>
                                <span>Nhiên liệu</span>
                                </div>
                            </li>
                        </ul>
                        <div class="gia_car text-center">
                        	<p><?=number_format($row_detail['giatien'],0, '.', '.')?> VNĐ</p>
                        </div>
                        <div class="car_tintrang">
                        	<p class="p_tinhtrang"><?=getLoaiThanhVienById($row_detail['id_user'])?>: <?=($row_detail['tinhtrang']=='xe-moi')?'Xe mới':'Đã sử dụng'?></p>
                        </div>
                    </div>
                </div>
            </div>
           </div>
           
            <div class="wap_white wap_page">
            	<ul>
                	<li>Mô tả chi tiết</li>
                    <li>Đặc điểm kỹ thuật</li>
                </ul>
                <div class="v_tags">
                	<div class="v_tag">
                    	<?=$row_detail['noidung']?>
                    </div>
                    <div class="v_tag">
                    	<ul class="ul_kythuat">
                        	<li>
                            	<p><span>Hãng sản xuất: </span> <?=GetTenById('product_danhmuc','loaixe',$row_detail['id_hang'])?></p>
                            </li>
                            <li>
                            	<p><span>Kiểu dáng: </span> <?=GetTenById('product_danhmuc','kieu-dang',$row_detail['id_kieudang'])?></p>
                            </li>
                            <li>
                            	<p><span>Mẫu xe: </span> <?=GetTenById('product_danhmuc','mau-xe',$row_detail['id_mauxe'])?></p>
                            </li>
                            <li>
                            	<p><span>Năm sản xuất: </span> <?=$row_detail['nam']?></p>
                            </li>
                            <li>
                            	<p><span>Hộp số: </span> <?=GetTenByType('quanly_danhmuc','loaihopso',$row_detail['hopso'])?></p>
                            </li>
                            <li>
                            	<p><span>Động cơ: </span> <?=GetTenByType('quanly_danhmuc','loaidongco',$row_detail['dongco'])?></p>
                            </li>
                            <li>
                            	<p><span>Nhiên liệu: </span> <?=GetTenByType('quanly_danhmuc','loainhienlieu',$row_detail['nhienlieu'])?></p>
                            </li>
                            
                            <li>
                            	<p><span>Màu sắc: </span> <?=GetTenByType('quanly_danhmuc','mausac',$row_detail['mausac'])?></p>
                            </li>
                            <li>
                            	<p><span>Số ghế: </span> <?=GetTenByType('quanly_danhmuc','soghe',$row_detail['soghe'])?></p>
                            </li>
                            <li>
                            	<p><span>Số cửa: </span> <?=GetTenByType('quanly_danhmuc','socua',$row_detail['socua'])?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="wap_white wap_page" style="padding-top:15px;margin-bottom:12px;">
            	<div class="tt_dinhgia">Bạn muốn biết giá trị xe của bạn là bao nhiêu ?</div>
                <div class="v_link">Hãy để <a href="dinh-gia-xe.html">định giá</a> giúp bạn đơn giản hóa vấn đề !</div>
            </div>
            
            <div class="wap_s_quangcao1">
                <div class="wapper">
                    <div class="slick_qc4">
                        <?php foreach($quangcao3 as $v){ ?>
                        <div>
                            <div class="pad_sl3">
                                <p><a href="<?=$v['link']?>"><img src="thumb/385x130x1x90/<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a></p>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-manright"><?php include _template."layout/right.php";?></div>
        <div class="banner_qc">
        	<div class="slick_vv">
            	<?php foreach($row_qc as $v){ ?>
                <div>
                	<p><a href="<?=$v['link']?>"><img src="thumb/550x80x1x90/<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a></p>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
