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
                <div class="tenbv text-center">Tên tin</div>
                <div class="ngaytao text-center">Ngày tạo</div>
                <div class="ngaykiemduyet text-center">Ngày kiểm duyệt</div>
                <div class="trangthai text-center">Trạng thái tin</div>
                <div class="xoa text-center">Công cụ</div>
            </div>
            <div class="div_body">
			<?php foreach($items1 as $k => $v){ 
				$link='target="_blank" href="chi-tiet/'.$v['tenkhongdau'].'.html"';
			?>
            	<div class="b_body clearfix">
                	<div class="stt text-center"><?=$k+1?></div>
                    <div class="tenbv text-center"><a <?=($v['kiemduyet']==1)?$link:'href="javascript:void(0)"'?>><?=$v['ten']?></a></div>
                    <div class="ngaytao text-center"><?=date('d/m/Y',$v['ngaytao'])?></div>
                    <div class="ngaykiemduyet text-center"><?=($v['ngaykiemduyet']!=0)?date('d/m/Y',$v['ngaykiemduyet']):'Chưa rõ'?></div>
                    <div class="trangthai text-center"><?=($v['kiemduyet']==1)?'Đã duyệt':'Chưa duyệt'?></div>
                    <div class="xoa text-center">
                    	<?php if($v['kiemduyet']==0){ ?>
                        <a href="javascript:void()" onclick="suatin_chitiet(<?=$v['id']?>,'thanh-vien/tin-cho-duyet')" title="Sửa tin nháp"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <?php }?>
                        <a href="javascript:void()" onclick="xoatin_chitiet(<?=$v['id']?>)" title="Xóa tin"><i class="fa fa-trash" aria-hidden="true"></i></a>
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