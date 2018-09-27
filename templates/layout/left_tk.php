<?php 
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='loaixe' order by stt,id desc";
	$d->query($sql);
	$nhasanxuat=$d->result_array();
	if(!empty($_GET['id_hang'])){
		$arr_hang=explode('.',$_GET['id_hang']);
		$arr_hang1=implode('|',$arr_hang);
		
		$d->reset();
		$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='kieu-dang' and CONCAT(',',id_thuonghieu, ',') REGEXP ',(".$arr_hang1."),' order by stt,id desc";
		$d->query($sql);
		$kieudang=$d->result_array();

	}else{
		$d->reset();
		$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and type='kieu-dang' order by stt,id desc";
		$d->query($sql);
		$kieudang=$d->result_array();
		
	}
	if(!empty($_GET['id_kieudang']) && !empty($_GET['id_hang'])){
		$arr_hang=explode('.',$_GET['id_kieudang']);
		$arr_hang1=implode(',',$arr_hang);

        $arr_hangz=explode('.',$_GET['id_hang']);
        $arr_hangzz=implode(',',$arr_hangz);
		$d->reset();
		$sql="select ten$lang as ten,tenkhongdau,id,photo from #_product_danhmuc where hienthi=1 and id_kieudang in(".$arr_hang1.") and type='mau-xe' and id_thuonghieu in (".$arr_hangzz.") order by stt,id desc";
		$d->query($sql);
		$mauxe=$d->result_array();	
	}
   $d->reset();
	$sql="select id,ten$lang as ten,tenkhongdau from #_quanly_danhmuc where hienthi=1 and type='namsanxuat' order by stt desc";
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
	$sql="select id,ten$lang as ten,tenkhongdau from #_quanly_danhmuc where hienthi=1 and type='xuatsu' order by stt desc";
	$d->query($sql);
	$xuatsu=$d->result_array();	

	$d->reset();
	$sql="select id,ten$lang as ten,tenkhongdau from #_quanly_danhmuc where hienthi=1 and type='dandong' order by stt desc";
	$d->query($sql);
	$dandong=$d->result_array();	
	
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id,mucdotieuthu from #_quanly_danhmuc where hienthi=1 and type='mucdotieuthu' order by stt,id desc";
	$d->query($sql);
	$mucdotieuthu=$d->result_array();			
?>
<div class="title_timkiem">
	<p>Tìm kiếm</p>
</div>
<div class="box_tiemkiem">
	<form id="frm_search" method="get" name="frm" action="index.php" enctype="multipart/form-data">
    <input type="hidden" value="tim-kiem" name="com"  />
	<div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Xe mới và cũ</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-selection">
        	<?php  $ar_hang=explode('.',$_GET['tinhtrang']); ?>
        	<input type="hidden" name="tinhtrang" class="myCheckbox myTinhtrang" value="">
            <div class="item-cu-moi <?php if(in_array('xe-moi',$ar_hang)){echo 'active';} ?>" onclick="click_div(this);" data-id="xe-moi">
            	 Xe mới
            </div>
            <div class="item-cu-moi <?php if(in_array('xe-da-su-dung',$ar_hang)){echo 'active';} ?>" onclick="click_div(this);" data-id="xe-da-su-dung">
            	 Xe đã sử dụng
            </div>
        </div>
    </div>
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Từ khóa</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-selection clearfix">
        	 <input type="text" name="tukhoa" placeholder="Nhập từ khóa"  />
             <button type="button" class="timtukhoa">Tìm</button>
        </div>
    </div>
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Hãng xe</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-hangxe dimension-selection">
        	<input type="hidden" name="id_hang" value="<?=$_GET['id_hang']?>" />
        	<?php $ar_hang=explode('.',$_GET['id_hang']);  foreach($nhasanxuat as $v){ ?>
             <div class="item-hangxe <?php if(in_array($v['id'],$ar_hang)){echo 'active';} ?>" data-id="<?=$v['id']?>" onclick="click_div(this);"><?=$v['ten']?>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Kiểu dáng</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-kieudang dimension-selection">
        	<input type="hidden" name="id_kieudang" value="<?=$_GET['id_kieudang']?>" />
        	<?php $ar_kieudang=explode('.',$_GET['id_kieudang']); foreach($kieudang as $v){ ?>
             <div class="item-kieudang <?php if(in_array($v['id'],$ar_kieudang)){echo 'active';} ?>" data-id="<?=$v['id']?>" onclick="click_div(this);">
           		<?=$v['ten']?>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Mẫu xe</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-mauxe dimension-selection">
        	<input type="hidden" name="id_mauxe" value="<?=$_GET['id_mauxe']?>" />
        	<?php $ar_mauxe=explode('.',$_GET['id_mauxe']); foreach($mauxe as $v){ ?>
             <div class="item-mauxe <?php if(in_array($v['id'],$ar_mauxe)){echo 'active';} ?>" data-id="<?=$v['id']?>" onclick="click_div(this);">
             	<?=$v['ten']?>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Loại nhiên liệu</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-nhienlieu dimension-selection">
        	<input type="hidden" name="nhienlieu" value="<?=$_GET['nhienlieu']?>" />
        	<?php $ar_nhienlieu=explode('.',$_GET['nhienlieu']); foreach($loainhienlieu as $v){ ?>
             <div class="item-nhienlieu <?php if(in_array($v['tenkhongdau'],$ar_nhienlieu)){echo 'active';} ?>" data-id="<?=$v['tenkhongdau']?>" onclick="click_div(this);">
            	<?=$v['ten']?>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Loại động cơ</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-dongco dimension-selection">
        	<input type="hidden" name="dongco" value="<?=$_GET['dongco']?>" />
        	<?php $ar_dongco=explode('.',$_GET['dongco']); foreach($loaidongco as $v){ ?>
             <div class="item-dongco <?php if(in_array($v['tenkhongdau'],$ar_dongco)){echo 'active';} ?>" data-id="<?=$v['tenkhongdau']?>" onclick="click_div(this);">
            	<?=$v['ten']?>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Loại hộp số</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-hopso dimension-selection">
        	<input type="hidden" name="hopso" value="<?=$_GET['hopso']?>" />
        	<?php  $ar_hopso=explode('.',$_GET['hopso']); foreach($loaihopso as $v){ ?>
             <div class="item-hopso <?php if(in_array($v['tenkhongdau'],$ar_hopso)){echo 'active';} ?>" data-id="<?=$v['tenkhongdau']?>" onclick="click_div(this);">
            	<?=$v['ten']?>
            </div>
            <?php }?>
        </div>
    </div>
		
		<div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Dẫn động</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-mausac dimension-selection">
        	<input type="hidden" name="dandong" value="<?=$_GET['dandong']?>" />
        	<?php $ar_danong=explode('.',$_GET['dandong']); foreach($dandong as $v){ ?>
             <div class="item-dandong <?php if(in_array($v['id'],$ar_danong)){echo 'active';} ?>" data-id="<?=$v['id']?>" onclick="click_div(this);">
            	 <?=$v['ten']?>
            </div>
            <?php }?>
        </div>
    </div>
		<div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Xuất sứ</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-mausac dimension-selection">
        	<input type="hidden" name="xuatsu" value="<?=$_GET['dandong']?>" />
        	<?php $ar_xuatsu=explode('.',$_GET['xuatsu']); foreach($xuatsu as $v){ ?>
             <div class="item-xuatsu <?php if(in_array($v['id'],$ar_xuatsu)){echo 'active';} ?>" data-id="<?=$v['id']?>" onclick="click_div(this);">
            	 <?=$v['ten']?>
            </div>
            <?php }?>
        </div>
    </div>
		
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Màu sắc</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-mausac dimension-selection">
        	<input type="hidden" name="mausac" value="<?=$_GET['mausac']?>" />
        	<?php $ar_mausac=explode('.',$_GET['mausac']); foreach($mausac as $v){ ?>
             <div class="item-mausac <?php if(in_array($v['tenkhongdau'],$ar_mausac)){echo 'active';} ?>" data-id="<?=$v['tenkhongdau']?>" onclick="click_div(this);">
            	 <?=$v['ten']?>
            </div>
            <?php }?>
        </div>
    </div>
    
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Số ghế</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-mausac dimension-selection">
        	<input type="hidden" name="soghe" value="<?=$_GET['soghe']?>" />
        	<?php $ar_soghe=explode('.',$_GET['soghe']); foreach($soghe as $v){ ?>
             <div class="item-mausoghe <?php if(in_array($v['tenkhongdau'],$ar_soghe)){echo 'active';} ?>" data-id="<?=$v['tenkhongdau']?>" onclick="click_div(this);">
            	 <?=$v['ten']?>
            </div>
            <?php }?>
        </div>
    </div>
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Số cửa</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search dimension-mausac dimension-selection">
        	<input type="hidden" name="socua" value="<?=$_GET['socua']?>" />
        	<?php $ar_soghe=explode('.',$_GET['socua']); foreach($socua as $v){ ?>
             <div class="item-socua <?php if(in_array($v['tenkhongdau'],$ar_soghe)){echo 'active';} ?>" data-id="<?=$v['tenkhongdau']?>" onclick="click_div(this);">
            	 <?=$v['ten']?>
            </div>
            <?php }?>
        </div>
    </div>
    
		<div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Mức độ tiêu thụ nhiên liệu</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search1 dimension-gia dimension-selection">
        	<div class="bx_form1 clearfix">
                <div class="tk100">
                    <div class="select_search">
                        <select id="nhienlietu" name="nhienlietu" class="js-example-responsive1" data-placeholder="Thấp nhất">
                            <option></option>
                            <?php foreach($mucdotieuthu as $v){ ?>
                            <option <?=((int)$_GET['nhienlietu']==$v['id'])?'selected':''?>  value="<?=$v['id']?>"><?=$v['ten']?></option>
                            <?php }?>
                        </select>
                    </div>
               </div>
        	</div>
            <div class="bx_form1 clearfix">
                <div class="tk100">
                    <div class="select_search">
                        <select id="nhienlieuden" name="nhienlieuden" class="js-example-responsive1" data-placeholder="Cao nhất">
                            <option></option>
                            <?php foreach($mucdotieuthu as $v){ ?>
                              <option <?=((int)$_GET['nhienlietu']==$v['id'])?'selected':''?>  value="<?=$v['id']?>"><?=$v['ten']?></option>
                            <?php }?>
                        </select>
                    </div>
               </div>
        	</div>
             <button type="button" class="timtukhoa">Tìm</button>
   	 	</div>
    </div>
		
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Giá</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search1 dimension-gia dimension-selection">
        	<div class="bx_form1 clearfix">
                <div class="tk100">
                    <div class="select_search">
                        <select id="giatu" name="giatu" class="js-example-responsive1" data-placeholder="Giá thấp nhất">
                            <option></option>
                            <?php foreach($giaxe as $v){ ?>
                            <option <?=((int)$_GET['giatu']==$v['gia'])?'selected':''?>  value="<?=$v['gia']?>"><?=number_format($v['gia'],0, ',', '.')?></option>
                            <?php }?>
                        </select>
                    </div>
               </div>
        	</div>
            <div class="bx_form1 clearfix">
                <div class="tk100">
                    <div class="select_search">
                        <select id="giaden" name="giaden" class="js-example-responsive1" data-placeholder="Giá cao nhất">
                            <option></option>
                            <?php foreach($giaxe as $v){ ?>
                            <option <?=((int)$_GET['giaden']==$v['gia'])?'selected':''?> value="<?=$v['gia']?>"><?=number_format($v['gia'],0, ',', '.')?></option>
                            <?php }?>
                        </select>
                    </div>
               </div>
        	</div>
             <button type="button" class="timtukhoa">Tìm</button>
   	 	</div>
    </div>
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Số km</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search1 dimension-sokm dimension-selection">
        	<div class="bx_form1 clearfix">
                <div class="tk100">
                    <div class="select_search">
                        <select id="sokmtu" name="sokmtu" class="js-example-responsive1" data-placeholder="Km thấp nhất">
                            <option></option>
                            <?php  foreach($sokm as $v){ ?>
                            <option <?=((int)$_GET['sokmtu']==$v['sokm'])?'selected':''?> value="<?=$v['sokm']?>"><?=number_format($v['sokm'],0, ',', '.')?> km</option>
                            <?php }?>
                        </select>
                    </div>
               </div>
        	</div>
            <div class="bx_form1 clearfix">
                <div class="tk100">
                    <div class="select_search">
                        <select id="sokmden" name="sokmden" class="js-example-responsive1" data-placeholder="Km cao nhất">
                            <option></option>
                            <?php foreach($sokm as $v){ ?>
                            <option <?=((int)$_GET['sokmden']==$v['sokm'])?'selected':''?> value="<?=$v['sokm']?>"><?=number_format($v['sokm'],0, ',', '.')?> km</option>
                            <?php }?>
                        </select>
                    </div>
               </div>
        	</div>
            <button type="button" class="timtukhoa">Tìm</button>
   	 	</div>
    </div>
    
    <div class="dimension">
    	<div class="dimension-summary">
        	<p>
            	<span>Năm sản xuất</span>
                <a href="javascript:void(0)" class="toggle-panel">Hide</a>
            </p>
        </div>
        <div class="dimension-search1 dimension-sokm dimension-selection">
        	<div class="bx_form1 clearfix">
                <div class="tk100">
                    <div class="select_search">
                       <select id="namtu" name="namtu" class="js-example-responsive1" data-placeholder="Từ">
                            <option></option>
                            <?php foreach($namsanxuat as $v){ ?>
                            <option <?=((string)$_GET['namtu']==$v['tenkhongdau'])?'selected':''?> value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                            <?php }?>
                        </select>
                    </div>
               </div>
        	</div>
            <div class="bx_form1 clearfix">
                <div class="tk100">
                    <div class="select_search">
                        <select id="namden" name="namden" class="js-example-responsive1" data-placeholder="Đến">
                            <option></option>
                             <?php foreach($namsanxuat as $v){ ?>
                            <option <?=((string)$_GET['namden']==$v['tenkhongdau'])?'selected':''?> value="<?=$v['tenkhongdau']?>"><?=$v['ten']?></option>
                            <?php }?>
                        </select>
                    </div>
               </div>
        	</div>
            <button type="button" class="timtukhoa">Tìm</button>
   	 	</div>
    </div>
    
    
    </form>
</div>
