<?php
session_start();

$default = 'fr';

if(! isset($_SESSION['lang'])){

    $_SESSION['lang']=$default;

}

if (isset($_GET['lang'])){

    if($_GET['lang'] != null || $_GET['lang'] != '' || trim( $_GET['lang']) !=""){

        $_SESSION['lang']=$_GET['lang'];
    }


}




?>