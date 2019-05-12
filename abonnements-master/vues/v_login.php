<div id="ConnectionClient">
    <form method="POST" action="index.php?uc=client&action=checkLogin">
       <fieldset>
         <legend>Connexion</legend>
                    <p>
                            <label for="login">Nom d'utilisateur : </label>
                            <input id="login" class="form-control" type="text" name="login" value="" >
                    </p>
                    <p>
                            <label for="mdp">Mot de passe : </label>
                             <input id="mdp" class="form-control" type="password" name="mdp" value="" >
                    </p>
                    <p>
             <input type="submit" class="btn btn-outline-primary" value="Valider" name="valider">
			 <a href='index.php?uc=client&action=sinscrire'><input type="button" class="btn btn-outline-primary" value="S'inscrire"></a>
          </p>
    </form>
</div>
