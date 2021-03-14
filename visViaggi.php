<?php
//session_save_path("/var/www/html/data_sessioni");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title>Visualizza viaggi</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="background: linear-gradient(to bottom, #da0d0da8,#170ae2bf); height: 120vh">



<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span style="font-size: 18px; color: #2196F3" class="glyphicon glyphicon-globe" aria-hidden="true"></span> <span></span><span></span> Gestione viaggi</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>

	<ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $_SESSION['nome'];?></a></li>
        <?php
			if ($_SESSION['controllo'] == 1){ 
		?>
			<li><a href="esci.php">Esci</a></li>
		<?php
		}
		?>
    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="page-header">
  <h1 style=" text-align: center; font-size: 40px"><span style="font-size: 30px; color: white" class="glyphicon glyphicon-list" aria-hidden="true"></span><br><small style="color: white">Scegli il mese che vuoi visualizzare</small></h1>
</div>

<form method="post" action="visualizzato.php">
<div style="width: 80%; margin-left: 10%" class="input-group">
  <span class="input-group-addon" id="basic-addon3">Mese</span>
  <input type="text" name="mese" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div><br>

<!-- PULSANTI INVIA E TORNA AL MENU -->
<div style="width: 80%; margin-left: 10%;" class="input-group">
  <input style="background-color: white" type="submit" class="form-control" value="Visualizza" id="basic-url" aria-describedby="basic-addon3">
</div></form><br>

<div style="width: 80%; margin-left: 10%;" class="input-group">
  <input style="background-color: white"  type="submit" class="form-control" onclick="javascript:location.href='homepage.php'" href="homepage.php" value="Torna al menu" id="basic-url" aria-describedby="basic-addon3">
</div>

<br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
