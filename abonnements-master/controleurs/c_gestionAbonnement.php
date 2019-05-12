<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'ajouterAbonnement':
    {
        if(isset($_REQUEST["ajouter"]))
        {
            $date_d = $_REQUEST['date_d'];
            $prix_m = $_REQUEST['prix_m'];
            $prix_m_p = $_REQUEST['prix_m_p'];
            $date_fin = $_REQUEST['date_fin'];
            $date_fin_p = $_REQUEST['date_fin_p'];
            $type = $_REQUEST['type'];
            $id = $_SESSION['id'];
            $date_ajout = new DateTime($date_d);
            $date_fin_abo = new DateTime($date_fin);
            if($date_ajout > $date_fin_abo)
            {
                echo "<div class='alert alert-danger' role='alert'>La date d'expiration est antérieure à la date d'ajout</div>";
                $lestypes = $pdo->getLesTypes();
                include("vues/v_ajouterAbonnement.php");
            }
            else
            {
                if(isset($_REQUEST["promo"]))
                {
                    if(!$pdo->creerAbonnementPromo($date_d, $prix_m, $date_fin, $date_fin_p, $prix_m_p, $type, $id))
                    {
                        echo "<div class='alert alert-danger' role='alert'>Une erreur est survenue</div>";
                        $lestypes = $pdo->getLesTypes();
                        include("vues/v_ajouterAbonnement.php");
                    }
                    else
                    {
                        $lesAbonnements = $pdo->getLesAbonnements($id);
                        include("vues/v_listeAbonnements.php");
                    }
                }
                else
                {
                    if(!$pdo->creerAbonnement($date_d, $prix_m, $date_fin, $type, $id))
                    {
                        echo "<div class='alert alert-danger' role='alert'>Une erreur est survenue</div>";
                        $lestypes = $pdo->getLesTypes();
                        include("vues/v_ajouterAbonnement.php");
                    }
                    else
                    {
                        $lesAbonnements = $pdo->getLesAbonnements($id);
                        include("vues/v_listeAbonnements.php");
                    } 
                }
            }
        }
        else
        {
           $lestypes = $pdo->getLesTypes();
           include("vues/v_ajouterAbonnement.php");
        }
        break;
    }
    case 'cloturerAbonnement':
    {
        $idAbo = $_REQUEST["idAbo"];
        $pdo->cloturerAbonnement($idAbo);
        $lesAbonnements = $pdo->getLesAbonnements($_SESSION["id"]);
        include("vues/v_listeAbonnements.php");
        break;
    }
    case 'chart' : 
    {			
        if(isset($_SESSION["id"]) && $_SESSION["id"] != null)
        {
            $annee = $_REQUEST["annee"];
            $lesAbonnements = $pdo->getLesAbonnementsByYear($_SESSION["id"], $annee);
			//$lesAbonnements = $pdo->getLesAbonnementsByYear($_SESSION["id"]); abonnement pour les années suivantes
            include("vues/v_graphique.php");
        }
        else
        {
            include("vues/v_login.php");
        }
        break;
        
    }
}

