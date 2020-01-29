<?php 
    require 'database.php';
 
    $markaID = null;
    if ( !empty($_GET['markaID'])) {
        $markaID = $_REQUEST['markaID'];
    }

     
    if ( null==$markaID ) {
        header("Location: index.php");
    }
  
  if ( !empty($_POST)) {
    // ustaw zmienne dla bԥd󷠰rzy sprawdzaniu poprawnosci 
    $nazwaError = null;
    $krajError = null;
    $rokZalozeniaError = null;
    $iloscAutError = null;
    
    // ustaw zmienne pobrane z tablicy $_POST
    $nazwa = $_POST['nazwa'];
    $kraj = $_POST['kraj'];
    $rokZalozenia = $_POST['rokZalozenia'];
    $iloscAut = $_POST['iloscAut'];
	
    
    // walidacja danych
    $valid = true;
    if (empty($nazwa)) {
      $nazwaError = 'wprowadź nazwę marki';
      $valid = false;
    }
		if (empty($kraj)) {
      $krajError= 'wprowadź kraj pochodzenia marki';
      $valid = false;
    }    

    if (empty($rokZalozenia)) {
      $rokZalozeniaError = 'wprowadź rok założenia';
      $valid = false;
    }
	if (empty($iloscAut)) {
      $iloscAut = 'wprowadź ilosc samochodów';
      $valid = false;
    }
    
    // aktualizuj dane
    if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE marka SET nazwa = ?, kraj = ?, rokZalozenia = ?, iloscAut = ? WHERE markaID = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($nazwa,$kraj,$rokZalozenia, $iloscAut, $markaID));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM marka where markaID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($markaID));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $nazwa = $data['nazwa'];
        $kraj = $data['kraj'];
        $rokZalozenia = $data['rokZalozenia'];
		$iloscAut = $data['iloscAut'];
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
    <a class="nav-link active" href="../index.php">Samochody</a>
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
	<div class="span10 offset1">
        <div class="row">
            <h3>Aktualizacja danych marki</h3>
        </div>
              
        <form  action="update.php?markaID=<?php echo $markaID?>" method="post">
            <div class="form-group row" >
                <label class="col-sm-1 control-label">Nazwa</label>
                    <div class="col-sm-5">
                        <input name="nazwa" type="text"  class="form-control" placeholder="nazwa" value="<?php echo !empty($nazwa)?$nazwa:'';?>">
                            <?php if (!empty($nazwaError)): ?>
                                <span class="text-danger"><?php echo $nazwaError;?></span>
                            <?php endif; ?>
                     </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1 control-label">Kraj</label>
                    <div class="col-sm-5">
                            <input name="kraj" type="text" class="form-control"  placeholder="kraj" value="<?php echo !empty($kraj)?$kraj:'';?>">
                            <?php if (!empty($krajError)): ?>
                                <span class="text-danger"><?php echo $krajError;?></span>
                            <?php endif; ?>
                        </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-1 control-label">Rok założenia</label>
                    <div class="col-sm-5">
                            <input name="rokZalozenia" type="text" class="form-control" placeholder="rokZalozenia" value="<?php echo !empty($rokZalozenia)?$rokZalozenia:'';?>">
                            <?php if (!empty($rokZalozeniaError)): ?>
                                <span class="text-danger"><?php echo $rokZalozeniaError;?></span>
                            <?php endif;?>
                    </div>
            </div>
			<div class="form-group row">
                <label class="col-sm-1 control-label">Ilość Aut</label>
                    <div class="col-sm-5">
                            <input name="iloscAut" type="text" class="form-control" placeholder="iloscAut" value="<?php echo !empty($iloscAut)?$iloscAut:'';?>">
                            <?php if (!empty($iloscAutError)): ?>
                                <span class="text-danger"><?php echo $iloscAutError;?></span>
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