<?php  //INSERIMENTO DATI DALLA PAGINA "caricaViaggio" NELLE VARIABILI DA SPEDIRE NEI FILE

session_start();

$nomefile = $_POST['mese'];
$giorno = $_POST['giorno'];
//$ora = $_POST['ora'];
//$partenza = $_POST['partenza'];
$tragitto = $_POST['tragitto'];
$prezzo = $_POST['prezzo'];

$path = $_SESSION['cartella'];

$nomefile = strtolower($nomefile);

chdir($path);

	$fp = fopen($nomefile, "r");  //APERTURA FILE IN SCRITTURA
if($fp){
	fclose($fp);
	
  $fp = fopen($nomefile, "a");	
  fprintf($fp,"\n%d %s %d", $giorno, $tragitto, $prezzo);
  fclose($fp);
}else{
  $fp = fopen($nomefile, "w");	
  fprintf($fp,"%d %s %d", $giorno, $tragitto, $prezzo);
  fclose($fp);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title>Conferma</title>
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

<br>
<div class="page-header" style="background-color: #ccffcc"><br>
  <h1 style=" text-align: center; font-size: 50px"><span style="font-size: 50px" class="glyphicon glyphicon-ok"></span><br>FATTO!<br> <small>Scegli cosa fare adesso</small></h1>
</div>
<br><br><br><br>

<div class="btn-group btn-group-justified" role="group" aria-label="...">
  <div class="btn-group" role="group">
    <button style="height: 150px; border-radius: 2%;" type="button" onclick="javascript:location.href='homepage.php'" class="btn btn-default"><span style="font-size: 50px; color: #ffc107" class="glyphicon glyphicon-home" aria-hidden="true"></span><h2><small>Homepage</small></h2></button>
  </div>
  <div class="btn-group" role="group">
    <button style="height: 150px; border-radius: 2%" type="button" onclick="javascript:location.href='visViaggi.php'" class="btn btn-default"><span style="font-size: 50px; color: #2196F3" class="glyphicon glyphicon-list" aria-hidden="true"></span><h2><small>Visualizza</small></h2></button>
  </div>
  <div class="btn-group" role="group">
    <button style="height: 150px; border-radius: 2%;" type="button" onclick="javascript:location.href='caricaViaggio.php'" class="btn btn-default"><span style="font-size: 50px; color: #bf0b48" class="glyphicon glyphicon-open" aria-hidden="true"></span><h2><small>Carica</small></h2></button>
  </div>
</div> <br><br><br>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
