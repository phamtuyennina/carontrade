<?php
	include ("ajax_config.php");	
?>
<script type="text/javascript">
  $(document).ready(function() {
      $(".numbersOnly2").keyup(function () {
          this.value = this.value.replace(/[^0-9\.]/g, '');
      });
      $('.pricemask').priceFormat({
          limit: 13,
          prefix: '',
          centsLimit: 0
      });
      $(".numbersOnly").keyup(function () {
          this.value = this.value.replace(/[^0-9]/g, '');
      });
      $('#txtMoney').val($('#gia_xe').val());
      $(".numbersOnly2").trigger('keyup');
			$("#btnCalculator").click(function () {
					 getRepaymentSchedule();
			});
			function getRepaymentSchedule() {
				var txtMoney = $("#txtMoney");
        var txtTime = $("#txtTime");
        var txtInterest = $("#txtInterest");
        var money = txtMoney.val().replace(/[^0-9]/g, "");
        var time = txtTime.val();
        var interest = txtInterest.val();
				if (!money || eval(money) <= 0) {
            alert("Bạn cần nhập số tiền vay!");
            txtMoney.focus();
            return;
        }
        if (!time || eval(time) <= 0) {
            alert("Bạn cần nhập thời gian vay!");
            txtTime.focus();
            return;
        }
        if (!interest || eval(interest) <= 0 ) {
            alert("Bạn cần nhập lãi suất!");
            txtInterest.focus();
            return;
        }
				var month = parseInt($("#month").val());
        var month1 = parseInt($("#month1").val());
        var lh = $("#lh").val();
				if (month == 1 && time > 360) {
            alert("Thời gian vay tối đa 360 tháng.");
            txtTime.focus();
            return;
        }
        if (month == 12 && time > 30) {
            alert("Thời gian vay tối đa 30 năm.");
            txtTime.focus();
            return;
        }
				var amount = parseFloat(money),
            totalMonth = parseInt(time) * month,
            interest = parseFloat(interest) / month1;
				$.ajax({
					url:'ajax/tintoantienvay.php',
					type:'POST',
					dataType: "json",
					data:{amount: amount, totalMonth: totalMonth, interest: interest, type: lh},
					success:function(data){
						var html = "<div class='header clearfix'>"
							+ "<div class='soky head'>Số kỳ</div>"
							+ "<div class='duno head'>Dư nợ đầu kỳ</div>"
							+ "<div class='von head'>Vốn phải trả</div>"
							+ "<div class='lai head'>Lãi phải trả</div>"
							+ "<div class='vonlai head'>Vốn + lãi</div>"
							+ "</div>"
							+ "<div style = 'overflow: auto; height: 250px'>";
							for (var i = 0; i < data.RepaymentSchedules.length; i++) {
                var item = data.RepaymentSchedules[i];
	                html += "<div class='rowresult clearfix'>"
	                    + "<div class='soky item'>" + item.Period + "</div>"
	                    + "<div class='duno item'>" + item.OriginalRemaining + "</div>"
	                    + "<div class='von item'>" + item.Original + "</div>"
	                    + "<div class='lai item'>" + item.Profit + "</div>"
	                    + "<div class='vonlai item'>" + item.Total + "</div>"
	                    + "</div>";
	            }
							html += "<div class='rowresult header clearfix'>"
	                + "<div class='soky item head'>Tổng</div>"
	                + "<div class='duno item head'></div>"
	                + "<div class='von item head'>" + data.Amount + "</div>"
	                + "<div class='lai item head'>" + data.TotalProfit + "</div>"
	                + "<div class='vonlai item head'>" + data.Total + "</div>"
	                + "</div>"
	                + "</div>";
						$("#lsnh-result").html(html);
					}	
				})		
				
			}
  });
  
</script>
<p>Bảng này giúp bạn tính toán số tiền cần trả khi vay ngân hàng để mua xe trả góp</p>
<div class="content-nganhang">
    <div class="calculate">
        <div class="calculaterow clearfix">
            <label>Số tiền vay (VNĐ)</label>
            <input id="txtMoney" class="pricemask numbersOnly2" placeholder="VD: 100000000" value="0">
        </div>
        <div class="calculaterow clearfix">
            <label>Thời gian vay</label>
            <input id="txtTime" class="input numbersOnly" placeholder="VD: 3">
            <select id="month" class="selectoption1 select-base select-lsnn" data-width="175px">
                <option value="1">Tháng</option>
                <option value="12" selected="selected">Năm</option>
            </select>
        </div>
        <div class="calculaterow clearfix">
            <label>Lãi suất (%)</label>
            <input id="txtInterest" placeholder="VD: 10" class="input selectoption1 numbersOnly2">
            <select id="month1" data-width="175px" class="select-base select-lsnn">
                <option value="1">Tháng</option>
                <option value="12" selected="selected">Năm</option>
            </select>
        </div>
        <div class="calculaterow clearfix">
            <label>Loại hình</label>
            <select id="lh" class="selectoption1 select-base select-lsnn-loai-hinh" data-width="365px">
                <option value="1">Trả góp đều hàng tháng</option>
                <option value="2" selected="selected">Trả góp đều, lãi tính trên dư nợ giảm dần hàng tháng</option>
            </select>
        </div>
        <div class="calculaterow clearfix">
            <label>&nbsp;</label>
            <input type="button" id="btnCalculator" value="XEM KẾT QUẢ" class="btncancel">
        </div>
    </div>
    <div class="result" id="lsnh-result">
        
    </div>
</div>
