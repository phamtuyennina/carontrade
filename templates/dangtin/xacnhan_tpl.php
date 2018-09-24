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
                <input name="pjax" type="hidden" value="5" />
            </form>
            <div class="bot_form clearfix">
                <p class="text-left"><a href="javascript:void(0)" onclick="click_prev();" class="a_quaylai"><i class="fa fa-chevron-left" aria-hidden="true"></i> Quay lại</a></p>
                <p class="text-center"><a href="javascript:void(0)" onclick="dangtin()" class="a_hoantat">Đăng tin</a></p>
            </div>
        </div>
        
    </div>
</div>