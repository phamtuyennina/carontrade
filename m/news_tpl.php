
<div class="wap_in">
	<div class="wapper clearfix">
        <div class="col-mantin">
            <div class="top_navin clearfix">
                <p><?=$totalRows?> Tin được tìm thấy</p>
                <p class="text-right">
                <select onchange="if(this.value) window.location.href=this.value">
                    <option <?php if(empty($_GET['sort']) or $_GET['sort']==1){echo 'selected="selected"';} ?> value="<?=getCurrentPageURL()?>&sort=1">Tin mới nhất</option>
                    <option <?php if($_GET['sort']==2){echo 'selected="selected"';} ?> value="<?=getCurrentPageURL()?>&sort=2">Tin cũ nhất</option>
                </select>
                </p>
            </div>
            <?php if($com=='tin-tuc' or $com=='danh-gia' or $com=='video'){ ?>
            <ul class="lis_menu">
                <li><a href="tin-tuc.html" class="<?php if($com=='tin-tuc'){echo 'active';} ?>">Tin tức</a></li>
                <li><a href="danh-gia.html" class="<?php if($com=='danh-gia'){echo 'active';} ?>">Đánh giá</a></li>
                 <li><a href="video.html" class="<?php if($com=='video'){echo 'active';} ?>">Video</a></li>
            </ul>
            <?php }?>
            <div class="show_noidung_ds">
                <?php foreach($tintuc as $v){ ?>
                <div class="bx_news_d">
                    <div class="bx_news">
                        <a href="<?=$com?>/<?=$v['tenkhongdau']?>.html" class="zoom_img">
                            <img src="thumb/400x250x1x90/<?=_upload_tintuc_l.$v['photo']?>" alt="<?=$v['ten']?>"  />
                        </a>
                        <div class="info_news">
                            <span><?=$title_cat?></span>
                            <p><a href="<?=$com?>/<?=$v['tenkhongdau']?>.html"><?=$v['ten']?></a></p>
                            <div><?=catchuoi($v['mota'],150)?></div>
                            <p><span>Ngày <?=date('d',$v['ngaytao'])?> Tháng <?=date('m',$v['ngaytao'])?> Năm <?=date('Y',$v['ngaytao'])?></span></p>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <div class="clear"></div>
			<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
        </div>
        
        <div class="col-manright">
        	<?php include _template."layout/right.php";?>
        </div>
    </div>
</div>