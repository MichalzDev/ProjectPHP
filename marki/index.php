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
    <a class="nav-link" href="index.php">Marki</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../wspolne/index.php">Wspólne</a>
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
   <h3>CRUD dla tabeli marki</h3>
 </div>
 <div class="row">
 <p>
  <a href="create.php" class="btn btn-success">Utwórz</a>
 </p>

 <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
		<th>Nazwa</th>
		<th>Kraj</th>
        <th>Rok założenia</th>
        <th>Ilość Aut</th>
       </tr>
      </thead>
      <tbody>
	  <?php
           include 'database.php';
           $pdo = Database::connect();
           $sql = 'SELECT * FROM marka ';
           foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
					echo '<td>'. $row['markaID'] . '</td>';
                    echo '<td>'. $row['nazwa'] . '</td>';
					echo '<td>'. $row['kraj'] . '</td>';
                    echo '<td>'. $row['rokZalozenia'] . '</td>';   
                    echo '<td>'. $row['iloscAut'] . '</td>';   				
					echo '<td><a class="btn btn-secondary" href="read.php?markaID='.$row['markaID'].'">Przeglądaj</a></td>';
					echo '<td><a class="btn btn-success" href="update.php?markaID='.$row['markaID'].'">Aktualizuj</a></td>';
					echo '<td><a class="btn btn-danger" href="delete.php?markaID='.$row['markaID'].'">Usuń</a></td>';
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