<?php
 $con = mysqli_connect('localhost','root','','auta');
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>TechJunkGigs</title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {
 var data = google.visualization.arrayToDataTable([

 ['nazwa','iloscAut'],
 <?php 
			$query = "SELECT * from marka";

			 $exec = mysqli_query($con,$query);
			 while($row = mysqli_fetch_array($exec)){

			 echo "['".$row['nazwa']."',".$row['iloscAut']."],";
			 }
			 ?> 
 
 ]);

 var options = {
 title: 'Pie chart',
  pieHole: 0.5,
          pieSliceTextStyle: {
            color: 'black',
          },
          legend: 'none'
 };
 var chart = new google.visualization.PieChart(document.getElementById("columnchart12"));
 chart.draw(data,options);
 }
	
    </script>
</head>
<body>
<nav>
<ul class="nav">
 <li class="nav-item">
    <h3>Project PHP</h3>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="../index.php">Samochody</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../marki/index.php">Marki</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../wspolne/index.php">Wspólne</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="graf1.php">PieChart</a>
  </li>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="graf2.php">BarChart</a>
  </li>
</ul>
</nav>
 <div class="container-fluid">
 <div id="columnchart12" style="width: 100%; height: 500px;"></div>
 </div>

</body>
</html>