<?php
$graphTitle = "My Results";
$xaxisTitle = "Years";
$yaxisTitle = "Number";

include('config.php');

$sql_query = "SELECT icu_rating, wins, draw, losses, year from $dbtable where year > 2013";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query($sql_query);

$total_rows =$result->num_rows;
$row_num = 0;
$arrayYears   = array();
$arrayRatings = array();
$arrayWins = array();
$arrayDraws = array();
$arrayLosses = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $row_num++;
        array_push($arrayYears, $row['year']);
        array_push($arrayRatings, $row['icu_rating']);
        array_push($arrayWins, $row['wins']);
        array_push($arrayDraws, $row['draw']);
        array_push($arrayLosses, $row['losses']);
  } // while end
} else {
    echo "0 results";
}

$numYears = sizeof($arrayYears);
$numGrades = sizeof($arrayRatings);
$strYears = "";
$strRatings = "";
$strWins = "";
$strDraws = "";
$strLosses = "";
for ($i=0; $i < $numYears; $i++) {
        if ($i == ($numYears-1)){
                $strRatings =$strRatings . $arrayRatings[$i];
                $strYears =$strYears . $arrayYears[$i];
                $strWins =$strWins . $arrayWins[$i];
                $strDraws =$strDraws . $arrayDraws[$i];
                $strLosses =$strLosses . $arrayLosses[$i];
        } else {
                $strRatings =$strRatings . $arrayRatings[$i] . ",";
                $strYears =$strYears . $arrayYears[$i] . ",";
                $strWins =$strWins . $arrayWins[$i] .",";
                $strDraws =$strDraws . $arrayDraws[$i] .",";
                $strLosses =$strLosses . $arrayLosses[$i] .",";
        }
}
$conn->close();
?>
<html>
<head><title>My Rating Chart.js</title> </head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<h2> Results Chart.js</h2>
<div>
<canvas id="line-chart" width="400" height="225"></canvas>
</div>
<script>

// Bar chart
new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
      labels: [<?echo $strYears;?>],
      datasets: [
        {
          label: "Wins",
 borderColor: "#11aa11",
          data: [<?echo $strWins;?>],
	  fill: false
        },
        {
          label: "Drawn",
 borderColor: "#c45850",
          data: [<?echo $strDraws;?>],
	  fill: false
        },
        {
          label: "Losses",
          borderColor: "#ff3322",
          data: [<?echo $strLosses;?>],
	  fill: false
        },
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: '<?php echo $graphTitle;?>'
      } ,

scales: {
                    xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: '<?php echo $xaxisTitle;?>'
                            }
                        }],
                    yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                max: 13
                            },

                            scaleLabel: {
                                display: true,
                                labelString: '<?php echo $yaxisTitle;?>'
                            }
                        }]
                }


    }
});

</script>

</body>
</html>
