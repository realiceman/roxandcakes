<?php
include('lang.php');  
include('ManageLang.php');

$interestTok = strip_tags($_GET['interest']);
$courseTok   = strip_tags($_GET['course']);
$lengthTok   = strip_tags($_GET['length']);
$hoursTok    = strip_tags($_GET['hours']);
$shareTok    = strip_tags($_GET['share']);

list($interestTok,$interest) = (explode(":", $interestTok));
list($courseTok,$course) = (explode(":",$courseTok));
list($lengthTok,$length) = (explode(":",$lengthTok));
list($hoursTok,$hours) = (explode(":",$hoursTok));
list($shareTok,$share) = (explode(":",$shareTok));

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>

        <title>&reg; Rox &amp; Cakes</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <link href="css/main.css" rel="stylesheet" media="screen, projection">
        <link href="css/transitions.css" rel="stylesheet" media="screen, projection">
        <link rel="stylesheet" href="css/mosaic.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/mosaic.1.0.1.js"></script>
        <script type="text/javascript" src="js/site.js"></script>
        <script type="text/javascript" src="js/modernizr.2.5.3.min.js"></script>
        <script type="text/javascript" src="js/jquery.columnizer.min.js"></script>
        <script type="text/javascript" src="js/html5slider.js"></script>
        <script type="text/javascript" src="js/utils.js"></script>
        <script type="text/javascript" src="js/custom_survey.js"></script>
		
		<style>
		article#mainContent{margin-left:35%;width:550px;}
		</style>
    </head>
    
    <body id="thanks">
        <div id="flags">
        <a href="finalize.php?lang=fr"> <img src="layouts/fr.JPG"/> </a>
        <a href="finalize.php?lang=en"><img src="layouts/en.JPG"/></a>
		</div>
		<div id="logo" style="margin-top:50px;float:left;"></div>
        <article id="mainContent">
		    
            <h1 style="text-align:center"><?php echo $lang[$_SESSION['lang']]['persoInf']; ?></h1>
            <p><?php echo $lang[$_SESSION['lang']]['fillForm']; ?></p>
			<form method="get" action="controller_student.php">
             <input id="firstname" name="firstname" style="width:70.8%;font-size:13px;" type="text" placeholder="<?php echo $lang[$_SESSION['lang']]['yourFName']; ?>"/><br/>
			 <input id="name" name="name" style="margin-top:15px;width:70.8%;font-size:13px;" type="text" placeholder="<?php echo $lang[$_SESSION['lang']]['yourName']; ?>"/><br/>
			<input id="phone" name="phone" style="margin-top:15px;width:70.8%;font-size:13px;" type="text" placeholder="<?php echo $lang[$_SESSION['lang']]['yourPhone']; ?>"/><br/>
			<input id="email" name="email" style="margin-top:15px;width:70.8%;font-size:13px;" type="email" placeholder="<?php echo $lang[$_SESSION['lang']]['yourEmail']; ?>"/><br/>
			<input type='hidden'  name='interest' value= '<?php echo $interest; ?>' />
			<input type='hidden'  name='course' value= '<?php echo $course; ?>' />
			<input type='hidden'  name='length' value= '<?php echo $length; ?>' />
			<input type='hidden'  name='hours' value= '<?php echo $hours; ?>' />
			<input type='hidden'  name='share' value= '<?php echo $share; ?>' />
			<input type="submit" class="alignRight" value="<?php echo $lang[$_SESSION['lang']]['submit']; ?>" />
			</form>
        </article>
    
        <div id="down" style="height:130px;background:#803a1a;clear:both;">
            <br/>
            <!--       <img id="strong" src="layouts/treat.jpg"/>-->
            <span id="strong" onMouseOver="document.Img_1.src='layouts/treat2.jpg';" onMouseOut="document.Img_1.src='layouts/treat.jpg';"> <img name="Img_1" src="layouts/treat.jpg"></span>
            <a title="follow us on Facebook" target="_blank" href="https://www.facebook.com/roxandcakes" class="ico-reseau" id="facebook"></a>
            <a title="follow us on Instagram" target="_blank" href="https://www.instagram.com/roxandcakes" class="ico-reseau2" id="insta"></a>
            <a title="email us" target="_blank" href="contact.php" class="ico-reseau3" id="mail"></a>
        </div>
     
    </body>