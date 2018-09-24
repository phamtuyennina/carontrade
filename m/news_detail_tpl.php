<div class="wap_in wap_white">
	<div class="wapper clearfix">
    	 <div class="col-mantin">
         	<?php if($com=='tin-tuc' or $com=='danh-gia'){ ?>
         	<div class="man_sslick">
            	<div class="man_slider_lq">
                    <div class="slick_slider_tintuc">
                        <div>
                            <p><a href="<?=_upload_tintuc_l.$tintuc_detail['photo']?>" title="<?=$tintuc_detail['ten']?>" >
                                <img src="<?=_upload_tintuc_l.$tintuc_detail['photo']?>" alt="<?=$tintuc_detail['ten']?>" />
                            </a></p>
                        </div>
                        <?php foreach($hinhkhac as $v){ ?>
                        <div>
                            <p>
                                <a href="<?=_upload_hinhthem_l.$v['photo']?>" title="<?=$tintuc_detail['ten']?>" >
                                    <img src="<?=_upload_hinhthem_l.$v['photo']?>" alt="<?=$tintuc_detail['ten']?>" />
                                </a>
                            </p>
                        </div>
                        <?php }?>
                    </div>
                    
                </div>
            </div>
            <?php }elseif($com=='video'){?>
            	<div id="video_trang" class="">
                	<div class="video_popup left_video">
	<iframe title="<?=$video[0]['ten']?>" width="100%" src="http://www.youtube.com/embed/<?=getYoutubeIdFromUrl($tintuc_detail['link'])?>?showinfo=0&autoplay=1" frameborder="0" allowfullscreen></iframe></div>
                </div>
            <?php }?>
            
           	<ul class="tool_bv clearfix">
            	<li><a href="javascript:void(0)"><?=$par_?></a></li>
                <li><p><?=chuyenngay(date('n',$tintuc_detail['ngaytao']))?> <?=date('d,Y',$tintuc_detail['ngaytao'])?></p></li>
                <div class="xahh">
                	<a href="http://www.facebook.com/sharer.php?u=<?=getCurrentPageURL()?>" onclick="window.open(this.href, 'social--facebook','left=50,top=50,width=600,height=350,toolbar=0'); return false;" class="social social-fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a class="social social-tt" href="https://twitter.com/intent/tweet?text=<?=$tintuc_detail['ten']?>&url=<?=getCurrentPageURL()?>" onclick="window.open(this.href, 'social--twitter','left=50,top=50,width=600,height=443,toolbar=0'); return false;" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a class="social social-gg" href="http://plus.google.com/share?url=<?=getCurrentPageURL()?>" onclick="window.open(this.href, 'social--googleplus', 'left=50,top=50,width=400,height=500,toolbar=0'); return false;" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    <a class="social social-pi" href="http://pinterest.com/pin/create/button/?url=<?=getCurrentPageURL()?>&media=http://<?=$config_url?>/<?=_upload_tintuc_l.$tintuc_detail['photo']?>" onclick="window.open(this.href, 'social--pinterest','left=50,top=50,width=735,height=680,toolbar=0'); return false;" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
					<a class="social social-em" href="mailto:?subject=<?=$tintuc_detail['ten']?>&body=<?=getCurrentPageURL()?>" ><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                </div>
            </ul>
            
            <div class="mota_tin">
            	<div class="ten_bv"><?=$tintuc_detail['ten']?></div>
            	<?=$tintuc_detail['noidung']?>
                <?php if($comt!=1){ ?>
                <div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-numposts="5" data-width="100%"></div>
                <?php }?>
            </div>
         </div>
        
        <div class="col-manright">
        	<?php include _template."layout/right.php";?>
        </div>
    </div>
</div>