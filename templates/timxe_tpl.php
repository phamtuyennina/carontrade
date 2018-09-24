<?php 
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_quanly_danhmuc where hienthi=1 and type='xuatsu' order by stt,id desc";
	$d->query($sql);
	$xuatsu=$d->result_array();
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_quanly_danhmuc where hienthi=1 and type='dandong' order by stt,id desc";
	$d->query($sql);
	$dandong=$d->result_array();	

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='loaixe' order by stt,id desc";
	$d->query($sql);
	$nhasanxuat=$d->result_array();
	
	$d->reset();
	$sql="select id,ten$lang as ten from #_quanly_danhmuc where hienthi=1 and type='namsanxuat' order by stt desc";
	$d->query($sql);
	$namsanxuat=$d->result_array();	
	
	$d->reset();
	$sql="select id,ten$lang as ten,gia from #_quanly_danhmuc where hienthi=1 and type='giaxe' order by stt desc";
	$d->query($sql);
	$giaxe=$d->result_array();	
	
	$d->reset();
	$sql="select id,ten$lang as ten,sokm from #_quanly_danhmuc where hienthi=1 and type='sokm' order by stt desc";
	$d->query($sql);
	$sokm=$d->result_array();
	
	$d->reset();
	$sql="select id,ten$lang as ten,tenkhongdau from #_quanly_danhmuc where hienthi=1 and type='mausac' order by stt desc";
	$d->query($sql);
	$mausac=$d->result_array();	
	
	$d->reset();
	$sql="select id,ten$lang as ten,tenkhongdau from #_quanly_danhmuc where hienthi=1 and type='soghe' order by stt desc";
	$d->query($sql);
	$soghe=$d->result_array();	
	
	$d->reset();
	$sql="select id,ten$lang as ten,tenkhongdau from #_quanly_danhmuc where hienthi=1 and type='socua' order by stt desc";
	$d->query($sql);
	$socua=$d->result_array();	
	
	$d->reset();
	$sql="select id,ten$lang as ten,tenkhongdau from #_quanly_danhmuc where hienthi=1 and type='loainhienlieu' order by stt desc";
	$d->query($sql);
	$loainhienlieu=$d->result_array();
	
	$d->reset();
	$sql="select id,ten$lang as ten,tenkhongdau from #_quanly_danhmuc where hienthi=1 and type='loaidongco' order by stt desc";
	$d->query($sql);
	$loaidongco=$d->result_array();	
	
	$d->reset();
	$sql="select id,ten$lang as ten,tenkhongdau from #_quanly_danhmuc where hienthi=1 and type='loaihopso' order by stt desc";
	$d->query($sql);
	$loaihopso=$d->result_array();							
	

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='kieu-dang' order by stt,id desc";
	$d->query($sql);
	$kieudang=$d->result_array();
?>
<div class="wap_in wap_white">
	<div class="wapper clearfix">
    	<div class="col-mantin">
        	<div class="top-panel__container">
            	<p class="tt_timkiem">Bạn đang tìm kiếm mẫu xe nào ?</p>
                <div class="home-page__make-model-search">
                	<form id="timxe" enctype="multipart/form-data" method="get" action="index.php">
                    <input type="hidden" value="tim-kiem" name="com"  />
                    	<div class="xemoi_xecu clearfix">
                        	<input id="tt_tatcaxe" type="radio" name="tinhtrang" checked value="">
                            <label for="tt_tatcaxe">Tất cả</label>
                            <input id="tt_xemoi" type="radio" name="tinhtrang" value="xe-moi">
                            <label for="tt_xemoi">Xe mới</label>
                            <input id="tt_xecu" type="radio" name="tinhtrang" value="xe-da-su-dung">
                            <label for="tt_xecu">Xe cũ</label>
                            <hr>
                        </div>
                        <div class="bx_form1 clearfix">
                        	<div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Nhà sản xuất:</span>
                                    <select id="hangxe" name="id_hang" class="js-example-responsive1" data-placeholder="Chọn hãng xe">
                                        <option></option>
                                        <?php foreach($nhasanxuat as $v){ ?>
                                        <option value="<?=$v['id']?>"><?=$v['ten']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Kiểu dáng:</span>
                                    <select id="kieudang" name="id_kieudang" class="js-example-responsive1" data-placeholder="Chọn kiểu dáng">
                                        <option></option>
										<?php foreach($kieudang as $v){ ?>
                                        <option value="<?=$v['id']?>"><?=$v['ten']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="bx_form1 clearfix">
                        	<div class="tk100">
                            	<div class="select_search">
                                	<span class="pos">Mẫu xe:</span>
                                    <select id="mauxe" name="id_mauxe" class="js-example-responsive1" data-placeholder="Chọn mẫu xe">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bx_form1 clearfix">
                        	<div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Giá thấp nhất:</span>
                                    <select id="giatu" name="giatu" class="js-example-responsive1" data-placeholder="">
                                        <option></option>
                                         <?php foreach($giaxe as $v){ ?>
                                        <option value="<?=$v['gia']?>"><?=number_format($v['gia'],0, ',', '.')?> vnđ</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="tk50">
                            	<div class="select_search">
                                <span class="pos">Giá cao nhất:</span>
                                    <select id="giaden" name="giaden" class="js-example-responsive1" data-placeholder="">
                                        <option></option>
                                         <?php foreach($giaxe as $v){ ?>
                                        <option value="<?=$v['gia']?>"><?=number_format($v['gia'],0, ',', '.')?> vnđ</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bx_form1 clearfix">
                        	<div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Từ năm:</span>
                                    <select id="tunam" name="namtu" class="js-example-responsive1" data-placeholder="">
                                        <option></option>
                                        <?php foreach($namsanxuat as $v){ ?>
                                        <option value="<?=$v['ten']?>"><?=$v['ten']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Đến năm:</span>
                                    <select id="dennam" name="namden" class="js-example-responsive1" data-placeholder="">
                                        <option></option>
                                        <?php foreach($namsanxuat as $v){ ?>
                                        <option value="<?=$v['ten']?>"><?=$v['ten']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bx_form1 clearfix">
                        	<div class="tk100">
                            	<input type="text" value="" placeholder="Nhập từ khóa tìm kiếm" >
                            </div>
                        </div>
                        <div class="main-search-form__heading"><p>Động cơ</p></div>
                        <div class="bx_form1 clearfix">
                        	<div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Hộp số:</span>
                                    <select id="hopso" name="hopso" class="js-example-responsive1" data-placeholder="Loại hộp số">
                                        <option></option>
                                        <?php foreach($loaihopso as $v){ ?>
                                        <option value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Nhiên liệu:</span>
                                    <select id="nhienlieu" name="nhienlieu" class="js-example-responsive1" data-placeholder="Chọn loại nhiên liệu">
                                        <option></option>
                                        <?php foreach($loainhienlieu as $v){ ?>
                                        <option value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
												
												
												
												<div class="bx_form1 clearfix">
                        	<div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Xuất sứ:</span>
                                    <select id="xuatsu" name="xuatsu" class="js-example-responsive1" data-placeholder="Chọn xuất sứ">
                                        <option></option>
                                        <?php foreach($xuatsu as $v){ ?>
                                        <option value="<?=$v['id']?>"><?=$v['ten']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Dẫn động:</span>
                                    <select id="dandong" name="dandong" class="js-example-responsive1" data-placeholder="Chọn dẫn động">
                                        <option></option>
                                        <?php foreach($dandong as $v){ ?>
                                        <option value="<?=$v['id']?>"><?=$v['ten']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                       <div class="bx_form1 clearfix">
                        	<div class="tk100">
                            	<div class="select_search">
                                	<span class="pos">Động cơ:</span>
                                    <select id="dongco" name="dongco" class="js-example-responsive1" data-placeholder="Chọn loại động cơ">
                                        <option></option>
                                        <?php foreach($loaidongco as $v){ ?>
                                        <option value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                       
                        <div class="bx_form1 clearfix">
                        	<div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Km thấp nhất:</span>
                                    <select id="tukm" name="sokmtu" class="js-example-responsive1" data-placeholder="Từ">
                                        <option></option>
                                        <?php foreach($sokm as $v){ ?>
                                        <option value="<?=$v['sokm']?>"><?=number_format($v['sokm'],0, ',', '.')?> km</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Km cao nhất:</span>
                                    <select id="denkm" name="sokmden" class="js-example-responsive1" data-placeholder="Đến">
                                        <option></option>
                                        <?php foreach($sokm as $v){ ?>
                                        <option value="<?=$v['sokm']?>"><?=number_format($v['sokm'],0, ',', '.')?> km</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                         <div class="main-search-form__heading"><p>Phong cách</p></div>
                         <div class="bx_form1 clearfix">
                        	<div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Số ghế:</span>
                                    <select id="soghe" name="soghe" class="js-example-responsive1" data-placeholder="Chọn số ghế">
                                        <option></option>
                                         <?php foreach($soghe as $v){ ?>
                                        <option value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="tk50">
                            	<div class="select_search">
                                	<span class="pos">Số cửa:</span>
                                    <select id="socua" name="socua" class="js-example-responsive1" data-placeholder="Chọn số cửa">
                                        <option></option>
                                        <?php foreach($socua as $v){ ?>
                                        <option value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bx_form1 clearfix">
                        	<div class="tk100">
                            	<div class="select_search">
                                	<span class="pos">Màu sắc:</span>
                                    <select id="mausac" name="mausac" class="js-example-responsive1" data-placeholder="Chọn màu sắc">
                                        <option></option>
                                        <?php foreach($mausac as $v){ ?>
                                        <option value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="bx_form1 clearfix">
                        	<div class="tk100">
                            	<input type="submit" class="bnt_timxe" id="btn_timxe" value="Tìm xe" />
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        <div class="col-manright"><?php include _template."layout/right.php";?></div>
    </div>
</div>
