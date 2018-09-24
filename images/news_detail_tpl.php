<div class="container">
	<div class="row1">
    	<div class="col-xs-">
    		<?=$tintuc_detail['noidung']?>
        </div> 
    </div>
</div>
<div class="wap_share"><div class="container">
	<div class="row1">
    	<div class="col-xs-share">
        	<div class="addthis_inline_share_toolbox"></div>
        </div>
    </div></div>
</div>
<?php if(!empty($tintuc)){ ?>
<div class="wap_lienquan">
	<div class="container">
        <div class="row flexs">
            <?php foreach($tintuc as $v){ ?>
                <div class="col-md-4 col-sm-6 col-xs-6 col-tt col-tt1">
                <div class="bx_tintuc bx_tintuc1">
                    <a href="<?=$v['tenkhongdau']?>.html">
                        <img src="thumb/335x270x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"  />
                    </a>
                    <h4>
                        <a href="<?=$v['tenkhongdau']?>.html"><?=$v['ten']?></a>
                    </h4>
                    <div><?=catchuoi($v['mota'],100)?></div>
                    <p><a href="<?=$v['tenkhongdau']?>.html"><?=_xemthem?></a></p>
                </div>
            </div>
        	<?php }?>
        <div class="clear"></div>
		<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
        </div>
    </div>
</div>
<?php }?>