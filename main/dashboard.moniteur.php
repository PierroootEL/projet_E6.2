<?php

    require_once 'vendor/autoload.php';
    
    $moniteur = new Moniteur();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Mickey3D | Dashboard</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js">
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="assets/dashboard.moniteur.css">

</head>
<body>

<div class="container">
    <div class="container_left">
        <canvas id="graph"></canvas>
        <canvas id="graph2"></canvas>
    </div>
    <div class="container_right">
        <div class="atelier">
            <canvas id="atelier"></canvas>
        </div>
        <div class="tacktime">
            <div class="titre">
                <h1>Tacktime commandes</h1>
            </div>
            <div class="tacktimeText">
                <h1><?php foreach($moniteur->getCommandes() as $commande){ print "Nom : " . $commande['name'] . " Quantité : " . $commande['quantity'] . " Timing : " . $moniteur->getCommandesTime($commande['id']); } ?></h1>
            </div>
        </div>
    </div>
</div>

<footer>
</footer>

/*-------------------------------------------   Chart JS   ------------------------------------------------------- */

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
        <script src="ploq.js"></script>
        <script>


const ctx = document.getElementById('atelier').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php  foreach ($moniteur->extractWorkbench() as $workbench) { print $workbench['atelier_name']; ?>, <?php  } ?>],
        datasets: [{
            label: 'Opérations',
            data: [<?php  foreach ($moniteur->extractWorkbench() as $workbench) { print $workbench['ok_element']; ?>, <?php  } ?>],
            backgroundColor: [
                <?php  foreach ($moniteur->extractWorkbench() as $workbench) { print $workbench['color']; ?>, <?php } ?>
            ]
        }]
    },
    options: {
        scales: {
            maintainAspectRatio: false,
            yAxes: [{
                ticks: {
                  beginAtZero: true
                },
                maintainAspectRatio: false
            }]
        }
    }
});




const graph = document.getElementById("graph").getContext("2d");

Chart.defaults.global.defaultFontSize = 18;

let massPopChart = new Chart(graph, {
  type: "pie", // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data: {
    labels: [
      "A faire",
      "Terminées"
    ],
    datasets: [
      {
        label: "",
        data: [<?php  print $moniteur->extractChartCommandes()['toDo']; ?>, <?php  print $moniteur->extractChartCommandes()['finish']; ?>],
        // backgroundColor: "blue",
        backgroundColor: [
          "red",
          "green",
        ],
        hoverBorderWidth: 3,
      },
    ],
  },
  options: {
    title: {
      display: true,
      text: "Commandes",
      fontSize: 24,
    },
  },
});




const graph2 = document.getElementById("graph2").getContext("2d");

Chart.defaults.global.defaultFontSize = 18;

let massPopChart2 = new Chart(graph2, {
  type: "pie", // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data: {
    labels: [
      "A faire",
      "Terminées",
    ],
    datasets: [
      {
        label: " ",
        data: [<?php print $moniteur->extractChartOperations()['toDo'] ?>, <?php print $moniteur->extractChartOperations()['finish'] ?>],
        // backgroundColor: "blue",
        backgroundColor: [
          "red",
          "green",
        ],
        hoverBorderWidth: 3,
      },
    ],
  },
  options: {
    title: {
      display: true,
      text: "Total opérations",
      fontSize: 24,
    },
  },
});
        </script>
</body>
