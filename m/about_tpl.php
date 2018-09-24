<div class="wap_in wap_white">
	<div class="wapper clearfix">
    	 <div class="col-mantin">
              <div class="box_container">
                <div class="content">   
                    <?=$tintuc_detail['noidung']?>   
                   <?php /*?><div class="addthis_inline_share_toolbox"></div><?php */?>
                    
                </div><!--.content-->
            </div><!--.box_container-->
         </div>
         <div class="banner_qc">
        	<div class="slick_vv">
            	<?php foreach($row_qc as $v){ ?>
                <div>
                	<p><a href="<?=$v['link']?>"><img src="thumb/550x80x1x90/<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a></p>
                </div>
                <?php }?>
            </div>
        </div>
         <div class="col-manright">
        	<?php include _template."layout/right.php";?>
        </div>
</div>         