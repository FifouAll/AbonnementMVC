<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'login':
	{
            include("vues/v_login.php");
            break;
	}
        case 'logout':
        {
            $_SESSION["connected"] = false;
            $_SESSION["id"] = null;
            // gestion du menu connexion/déconnecxion
            echo "<script>document.getElementById('actionconnect').text = 'Connexion'</script>";
            echo "<script>document.getElementById('actionconnect').href = 'index.php?uc=client&action=login'</script>";
            // fin gestion menu
            include("vues/v_accueil.php");
            break;
        }
        case 'checkLogin':
        {
            if(isset($_SESSION["id"]) && $_SESSION["id"] != null)
            {
                $lesAbonnements = $pdo->getLesAbonnements($_SESSION["id"]);
                include("vues/v_listeAbonnements.php");
            }
            else
            {
                if(isset($_REQUEST["valider"]))
                {
                    $login = $_REQUEST["login"];
                    $mdp = $_REQUEST["mdp"];
                    $id = $pdo->checkLogin($login, $mdp);
                    if( $id == null)
                    {
                        echo "<div class='alert alert-danger' role='alert'>Identifiant/Mot de passe incorrect</div>";
                        include("vues/v_login.php");
                    }
                    else
                    {
                        $_SESSION["connected"] = true;
                        $_SESSION["id"] = $id;
                        $lesAbonnements = $pdo->getLesAbonnements($id);
                        include("vues/v_listeAbonnements.php");
                        // gestion du menu connexion/déconnecxion
                        echo "<script>document.getElementById('actionconnect').text = 'Deconnexion'</script>";
                        echo "<script>document.getElementById('actionconnect').href = 'index.php?uc=client&action=logout'</script>";
                        // fin gestion menu
                    }
                }
                else
                {
                    include("vues/v_login.php");
                }
            }
            break;
        }
        case 'add':
        {
            if(isset($_SESSION["id"]) && $_SESSION["id"] != null)
            {
                $lestypes = $pdo->getLesTypes();
                include("vues/v_ajouterAbonnement.php");
            }
            else
            {
                include("vues/v_login.php");
            }
            break;
        }
        case 'listAbo':
        {
            if(isset($_SESSION["id"]) && $_SESSION["id"] != null)
            {
                $lesAbonnements = $pdo->getLesAbonnements($_SESSION["id"]);
                include("vues/v_listeAbonnements.php");
            }
            else
            {
                include("vues/v_login.php");
            }
            break;
        }
        case 'inscription':
        {
            if(isset($_POST["inscrire"]))
            {
                if($_REQUEST['mdp'] == $_REQUEST['con_mdp'])
                {
                    if($pdo->inscription($_REQUEST['login'],$_REQUEST['mdp']))
                    {
                        include("vues/v_login.php");
                    }
                    else 
                    {
                        echo "L'utilisateur existe déjà";
                        include("vues/v_inscription.php");
                    }
                }
                else
                {
                    echo "<div class='alert alert-danger' role='alert'>Les mot de passes ne correspondent pas</div>";
                    include("vues/v_inscription.php");
                }
            }
            else
            {
              include("vues/v_inscription.php"); 
            }
            break;
        }
        case 'sinscrire' : 
        {
            include("vues/v_inscription.php");
        }
}

