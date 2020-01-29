<?php 
     require 'database.php';
      if ( !empty($_POST)) {
        // inicjalizowanie wartości zmiennych kontroli poprawnosci wprowadzania 
		$markaIDError = null;
		$nazwaError = null;
        $krajError = null;
        $rokZalozeniaError = null;
        $iloscAutError = null;
        // wartości tablicy POST
		$markaID = $_POST['markaID'];
		$nazwa = $_POST['nazwa'];
        $kraj = $_POST['kraj'];
        $rokZalozenia = $_POST['rokZalozenia'];
        $iloscAut = $_POST['iloscAut'];
		
        // walidacja kolejnych zmiennych pól formularza
        $valid = true;
        if (empty($markaID)) {
            $markaIDError = 'wprowadź ID marki';
            $valid = false;
        }
         if (empty($nazwa)) {
          $nazwaError = 'wprowadź nazwę marki';
            $valid = false;
        }
		if (empty($kraj)) {
           $krajError = 'wprowadź kraj pochodzenia marki';
            $valid = false;
        }		
		if (empty($rokZalozenia)) {
            $rokZalozeniaError = 'Wprowadź rok założenia';
            $valid = false;
        }
		if (empty($iloscAut)) {
            $iloscAutError = 'Wprowadź ilość samochodów';
            $valid = false;
        }
		// wprowadź dane
        if ($valid) {
			echo "ok- wprowadzenie";
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO marka (markaID,nazwa,kraj,rokZalozenia,iloscAut) values(?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($markaID,$nazwa, $kraj, $rokZalozenia, $iloscAut));
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
            <h3>Nowa marka</h3>
        </div>
              
        <form  action="create.php" method="post">
            <div class="form-group row" >
                <label  class="col-sm-1 control-label">Id</label>
			    <div class="col-sm-5">
                  <input name="markaID" type="text"  class="form-control" placeholder="wpisz ID marki" value="<?php echo !empty($markaID)?$markaID:'';?>" >
				  <?php if (!empty($markaIDError)): ?>
                  <span class="text-danger"><?php echo $markaIDError;?></span>
                  <?php endif; ?>

			    </div>
            </div>
             <div class="form-group row">
                <label class="col-sm-1 control-label">Nazwa</label>
			    <div class="col-sm-5">
                  <input name="nazwa" type="text"  class="form-control" placeholder="wpisz nazwę marki" value="<?php echo !empty($nazwa)?$nazwa:'';?>">
				  <?php if (!empty($nazwaError)): ?>
                                <span class="text-danger"><?php echo $nazwaError;?> </span>
                  <?php endif; ?>
			    </div>
            </div>   
            <div class="form-group row">
                <label class=" col-sm-1 control-label">Kraj</label>
			    <div class="col-sm-5">
                  <input name="kraj" type="text"  class="form-control" placeholder="wpisz kraj pochodzenia marki" value="<?php echo !empty($kraj)?$kraj:'';?>">
				  <?php if (!empty($krajError)): ?>
                                <span class="text-danger"><?php echo $krajError;?> </span>
                  <?php endif; ?>
			    </div>
            </div>  
            <div class="form-group row">
                <label class=" col-sm-1 control-label">Rok założenia</label>
			    <div class="col-sm-5">
                  <input name="rokZalozenia" type="text"  class="form-control" placeholder="wpisz rok założenia" value="<?php echo !empty($rokZalozenia)?$rokZalozenia:'';?>">
				  <?php if (!empty($rokZalozeniaError)): ?>
                                <span class="text-danger"><?php echo $rokZalozeniaError;?> </span>
                  <?php endif; ?>
			    </div>
            </div> 
			<div class="form-group row">
                <label class=" col-sm-1 control-label">Ilość Aut</label>
			    <div class="col-sm-5">
                  <input name="iloscAut" type="text"  class="form-control" placeholder="wpisz ilość samochodów" value="<?php echo !empty($iloscAut)?$iloscAut:'';?>">
				  <?php if (!empty($iloscAutError)): ?>
                                <span class="text-danger"><?php echo $iloscAutError;?> </span>
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