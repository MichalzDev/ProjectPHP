<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Auta w gazie</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>
<nav>
<ul class="nav">
 <li class="nav-item">
    <h3>Project PHP</h3>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../index.php">Samochody</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../marki/index.php">Marki</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php">Wspólne</a>
  </li>
   </li>
   <li class="nav-item">
    <a class="nav-link" href="../grafy/graf1.php">PieChart</a>
  </li>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="../grafy/graf2.php">BarChart</a>
  </li>
</ul>
</nav>
<div class="container"> 
 <div class="row">
   <h3>Łączenie 2 tabeli JOINem</h3>
 </div>
 <div class="row">
 <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Marka</th>
		<th>Model</th>
		<th>Silnik</th>
        <th>Nadwozie</th>
        <th>Kraj pochodzenia</th>
       </tr>
      </thead>
      <tbody>
	  <?php
           include 'database.php';
           $pdo = Database::connect();
           $sql = 'SELECT marka.nazwa, marka.kraj, samochody.model, samochody.silnik, samochody.nadwozie 
		   FROM marka JOIN samochody ON marka.markaID=samochody.marka';
           foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
					echo '<td>'. $row['nazwa'] . '</td>';
                    echo '<td>'. $row['model'] . '</td>';
                    echo '<td>'. $row['silnik'] . '</td>';         
                    echo '<td>'. $row['nadwozie'] . '</td>'; 
					echo '<td>'. $row['kraj'] . '</td>';					
                    echo '</tr>';
           }
           Database::disconnect();
?>
      </tbody>
 </table>
 </div>
 </div> <!-- /container -->
 </body>
</html>


