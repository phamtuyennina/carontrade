<?php 
	$d->reset();
	$sql_lkweb="select id,ten$lang as ten,link,photo from #_lkweb where hienthi=1 and type='lienket' order by stt,id desc";
	$d->query($sql_lkweb);
	$lklink=$d->result_array();		
?>
<?php 
	if($com=='chi-tiet'){
	$user_ban=info_user($row_detail['id_user']);	
	$link="danh-gia-tai-khoan/".changeTitle($user_ban['hoten'])."/".$user_ban['id'];
?>
	<div class="bx_chittiet">
    	<div class="thongtin_u_s">
        	<p class="t_">Thông tin người bán</p>
            <div class="clearfix">
            	<img style="float: left;margin-right: 10px;" src="thumb/70x70x1x90/<?=_upload_thanhvien_l.getphoto_user($user_ban['id'])?>" alt="<?=getten_user($user_ban['id'])?>" onError="this.src='images/support.png';" width="70px" />
            	<p class="u_nguoiban"><a href="<?php if($_SESSION['user_w']['id']==$user_ban['id']){echo 'javascript:void(0)';}else{echo $link;} ?>">
               <?=getten_user($user_ban['id'])?>			
					 (<?=demtongsao_user($user_ban['id'])?> <i class="fa fa-star" aria-hidden="true"></i>)</a></p>
                <p class="u_danhgia">
                    <?=tinhdanhgia($row_detail['id_user'])?>% đánh giá tích cực
                </p>
            </div>
            <p class="llnine"></p>
            <div class="call_u">
            		<div class="toll-nguoidung clearfix">
            			<div class="lienhenguoiban">
										<p>Gọi cho người bán</p>
		                <a href="javascript:void(0)" class="p_cal1" data-call="<?=$user_ban['dienthoai']?>">Xem</a>
            			</div>
									<div class="hotronguoimua">
											<a href="javasrcipt:void(0)" class="chiphilb">Ước tính chi phí lăn bánh</a>
											<a href="javasrcipt:void(0)" class="vaynganhang">Ước tính vay ngân hàng</a>
									</div>
            		</div>
                <p><b>Mẹo:</b> Nhớ nhắc đến CarOntrade khi liên hệ người bán để quá trình giao dịch của bạn được thuận lợi hơn!</p>
                <p><b>Mã tin:</b><span><?=$row_detail['matin']?></span>	</p>
            </div>
        </div>
    </div>
    
    <div class="bx_chittiet">
    	<div class="thongtin_u_s">
        	<p class="text-center t_">Nhắn tin cho người bán</p>
            <div class="bx_from">
            	<form id="lienhemua" action="/" method="post" enctype="multipart/form-data">
            	<div class="clearfix">
                	<input type="text" name="ten" id="ten" placeholder="Họ và tên" value="<?=@$_SESSION['user_w']['hoten']?>"  />
                </div>
                <div class="clearfix">
                	<input type="text" name="email" id="email" placeholder="Địa chỉ email" value="<?=@$_SESSION['user_w']['email']?>"  />
                </div>
                <div class="clearfix w">
                	<input type="text" name="dienthoai" id="dienthoai" placeholder="Số điện thoại" value="<?=@$_SESSION['user_w']['dienthoai']?>"  />
                    <input type="text" name="diachi" id="diachi" placeholder="Thành phố" value=""  />
                </div>
                 <div class="clearfix">
                	<textarea name="noidung" id="noidung" placeholder="Nội dung"></textarea>
                </div>
                <div class="clearfix text-center">
                	<button type="button" class="btn_lienhe">Gửi tin nhắn</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="bx_chittiet">
    	<div class="khuvuc_ban">
        	<p>Địa điểm <i class="fa fa-map-marker" aria-hidden="true"></i></p>
            <?=get_quan($row_detail['huyen'])?>,<?=get_tinh($row_detail['quan'])?>
        </div>
    </div>
<?php }?>
<div class="bx_quangcao5">
	<div class="slick_sl5">
    	<?php foreach($row_qc1 as $v){ ?>
        <div>
        	<p><a href="<?=$v['link']?>"><img src="thumb/350x340x1x90/<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a></p>
        </div>
        <?php }?>
    </div>
    <div class="bx_lienketlink">
    	<p>Có thể bạn quan tâm</p>
    	<ul>
        	<?php foreach($lklink as $v){ ?>
            <li>
            	<a href="<?=$v['link']?>" target="_blank">
                	<span><?=$v['ten']?></span>
                    <?=$v['link']?>
                </a>
            </li>
            <?php }?>
        </ul>
    </div>
</div>
