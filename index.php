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
    <a class="nav-link" href="index.php">Samochody</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="marki/index.php">Marki</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="wspolne/index.php">Wspólne</a>
  </li>
   </li>
   <li class="nav-item">
    <a class="nav-link" href="grafy/graf1.php">PieChart</a>
  </li>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="grafy/graf2.php">BarChart</a>
  </li>
</ul>
</nav>
<div class="container"> 
 <div class="row">
   <h3>CRUD dla tabeli samochody</h3>
 </div>
 <div class="row">
 <div class='text-left col-xl-4'>
 <p>
  <a href="create.php" class="btn btn-success">Utwórz</a>
 </p>
 </div>
 <div class='text-left col-xl-4'>
	 <form class="form-inline" method="post" action="generate_pdf.php">
		<button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf"" aria-hidden="true"></i>
	Raport PDF</button>
	</form>
</div>	
 <div class='text-left col-xl-4'>
	<button onclick="Export()" class="btn btn-primary">Export CSV</button>
</div>	
 <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
		<th>Model</th>
		<th>Silnik</th>
        <th>Paliwo</th>
        <th>Nadwozie</th>
		<th>ID Marki</th>
       </tr>
      </thead>
      <tbody>
	  <?php
           include 'database.php';
           $pdo = Database::connect();
           $sql = 'SELECT * FROM samochody ';
           foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
					echo '<td>'. $row['samochodID'] . '</td>';
                    echo '<td>'. $row['model'] . '</td>';
					echo '<td>'. $row['silnik'] . '</td>';
                    echo '<td>'. $row['paliwo'] . '</td>';
                    echo '<td>'. $row['nadwozie'] . '</td>';
					echo '<td><a href="marki/index.php">'. $row['marka'] . '</a></td>';
					echo '<td><a class="btn btn-secondary" href="read.php?samochodID='.$row['samochodID'].'">Przeglądaj</a></td>';
					echo '<td><a class="btn btn-success" href="update.php?samochodID='.$row['samochodID'].'">Aktualizuj</a></td>';
					echo '<td><a class="btn btn-danger" href="delete.php?samochodID='.$row['samochodID'].'">Usuń</a></td>';
                    echo '</tr>';
           }
           Database::disconnect();
?>

      </tbody>
	  
 </table> 
 <div class='text-left col-xl-4'>
	 <form class="form-inline" method="post" action="mail.php">
		<input type="text" name="email" placeholder="podaj adres email"><br>
		<input type="submit" value="Wyślij raport">
	</form>
 </div>	
 </div>
 </div> <!-- /container -->
   <script>
        function Export()
        {
            var conf = confirm("Export CSV?");
            if(conf == true)
            {
                window.open("export.php", '_blank');
            }
        }
    </script>
	
 </body>
</html>