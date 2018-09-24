<div class="banner_kieu_nha">
	<img src="thumb/1356x385x1x90/<?=_upload_sanpham_l.$title_bar['banner']?>" alt="<?=$company['ten']?>" />
</div>
<div class="wap_in wap_white">
	<div class="wapper">
    	<div class="tt_thuonghieu">
            <p><?=$title_bar['ten']?></p>
        </div>
		<div class="show_car">
			<?php foreach($product as $v){ ?>
                <div class="bx_kieudanxe text-center">
                	  <a href="mau-xe/<?=$v['tenkhongdau']?>">
                            <span>
                            <img src="thumb/360x160x2x90/<?=_upload_sanpham_l.$v['photo']?>" onError="this.src='http://placehold.it/360x160';" alt="<?=$v['ten']?>" />
                            </span>
                            <p><?=$v['ten']?></p>
                      </a>
                      <a class="_c-model-card__explore button--p-md view" href="mau-xe/<?=$v['tenkhongdau']?>">Xem thêm</a>
                </div>
            <?php }?>
        </div>
        <div class="clear"></div>
		<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
    </div>
</div>