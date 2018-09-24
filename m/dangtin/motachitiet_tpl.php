<div class="wap_in">
	<div class="wapper">
    	<?php include _template."layout/top_dt.php";?>
        <div class="bx_dangtin">
        	<div class="tt_top tt_bor">
            	<p>Xe của bạn có tính năng gì <span>nổi bật</span></p>
                Hãy dành một ít thời gian mô tả xe của bạn thật đặc sắc để <br/> thu hút sự chú ý của người mua nhé. 
            </div>
            <form id="chonmauxe">
            	<div class="bx_form1 clearfix">
                	<div class="tk100">
                        <div class="select_search">
                            <input type="text" autocomplete="off" name="ten" value="<?=@$_SESSION['dangtin']['ten']?>" placeholder="Nhập tiêu đê tin đăng" />
                        </div>
                    </div>
                </div>
            	<div class="bx_form1 clearfix">
                	<div class="tk100">
                        <div class="select_search">
                            <textarea name="mota" id="mota_dangtin"><?=@$_SESSION['dangtin']['mota']?></textarea>
                        </div>
                    </div>
                </div>
                  <input id="in_title" type="hidden" value="<?=$title?>"  />
                 <input name="pjax" type="hidden" value="3" />
            </form>
            <div class="bot_form clearfix">
                	<p class="text-left"><a href="javascript:void(0)" onclick="click_prev();" class="a_quaylai"><i class="fa fa-chevron-left" aria-hidden="true"></i> Quay lại</a></p>
                    <p class="text-center"><a href="javascript:void(0)" onclick="dangtin()" class="a_hoantat">Đăng tin</a></p>
                    <p class="text-right"><a href="javascript:void(0)" onclick="click_next();" class="a_tieptheo">Tiếp theo</a></p>
                </div>
        </div>
    </div>
</div>