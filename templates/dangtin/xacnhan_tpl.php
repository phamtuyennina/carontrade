<?php 
	$d->reset();
	$sql_thanhpho = "select id,ten from #_place_city where hienthi=1 order by stt,id asc";
	$d->query($sql_thanhpho);
	$thanhpho = $d->result_array();	
	if(!empty($_SESSION['dangtin']['tinhthanh'])){
		$d->reset();
		$sql_quanhuyen = "select id,ten from #_place_dist where hienthi=1 and id_city=".$_SESSION['dangtin']['tinhthanh']." order by stt,id asc";
		$d->query($sql_quanhuyen);
		$quanhuyen = $d->result_array();		
	}
	
	$d->reset();
	$sql = "select id,ten$lang as ten,gia,thoigian from #_quanly_danhmuc where hienthi=1 and type='tin-thuong' order by stt,id asc";
	$d->query($sql);
	$get_tinthuong = $d->result_array();
	
	$d->reset();
	$sql = "select id,ten$lang as ten,gia,thoigian from #_quanly_danhmuc where hienthi=1 and type='tin-khuyen-mai' order by stt,id asc";
	$d->query($sql);
	$get_tinkhuyenmai = $d->result_array();
	
	$d->reset();
	$sql = "select id,ten$lang as ten,gia,thoigian from #_quanly_danhmuc where hienthi=1 and type='tin-tiet-kiem' order by stt,id asc";
	$d->query($sql);
	$get_tietkiem = $d->result_array();
	
	$d->reset();
	$sql = "select id,ten$lang as ten,gia,thoigian from #_quanly_danhmuc where hienthi=1 and type='tin-linh-dong' order by stt,id asc";
	$d->query($sql);
	$get_tinlinhdong = $d->result_array();
	
	$d->reset();
	$sql = "select id,ten$lang as ten,gia,thoigian from #_quanly_danhmuc where hienthi=1 and type='tin-supper' order by stt,id asc";
	$d->query($sql);
	$get_tinsupper = $d->result_array();	
	
?>
<div class="wap_in">
	<div class="wapper">
    	<?php include _template."layout/top_dt.php";?>
    	<div class="bx_dangtin">
        	<div class="tt_top">
            	<p>Chọn <span>quận huyện</span> </p>
            </div>
        	<form id="chonmauxe">
            	<div class="bx_form1 clearfix">
                    <div class="tk50">
                        <div class="select_search">
                            <span class="pos">Tỉnh thành:</span>
                            <select id="tinhthanh" name="tinhthanh" class="js-example-responsive1" data-placeholder="Chọn tỉnh thành">
                                <option></option>
                                <?php foreach($thanhpho as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['tinhthanh']==$v['id']){echo 'selected';} ?> value="<?=$v['id']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="tk50">
                        <div class="select_search">
                            <span class="pos">Quận huyện:</span>
                            <select id="quanhuyen" name="quanhuyen" class="js-example-responsive1" data-placeholder="Chọn quận huyện">
                                <option></option>
                                <?php foreach($quanhuyen as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['quanhuyen']==$v['id']){echo 'selected';} ?> value="<?=$v['id']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
								<div class="tt_top">
										<p>Chọn <span>loại tin đăng</span> </p>
									</div>
								<div class="bx_form1 clearfix">
									<div class="tk50">
											<div class="select_search clearfix">
												<div class="loaitindang">
													<span class="pos">Chọn loại tin:</span>
													<select id="loaitin" name="loaitin" class="js-example-responsive1" data-placeholder="Chọn loại tin">
															<option></option>
															<option value="5">Tin Thường</option>
															<option value="4">Tin Khuyến mãi</option>
															<option value="3">Tin Tiết kiệm</option>
															<option value="2">Tin Linh động</option>
															<option value="1">Tin Supper</option>
													</select>
												</div>
											</div>
									</div>
								</div>
								<div class="bx_form1 clearfix">
									<div class="tab_tinthuong tab_tintuc">
										<div class="show_luachon">
											<?php foreach ($get_tinsupper as $v) {?>
												<div class="pad_tint_lc">
													<div class="bx_tinzz_lcv supper clearfix">
														<div class="lc_col1">
															<p>Supper</p>
															<div>
																<p><?=$v['ten']?></p>
																<p>
																		<?php if($v['gia']>0){ ?>
																			<?=number_format($v['gia'],0, '.', '.')?> vnđ
																		<?php }else{?>
																	  	Miễn phí <span>(*)</span>
																		<?php }?>
																</p>
															</div>
														</div>
														<div class="lc_col2">
															<p>
																<label for="rad_<?=$v['id']?>">Chọn</label>
																<input id="rad_<?=$v['id']?>" type="radio" name="goitin" value="<?=$v['id']?>" /></p>
														</div>
													</div>
												</div>
											<?php }?>
										</div>
									</div>
									<div class="tab_tinthuong tab_tintuc">
										<div class="show_luachon">
											<?php foreach ($get_tinlinhdong as $v) {?>
												<div class="pad_tint_lc">
													<div class="bx_tinzz_lcv linhdong clearfix">
														<div class="lc_col1">
															<p>Linh động</p>
															<div>
																<p><?=$v['ten']?></p>
																<p>
																		<?php if($v['gia']>0){ ?>
																			<?=number_format($v['gia'],0, '.', '.')?> vnđ
																		<?php }else{?>
																			Miễn phí <span>(*)</span>
																		<?php }?>
																</p>
															</div>
														</div>
														<div class="lc_col2">
															<p>
																<label for="rad_<?=$v['id']?>">Chọn</label>
																<input id="rad_<?=$v['id']?>" type="radio" name="goitin" value="<?=$v['id']?>" /></p>
														</div>
													</div>
												</div>
											<?php }?>
										</div>
									</div>
									
									<div class="tab_tinthuong tab_tintuc">
										<div class="show_luachon">
											<?php foreach ($get_tietkiem as $v) {?>
												<div class="pad_tint_lc">
													<div class="bx_tinzz_lcv tietkiem clearfix">
														<div class="lc_col1">
															<p>Tiết kiệm</p>
															<div>
																<p><?=$v['ten']?></p>
																<p>
																		<?php if($v['gia']>0){ ?>
																			<?=number_format($v['gia'],0, '.', '.')?> vnđ
																		<?php }else{?>
																			Miễn phí <span>(*)</span>
																		<?php }?>
																</p>
															</div>
														</div>
														<div class="lc_col2">
															<p>
																<label for="rad_<?=$v['id']?>">Chọn</label>
																<input id="rad_<?=$v['id']?>" type="radio" name="goitin" value="<?=$v['id']?>" /></p>
														</div>
													</div>
												</div>
											<?php }?>
										</div>
									</div>
									<div class="tab_tinthuong tab_tintuc">
										<div class="show_luachon">
											<?php foreach ($get_tinkhuyenmai as $v) {?>
												<div class="pad_tint_lc">
													<div class="bx_tinzz_lcv khuyenmai clearfix">
														<div class="lc_col1">
															<p>Khuyến mãi</p>
															<div>
																<p><?=$v['ten']?></p>
																<p>
																		<?php if($v['gia']>0){ ?>
																			<?=number_format($v['gia'],0, '.', '.')?> vnđ
																		<?php }else{?>
																			Miễn phí <span>(*)</span>
																		<?php }?>
																</p>
															</div>
														</div>
														<div class="lc_col2">
															<p>
																<label for="rad_<?=$v['id']?>">Chọn</label>
																<input id="rad_<?=$v['id']?>" type="radio" name="goitin" value="<?=$v['id']?>" /></p>
														</div>
													</div>
												</div>
											<?php }?>
										</div>
									</div>
									<div class="tab_tinthuong tab_tintuc">
										<div class="show_luachon">
											<?php foreach ($get_tinthuong as $v) {?>
												<div class="pad_tint_lc">
													<div class="bx_tinzz_lcv clearfix">
														<div class="lc_col1">
															<p>Tin Thường</p>
															<div>
																<p><?=$v['ten']?></p>
																<p>
																		<?php if($v['gia']>0){ ?>
																			<?=number_format($v['gia'],0, '.', '.')?> vnđ
																		<?php }else{?>
																			Miễn phí <span>(*)</span>
																		<?php }?>
																</p>
															</div>
														</div>
														<div class="lc_col2">
															<p>
																<label for="rad_<?=$v['id']?>">Chọn</label>
																<input id="rad_<?=$v['id']?>" type="radio" name="goitin" value="<?=$v['id']?>" /></p>
														</div>
													</div>
												</div>
											<?php }?>
										</div>
									</div>
									
								</div>
                <input name="pjax" type="hidden" value="6" />
            </form>
            <div class="bot_form clearfix">
                <p class="text-left"><a href="javascript:void(0)" onclick="click_prev();" class="a_quaylai"><i class="fa fa-chevron-left" aria-hidden="true"></i> Quay lại</a></p>
                <p class="text-center"><a href="javascript:void(0)" onclick="dangtin()" class="a_hoantat">Đăng tin</a></p>
            </div>
        </div>
        
    </div>
</div>
