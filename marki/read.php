<?php 
    require 'database.php';
    $markaID = null;
    if ( !empty($_GET['markaID'])) {
        $markaID = $_REQUEST['markaID'];
    }
     
    if ( null==$markaID ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM marka where markaID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($markaID));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
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
                        <h3>Dane marki</h3>
                    </div>
                                     
                      <div class="form-group row">
                        <label class="col-sm-3 control-label">ID</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['markaID'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group row">
                        <label class=" col-sm-3 control-label">Nazwa</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['nazwa'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group row">
                        <label class="col-sm-3 control-label">Kraj</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['kraj'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group row">
                        <label class="col-sm-3 control-label">Rok założenia</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['rokZalozenia'];?>
                            </label>
                        </div>
                      </div>
						<div class="control-group row">
                        <label class="col-sm-3 control-label">Ilość Aut</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['iloscAut'];?>
                            </label>
                        </div>
                      </div>	
                      </div>
                        <div class="form-actions">
                          <a class="btn btn-info" href="index.php">Cofnij</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
