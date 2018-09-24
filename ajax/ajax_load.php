<?php
	include ("ajax_config.php");	
?>  
<div class="tt_lh" style="width:100%;float:none;">
    <div class="frm_lienhe">
        <form method="post" name="frm1" id="frm1" class="frm" action="index.php" enctype="multipart/form-data">
        	
            <div class="loicapcha thongbao"></div>
            <div class="item_lienhe"><p><?=_hovaten?>:<span>*</span></p><input name="ten_lienhe1" type="text" id="ten_lienhe" /></div>
            
            <div class="item_lienhe"><p><?=_diachi?>:</p><input name="diachi_lienhe1" type="text" id="diachi_lienhe" /></div>
            
            <div class="item_lienhe"><p><?=_dienthoai?>:</p><input name="dienthoai_lienhe1" type="text" id="dienthoai_lienhe" /></div>
            
            <div class="item_lienhe"><p>Email:<span>*</span></p><input name="email_lienhe1" type="text" id="email_lienhe" /></div>
            
            <div class="item_lienhe"><p><?=_chude?>:<span>*</span></p><input name="tieude_lienhe1" type="text" id="tieude_lienhe" /></div>
            
            <div class="item_lienhe"><p><?=_noidung?>:<span>*</span></p><textarea name="noidung_lienhe1" id="noidung_lienhe" rows="5"></textarea></div>
            <div class="item_lienhe" >
                <p>&nbsp;</p>
                <input type="button" onclick="onclick_ajax();" value="<?=_gui?>" class="click_ajax1" />
                <input type="button" value="<?=_nhaplai?>" onclick="document.frm1.reset();" />
            </div>
        </form>
    </div><!--.frm_lienhe-->   
</div>

