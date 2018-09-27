<div class="wap_in">
	<div class="wapper">
      <?php include _template."layout/top_dt.php";?>
      <div class="bx_dangtin">
        <form id="chonmauxe">
          <div class="tt_top">
            	<p>Bạn có những <span>tiện ích</span> nào để <span>hỗ trợ</span> người mua ?</p>
            </div>
          <div class="bx_form1 clearfix">
              <div class="tk100">
                    <div class="select_search">
                        <div class="select_tienich clearfix">
                          <span>
                            Đăng ký lái thử
                          </span>
                          <input type="radio" id="laithu_true" <?php if(!empty($_SESSION['dangtin']['laithu'])){echo 'checked';} ?> name="laithu" value="1"  />
                          <label for="laithu_true">Có</label>
                          <input type="radio" name="laithu" id="laithu_false" <?php if(empty($_SESSION['dangtin']['laithu'])){echo 'checked';} ?> value="0"  />
                          <label for="laithu_false">Không</label>
                        </div>
                    </div>
                </div>
            </div>
          <div class="bx_form1 clearfix">
              <div class="tk100">
                <div class="select_search">
                    <div class="select_tienich clearfix">
                      <span>
                        Hỗ trợ vay trả góp
                      </span>
                      <input type="radio" id="tragop_true" <?php if(!empty($_SESSION['dangtin']['tragop'])){echo 'checked';} ?> name="tragop" value="1"  />
                      <label for="tragop_true">Có</label>
                      <input type="radio" name="tragop" id="tragop_false" value="0" <?php if(empty($_SESSION['dangtin']['tragop'])){echo 'checked';} ?> />
                      <label for="tragop_false">Không</label>
                    </div>
                </div>
              </div>
        </div>
        <p class="note_tienich">
          <span>(*)</span>: Người mua sẽ gửi email đến địa chỉ email mà bạn đăng ký.
        </p>
              <input id="in_title" type="hidden" value="<?=$title?>"  />
             <input name="pjax" type="hidden" value="5" />
        </form>
        <div class="bot_form clearfix">
              <p class="text-left"><a href="javascript:void(0)" onclick="click_prev();" class="a_quaylai"><i class="fa fa-chevron-left" aria-hidden="true"></i> Quay lại</a></p>
                <p class="text-center"><a href="javascript:void(0)" onclick="dangtin()" class="a_hoantat">Đăng tin</a></p>
                <p class="text-right"><a href="javascript:void(0)" onclick="click_next();" class="a_tieptheo">Tiếp theo</a></p>
            </div>
      </div>
  </div>
</div>
