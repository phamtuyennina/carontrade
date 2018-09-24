<?php 
	$d->reset();
	$sql = "select id,ten$lang as ten from #_loaidanhgia where type='website' order by stt asc";
	$d->query($sql);
	$loaidanhgia = $d->result_array();
	
	$where="type='website' group by id_user order by ngaytao desc";
	
	$d->reset();
	$sql = "SELECT count(id) AS numrows FROM #_danhgia where $where";
	$d->query($sql);	
	$dem = $d->result_array();
	
	$totalRows = count($dem);
	$page = $_GET['p'];
	$pageSize = 10;
	$offset = 5;
	if ($page == "")$page = 1;
	else $page = $_GET['p'];
	$page--;
	$bg = $pageSize*$page;	
	
	$d->reset();
	$sql = "select * from #_danhgia where $where limit $bg,$pageSize";
	$d->query($sql);
	$count_dg = $d->result_array();
	$url_link = getCurrentPageURL();		
	
?>
<div class="wap_in">
	<div class="wapper">
    	<div class="row">
        	<div class="col-xs-12 no_pad_p">
            	<div class="bx_all_diem">
                    <h3>Người dùng đánh giá <?=$company['ten']?></h3>
                    <div class="all_char">
                    	<div class="row">
                    	<?php foreach($loaidanhgia as $k => $v){ 
							$pes=get_pes($v['id']);
						?>
                        <div class="col-xs-6 col-char text-center no_pad_p">
                        	<div id="col-char<?=$k?>" class="co__chart" data-pes=<?=$pes?>></div>
                            <p><?=$v['ten']?></p>
                        </div>
                        <?php }?>
                        </div>
                    </div>
                    <div class="all_star clearfix">
                    	<div class="star__count">
                        	<?php 
								$w5=(count_st(5)*100)/$totalRows;
								$w4=(count_st(4)*100)/$totalRows;
								$w3=(count_st(3)*100)/$totalRows;
								$w2=(count_st(2)*100)/$totalRows;
								$w1=(count_st(1)*100)/$totalRows;
								
							 ?>
                        	<p><span><i class="fa fa-star" aria-hidden="true"></i>&nbsp;5</span> <span><i style="width:<?=$w5?>%"></i></span> <span><?=count_st(5)?></span></p>
                            <p><span><i class="fa fa-star" aria-hidden="true"></i>&nbsp;4</span> <span><i style="width:<?=$w4?>%"></i></span> <span><?=count_st(4)?></span></p>
                            <p><span><i class="fa fa-star" aria-hidden="true"></i>&nbsp;3</span> <span><i style="width:<?=$w3?>%"></i></span> <span><?=count_st(3)?></span></p>
                            <p><span><i class="fa fa-star" aria-hidden="true"></i>&nbsp;2</span> <span><i style="width:<?=$w2?>%"></i></span> <span><?=count_st(2)?></span></p>
                            <p><span><i class="fa fa-star" aria-hidden="true"></i>&nbsp;1</span> <span><i style="width:<?=$w1?>%"></i></span> <span><?=count_st(1)?></span></p>
                        </div>
                        <div class="start__all">
                        	<p class="count_big"><?=((count_st(5)*5+count_st(4)*4+count_st(3)*3+count_st(2)*2+count_st(1)*1)/($totalRows*5))*100?>%</p>
                            <p class="count_start"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i></p>
                            <p class="count_user"><?=$totalRows?> đánh giá</p>
                        </div>
                    </div>
                </div>
                
                <div class="bx_danhgiachungtoi">
                	<ul>
                    	<li><?=$totalRows?> lượt đánh giá</li>
                        <li>Đánh giá chúng tôi</li>
                    </ul>
                    <div class="tabs_danhgia">
                    	<div class="tab_danhgia">
                        	<div class="man_all_user">
                            	<?php foreach($count_dg as $v){ ?>
                                <div class="bx_danhgia_w clearfix">
                                	<img src="thumb/46x41x1x90/<?=_upload_thanhvien_l.getphoto_user($v['id_user'])?>" alt="<?=getten_user($v['id_user'])?>" onerror="this.src='images/support.png'" />
                                     <div class="nd_danhgia">
                                     	<p class="p_dg_sao clearfix">
                                        	<span title="<?=getten_user($v['id_user'])?>"><?=getten_user($v['id_user'])?></span>
                                            <span>
                                            	<?php $st=demsao_($v['id_user']); for($i=0;$i<(int)$st;$i++){?>
                                                	<i class="fa fa-star" aria-hidden="true"></i>
												<?php }?>
                                            </span>
                                        </p>
                                        <p class="noidung_d">
                                        	<?php foreach($loaidanhgia as $c){ ?>
                                            <span class="clearfix"><?=$c['ten']?> <strong><?=(getdanhgia_userw($c['id'],$v['id_user'])==true)?'Có':'Không'?></strong></span> 
                                            <?php }?>
                                        </p>
                                     </div>
                                </div>
                                <?php }?>
                            </div>
                            <div class="clear"></div>
							<div class="pagination" style="margin-bottom:0px;padding-bottom:0px;"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
                        </div>
                        <div class="tab_danhgia">
                        	<?php if($_SESSION[$login_name_w]==false){ ?>
                        	<div class="chuadangnhap">
                            	<p>Hãy <a href="dang-nhap.html">đăng nhập</a><span>/</span><a href="dang-ky.html">đăng ký</a>  thành viên để đánh giá chúng tôi nha !</p>
                            </div>
                            <?php }else{?>
                            <div class="dadangnhap">
                            	<p class="slo">Nếu bạn hài lòng, hãy nói cho mọi người biết</p>
                                <p class="slo">Nếu bạn không hài lòng, chúng tôi xin lắng nghe</p>
                                <div class="for_danhgia">
                                	<form id="danhgiawebsite">
                                	<?php foreach($loaidanhgia as $v){ ?>
                                    <div>
                                    	<p class="clearfix">
                                        	<span title=""><?=$v['ten']?></span>
                                            <span>
                                            	<input <?=(getdanhgia_userw($v['id'],$_SESSION['user_w']['id'])==true)?'checked':''?> type="radio" name="usdg_<?=$v['id']?>" value="1" id="danhgia_v<?=$v['id']?>" />
                                            	<label for="danhgia_v<?=$v['id']?>" >Có</label>
                                                <input <?=(getdanhgia_userw($v['id'],$_SESSION['user_w']['id'])==false)?'checked':''?> type="radio" name="usdg_<?=$v['id']?>" value="0" id="danhgia_v1<?=$v['id']?>" />
                                                <label for="danhgia_v1<?=$v['id']?>" >Không</label>
                                            </span>
                                        </p>
                                    </div>	
                                    <?php }?>
                                    <div>
                                    	<p class="clearfix">
                                        	<span style="font-weight:600">Đánh giá chúng tôi</span>
                                        	<span id="rattings">
                                            <?php $st1=demsao_($_SESSION['user_w']['id']) ?>
                                            <input type="hidden" name="star_ss" id="star_ss" value="<?=$st1?>" />
                                            	<a class="rating_icon" data-id="1"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                <a class="rating_icon" data-id="2"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                <a class="rating_icon" data-id="3"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                <a class="rating_icon" data-id="4"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                <a class="rating_icon" data-id="5"><i class="fa fa-star" aria-hidden="true"></i></a>
                                            </span>
                                        </p>
                                    </div>
                                    <input type="hidden" name="id_user" value="<?=$_SESSION['user_w']['id']?>"  />
                                    <button type="button" class="btn_danhgiaw">Gửi</button>
                                    </form>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>