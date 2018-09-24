<?php
	include ("ajax_config.php");	
?>
<script src="admin/js/jquery.priceformat.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    jQuery(".numbersOnly2").keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    $('.pricemask').priceFormat({
        limit: 13,
        prefix: '',
        centsLimit: 0
    });
    $(".numbersOnly2").trigger('keyup');
  });
</script>  

<p>Carontrade sẽ giúp bạn tính toán số tiền phát sinh sau khi mua xe hơi</p>
<div class="content-lanbanh">
  <div class="rowitem clearfix">
      <label>Nhập giá xe</label>
      <input id="txtPrice" class="numbersOnly2 pricemask" type="text" value=""> &nbsp;
      <span>VNĐ</span>
   </div>
   <div class="rowitem clearfix">
      <label>Nơi mua</label>
      <select id="ddlCity" class="selectoption1 select-base">
          <option value="HN">Hà Nội</option>
          <option value="SG">TP HCM</option>
          <option value="TK">Tỉnh thành khác</option>
      </select>
   </div>
   <div class="rowitem clearfix">
      <label>Tình trạng</label>
      <select id="ddltinhtrang" class="selectoption1 select-base">
          <option value="0">Xe mới</option>
          <option value="1">Xe đã qua sử dụng</option>
      </select>
   </div>
   <div class="rowitem clearfix">
      <label>Kiểu dáng</label>
      <select id="ddlkieudang" class="selectoption1 select-base">

      </select>
   </div>
   <div class="rowitem clearfix">
      <label>Số chổ</label>
      <select id="ddlsocho" class="selectoption1 select-base">
          
      </select>
   </div>
   <div class="rowitem clearfix">
      <label>&nbsp;</label>
      <input type="button" id="btnCalculator" class="btn" value="TÍNH TOÁN">
  </div>
</div>
<div id="result" class="result" style="display:none">
  <div class="resultitem clearfix">
    <input type="checkbox" id="cbptb">
    <label>Phí trước bạ</label>
    <span id="ptb"></span>
  </div>
  <div class="resultitem clearfix">
    <input type="checkbox" id="cnpdklh">
    <label>Phí đăng kiểm lưu hành</label>
    <span id="pdklh"></span>
  </div>
  <div class="resultitem clearfix">
      <input type="checkbox" id="cbpbtdb">
      <label>Phí bảo trì đường bộ</label>
      <span id="pbtdb"></span>
  </div>
  <div class="resultitem clearfix">
      <input type="checkbox" id="cbbhvc">
      <label>Bảo hiểm vật chất xe</label>
      <span id="bhvc"></span>
  </div>
  <div class="resultitem clearfix" id="phibienso">
      <input type="checkbox" id="cbphibienso">
      <label>Phí biển số</label>
      <span id="bienso"></span>
  </div>
  <div class="resultitem clearfix" id="phisangtendoichu">
      <input type="checkbox" id="cbsangtendoichu">
      <label>Phí sang tên đổi chủ</label>
      <span id="sangtendoichu"></span>
  </div>
  <div class="resultitem">
      <label>Tổng cộng (xe + phí)</label>
      <span id="tong"></span>
  </div>
</div>
<div class="note" style="display:none">
  Trên đây là một số chi phí cố định quý khách hàng buộc phải trả khi mua và đăng ký xe. Các chi phí khác có thể phát sinh (và không bắt buộc) trong quá trình đăng ký xe.
</div>
