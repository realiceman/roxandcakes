<?php
include('lang.php');  
include('ManageLang.php');

$langue= $_SESSION['lang'];

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
		
		<script type="text/javascript" src="js/site.js"></script>
        <link rel="stylesheet" href="css/menu_style.css">
        <title><?php echo $lang[$_SESSION['lang']]['CateringMenu']; ?></title>
				<style type="text/css">
          
			body{background-image:url('img/bg-grid.png');}
            #content{width:750px;margin:auto;padding-top:30px;font:12px Arial;margin-left:30%;font-weight:bold;}
			.a{display:block;color:#7a7d8f;}
			.a:hover{color:#83e6ff;}

			h1{background:#1c1c24;padding:15px;font-weight:normal;font-size:15px;color:#efefef;}
			
			th,td{padding:10px;border:1px solid #1c1c24;text-align:center;}	
			#logo { z-index:1;box-shadow: 0 0 0px #000;position:relative; top:20px; left:-500px; width:400px; height:400px; background:url(layouts/logo.png) top left no-repeat;}
			#flags{ width:70px;margin-left: 90%;}
             
		
		</style>
    </head>
    <body>
	       <div id="flags">  <a href="menu.php?lang=fr"> <img src="layouts/fr.JPG"/> </a>
     <a href="menu.php?lang=en"><img src="layouts/en.JPG"/></a> </div>
    
     <div id="logo" style="margin-top:50px;float:left;"></div>
	
	
	    <div id="content">
        <a href="reservation.php"><?php echo $lang[$_SESSION['lang']]['bookNow']; ?></a>
        <section class="menu">
            <?php
			if(empty($langue) || $langue=="fr"){
               $menu = fopen('backoffice/frmenu.txt', 'r');
			}elseif($langue=="en"){
			   $menu = fopen('backoffice/enmenu.txt', 'r');
			}else{
			   return false;
			}
			
            while($ligne = fgets($menu)) echo $ligne;
            fclose($menu);
            ?>
        </section>
	   </div>
    </body>
</html>