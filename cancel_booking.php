<?php
include('lang.php');  
include('ManageLang.php');

if($_GET['reservation']){
    include('bdd.php');
    $remove = $bdd->prepare('DELETE FROM reservations WHERE annulation = :annulation');
    $remove->execute(array('annulation' => $_GET['reservation']));
    $remove->closeCursor();
}else{
    header('Location : index.php');
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>&reg; Rox &amp; Cakes : <?php echo $lang[$_SESSION['lang']]['cancellation']; ?></title>
    </head>
    <body>
        <h1><?php echo $lang[$_SESSION['lang']]['cancelled']; ?></h1>
    </body>
</html>