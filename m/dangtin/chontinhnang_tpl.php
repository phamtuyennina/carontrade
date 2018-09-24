<?php

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
    $sql="select id,ten$lang as ten,tenkhongdau from #_quanly_danhmuc where hienthi=1 and type='xuatsu' order by stt desc";
    $d->query($sql);
    $xuatsu=$d->result_array();

    $d->reset();
    $sql="select id,ten$lang as ten,tenkhongdau from #_quanly_danhmuc where hienthi=1 and type='dandong' order by stt desc";
    $d->query($sql);
    $dandong=$d->result_array();   

    $d->reset();
    $sql="select id,ten$lang as ten,tenkhongdau from #_quanly_danhmuc where hienthi=1 and type='mucdotieuthu' order by stt desc";
    $d->query($sql);
    $mucdotieuthu=$d->result_array(); 
?>
<div class="wap_in">
	<div class="wapper">
    	<?php include _template."layout/top_dt.php";?>
        <div class="bx_dangtin">
        	<div class="tt_top">
            	<p>Hãy chọn các <span>tính năng</span> cho xe của bạn</p> 
            </div>
            <form id="chonmauxe">
            	<div class="bx_form1 clearfix">
                    <div class="tk30">
                        <div class="select_search">
                            <span class="pos">Hộp số:</span>
                            <select id="hopso" name="hopso" class="js-example-responsive1" data-placeholder="Loại hộp số">
                                <option></option>
                                <?php foreach($loaihopso as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['hopso']==$v['tenkhongdau']){echo 'selected';} ?> value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="tk30">
                        <div class="select_search">
                            <span class="pos">Số ghế:</span>
                            <select id="soghe" name="soghe" class="js-example-responsive1" data-placeholder="Chọn số ghế">
                                <option></option>
                                 <?php foreach($soghe as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['soghe']==$v['tenkhongdau']){echo 'selected';} ?> value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="tk30">
                        <div class="select_search">
                            <span class="pos">Tình trạng:</span>
                            <select id="tinhtrang" name="tinhtrang" class="js-example-responsive1" data-placeholder="Tình trạng xe">
                                <option></option>
                                <?php if(empty($_SESSION['user_w']['loaithanhvien'])=='Đại lý'){ ?>
                                <option <?php if($_SESSION['dangtin']['tinhtrang']=='xe-moi'){echo 'selected';} ?>  value="xe-moi">Xe mới</option>
                                <?php }?>
                                <option <?php if($_SESSION['dangtin']['tinhtrang']=='xe-da-su-dung'){echo 'selected';} ?> value="xe-da-su-dung">Xe đã qua sử dụng</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="bx_form1 clearfix">
                    <div class="tk30">
                        <div class="select_search">
                            <span class="pos">Nhiên liệu:</span>
                            <select id="nhienlieu" name="nhienlieu" class="js-example-responsive1" data-placeholder="Chọn loại nhiên liệu">
                                <option></option>
                                <?php foreach($loainhienlieu as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['nhienlieu']==$v['tenkhongdau']){echo 'selected';} ?> value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="tk30">
                        <div class="select_search">
                            <span class="pos">Động cơ:</span>
                            <select id="dongco" name="dongco" class="js-example-responsive1" data-placeholder="Chọn loại động cơ">
                                <option></option>
                                <?php foreach($loaidongco as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['dongco']==$v['tenkhongdau']){echo 'selected';} ?> value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="tk30">
                        <div class="select_search">
                            <span class="pos">Số cửa:</span>
                            <select id="socua" name="socua" class="js-example-responsive1" data-placeholder="Chọn số cửa">
                                <option></option>
                                <?php foreach($socua as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['socua']==$v['tenkhongdau']){echo 'selected';} ?> value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="bx_form1 clearfix">
                    <div class="tk30">
                        <div class="select_search">
                            <span class="pos">Xuất sứ:</span>
                            <select id="xuatsu" name="xuatsu" class="js-example-responsive1" data-placeholder="Chọn xuất sứ">
                                <option></option>
                                <?php foreach($xuatsu as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['xuatsu']==$v['tenkhongdau']){echo 'selected';} ?> value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="tk30">
                        <div class="select_search">
                            <span class="pos">Dẫn động:</span>
                            <select id="dandong" name="dandong" class="js-example-responsive1" data-placeholder="Chọn dẫn động">
                                <option></option>
                                <?php foreach($dandong as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['dandong']==$v['tenkhongdau']){echo 'selected';} ?> value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="tk30">
                        <div class="select_search">
                            <span class="pos">Mức độ tiêu thụ (L/100km):</span>
                            <select id="mucdotieuthu" name="mucdotieuthu" class="js-example-responsive1" data-placeholder="">
                                <option></option>
                                <?php foreach($mucdotieuthu as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['mucdotieuthu']==$v['tenkhongdau']){echo 'selected';} ?> value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="bx_form1 clearfix">
                    <div class="tk30">
                        <div class="select_search">
                            <span class="pos">Màu sắc:</span>
                            <select id="mausac" name="mausac" class="js-example-responsive1" data-placeholder="Chọn màu sắc">
                                <option></option>
                                <?php foreach($mausac as $v){ ?>
                                <option <?php if($_SESSION['dangtin']['mausac']==$v['tenkhongdau']){echo 'selected';} ?> value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="tk30">
                        <div class="select_search">
                            <span class="pos">Số Km đã đi:</span>
                            <input value="<?=@$_SESSION['dangtin']['sokm']?>" autocomplete="off" type="text" name="sokm" placeholder="Chỉ cần nhập số"  class="conso input_dangtin" />
                            
                        </div>
                    </div>
                    <div class="tk30">
                        <div class="select_search">
                            <span class="pos">Giá tiền:</span>
                            <input type="text" name="giatien" autocomplete="off" value="<?=@$_SESSION['dangtin']['giatien']?>" placeholder="Chỉ cần nhập số"  class="conso input_dangtin" />
                            
                        </div>
                    </div>
                </div>
                <input id="in_title" type="hidden" value="<?=$title?>"  />
                <input name="pjax" type="hidden" value="2" />
            </form>
            <div class="bot_form clearfix">
                	<p class="text-left"><a href="javascript:void(0)" onclick="click_prev();" class="a_quaylai"><i class="fa fa-chevron-left" aria-hidden="true"></i> Quay lại</a></p>
                    <p class="text-center"><a href="javascript:void(0)" onclick="dangtin()" class="a_hoantat">Đăng tin</a></p>
                    <p class="text-right"><a href="javascript:void(0)" onclick="click_next();" class="a_tieptheo">Tiếp theo</a></p>
                </div>
        </div>
    </div>
    
</div>