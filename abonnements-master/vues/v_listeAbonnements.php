    <table class="table table-hover">
        <thead>
            <tr>
                <th>Type</th>
                <th>Date début</th>
                <th>Date Fin</th>
                <th>Prix</th>
                <th>Prix promotion</th>
                <th>Date fin promotion</th>
                <th style="width:  2%"></th>
            </tr>
        </thead>
        <tbody>
<?php
foreach ($lesAbonnements as $abonnement)
{
    $button = '<button class="btn btn-mini" type="button" data-toggle="dropdown" style="background:transparent;">...
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="index.php?uc=gestionAbo&action=cloturerAbonnement&idAbo='.$abonnement["id"].'">Cloturer</a></li>
    </ul>';
    $date_debut = $abonnement["date_depart"];
    $type = $abonnement["id_type"];
    $date_fin = $abonnement["date_fin"];
    $prix = $abonnement["prix_mensuel"];
    $cloturer = $abonnement["cloturer"];
    $prix_promotion = $abonnement['prix_mensuel_promotion'];
    $fin_promotion = $abonnement['date_fin_promotion'];

    $date_ancienne = new DateTime($date_fin);
    $date_ancienne->format("DD-MM-YY");

    $date_du_jour = new DateTime("now");
    $date_du_jour->format("DD-MM-YY");

    $difference = $date_ancienne->diff($date_du_jour);
    $mois = $difference->format('%m');
    if($cloturer == "0")
    {
        if($mois <= 2)
        {
            if($date_fin != "")
            {
                echo  "<tr class='table-warning'><td>$type</td><td>$date_debut</td><td>$date_fin</td><td>$prix</td><td>$prix_promotion</td><td>$fin_promotion</td><td>$button</td></tr>";
            }
            else
            {
                echo  "<tr class='table-success'><td>$type</td><td>$date_debut</td><td>$date_fin</td><td>$prix</td><td>$prix_promotion</td><td>$fin_promotion</td><td>$button</td></tr>";
            }
        }
        else
        {
            echo  "<tr class='table-success'><td>$type</td><td>$date_debut</td><td>$date_fin</td><td>$prix</td><td>$prix_promotion</td><td>$fin_promotion</td><td>$button</td></tr>";
        }
    }
    else
    {
         echo  "<tr  class='table-danger'><td>$type</td><td>$date_debut</td><td>$date_fin</td><td>$prix</td><td>$prix_promotion</td><td>$fin_promotion</td><td></td></tr>";
    }
}
?>
        </tbody>
    </table>
