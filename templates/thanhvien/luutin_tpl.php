<div class="wap_thanhvien clearfix">
    <div class="thanhvien_left">
        <?php include _template."layout/left-thanhvien.php";?>
    </div>
    <div class="thanhvienright">
        <div class="tt_thanhvien">
            <p><?=$title?></p>
        </div>
        <div class="show_tindadang">
        	<div class="div_head clearfix">
            	<div class="stt text-center">STT</div>
                <div class="tenbv " style="width:80%">Tên tin</div>
                <div class="xoa text-center">Công cụ</div>
            </div>
            <div class="div_body">
			<?php foreach($item_yeuthich as $k => $v){ 
				$link='target="_blank" href="chi-tiet/'.$v['tenkhongdau'].'.html"';
			?>
            	<div class="b_body clearfix">
                	<div class="stt text-center"><?=$k+1?></div>
                    <div class="tenbv" style="width:80%"><a <?=($v['kiemduyet']==1)?$link:'href="javascript:void(0)"'?>><?=$v['ten']?></a></div>
                    
                    <div class="xoa text-center">
                        <a href="javascript:void()" onclick="xoatin_tinluu(<?=$v['id']?>)" title="Xóa tin"><i class="fa fa-trash" aria-hidden="true"></i></a>
                   </div>
                </div>
            <?php }?>
            </div>
            <div class="div_foter">
            	<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
            </div>
        </div>
    </div>
</div>
