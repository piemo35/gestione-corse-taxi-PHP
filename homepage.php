<?php
session_start();

if ($_SESSION['controllo'] != 1){

$user = $_REQUEST['username'];

$password = $_REQUEST['password'];

$fp = fopen($user, "r");//APERTURAFILE IN LETTURA
  if($fp){ //CONTROLLO ESISTENZA FILE CERCATO
    while(!feof($fp)){ 
      fscanf($fp,"%s %s %s %s", $nome, $cognome, $username, $pass); //APPOGGIO DATI PER CONTROLLO
	}
}
fclose($fp);

$nomecompleto = $nome.$cognome;

    if ($user == $username && $password == $pass) //SE I DATI DEL LOGIN CORRISPONDONO GENERO QUESTE 3 VARIABILI GLOBALI
						  //FORSE NELLA CONDIZIONE BISOGNA AGGIUNGERE (&& CONTROLLO != 1)
    {
		$_SESSION['nome'] = $user;
		$_SESSION['cartella'] = $nomecompleto;
		$_SESSION['controllo'] = 1;
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title>Homepage</title>
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
        <li><a style="cursor: default; color: black" href="#">Benvenuto <?php echo $_SESSION['nome']; ?></a></li>
        <?php
			if ($_SESSION['controllo'] == 1){ 
		?>
			<li><a style="color: #3399ff" href="esci.php">Esci</a></li>
		<?php
		}
		?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<br>
<div class="page-header">
  <h1 style=" text-align: center; font-size: 47px; color: white;"><span style="font-size: 50px; color: white" class="glyphicon glyphicon-home" aria-hidden="true"></span><br>Benvenuto nella homepage<br> <small style="color: white;">Scegli cosa fare</small></h1>
</div>
<br><br><br><br>

<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <button style="height: 150px; border-radius: 2%;" type="button" onclick="javascript:location.href='caricaViaggio.php'" class="btn btn-default"><span style="font-size: 50px; color: #bf0b48" class="glyphicon glyphicon-open" aria-hidden="true"></span><h2><small>Carica</small></h2></button>
  </div>
  <div class="btn-group" role="group">
    <button style="height: 150px; border-radius: 2%" type="button" onclick="javascript:location.href='visViaggi.php'" class="btn btn-default"><span style="font-size: 50px; color: #2196F3" class="glyphicon glyphicon-list" aria-hidden="true"></span><h2><small>Visualizza</small></h2></button>
  </div>
  <div class="btn-group" role="group">
    <button style="height: 150px; border-radius: 2%" type="button" onclick="javascript:location.href='visNetto.php'" class="btn btn-default"><span style="font-size: 50px; color: green" class="glyphicon glyphicon-usd" aria-hidden="true"></span><h2><small>Netto</small></h2></button>
  </div>
</div><br>
<div><p></p></div><br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	}
    else //SE I DATI DEL LOGIN NON CORRISPONDONO A QUELLI SALVATI SU FILE AL MOMENTO DELLA REGISTRAZIONE, LA PAGINA DARA "ACCESSO NEGATO"
    {
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title>Homepage</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="background: linear-gradient(to bottom, #da0d0da8,#170ae2bf); height: 120vh;">
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
        <li><a href="#"></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<br>
<div class="page-header">
  <h1 style=" text-align: center; font-size: 47px; color: white;"><span style="font-size: 50px; color: white" class="glyphicon glyphicon-home" aria-hidden="true"></span><br>ACCESSO NEGATO!<br></h1>
</div>
<br><br><br><br>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	}
}
	else if($_SESSION['controllo'] == 1){
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title>Homepage</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body style="background: linear-gradient(to bottom, #da0d0da8,#170ae2bf); height: 120vh;">
	


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
        <li><a style="cursor: default; color: black" href="#">Benvenuto <?php echo $_SESSION['nome']; ?></a></li>
        <?php
			if ($_SESSION['controllo'] == 1){ 
		?>
			<li><a style="color: #3399ff" href="esci.php">Esci</a></li>
		<?php
		}
		?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<br>
<div class="page-header">
  <h1 style=" text-align: center; font-size: 47px; color: white;"><span style="font-size: 50px; color: white" class="glyphicon glyphicon-home" aria-hidden="true"></span><br>Benvenuto nella homepage<br> <small style="color: white;">Scegli cosa fare</small></h1>
</div>
<br><br><br><br>

<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <button style="height: 150px; border-radius: 2%;" type="button" onclick="javascript:location.href='caricaViaggio.php'" class="btn btn-default"><span style="font-size: 50px; color: #bf0b48" class="glyphicon glyphicon-open" aria-hidden="true"></span><h2><small>Carica</small></h2></button>
  </div>
  <div class="btn-group" role="group">
    <button style="height: 150px; border-radius: 2%" type="button" onclick="javascript:location.href='visViaggi.php'" class="btn btn-default"><span style="font-size: 50px; color: #2196F3" class="glyphicon glyphicon-list" aria-hidden="true"></span><h2><small>Visualizza</small></h2></button>
  </div>
  <div class="btn-group" role="group">
    <button style="height: 150px; border-radius: 2%" type="button" onclick="javascript:location.href='visNetto.php'" class="btn btn-default"><span style="font-size: 50px; color: green" class="glyphicon glyphicon-usd" aria-hidden="true"></span><h2><small>Netto</small></h2></button>
  </div>
</div>
<div><p></p>
</div><br><br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<?php
}
?>
</body>
</html>
