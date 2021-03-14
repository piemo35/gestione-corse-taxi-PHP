<?php
//session_save_path("/var/www/html/data_sessioni");
session_start();
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = $_POST['password'];
  touch($email); //crea un file chiamato con l'email del nuovo utente
  chmod($email, 0777); //cambio i permessi al file

$nomecompleto = $nome.$cognome;
$fp = fopen($email, "r");

if($fp){
  fclose($fp);

$fp = fopen($email, "a");
  fprintf($fp,"%s %s %s %s\n", $nome, $cognome, $email, $password); //scrive sul file i dati
fclose($fp);

}else{

$fp = fopen($email, "w");
  fprintf($fp,"%s %s %s %s\n", $nome, $cognome, $email, $password); //scrive sul file i dati
fclose($fp);
}

mkdir($nomecompleto); //crea una cartella chiamata nome+cognome
chmod($nomecompleto, 0777);
//chdir($nomecompleto);
if ($_SESSION['controllo'] != 1){
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>Login</title>
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
        <br>
        <div class="page-header">
          <h1 style="margin-top: -5%; text-align: center; font-size: 47px; color: white;"><!--<span style="font-size: 50px; color: white" class="glyphicon glyphicon-home" aria-hidden="true"></span>--><br>LOGIN<br> <small style="color: white;">Inserisci i tuoi dati</small></h1>
        </div>
        <br><br><br><br>
        <!--<form method="post" action="caricato.php">
          <div style="width: 20%; margin-left: 10%" class="input-group">
            <span class="input-group-addon" id="basic-addon3">Mese</span>
            <input type="text" name="mese" class="form-control" id="basic-url" aria-describedby="basic-addon3">
          </div><br>
          <div style="width: 20%; margin-left: 10%" class="input-group">
            <span class="input-group-addon" id="basic-addon3">Giorno</span>
            <input type="text" name="giorno" class="form-control" id="basic-url" aria-describedby="basic-addon3">
          </div><br>-->
          <form method="post" action="homepage.php">
            
            <input style="width: 45%; margin-left: 27.5%; margin-top: -5%" class="form-control" type="email" name="username" autocomplete="on" placeholder="Username / E-mail " required  /> <br>
            <input style="width: 45%; margin-left: 27.5%" class="form-control" type="password" name="password" autocomplete="off" placeholder="Password" required /> <br>
            
            <button style="background-color: #ccc; color: #170ae2bf; width: 45%; margin-left: 27.5%" type="submit" class="btn btn-primary btn-block">Accedi</button> <br><br>
            <div style="width: 40%; margin-left: 30%; text-align: center;">
              <a style="color: white;" href="registrazione.html">Non hai un account? Registrati! </a><br><br>
              <a style="color: white;" href="password_dimenticata.php">Hai dimenticato la password? </a>
            </form>
          </div>
          <!--
          <div class="btn-group btn-group-justified" role="group" aria-label="...">
            <div class="btn-group" role="group">
              <button style="height: 150px; border-radius: 2%;" type="button" onclick="javascript:location.href='caricaViaggio.html'" class="btn btn-default"><span style="font-size: 50px; color: #bf0b48" class="glyphicon glyphicon-open" aria-hidden="true"></span><h2><small>Carica</small></h2></button>
            </div>
            <div class="btn-group" role="group">
              <button style="height: 150px; border-radius: 2%" type="button" onclick="javascript:location.href='visViaggi.html'" class="btn btn-default"><span style="font-size: 50px; color: #2196F3" class="glyphicon glyphicon-list" aria-hidden="true"></span><h2><small>Visualizza</small></h2></button>
            </div>
            <div class="btn-group" role="group">
              <button style="height: 150px; border-radius: 2%" type="button" onclick="javascript:location.href='visNetto.html'" class="btn btn-default"><span style="font-size: 50px; color: green" class="glyphicon glyphicon-usd" aria-hidden="true"></span><h2><small>Netto</small></h2></button>
            </div>-->
          </div><br><br><br>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="js/bootstrap.min.js"></script>
        </body>
      </html>
      <?php
      }
      else if ($_SESSION['controllo'] == 1)
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
        <body style="background: linear-gradient(to bottom, #da0d0da8,#170ae2bf); height: 1200px;">
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
                <h1 style=" text-align: center; font-size: 47px; color: white;"><span style="font-size: 50px; color: white" class="glyphicon glyphicon-home" aria-hidden="true"></span><br>ACCESSO GIA ESEGUITO!<br><small><a style="color: white;"; href="esci.php">Clicca qui per fare il logout</a></small></h1>
              </div>
              <br><br><br><br>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
              <script src="js/bootstrap.min.js"></script>
            </body>
          </html>
          <?php
          }
          ?>
