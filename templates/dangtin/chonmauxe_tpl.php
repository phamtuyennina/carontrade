<?php 
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='loaixe' order by stt,id desc";
	$d->query($sql);
	$nhasanxuat=$d->result_array();
	
	$d->reset();
	$sql="select id,ten$lang as ten from #_quanly_danhmuc where hienthi=1 and type='namsanxuat' order by stt desc";
	$d->query($sql);
	$namsanxuat=$d->result_array();
?>
<div class="wap_in">
	<div class="wapper">
    	<?php include _template."layout/top_dt.php";?>
        <div class="bx_dangtin">
        	<div class="tt_top">
            	<p>Bạn đang muốn <span>đăng bán</span> loại xe nào ?</p>
                Xin hãy chọn mẫu xe của bạn ở mục bên dưới.
            </div>
            <form id="chonmauxe">
            	<div class="bx_form1 clearfix">
                    <div class="tk50">
                        <div class="select_search">
                            <span class="pos">Nhà sản xuất:</span>
                            <select id="hangxe1" name="hangxe" class="js-example-responsive1 chonhangxe" data-placeholder="Chọn hãng xe">
                                <option></option>
                                <?php foreach($nhasanxuat as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['nhasanxuat']==$v['id']){echo 'selected';} ?> value="<?=$v['id']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="tk50">
                        <div class="select_search">
                            <span class="pos">Kiểu dáng:</span>
                            <select id="kieudang1" name="kieudang" class="js-example-responsive1 chonkieudang" data-placeholder="Chọn kiểu dáng">
                                <option></option>
                                <?php  foreach($kieudang12 as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['kieudang']==$v['id']){echo 'selected';} ?> value="<?=$v['id']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="bx_form1 clearfix">
                    <div class="tk50">
                        <div class="select_search">
                            <span class="pos">Mẫu xe:</span>
                            <select id="mauxe1" name="mauxe" class="js-example-responsive1 chonmauxe" data-placeholder="Chọn mẫu xe">
                                <option></option>
                                <?php  foreach($mauxe as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['mauxe']==$v['id']){echo 'selected';} ?> value="<?=$v['id']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="tk50">
                        <div class="select_search">
                            <span class="pos">Năm:</span>
                            <select id="nam" name="nam" class="js-example-responsive1" data-placeholder="">
                                <option></option>
                                <?php foreach($namsanxuat as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['nam']==$v['ten']){echo 'selected';} ?> value="<?=$v['ten']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
                <input id="in_title" type="hidden" value="<?=$title?>"  />
                <input name="pjax" type="hidden" value="1" />
            </form>
            <div class="bot_form clearfix">
                <p class="text-left"><a style="display:none;" href="javascript:void(0)" class="a_quaylai"><i class="fa fa-chevron-left" aria-hidden="true"></i> Quay lại</a></p>
                <p class="text-center"><a href="javascript:void(0)" onclick="dangtin()" class="a_hoantat">Đăng tin</a></p>
                <p class="text-right"><a href="javascript:void(0)" onclick="click_next();" class="a_tieptheo">Tiếp theo</a></p>
            </div>
        </div>
    </div>
</div>