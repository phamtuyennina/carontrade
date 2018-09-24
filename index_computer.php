<!doctype html>
<html lang="vi">

<head>
	<base href="http://<?=$config_url?>/"  />
	<meta name="viewport" content="width=1210" />
	<?php include _template."layout/seoweb.php";?>
	<?php include _template."layout/js_css.php";?>  
    <?=$company['analytics']?>     
</head>

<body <?php include _template."layout/background.php";?> ondragstart="return false;" ondrop="return false;" >
<div class="wap">
<div id="pre-loader" style="display:none"><div id="wrap"><div id="preloader_1"><span></span><span></span><span></span><span></span><span></span></div></div></div>
<h1 class="vcard fn" style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h1>
<h2 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h2>
<h3 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h3>
<h4 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h4>
<h5 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h5>
<h6 style="position:absolute; top:-1000px;"><?php if($title!='')echo $title;else echo $company['title'];?></h6>
	<div id="header">
		<?php include _template."layout/header.php";?>
        <?php if($source!=='dangky' && $source!=='dangnhap'){ ?>
        <?php if($_GET['com']==''||$_GET['com']=='index'){?>  
            <div id="slider" class="clearfix">
                <?php include _template."layout/slider_slick.php";?>
            </div><!---END #slider-->
        <?php }}?>
    </div>
    
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
