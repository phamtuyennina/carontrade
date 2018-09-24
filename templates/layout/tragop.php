<div class="modal fade" id="myModal_tragop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" id="tienichnguoiban" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title modal-lanbanh" id="myModalLabel">Hỗ trợ vay trả góp</h4>
      </div>
      <div class="modal-body body-tienich">
        <p>Hẫy điền đầy đủ và chính xác thông tin dưới đây để người bán có thể tư vấn cho bạn nhé !</p>
        <div class="content_tienich">
          <form class="form_tienich" id="form_tienich1" name="form_tienich1">
            <input type="hidden" name="emailnguoiban" value="<?=$user_ban['email']?>">
              <div class="clearfix">
                <p>Tiêu đề tin:</p>
                <input type="text" readonly class="nodd" name="tieudetin" value="<?=$row_detail['ten']?>">
              </div>
              <div class="clearfix">
                <p>Mã tin:</p>
                <input type="text" readonly class="nodd" name="matin" value="<?=$row_detail['matin']?>">
              </div>
              <div class="clearfix">
                <p>Họ tên: <span>*</span></p>
                <input type="text" name="hotenlaithu" value="">
              </div>
              <div class="clearfix">
                <p>Điện thoại: <span>*</span></p>
                <input type="text" name="dienthoailaithu" value="">
              </div>
              <div class="clearfix">
                <p>Email: <span>*</span></p>
                <input type="text" name="emaillaithu" value="">
              </div>
              <div class="clearfix">
                <p>Mã captcha: <span>*</span></p>
                <input type="text" name="capcha" class="cap" value="">
                <img src="captcha_tragop.php" alt="Đăng ký lái thử xe" style="position: relative;top: -2px;" />
              </div>
              <div class="text-center tool-laithu">
                <a href="javascript:void(0)" class="guitragop">Gửi</a>
                <a href="javascript:void(0)" class="guinhaplai" onclick="document.form_tienich1.reset();">Nhập lại</a>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
