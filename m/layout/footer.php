<?php	

	$d->reset();
	$sql_contact = "select noidung$lang as noidung from #_about where type='footer' limit 0,1";
	$d->query($sql_contact);
	$company_contact = $d->fetch_array();

	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau from #_news where type='ho-tro-khach-hang' and hienthi=1 order by stt,id desc";
	$d->query($sql);
	$hotro = $d->result_array();
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau from #_news where type='tro-giup-nguoi-dung' and hienthi=1 order by stt,id desc";
	$d->query($sql);
	$hotro_nd = $d->result_array();
	
	
	$d->reset();
	$sql_lkweb="select id,ten$lang as ten,link,photo from #_lkweb where hienthi=1 and type='xahoi' order by stt,id desc";
	$d->query($sql_lkweb);
	$lkweb=$d->result_array();
	
	$d->reset();
	$sql_banner2 = "select photo from #_background where type='logo2' limit 0,1";
	$d->query($sql_banner2);
	$row_banner2 = $d->fetch_array();	
	
	$d->reset();
	$sql = "select ten$lang as ten,link,photo from #_slider where hienthi=1 and type='chungnhan' order by stt,id desc";
	$d->query($sql);
	$chungnhan=$d->result_array();			
?>
<?php if($source!='thanhvien'){ ?>
<div class="nav_ft">
	<div class="wapper">
    	<div class="row">
        	<div class="col-xs-12 col-1">
            	<div class="row">
                	<div class="col-xs-12 col-navft">
                        <p class="tt_navft">Trợ giúp người dùng</p>
                        <ul>
                            <?php foreach($hotro_nd as $v){ ?>
                            <li><a href="tro-giup-nguoi-dung/<?=$v['tenkhongdau']?>.html"><?=$v['ten']?></a></li>
                            <?php }?>
                            <li><a href="tro-giup.html">Trợ giúp</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-navft">
                       <p class="tt_navft">Hỗ trợ khách hàng</p>
                        <ul>
                            <?php foreach($hotro as $v){ ?>
                            <li><a href="ho-tro-khach-hang/<?=$v['tenkhongdau']?>.html"><?=$v['ten']?></a></li>
                            <?php }?>
                            <li><a class="click_ajax_fr" href="javascript:void">Gửi câu hỏi đến CarOntrade</a></li>
                        </ul>  
                    </div>
                    <div class="col-xs-12 col-navft">
                       <p class="tt_navft">Chứng nhận</p>
                       <?php foreach($chungnhan as $v){ ?>
                       <div style="margin-bottom:5px;">
                       		<a href="<?=$v['link']?>" rel="nofollow">
                            	<img src="thumb/225x85x2x90/<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>"  />
                            </a>
                       </div>
                       <?php }?>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-navft col-nhantin">
            	<p class="tt_navft">Đăng ký nhận tin</p>
                <div>Đăng ký nhận tin mới nhất để cập nhật sản phẩm mới và khuyến mãi</div>
                <?php include _template."layout/dangkynhantin.php";?>
                <p class="tt_navft">Liên kết mạng xã hội</p>
                <p>
                	<?php foreach($lkweb as $v){ ?>
                    <a href="<?=$v['link']?>" title="<?=$v['ten']?>" >
                    	<img src="<?=_upload_khac_l.$v['photo']?>" alt="<?=$v['ten']?>"  />
                    </a>
                    <?php }?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php }?>
<div class="nav_ft_bot">
	<div class="wapper">
    	<div class="" style="margin-bottom:20px;"><?=$company_contact['noidung']?></div>
    	<div class="nav_logo text-center"><a href=""><img src="<?=_upload_hinhanh_l.$row_banner2['photo']?>" alt="<?=$company['ten']?>" /></a></div>
        <div class="text-center">
        	<ul>
            	<li><a href="chinh-sach-bao-mat.html">Chính sách bảo mật</a></li><span>|</span>
                <li><a href="gioi-thieu.html">Về CarOntrade</a></li><span>|</span>
                <li><a href="lien-he.html">Liên hệ</a></li><span>|</span>
                <li><a href="tuyen-dung.html">Tuyển dụng</a></li><span>|</span>
                <li><a href="hop-tac.html">Hợp tác</a></li>
            </ul>
        </div>
        <div class="copy text-center">
        	Giấy chứng nhận đăng ký doanh nghiệp số 0315132715 do Sở Kế Hoạch và Đầu Tư TPHCM cấp ngày 29/6/2018<br/>
           Registered ® 2018  CarOntrade. All rights reserved. Design by Nina
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Gửi câu hỏi đến CarOntrade</h4>
      </div>
      <div class="modal-body" id="load_fr">
        
      </div>
      
    </div>
  </div>
</div>