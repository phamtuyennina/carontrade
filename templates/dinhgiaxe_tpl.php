<?php 
	$d->reset();
	$sql = "select noidung$lang as noidung from #_about where type='dinhgiaxe' limit 0,1";
	$d->query($sql);
	$dinhgiaxe = $d->fetch_array();
	
	$d->reset();
	$sql = "select noidung$lang as noidung from #_about where type='motacapdo' limit 0,1";
	$d->query($sql);
	$motacaodo = $d->fetch_array();	
	
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='dinhgiaxe' order by stt,id desc";
	$d->query($sql);
	$dinhgia_danhmuc=$d->result_array();	
?>
<div class="wap_in ">
	<div class="wapper clearfix">
    	<div class="col-mantin">
        	<div class="wapdinhgia wap_white">
            	<div class="tt_thanhvien">
                    <p><?=$title?></p>
                </div>
                <div class="bx_dg_gt">
                	<?=$dinhgiaxe['noidung']?>
                </div>
                <div class="dg_body">
                <form id="dinhgiaxe" method="post">
                	<div class="bx_nhaplieu clearfix">
                    	<div class="w_50_capdo">
                        	<p>Hãng xe:</p>
                            <select id="hangxe" name="hangxe">
                            	<option value="">Chọn hãng xe</option>
                            	<?php foreach($dinhgia_danhmuc as $v){ ?>
                                <option value="<?=$v['id']?>"><?=$v['ten']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="w_50_capdo">
                        	<p>Tình trạng xe:</p>
                            <select id="tinhtrang" name="tinhtrang">
                            	<option value="">Chọn tình trạng xe</option>
                            </select>
                        </div>
                    </div>
                    <div class="bx_nhaplieu clearfix">
                    	<div class="w_50_capdo ngay">
                        	<p>Thời gian mua xe:</p>
                            <select id="thangmua" name="thangmua">
                            	<option value="">Tháng mua</option>
                                <?php for($i=1;$i<=12;$i++){ ?>
                                <option value="<?=$i?>">Tháng <?=$i?></option>
                                <?php }?>
                            </select>
                            <select id="nammua" name="nammua">
                            	<option value="">Năm mua</option>
                                <?php for($i=date('Y',time());$i>=1920;$i--){ ?>
                                <option value="<?=$i?>">Năm <?=$i?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="w_50_capdo ngay">
                        	<p>Thời gian bán xe:</p>
                           	<select id="thangban" name="thangban">
                            	<option value="">Tháng bán</option>
                                <?php for($i=1;$i<=12;$i++){ ?>
                                <option value="<?=$i?>">Tháng <?=$i?></option>
                                <?php }?>
                            </select>
                            <select id="namban" name="namban">
                            	<option value="">Năm bán</option>
                                <?php for($i=date('Y',time());$i>=1920;$i--){ ?>
                                <option value="<?=$i?>">Năm <?=$i?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="bx_nhaplieu clearfix">
                    	<div class="w_50_capdo">
                        	<p>Giá mua:</p>
                            <input type="text" id="giamua" name="giamua" class="conso" value="0"  />
                        </div>
                        <div class="w_50_capdo">
                        	<p>Khấu hao:</p>
                            <input type="text" id="khauhao" name="khauhao" readonly="readonly" value="0%"  />
                        </div>
                    </div>
                    <div class="bx_nhaplieu clearfix">
                    	<div class="w_50_capdo">
                        	<p>Giá sau khấu hao:</p>
                            <input type="text" id="giaduoctinh" readonly="readonly" placeholder="Chưa có dữ liệu" />
                        </div>
                        <div class="w_50_capdo">
                        	<button type="button" id="tinhkhauhao" >Tính giá sau khấu hao</button>
                        </div>
                        
                    </div>
                    </form>
                </div>
                <div class="bx_dg_gt">
                	<?=$motacaodo['noidung']?>
                </div>
            </div>
        </div>
        <div class="col-manright"><?php include _template."layout/right.php";?></div>
    </div>
</div>