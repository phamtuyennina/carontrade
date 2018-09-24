<div class="wap_in">
	<div class="wapper clearfix">
        <div class="waptrogiup">
            <div class="bx_tin1tin text-center">
                <p>Trợ giúp người dùng</p>
                <span>CarOntrade có thể giúp được gì cho bạn?</span>
            </div>
            <?php foreach($tintuc as $v){ ?>
                <div class="bxtrogiup">
                    <div class="cauhoi text-center">
                        <p><?=$v['ten']?></p>
                    </div>
                    <div class="cautraloi">
                        <div><?=$v['noidung']?></div>
                    </div>
                </div>
            <?php }?>
        </div>
        <div class="clear"></div>
		<div class="pagination"><?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
    </div>
</div>