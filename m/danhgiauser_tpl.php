<?php 
	$id=(int)$_GET['id'];
	$d->reset();
	$sql = "select * from #_thanhvien where id='".$id."'";
	$d->query($sql);
	$item_user = $d->fetch_array();
	if(empty($item_user['id'])){
		redirect("../404.php");
	}
	$d->reset();
	$sql = "select id,ten$lang as ten from #_loaidanhgia where type='user' order by stt asc";
	$d->query($sql);
	$loaidanhgia = $d->result_array();	
	$where="type='user' and user_danhgia=".$item_user['id']." group by id_user order by ngaytao desc";
	
	$d->reset();
	$sql = "SELECT id AS numrows FROM #_danhgia where $where";
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
            	<div class="row">
                	<div class="col-xs-12 no_pad_p">
                    	<div class="bx_all_diem">
                        	<h3>Chi tiết  đánh giá người bán</h3>
                        	<div class="bxx_rew">
                            	<div class="clearfix">
                                	<p>Tiêu chí</p>
                                    <p>Xếp hạng</p>
                                    <p>Tổng số đánh giá</p>
                                </div>
                                <?php $id_user=$item_user['id'];$tong=0; foreach($loaidanhgia as $v){ 
									$tong +=(count_st1(5,$v['id'],$id_user)*5+count_st1(4,$v['id'],$id_user)*4+count_st1(3,$v['id'],$id_user)*3+count_st1(2,$v['id'],$id_user)*2+count_st1(1,$v['id'],$id_user)*1)/($totalRows*5);
									$w=100-(demsaouser($item_user['id'],$v['id'])*100)/($totalRows*5);
									
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
                                    <p><?=demsaouser($item_user['id'],$v['id'])?></p>
                                </div>
                                <?php }  ?>
                            </div>
                        </div>
                    </div>
                
                	<div class="col-xs-12 no_pad_p">
                    	<div class="bx_all_diem">
                        	
                            <h3>Thông tin người bán</h3>
                            <div class="bx_userz clearfix">
                            	<img src="thumb/70x70x1x90/<?=_upload_thanhvien_l.getphoto_user($item_user['id'])?>" alt="<?=getten_user($item_user['id'])?>" onError="this.src='images/support.png';" width="70px" />
                                <div>
                                	<p><?=getten_user($item_user['id'])?> <span>(<?=demtongsao_user($item_user['id'])?> <i class="fa fa-star" aria-hidden="true"></i>)</span></p>
                                    <span>
                                    <?=($tong/4)*100?>% đánh giá tích cực</span>
                                    <p>Là thành viên từ <span><?=date('d/m/Y',$item_user['ngaytao'])?></span></p>
                                </div>
                            </div>
                             <div class="call_u dis">
                                <p>Gọi cho người bán</p>
                                <a href="javascript:void(0)" class="p_cal1" data-call="<?=$item_user['dienthoai']?>">Xem</a>
                            </div>
                             <div class="call_u dis">
                                <p>Nhắn tin cho người bán</p>
                                <a data-toggle="modal" data-target="#myModal" href="javascript:void(0)">Nhắn tin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-12 no_pad_p">
            	<div class="bx_danhgiachungtoi">
                	<ul>
                    	<li><?=$totalRows?> lượt đánh giá</li>
                        <li>Đánh giá người bán</li>
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
                        <div class="tab_danhgia">
                        	<?php if($_SESSION[$login_name_w]==false){ ?>
                        	<div class="chuadangnhap">
                            	<p>Hãy <a href="dang-nhap.html">đăng nhập</a><span>/</span><a href="dang-ky.html">đăng ký</a>  thành viên để đánh giá người bán nha !</p>
                            </div>
                            <?php }else{?>
                            <div class="dadangnhap">
                            	<p class="slo">Hãy đánh giá trung thực để người bán có thể cải thiện cho lần giao dịch tiếp theo nhé !</p>
                                <div class="for_danhgia">
                                <form id="danhgiauser">
                                	<?php foreach($loaidanhgia as $v){ 
										$str=demsao_user($_SESSION['user_w']['id'],$v['id']);
									?>
                                    <div class="v_Rs" id="rattings<?=$v['id']?>">
                                    	<p><?=$v['ten']?></p>
                                        <p class="v_start_u">
                                            <input type="hidden" name="star[]"  value="<?=$str?>" />
                                            <a class="rating_icon1" data-id="1"><i class="fa fa-star" aria-hidden="true"></i></a>
                                            <a class="rating_icon1" data-id="2"><i class="fa fa-star" aria-hidden="true"></i></a>
                                            <a class="rating_icon1" data-id="3"><i class="fa fa-star" aria-hidden="true"></i></a>
                                            <a class="rating_icon1" data-id="4"><i class="fa fa-star" aria-hidden="true"></i></a>
                                            <a class="rating_icon1" data-id="5"><i class="fa fa-star" aria-hidden="true"></i></a>
                                        </p>
                                    </div>
                                    <?php }?>
                                    <div class="mota_user">
                                    	<textarea id="v_danhgia_u" placeholder="Mời bạn đánh giá" name="noidung"><?=demsao_mota($_SESSION['user_w']['id'])?></textarea>
                                        <p>Xin bạn vui lòng nhập tối thiểu 40 ký tự !</p>
                                    </div>
                                    <input type="hidden" name="id_user" value="<?=$_SESSION['user_w']['id']?>"  />
                                    <input type="hidden" name="user_danhgia" value="<?=$id?>"  />
                                    <button type="button" class="btn_danhgiau">Gửi</button>
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


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nhắn tin cho người bán</h4>
      </div>
      <form id="lienhemua" action="index.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
		
         <div class="form-group">
            <label for="ten" class="control-label">Họ và tên:</label>
             <input type="text" name="ten" class="form-control" id="ten" placeholder="Họ và tên" value="<?=@$_SESSION['user_w']['hoten']?>"  />
         </div>
       
         <div class="form-group">
            <label for="email" class="control-label">Địa chỉ email:</label>
              <input type="text" name="email" id="email" class="form-control" placeholder="Địa chỉ email" value="<?=@$_SESSION['user_w']['email']?>"  />
         </div> 
         
         <div class="form-group">
            <label for="dienthoai" class="control-label">Số điện thoại:</label>
             <input type="text" name="dienthoai" id="dienthoai" class="form-control" placeholder="Số điện thoại" value="<?=@$_SESSION['user_w']['dienthoai']?>"  />
         </div> 
         <div class="form-group">
            <label for="diachi" class="control-label">Thành phố:</label>
            <input type="text" name="diachi" id="diachi" class="form-control" placeholder="Thành phố" value=""  />
         </div>    
         <div class="form-group">
            <label for="noidung" class="control-label">Nội dung:</label>
             <textarea name="noidung" id="noidung" class="form-control"  placeholder="Nội dung"></textarea>
         </div>                  
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary btn_lienhe">Gửi</button>
      </div>
      </form>
    </div>
  </div>
</div>