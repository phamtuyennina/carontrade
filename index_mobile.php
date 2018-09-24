<!doctype html>
<html lang="vi">

<head>
	<base href="http://<?=$config_url?>/"  />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1" />
	<?php include _template."layout/seoweb.php";?>
	<?php include _template."layout/js_css.php";?>  
    <?=$company['analytics']?>     
</head>

<body <?php include _template."layout/background.php";?> ondragstart="return false;" ondrop="return false;" >
<div class="wap">
<div id="pre-loader"><div id="wrap"><div id="preloader_1"><span></span><span></span><span></span><span></span><span></span></div></div></div>
<h1 class="vcard fn" style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h1>
<h2 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h2>
<h3 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h3>
<h4 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h4>
<h5 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h5>
<h6 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h6>
	<?php include _template."layout/menu_mobi.php";?>
	<div id="header">
		<?php include _template."layout/header.php";?>
       
    </div>
     <div class="banner_qc" style="float:none">
            <div class="slick_vv">
                <?php foreach($row_qc as $v){ ?>
                <div>
                    <p><a href="<?=$v['link']?>"><img src="thumb/550x80x1x90/<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a></p>
                </div>
                <?php }?>
            </div>
        </div>
     <?php if($source!=='dangky' && $source!=='dangnhap'){ ?>
        <?php if($_GET['com']==''||$_GET['com']=='index'){?>  
            <div id="slider" class="clearfix">
                <?php include _template."layout/slider_slick.php";?>
            </div><!---END #slider-->
        <?php }}?>
    <?php if($source!=='dangky' && $source!=='dangnhap'){ ?>
    <div id="main_content">
        <?php include _template.$template."_tpl.php"; ?> 
        <div class="clear"></div>
    </div><!---END #main_content-->
    <div id="wap_footer">
        <?php include _template."layout/footer.php";?>
    </div><!---END #footer-->   
	<?php }else{?>
    	 <?php include _template.$template."_tpl.php"; ?> 
    <?php }?>
<?=$company['codethem']?> 
<?php include _template."layout/php_js.php";?>
</div>
</body>
</html>
