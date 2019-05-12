<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<div id="graphic" style="position: relative; height:40vh; width:80vw; margin: auto;">
    <canvas id="myChart"></canvas>
    <?php
        $year = $annee;
        $Jan = 0;
        $Feb = 0;
        $Mar = 0;
        $Apr = 0;
        $May = 0;
        $Jun = 0;
        $Jul = 0;
        $Aug = 0;
        $Sep = 0;
        $Oct = 0;
        $Nov = 0;
        $Dec = 0;
        foreach ($lesAbonnements as $abonnement)
        {
            if($abonnement["cloturer"] == "0")
            {
                $date = new DateTime($abonnement["date_depart"]);
                $date_fin = new DateTime($abonnement["date_fin"]);
                $date_promo = new DateTime($abonnement["date_fin_promotion"]);
                $dateMax = new DateTime($year."-12-31");
                $inter = $date->diff($dateMax);
                $interM = $inter->format('%m') + 1;
               // $interY = $inter->format('%y');
              /*  for ($y = 0; $y <= $interY; $y++) // Plusieurs années
                {
                    $interM += 12;
                 }*/
                    for ($i = 1; $i <= $interM ; $i++)
                    {
                        if($abonnement["date_fin"] != null)
                        {
                            if($date_fin > $date)
                            {
                                if($abonnement["date_fin_promotion"] != null)
                                {
                                    if($date_promo < $date)
                                    {
                                        ${$date->format("M")} += $abonnement["prix_mensuel"];
                                    }
                                    else
                                    {
                                        ${$date->format("M")} += $abonnement["prix_mensuel_promotion"];
                                    }
                                }
                                else
                                {
                                    ${$date->format("M")} += $abonnement["prix_mensuel"];
                                } 
                            } 
                        }
                        else
                        {
                            if($abonnement["date_fin_promotion"] != null)
                            {
                                if($date_promo < $date)
                                {
                                    ${$date->format("M")} += $abonnement["prix_mensuel"];
                                }
                                else
                                {
                                    ${$date->format("M")} += $abonnement["prix_mensuel_promotion"];
                                }
                            }
                            else
                            {
                                ${$date->format("M")} += $abonnement["prix_mensuel"];
                            }
                        }
                        $date->add(new DateInterval("P1M"));
                    }
            }
        }
        echo '</br><a href="index.php?uc=gestionAbo&action=chart&annee='.intval($annee-1).'" ><button type="button" class="btn btn-outline-info btn-sm">Année Précédente</button></a>';
        echo '<a href="index.php?uc=gestionAbo&action=chart&annee='.intval($annee+1).'" ><button type="button" style="float: right;" class="btn btn-outline-info btn-sm">Année Suivante</button></a>';

    ?>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
                datasets: [{
                    label: 'Prix mensuel',
                    data: [<?php echo $Jan.",".$Feb.",".$Mar.",".$Apr.",".$May.",".$Jun.",".$Jul.",".$Aug.",".$Sep.",".$Oct.",".$Nov.",".$Dec;?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {                   
				responsive: true,
				maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: <?php echo "'Année ".$annee."'";?>
                    }
            }
        });
    </script>
</div>