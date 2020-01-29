<?php 
    require 'database.php';
 
    $samochodID = null;
    if ( !empty($_GET['samochodID'])) {
        $samochodID = $_REQUEST['samochodID'];
    }

     
    if ( null==$samochodID ) {
        header("Location: index.php");
    }
  
  if ( !empty($_POST)) {
    // ustaw zmienne dla bԥd󷠰rzy sprawdzaniu poprawnosci 
    $modelError = null;
    $silnikError = null;
    $paliwoError = null;
    $nadwozieError = null;
    $markaError = null;
    
    // ustaw zmienne pobrane z tablicy $_POST
    $model = $_POST['model'];
    $silnik = $_POST['silnik'];
    $paliwo = $_POST['paliwo'];
    $nadwozie = $_POST['nadwozie'];
    $marka = $_POST['marka'];
    
    // walidacja danych
    $valid = true;
    if (empty($model)) {
      $modelError = 'wprowadź model samochodu';
      $valid = false;
    }
		if (empty($silnik)) {
      $silnikError= 'wprowadź pojemność silnika';
      $valid = false;
    }    

    if (empty($paliwo)) {
      $paliwoError = 'wprowadź rodzaj paliwa';
      $valid = false;
    }
    
    if (empty($nadwozie)) {
      $nadwozieError = 'Podaj typ nadwozia';
      $valid = false;
    }
	if (empty($marka)) {
      $markaError = 'Podaj ID marki';
      $valid = false;
    }
    
    // aktualizuj dane
    if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE samochody SET model = ?, silnik = ?, paliwo = ?, nadwozie = ?, marka = ? WHERE samochodID = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($model,$silnik,$paliwo,$nadwozie,$marka,$samochodID));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM samochody where samochodID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($samochodID));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $model = $data['model'];
        $silnik = $data['silnik'];
        $paliwo = $data['paliwo'];
        $nadwozie = $data['nadwozie'];
        $marka = $data['marka'];
        Database::disconnect();
    }
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
            <h3>Aktualizacja danych samochodu</h3>
        </div>
              
        <form  action="update.php?samochodID=<?php echo $samochodID?>" method="post">
            <div class="form-group row" >
                <label class="col-sm-1 control-label">Model</label>
                    <div class="col-sm-5">
                        <input name="model" type="text"  class="form-control" placeholder="model" value="<?php echo !empty($model)?$model:'';?>">
                            <?php if (!empty($modelError)): ?>
                                <span class="text-danger"><?php echo $modelError;?></span>
                            <?php endif; ?>
                     </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1 control-label">Silnik</label>
                    <div class="col-sm-5">
                            <input name="silnik" type="text" class="form-control"  placeholder="silnik" value="<?php echo !empty($silnik)?$silnik:'';?>">
                            <?php if (!empty($silnikError)): ?>
                                <span class="text-danger"><?php echo $silnikError;?></span>
                            <?php endif; ?>
                        </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1 control-label">Paliwo</label>
                    <div class="col-sm-5">
                            <input name="paliwo" type="text" class="form-control" placeholder="paliwo" value="<?php echo !empty($paliwo)?$paliwo:'';?>">
                            <?php if (!empty($paliwoError)): ?>
                                <span class="text-danger"><?php echo $paliwoError;?></span>
                            <?php endif;?>
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1 control-label">Nadwozie</label>
                    <div class="col-sm-5">
                            <input name="nadwozie" type="text"  class="form-control" placeholder="nadwozie" value="<?php echo !empty($nadwozie)?$nadwozie:'';?>">
                            <?php if (!empty($nadwozieError)): ?>
                                <span class="text-danger"><?php echo $nadwozieError;?></span>
                            <?php endif;?>
                    </div>
            </div> 
			<div class="form-group row">
                <label class="col-sm-1 control-label">ID marki</label>
                    <div class="col-sm-5">
                            <input name="marka" type="text"  class="form-control" placeholder="marka" value="<?php echo !empty($marka)?$marka:'';?>">
                            <?php if (!empty($markaError)): ?>
                                <span class="text-danger"><?php echo $markaError;?></span>
                            <?php endif;?>
                    </div>
            </div> 
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Zapisz</button>
                <a class="btn btn-primary" href="index.php">Cofnij</a>
            </div>
        </form>
      </div>           
    </div> <!-- /container -->
	
  </body>

</html>