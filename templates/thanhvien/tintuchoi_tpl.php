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
				
			?>
            	<div class="b_body clearfix">
                	<div class="stt text-center"><?=$k+1?></div>
                    <div class="tenbv text-center"><a href="javascript:void(0)"><?=$v['ten']?></a>
                    	<div class="not_te" style="text-align: left;padding: 5px;background: #eee;">
                        	Lý do: <?=$v['ghichu']?>
                        </div>
                    </div>
                    <div class="ngaytao text-center"><?=date('d/m/Y',$v['ngaytao'])?></div>
                    <div class="ngaykiemduyet text-center"><?=($v['ngaykiemduyet']!=0)?date('d/m/Y',$v['ngaykiemduyet']):'Chưa rõ'?></div>
                    <div class="trangthai text-center">Bị từ chối</div>
                    <div class="xoa text-center">
                        <a href="javascript:void()" onclick="suatin_chitiet(<?=$v['id']?>,'thanh-vien/tin-bi-tu-choi')" title="Sửa tin"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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