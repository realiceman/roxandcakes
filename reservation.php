<?php
include('lang.php');  
include('ManageLang.php');

$langue= $_SESSION['lang'];

if(!empty($_POST)){
    extract($_POST);
    $validation = true;
    
    if($jour<10){
        $jour = '0'.$jour;
    }
    if($mois<10){
        $mois = '0'.$mois;
    }
    $date_unix = strtotime($annee.'-'.$mois.'-'.$jour);
    if(($mois == '04' || $mois == '06' || $mois == '09' || $mois == '11') && ($jour == '31')){
        $validation = false;
        $erreur_date = $lang[$_SESSION['lang']]['errorDay'];
    }elseif(($mois == '02') && ($jour > '29')){
        $validation = false;
        $erreur_date = $lang[$_SESSION['lang']]['errorDay'];
    }elseif($date_unix < time()){
        $validation = false;
        $erreur_date = $lang[$_SESSION['lang']]['invalidDate'];
    }
    $heures_en_secondes = $heures*3600 + $minutes*60;
    if((!ctype_digit($heures)) || (!ctype_digit($minutes))){   //ctype pr nbres entiers
        $validation = false;
        $erreur_heure = $lang[$_SESSION['lang']]['invalidHour'];
    }elseif((($heures_en_secondes < 30600) || ($heures_en_secondes > 77400))){
        $validation = false;
        $erreur_heure = $lang[$_SESSION['lang']]['CreneauHorInv'];
    }
    if(!ctype_digit($couverts)){
        $validation = false;
        $erreur_couverts = $lang[$_SESSION['lang']]['nbreCouvertInv'];
    }
    
    if(empty($nom)){
        $validation = false;
        $erreur_nom = $lang[$_SESSION['lang']]['typeName'];
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $validation = false;
        $erreur_email = $lang[$_SESSION['lang']]['typeEmail'];
    }
    
    if($validation){
        include('bdd.php');
        $annulation = time().''.$nom;
        $req = $bdd->prepare('INSERT INTO reservations (jour,couverts,nom,email,annulation) VALUES (:jour,:couverts,:nom,:email,:annulation)');
        $req->execute(array(
            'jour' => $annee.'-'.$mois.'-'.$jour.' '.$heures.':'.$minutes.':00',
            'couverts' => $couverts,
            'nom' => $nom,
            'email' => $email,
            'annulation' => $annulation
        ));
        $req->closeCursor();
        $to = $email;
        $subject = $lang[$_SESSION['lang']]['confirmationReserv'];
        $content = '
            "'.$lang[$_SESSION['lang']]['confirmation'].'"<br />
            <br />
            <strong>"'.$lang[$_SESSION['lang']]['dayReser'].'"</strong> '.$jour.'/'.$mois.'/'.$annee.'<br />
            <strong>"'.$lang[$_SESSION['lang']]['hourReser'].'"</strong> '.$heures.':'.$minutes.'<br />
            <strong>"'.$lang[$_SESSION['lang']]['guestReser'].'"</strong> '.$couverts.'<br />
            <strong>"'.$lang[$_SESSION['lang']]['nameReser'].'"</strong> '.$nom.'<br />
            <br />
            "'.$lang[$_SESSION['lang']]['cancelReser'].'" <a href="http:\\localhost:82\C:\wamp\www\test\phpobjet\roxandcakes\cancel_booking.php?reservation='.$annulation.'">"'.$lang[$_SESSION['lang']]['cancelReserLink'].'"</a><br />
            <br />
            "'.$lang[$_SESSION['lang']]['seeUsoon'].'"
        ';
        $headers = 'MIME-Version: 1.0'. "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8'. "\r\n";
        mail($to,$subject,$content,$headers);
    }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>

		<title>&reg; Rox &amp; Cakes</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		
       
		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
		
		<script type="text/javascript" src="js/site.js"></script>
		
		<style type="text/css">
          
			body{background-image:url('img/bg-grid.png');}
            #content{width:750px;margin:auto;padding-top:30px;font:12px Arial;margin-left:30%;font-weight:bold;}
			.a{display:block;color:#7a7d8f;}
			.a:hover{color:#83e6ff;}

			h1{background:#1c1c24;padding:15px;font-weight:normal;font-size:15px;color:#efefef;}
			p{padding-bottom:3px;border-bottom:1px dashed #999;}
			p span{float:right;margin:0;color:#999;font-weight:bold;}
			span{margin-left:15px;color:#ff4917;}

			form{background:#f4bfa6;}
			label{margin-left:15px;}
			select{margin:5px 0 15px 15px;}
			input{margin:5px 15px 0 15px;}
			input[type=text]{width:220px;margin-bottom:5px;padding-left:3px;color:#999;}
			input.small{width:30px;padding:0;text-align:center;}
			textarea{width:710px;height:300px;max-width:720px;margin:5px 15px 5px 15px;padding:3px;color:#999;}
			input[type=submit]{background:#ff4917;margin:10px 0 15px 15px;;padding:7px;border:none;border-radius:4px;color:#fff;text-shadow:1px 1px 1px #9e2504;}
            input[type=submit]:hover{background:#d7490e;}
			table{background:#22252d;margin:auto;border-collapse:collapse;border:1px solid #1c1c24;font-size:12px;}
			th,td{padding:10px;border:1px solid #1c1c24;text-align:center;}	
			#logo { z-index:1;box-shadow: 0 0 0px #000;position:absolute; top:20px; left:-500px; width:400px; height:400px; background:url(layouts/logo.png) top left no-repeat;}
			#flags{ width:70px;margin-left: 90%;}
             
		
		</style>
		
	</head>

<body>
    
<div id="mainwrapper">
    <div id="flags">  <a href="reservation.php?lang=fr"> <img src="layouts/fr.JPG"/> </a>
     <a href="reservation.php?lang=en"><img src="layouts/en.JPG"/></a> </div>
    
     <div id="logo" style="margin-top:50px;float:left;"></div>
	
    
    
    <div id="content">
			
	 <a class="a" href="menu.php"><?php echo $lang[$_SESSION['lang']]['menu']; ?></a>
        <?php if((isset($validation)) && ($validation == true)){ ?>
        <h1><?php echo $lang[$_SESSION['lang']]['reservRegis']; ?></h1>
        <?php }else{ ?>
        <form method="post" action="reservation.php">
            <h1><?php echo $lang[$_SESSION['lang']]['reservDateAndTime']; ?></h1>
            <?php if(isset($erreur_date)) echo '<span>'.$erreur_date.'</span><br />'; ?>
            <?php if(isset($erreur_heure)) echo '<span>'.$erreur_heure.'</span><br />'; ?>
            <?php if(isset($erreur_couverts)) echo '<span>'.$erreur_couverts.'</span><br />'; ?>
            <label for="jour"><?php echo $lang[$_SESSION['lang']]['reserDay']; ?></label><br />
            <select name="jour">
                <?php
                $i = 1;
                while($i <= 31)
                {
                    if((isset($jour)) && ($jour == $i)){
                        echo '<option value="'.$i.'" selected>'.$i.'</option>';
                    }else{
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    $i++;
                }
                ?>
            </select>
            <select name="mois">
                <?php
                $mois_francais = array('','Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
				$mois_anglais  = array('','January','February','March','April','May','June','July','August','September','October','November','December');
                $i = 1;
                while($i <= 12)
                {
                    if((isset($mois)) && ($mois == $i)){
					   if(empty($langue) || $langue=="fr"){
							echo '<option value="'.$i.'" selected>'.$mois_francais[$i].'</option>';
						}else{
						    echo '<option value="'.$i.'" selected>'.$mois_anglais[$i].'</option>';
						}
					
					   }else{
					      if(empty($langue) || $langue=="fr"){
							echo '<option value="'.$i.'">'.$mois_francais[$i].'</option>';
							}else{
							echo '<option value="'.$i.'">'.$mois_anglais[$i].'</option>';
							}
						}
					 
					 
                    $i++;
                }
                ?>
            </select>
            <select name="annee">
                <?php
                $annee_actuelle = date('Y');
                $i = 0;
                while($i < 3)
                {
                    $annees = $annee_actuelle + $i;
                    if((isset($annee)) && ($annee == $annees)){
                        echo '<option value="'.$annees.'" selected>'.$annees.'</option>';
                    }else{
                        echo '<option value="'.$annees.'">'.$annees.'</option>';
                    }
                    $i++;
                }
                ?>
            </select>
            <br />
            <label for="heure"><?php echo $lang[$_SESSION['lang']]['hoursOfCatering']; ?></label>
            <br />
            <input type="text" name="heures" class="small" value="<?php if(isset($heures)) echo $heures; ?>" />:<input type="text" name="minutes" class="small" value="<?php if(isset($minutes)) echo $minutes; ?>" />
            <br />
            <label for="couverts"><?php echo $lang[$_SESSION['lang']]['guestReser2']; ?></label><br />
            <input type="text" name="couverts" class="small" value="<?php if(isset($couverts)) echo $couverts; ?>" /><br />
            <h1><?php echo $lang[$_SESSION['lang']]['moreInfos']; ?></h1>
            <?php if(isset($erreur_nom)) echo '<span>'.$erreur_nom.'</span><br />'; ?>
            <?php if(isset($erreur_email)) echo '<span>'.$erreur_email.'</span><br />'; ?>
            <label for="nom"><?php echo $lang[$_SESSION['lang']]['typeName']; ?></label><br />
            <input type="text" name="nom" placeholder="Exemple : Jean Dupont" value="<?php if(isset($nom)) echo $nom; ?>" /><br />
            <label for="email"><?php echo $lang[$_SESSION['lang']]['typeEmail']; ?></label><br />
            <input type="text" name="email" placeholder="Exemple : jeandupont@gmail.com" value="<?php if(isset($email)) echo $email; ?>" /><br />
            <input type="submit" value="<?php echo $lang[$_SESSION['lang']]['book']; ?>" />
        </form>
        <?php } ?>
		
	
		
		<div class="clearfix"></div>
	</div>

	
    
    </div>
</body>
</html>
