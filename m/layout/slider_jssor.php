<?php

	$d->reset();
	$sql_slider = "select ten$lang as ten,link,photo,mota$lang as mota from #_slider where hienthi=1 and type='slider' order by stt,id desc";
	$d->query($sql_slider);
	$slider=$d->result_array();
	
?>

<link href="css/css_jssor_slider.css" type="text/css" rel="stylesheet" />

<style> 
		
    </style>

<div id="slider1_container" style="position: relative;width: 1356px; height: 470px;;margin:0 auto;">
    <!-- Slides Container -->
    <div u="slides" style="cursor: move;width: 1356px; height: 470px;overflow: hidden;">
        <?php for($i=0;$i<count($slider);$i++){ ?>
        <div>
        	<a href="<?=$slider[$i]['link']?>" target="_blank">
            <img u="image" src="<?php if($slider[$i]['photo']!='')echo _upload_hinhanh_l.$slider[$i]['photo'];else echo 'images/noimage.png' ?>" alt="<?=$slider[$i]['ten']?>" />
            
            <div u=caption t="*" class="captionOrange caption-box">
            	<a class="name-cap" href="<?=$slider[$i]['link']?>" target="_blank"><?=$slider[$i]['ten']?></a>
                <div class="mota-caption"><?=catchuoi($slider[$i]['mota'],200)?></div>
            </div>
            </a>
        </div>
        <?php } ?>                
    </div>
    <!-- Trigger -->
             
    <!-- Arrow Left -->
    <span u="arrowleft" class="jssora05l" style="top:40%;"></span>
    <!-- Arrow Right -->
    <span u="arrowright" class="jssora05r" style="top:40%;"></span>
</div><!-- Jssor Slider End -->
        

    
 