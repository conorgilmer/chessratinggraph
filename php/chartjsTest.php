<?php
$graphTitle = "My Rating";
$xaxisTitle = "Years";
$yaxisTitle = "Grade";

include('config.php');

$sql_query = "SELECT icu_rating, year from $dbtable";

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
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $row_num++;
        array_push($arrayYears, $row['year']);
        array_push($arrayRatings, $row['icu_rating']);
  } // while end
} else {
    echo "0 results";
}

$numYears = sizeof($arrayYears);
$numGrades = sizeof($arrayRatings);
$strYears = "";
$strRatings = "";
for ($i=0; $i < $numYears; $i++) {
        if ($i == ($numYears-1)){
                $strRatings =$strRatings . $arrayRatings[$i];
                $strYears =$strYears . $arrayYears[$i];
        } else {
                $strRatings =$strRatings . $arrayRatings[$i] . ",";
                $strYears =$strYears . $arrayYears[$i] . ",";
        }
}
$conn->close();
?>
<html>
<head><title>My Rating Chart.js</title> </head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<h2> Testing Chart.js</h2>
<canvas id="line-chart" width="400" height="225"></canvas>
<script>

// Bar chart
new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
      labels: [<?echo $strYears;?>],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#c45850", "#3cba9f", "#8e5ea2","#e8c3b9"],
          data: [<?echo $strRatings;?>],
	  fill: false
        }
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
                                max: 2000
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
