<div class="wap_thanhvien clearfix">
	<div class="thanhvien_left">
    	<?php include _template."layout/left-thanhvien.php";?>
    </div>
    <div class="thanhvienright">
    	<div class="tt_thanhvien">
            <p><?=$title?></p>
        </div>
        <div class="col-xs-12 nod_padz">
            	<div class="row">
                	<div class="col-xs-6 nod_padz">
                    	<div class="bx_all_diem">
                        	<h3>Người mua đánh giá bạn</h3>
                        	<div class="bxx_rew">
                            	<div class="clearfix">
                                	<p>Tiêu chí</p>
                                    <p>Xếp hạng</p>
                                    <p>Tổng số đánh giá</p>
                                </div>
                                <?php $id_user=$_SESSION['user_w']['id'];$tong=0; foreach($loaidanhgia as $v){ 
									$tong +=(count_st1(5,$v['id'],$id_user)*5+count_st1(4,$v['id'],$id_user)*4+count_st1(3,$v['id'],$id_user)*3+count_st1(2,$v['id'],$id_user)*2+count_st1(1,$v['id'],$id_user)*1)/($totalRows*5);
									$w=100-(demsaouser($_SESSION['user_w']['id'],$v['id'])*100)/($totalRows*5);
									
								?>
                                <div class="clearfix">
                                	<p class="text-left"><?=$v['ten']?></p>
                                    <p>
                                    	<?php if($w<100){ ?>
                                    	<a class="clearfix" style="position:relative;text-decoration:none;color:inherit;display:inline-block;">
										<i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <span style="width:<?=$w?>%"></span>
                                        </a>
                                        <?php }else{?>
                                        <a class="clearfix xammau" style="position:relative;text-decoration:none;color:inherit;display:inline-block;">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>	
                                        </a>
                                        <?php }?>
                                    </p>
                                    <p><?=(demsaouser($_SESSION['user_w']['id'],$v['id'])!=0)?demsaouser($_SESSION['user_w']['id'],$v['id']):0?></p>
                                </div>
                                <?php }  ?>
                            </div>
                        </div>
                    </div>
                
                	<div class="col-xs-4 nod_padz">
                    
                    	<div class="bx_all_diem bx_all_diem1 clearfix">
                        	<img src="thumb/70x70x1x90/<?=_upload_thanhvien_l.getphoto_user($_SESSION['user_w']['id'])?>" alt="<?=getten_user($_SESSION['user_w']['id'])?>" onError="this.src='images/support.png';" width="100px" />
                          	<div>
                                <h3 style="margin-bottom:10px;">Độ tin cậy của bạn</h3>
                                <p style="font-family: Open Sans;font-weight: 600;font-size: 60px;line-height: 1;"><?=($tong/4)*100?>%</p> 
                                <p style="font-family: Open Sans;font-weight: 400;font-size: 15px;color: #1b75ba;">đánh giá tích cực</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   		<div class="col-xs-8 nod_padz">
            	<div class="bx_danhgiachungtoi">
                	<ul>
                    	<li><?=$totalRows?> lượt đánh giá</li>
                    </ul>
                    <div class="tabs_danhgia">
                    	<div class="tab_danhgia">
                        	<div class="man_all_user">
                            	<?php foreach($count_dg as $v){ ?>
                                 <div class="bx_danhgia_u clearfix">
                                 	<img src="thumb/46x41x1x90/<?=_upload_thanhvien_l.getphoto_user($v['id_user'])?>" alt="<?=getten_user($v['id_user'])?>" onerror="this.src='images/support.png'" width="46px" />
                                     <div class="nd_danhgia">
                                     	<p class="p_dg_sao clearfix">
                                        	<span style="float:left;text-align:left;width:auto;" title="<?=getten_user($v['id_user'])?>"><?=getten_user($v['id_user'])?></span>
                                        </p>
                                 	</div>
                                </div>
                                <div class="res_dadanhgia">
                                	<?php foreach($loaidanhgia as $c){ ?>
                                    <div>
                                    	<p><?=$c['ten']?></p>
                                        <p>
                                        	<a class="<?=(demsao_user($v['id_user'],$c['id']))>=1?'act':''?>"><i class="fa fa-star" aria-hidden="true"></i></a>
                                            <a class="<?=(demsao_user($v['id_user'],$c['id']))>=2?'act':''?>"><i class="fa fa-star" aria-hidden="true"></i></a>
                                            <a class="<?=(demsao_user($v['id_user'],$c['id']))>=3?'act':''?>"><i class="fa fa-star" aria-hidden="true"></i></a>
                                            <a class="<?=(demsao_user($v['id_user'],$c['id']))>=4?'act':''?>"><i class="fa fa-star" aria-hidden="true"></i></a>
                                            <a class="<?=(demsao_user($v['id_user'],$c['id']))>=5?'act':''?>"><i class="fa fa-star" aria-hidden="true"></i></a>
                                        </p>
                                    </div>
                                    <?php }?>
                                </div>
                                <div class="mota_danhgia">
                                	<?=demsao_mota($v['id_user'])?>
                                </div>
								<?php }?>
                            </div>
                             <div class="clear"></div>
							<div class="pagination" style="margin-bottom:0px;padding-bottom:0px;"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>