<?php
    session_start();
    require_once("utils/class_abonnement.php");
    include("vues/v_menu.php");

    if(!isset($_REQUEST['uc']))
         $uc = 'accueil';
    else
            $uc = $_REQUEST['uc'];

    $pdo = PDOAbonnement::getPdoAbo();	 
    switch($uc)
    {
        case 'accueil':
            {include("vues/v_accueil.php");break;}
        case 'client' :
            {include("controleurs/c_gestionClient.php");break;}
        case 'gestionAbo' :
            {include("controleurs/c_gestionAbonnement.php");break;}
    }
include("vues/v_pied.php");
?>