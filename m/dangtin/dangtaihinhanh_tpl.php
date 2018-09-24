<link href="js/filer-master/css/jquery.filer.css" type="text/css" rel="stylesheet" />
<link href="js/filer-master/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
<?php

	if(!empty($_SESSION['dangtin']['id_tmp'])){
		$d->reset();
		$sql1="select hinhanh FROM table_dangtin where id=".$_SESSION['dangtin']['id_tmp']."";
		$d->query($sql1);
		$name_tmp1=$d->result_array();
		
		if(!empty($name_tmp1[0]['hinhanh'])){
			$chuoi=explode('|',$name_tmp1[0]['hinhanh']);
		}
		
	}
 ?>
<div class="wap_in">
	<div class="wapper">
    	<?php include _template."layout/top_dt.php";?>
        <div class="bx_dangtin">
        	<div class="tt_top tt_bor">
            	<p>Chọn <span>hình ảnh</span> cho xe của bạn</p>
                Hãy chọn những tấm hình rõ nét nhất để tăng cơ hội<br/> bán được xe của bạn.
            </div>
            <form id="chonmauxe" class="danghinhanh" enctype="multipart/form-data">
            	  <input type="file" multiple name="files[]" id="input2">
                  <input name="pjax" type="hidden" value="4" />
                  <input id="in_title" type="hidden" value="<?=$title?>"  />
            </form>
            <?php if(!empty($chuoi)){?>  
            <div class="clearfix" >    
            <?php for($i=0;$i<count($chuoi);$i++){ if($chuoi[$i]==''){continue;}?>
            	<div class="jFiler-item-container1" id="<?=md5($chuoi[$i])?>">
                	<div class="jFiler-item-inner1">
                        <div class="jFiler-item-thumb-image1"><img class="img_trich" src="<?=_upload_tmp_l.$chuoi[$i]?>" /></div>
                        <div class="jFiler-item-assets1">																					
                            <ul class="list-inline1">												
                            	<li><a class="icon-jfi-trash jFiler-item-trash-action" onclick="xoahinh(<?=$_SESSION['dangtin']['id_tmp']?>,'<?=str_replace(" ","",$chuoi[$i])?>')" ></a></li>											
                            </ul>										
                       </div>
                    </div>
                </div>

            <?php }?>
        </div>
      <?php }?>
            <div class="bot_form clearfix">
                	<p class="text-left"><a href="javascript:void(0)" onclick="click_prev();" class="a_quaylai"><i class="fa fa-chevron-left" aria-hidden="true"></i> Quay lại</a></p>
                    <p class="text-center"><a href="javascript:void(0)" onclick="dangtin()" class="a_hoantat">Đăng tin</a></p>
                    <p class="text-right"><a href="javascript:void(0)" onclick="click_next();" class="a_tieptheo">Tiếp theo</a></p>
                </div>
        </div>
    </div>
</div>
<style>
.jFiler-item-inner1 {
    position: relative;
    margin: 0 00px 10px 0;
    padding: 10px;
    border: 1px solid #e1e1e1;
    border-radius: 3px;
    background: #fff;
    -webkit-box-shadow: 0px 0px 3px rgba(0,0,0,0.06);
    -moz-box-shadow: 0px 0px 3px rgba(0,0,0,0.06);
    box-shadow: 0px 0px 3px rgba(0,0,0,0.06);
}
.jFiler-item-container1 {
    float: left;
    width: calc(100% / 6);
    padding: 0px 5px;
}
.jFiler-item-assets1 {
    margin-top: 10px;
    color: #999;
}
ul.list-inline1 {
    text-align: center;
}
ul.list-inline1 li a{text-decoration:none;}
.jFiler-item-thumb-image1 {
    position: relative;
    width: 100%;
    height: 115px;
    line-height: 115px;
    border: 1px solid #e1e1e1;
    overflow: hidden;
}
</style>