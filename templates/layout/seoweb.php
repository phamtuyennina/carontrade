<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="SHORTCUT ICON" href="<?=_upload_hinhanh_l.$company['faviconthumb']?>" type="image/x-icon" />
<META NAME="ROBOTS" CONTENT="<?=$config['nobots']?>" />
<link rel="canonical" href="<?=getCurrentPageURL_CANO()?>" />
<meta name="author" content="<?=$company['ten']?>" />
<meta name="copyright" content="<?=$company['ten']?> [<?=$company['email']?>]" />
<title><?php if($title!='')echo $title;else echo $company['title'];?></title>
<link rel="canonical" href="<?=getCurrentPageURL()?>" />
<meta name="keywords" content="<?php if($keywords!='')echo $keywords;else echo $company['keywords'];?>" />
<meta name="description" content="<?php if($description!='')echo $description;else echo $company['description'];?>" />
<meta name="DC.title" content="<?php if($title!='')echo $title;else echo $company['title'];?>" />
<meta name="geo.region" content="VN" />
<meta name="geo.placename" content="<?=$company['diachi']?>" />
<meta name="geo.position" content="<?=str_replace(',',':',$company['toado'])?>" />
<meta name="ICBM" content="<?=$company['toado']?>" />
<meta name="DC.identifier" content="http://<?=$config_url?>/" />
<meta property="og:image" content="<?=$images_facebook?>" />
<meta property="og:title" content="<?php if($title_facebook!=''){echo $title_facebook;}else{echo $company['title'];}?>" />
<meta property="og:url" content="<?=getCurrentPageURL();?>" />
<meta property="og:site_name" content="http://<?=$config_url?>/" />
<meta property="og:description" content="<?php if($description_facebook!=''){echo $description_facebook;}else{echo $company['description'];}?>" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="<?=$company['ten']?>" /> 
<?php if($source!='index') { ?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ae170c939be04dd"></script>
<?php } ?>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.async=true;
  js.src = "//connect.facebook.net/<?php if($lang=='en')echo 'en_EN';else echo 'vi_VN' ?>/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--Meta facebook-->
