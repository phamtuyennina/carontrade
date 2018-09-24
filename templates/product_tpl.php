<div class="wap_in">
	<div class="wapper clearfix">
    	<div class="col-mantin">
        	<div class="clearfix">
            	<div class="left_tk"><?php include _template."layout/left_tk.php";?></div>
                <div class="man_tin">
                	<div class="title_timkiem">
                        <p title="<?=$title_cat?>"><?=$title_cat?></p>
                    </div>
                    <div class="boloctin">
                    	<div class="bx_boloc">
                        	<span>Xếp theo:</span>
                           <select onchange="if(this.value) window.location.href=this.value">
                    			<option <?php if(empty($_GET['sort']) or $_GET['sort']==1){echo 'selected="selected"';} ?> value="<?=getCurrentPageURL()?>&sort=1">Tin mới nhất</option>
                    			<option <?php if($_GET['sort']==2){echo 'selected="selected"';} ?> value="<?=getCurrentPageURL()?>&sort=2">Tin cũ nhất</option>
                		  </select>
                        </div>
                    </div>
                    <div class="show_dulieu">
                    	<?php foreach($product as $v){ 
							$arr_hinhanh=explode('|',$v['hinhanh']);
							$arr_hinhanh=array_diff($arr_hinhanh,array(''));
							$arr_hinhanh=array_values($arr_hinhanh);
						?>
                        <div class="bx_dulieu">
                        	<div class="ten_dulieu">
                            	<p><a title="<?=$v['ten']?>" href="chi-tiet/<?=$v['tenkhongdau']?>.html"><?=$v['ten']?></a></p>
                            </div>
                            <div class="album_car">
                            	<div class="media-icons">
                                    <div class="photos-count">
                                        <div class="count"><?=count($arr_hinhanh)?></div>
                                    </div>
                                </div>
                            	<div class="slick_hinh_all">
									<?php foreach($arr_hinhanh as $k){if($k==''){continue;} ?>
                                    <div>
                                        <p>
                                            <a title="<?=$v['ten']?>" href="chi-tiet/<?=$v['tenkhongdau']?>.html">
                                                <img src="thumb/560x370x1x90/<?=_upload_tmp_l.$k?>" alt="<?=$v['ten']?>"  />
                                            </a>
                                        </p>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                            <div class="info_dulieu">
                            	<div class="thongtin_mota clearfix">
                                	<span class="sp_dl">
										<i>Nhà sản xuất</i>
										<b><?=GetTenById('product_danhmuc','loaixe',$v['id_hang'])?></b>
                                    </span>
                                    <span class="sp_dl">
										<i>Số Km</i>
										<b><?=number_format($v['sokm'],0, ',', '.')?></b>
                                    </span>
                                    <span class="sp_dl">
										<i>Kiểu dáng</i>
										<b><?=GetTenById('product_danhmuc','kieu-dang',$v['id_kieudang'])?></b>
                                    </span>
                                    <span class="sp_dl">
										<i>Hộp số</i>
										<b><?=GetTenByType('quanly_danhmuc','loaihopso',$v['hopso'])?></b>
                                    </span>
                                    <span class="sp_dl">
										<i>Nhiên liệu</i>
										<b><?=GetTenByType('quanly_danhmuc','loainhienlieu',$v['nhienlieu'])?></b>
                                    </span>
                                    <p class="gia_xe">
                                    	<?=number_format($v['giatien'],0, '.', '.')?> VNĐ
                                    </p>
                                </div>
                                <div class="mota_dulieu">
                                	<?=catchuoi(trim(strip_tags($v['noidung'])),300)?>
                                </div>
                                <div class="info_user">
                                	<p class="p_tinhtrang"><?=getLoaiThanhVienById($v['id_user'])?>: <?=($v['tinhtrang']=='xe-moi')?'Xe mới':'Đã sử dụng'?></p>
                                    <p class="p_khuvuc"><img src="images/loc.png" alt="<?=$company['ten']?>" /> <?=get_tinh($v['quan'])?></p>
                                    <p class="xemthem">
                                    	<a title="<?=$v['ten']?>" href="chi-tiet/<?=$v['tenkhongdau']?>.html">Xem thêm</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php }?>
                        <div class="clear"></div>
						<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
                    </div>
                
                </div>
            </div>
        </div>
        <div class="col-manright">
        	<?php include _template."layout/right.php";?>
        </div>
    </div>
</div>