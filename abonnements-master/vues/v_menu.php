<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="utils/style.css">
<div id="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.php?uc=client&action=listAbo">Tableau de bord</a>
            <a class="nav-item nav-link" href="index.php?uc=client&action=add">Ajouter</a>
            <a class="nav-item nav-link" <?php echo 'href="index.php?uc=gestionAbo&action=chart&annee='.date("Y").'"'?>>Graphique</a>
            <?php
                if(isset($_SESSION["connected"]) && $_SESSION["connected"])
                {
                    echo '<a class="nav-item nav-link" id="actionconnect" href="index.php?uc=client&action=logout">Deconnexion</a>';
                }   
                else
                {
                    echo '<a class="nav-item nav-link" id="actionconnect" href="index.php?uc=client&action=login">Connexion</a>';
                }  
            ?>
        </div>
      </div>
    </nav>
</div>