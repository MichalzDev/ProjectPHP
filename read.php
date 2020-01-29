<?php 
    require 'database.php';
    $samochodID = null;
    if ( !empty($_GET['samochodID'])) {
        $samochodID = $_REQUEST['samochodID'];
    }
     
    if ( null==$samochodID ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM samochody where samochodID = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($samochodID));
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
                        <h3>Dane Samochodu</h3>
                    </div>
                                     
                      <div class="form-group row">
                        <label class="col-sm-3 control-label">ID</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['samochodID'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group row">
                        <label class=" col-sm-3 control-label">Model</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['model'];?>
                            </label>
                        </div>
                      </div>
					  <div class="control-group row">
                        <label class="col-sm-3 control-label">Silnik</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['silnik'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group row">
                        <label class="col-sm-3 control-label">Paliwo</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['paliwo'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group row">
                        <label class="col-sm-3 control-label">Nadwozie</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['nadwozie'];?>
                            </label>
                        </div>
                      </div>
					   <div class="control-group row">
                        <label class="col-sm-3 control-label">ID marki</label>
                        <div class="col-sm-3">
                            <label class="form-control">
                                <?php echo $data['marka'];?>
                            </label>
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
