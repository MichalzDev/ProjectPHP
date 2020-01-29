<?php 
     require 'database.php';
      if ( !empty($_POST)) {
        // inicjalizowanie wartości zmiennych kontroli poprawnosci wprowadzania 
		$samochodIDError = null;
		$modelError = null;
        $silnikError = null;
        $paliwoError = null;
        $nadwozieError = null;
        $markaError = null;
       
        // wartości tablicy POST
		$samochodID = $_POST['samochodID'];
		$model = $_POST['model'];
        $silnik = $_POST['silnik'];
        $paliwo = $_POST['paliwo'];
        $nadwozie = $_POST['nadwozie'];
		$marka = $_POST['marka'];
        
        // walidacja kolejnych zmiennych pól formularza
        $valid = true;
        if (empty($samochodID)) {
            $samochodIDError = 'wprowadź ID samochodu';
            $valid = false;
        }
         if (empty($model)) {
          $modelError = 'wprowadź model samochodu';
            $valid = false;
        }
		if (empty($silnik)) {
           $silnikError = 'wprowadź pojemność silnika';
            $valid = false;
        }		
		if (empty($paliwo)) {
            $paliwoError = 'Wprowadź rodzaj paliwa';
            $valid = false;
        }
		
        if (empty($nadwozie)) {
            $nadwozieError = 'wprowadź typ nadwozia';
            $valid = false;
        }
		if (empty($marka)) { $markaError = 'wprowadź ID marki';$valid = false;}
		// wprowadź dane
        if ($valid) {
			echo "ok- wprowadzenie";
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO samochody (samochodID,model,silnik,paliwo,nadwozie,marka) values(?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($samochodID,$model, $silnik, $paliwo,$nadwozie,$marka));
            Database::disconnect();
            header("Location: index.php");
        }
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
            <h3>Nowy student</h3>
        </div>
              
        <form  action="create.php" method="post">
            <div class="form-group row" >
                <label  class="col-sm-1 control-label">Id</label>
			    <div class="col-sm-5">
                  <input name="samochodID" type="text"  class="form-control" placeholder="wpisz ID samochodu" value="<?php echo !empty($samochodID)?$samochodID:'';?>" >
				  <?php if (!empty($samochodIDError)): ?>
                  <span class="text-danger"><?php echo $samochodIDError;?></span>
                  <?php endif; ?>

			    </div>
            </div>
             <div class="form-group row">
                <label class="col-sm-1 control-label">Model</label>
			    <div class="col-sm-5">
                  <input name="model" type="text"  class="form-control" placeholder="wpisz model samochodu" value="<?php echo !empty($model)?$model:'';?>">
				  <?php if (!empty($modelError)): ?>
                                <span class="text-danger"><?php echo $modelError;?> </span>
                  <?php endif; ?>
			    </div>
            </div>   
            <div class="form-group row">
                <label class=" col-sm-1 control-label">Silnik</label>
			    <div class="col-sm-5">
                  <input name="silnik" type="text"  class="form-control" placeholder="wpisz pojemność silnika" value="<?php echo !empty($silnik)?$silnik:'';?>">
				  <?php if (!empty($silnikError)): ?>
                                <span class="text-danger"><?php echo $silnikError;?> </span>
                  <?php endif; ?>
			    </div>
            </div>  
            <div class="form-group row">
                <label class=" col-sm-1 control-label">Paliwo</label>
			    <div class="col-sm-5">
                  <input name="paliwo" type="text"  class="form-control" placeholder="wpisz rodzaj paliwa" value="<?php echo !empty($paliwo)?$paliwo:'';?>">
				  <?php if (!empty($paliwoError)): ?>
                                <span class="text-danger"><?php echo $paliwoError;?> </span>
                  <?php endif; ?>
			    </div>
            </div>  
            <div class="form-group row">
                <label class=" col-sm-1 control-label">Nadwozie</label>
			    <div class="col-sm-5">
                  <input name="nadwozie" type="text"  class="form-control" placeholder="wpisz typ nadwozia" value="<?php echo !empty($nadwozie)?$nadwozie:'';?>">
				  <?php if (!empty($nadwozieError)): ?>
                                <span class="text-danger"><?php echo $nadwozieError;?> </span>
                  <?php endif; ?>
			    </div>
            </div>  	

			<div class="form-group row">
                <label class=" col-sm-1 control-label">ID Marki</label>
			    <div class="col-sm-5">
                  <input name="marka" type="text"  class="form-control" placeholder="wpisz ID marki" value="<?php echo !empty($marka)?$marka:''?>">
				 <?php if (!empty($markaError)): ?>
                      <span class="text-danger"><?php echo $markaError;?> </span>
                  <?php endif; ?>
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