<div id="InscriptionClient">
<form method="POST" action="index.php?uc=client&action=inscription">
   <fieldset>
     <legend>Inscription</legend>
		<p>
			<label for="login">Nom d'utilisateur : </label>
                        <input id="login" class="form-control" type="text" name="login" value=""  required>
		</p>
		<p>
			<label for="mdp">Mot de passe : </label>
			 <input id="mdp" class="form-control" type="password" name="mdp" value=""  required>
		</p>
        <p>
			<label for="mdp">Confirmation de mot de passe : </label>
			 <input id="mdp" class="form-control" type="password" name="con_mdp" value=""  required>
		</p>
	  	<p>
         <input type="submit" class="btn btn-outline-primary" value="Inscrire" name="inscrire">
      </p>
</form>
</div>