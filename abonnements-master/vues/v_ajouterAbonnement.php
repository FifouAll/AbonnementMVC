<!----date de mise en place,--type  (internet, mobile, TV, sport, autre …)
prix mensuel, date de fin, , date fin promotion--->
<script src="utils/jquery.js"></script>
<div id="ajouterAbonnement" class="jumborton">
	<form action="index.php?uc=gestionAbo&action=ajouterAbonnement" method="post"> 
		Date de mise en place : 
		<input type="date" class="form-control" name="date_d" id="C" required></br>	
		Prix mensuel :
		<input type="text" class="form-control" id="prix_m" value="0.00" name="prix_m" required /></br>	
		Date de fin (Optionnel) :
		<input type="date" class="form-control" name="date_fin" id="date_fin"/></br>
                Promotion :
                <input type="checkbox" checked name="promo" id="promo"></br>
                <label id="labelprix_m_p">Prix mensuel promotion (Optionnel) :</label>
		<input type="text" class="form-control" name="prix_m_p" id="prix_m_p" value="0.00"/></br>
                <label id="labeldate_fin_p" for="date_fin_p">Date de fin promotion (Optionnel) :</label>
		<input type="date" class="form-control"  name="date_fin_p" id="date_fin_p"/></br>
		<select name="type" class="form-control" id="type" required/></br>
		<?php
		foreach($lestypes as $unType) 
		{
			echo "<option value=".$unType['id'].">".$unType['nom']."</option>";
		}
		?>
		</select></br>
		<input type="submit" class="btn btn-outline-primary" value="Ajouter" name="ajouter"/>
	</form>
</div>
<!---A VOIR-->
