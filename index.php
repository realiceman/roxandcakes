<?php
include('lang.php');  
include('ManageLang.php');

if(!empty($_GET['lang'])){
$langue=$_GET['lang'];
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>

		<title>&reg; Rox &amp; Cakes</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		
		<link rel="stylesheet" href="css/mosaic.css" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
		<script type="text/javascript" src="js/mosaic.1.0.1.js"></script>
		<script type="text/javascript" src="js/site.js"></script>
		<script type="text/javascript">  
			
			jQuery(function($){
				
				
				
				$('.fade').mosaic();
				
				
				
				
				
			   $('.bar2').mosaic({
					animation	:	'slide'		//fade or slide
				});
		    
		    });
		    
		</script>
		
		<style type="text/css">
		
			/*Demo Styles*/
            body{ background-image:url('img/bg-grid.png'); }
				
			
                
		
		</style>
		
	</head>

<body>
    
<div id="mainwrapper">
    <div id="flags">  <a href="index.php?lang=fr"> <img src="layouts/fr.JPG"/> </a>
     <a href="index.php?lang=en"><img src="layouts/en.JPG"/></a> </div>
    
     <div id="logo" style="margin-top:50px;float:left;"></div>
	
    
    
    <div id="content">
			
	<div class="mosaic-block2 bar2">
			<a href="#"  class="mosaic-overlay">
				<div class="details">
                    <h4><?php echo $lang[$_SESSION['lang']]['classic']; ?></h4><br/>
                    <p><?php echo $lang[$_SESSION['lang']]['discoverReceipe']; ?></p>
				</div>
			</a>
			<div class="mosaic-backdrop"><img src="img/small/cupcakes.jpg"/></div>
		</div>
		
	<div class="mosaic-block bar2">
			<a href="course2.php"  class="mosaic-overlay">
				<div class="details">
                    <h4><?php echo $lang[$_SESSION['lang']]['lesson']; ?></h4><br/>
                    <p><?php echo $lang[$_SESSION['lang']]['learn']; ?></p>
				</div>
			</a>
			<div class="mosaic-backdrop"><img src="img/small/chocolat.jpg"/></div>
		</div>
		
		<div class="mosaic-block bar2">
			<a href="#" target="_blank" class="mosaic-overlay">
				<div class="details">
                    <h4><?php echo $lang[$_SESSION['lang']]['history']; ?></h4><br/>
                    <p><?php echo $lang[$_SESSION['lang']]['concept']; ?></p>
				</div>
			</a>
			<div class="mosaic-backdrop"><img src="img/small/rochers.jpg"/></div>
		</div>
		
		<div class="mosaic-block2 bar2">
			<a href="reservation.php?lang=<?php echo $langue; ?>" target="_blank" class="mosaic-overlay">
				<div class="details">
                    <h4><?php echo $lang[$_SESSION['lang']]['services']; ?></h4><br/>
                    <p><?php echo $lang[$_SESSION['lang']]['conf']; ?></p>
				</div>
			</a>
			<div class="mosaic-backdrop"><img src="img/small/fruits.jpg"/></div>
		</div>
		
	
		
		<div class="clearfix"></div>
	</div>

	
    <div id="down" style="height:130px;background:#803a1a;clear:both;">
    <br/>
<!--       <img id="strong" src="layouts/treat.jpg"/>-->
        <span id="strong" onMouseOver="document.Img_1.src='layouts/treat2.jpg';" onMouseOut="document.Img_1.src='layouts/treat.jpg';"> <img name="Img_1" src="layouts/treat.jpg"></span>
        <a title="<?php echo $lang[$_SESSION['lang']]['fb']; ?>" target="_blank" href="https://www.facebook.com/roxandcakes" class="ico-reseau" id="facebook"></a>
        <a title="<?php echo $lang[$_SESSION['lang']]['insta']; ?>" target="_blank" href="https://www.instagram.com/roxandcakes" class="ico-reseau2" id="insta"></a>
        <a title="<?php echo $lang[$_SESSION['lang']]['email']; ?>" target="_blank" href="contact.php" class="ico-reseau3" id="mail"></a>
    </div>
    </div>
</body>
</html>
