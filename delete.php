<?php 
    require 'database.php';
    $samochodID = 0;
     
    if ( !empty($_GET['samochodID'])) {
        $samochodID = $_REQUEST['samochodID'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $samochodID = $_POST['samochodID'];
         
        // usuwanie danych
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM samochody WHERE samochodID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($samochodID));
        Database::disconnect();
        header("Location: index.php");
    } 
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
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
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Usuń dane samochodu</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="samochodID" value="<?php echo $samochodID;?>"/>
                      <p class="alert alert-error">Czy chcesz napewno usunąc dane ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Tak</button>
                          <a class="btn " href="index.php">Nie</a>
                        </div>
                    </form>
                </div>
    </div> <!-- /container -->
  </body>
</html>


