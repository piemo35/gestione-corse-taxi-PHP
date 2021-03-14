<?php
//session_save_path("/var/www/html/data_sessioni");
session_start();

$nomefile = $_POST['mese'];
$nomefile = strtolower($nomefile);
$count = 0; //VARIABILE PER CONTARE QUANTE RIGHE DI FILE HA LETTO
chdir($_SESSION['cartella']);
$fp = fopen($nomefile, "r"); //APERTURAFILE IN LETTURA
  if($fp){ //CONTROLLO ESISTENZA FILE CERCATO
    while(! feof($fp)){ 
      fscanf($fp,"%d %s %d", $giorno[$count], $tragitto[$count], $prezzo[$count]); //APPOGGIO DATI NEGLI ARRAY
    $count++;
    }
  }
fclose($fp);

$totale = 0;
	for($i=0; $i < $count; $i++){
		$totale = $totale + $prezzo[$i];
	}

					
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UFT-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title>I tuoi viaggi</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
		<style>
		br{
			display:none;
		}
		.accapo{
			padding: 5px;
		}
	</style>
</head>

<body style="background: linear-gradient(to bottom, #da0d0da8,#170ae2bf); height: 300vh">



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


<div class="page-header" style="border-bottom: none">
  <h1 style=" text-align: center; font-size: 40px"><span style="font-size: 50px; color: white" class="glyphicon glyphicon-usd" aria-hidden="true"></span></h1>


<!--<div class="panel panel-default">
    <div class="panel-heading">-->
    <h2 style="text-align: center; color:white">Nel mese di <?php echo $nomefile ?> hai incassato: <?php echo $totale ?> euro.</h2></div>
        <div id="tablePanelBody" class="panel-body">
        
           <?php  
            echo "<table style= \"background-color: transparent; color: white; margin-top: none; \" class= \"table table-bordered table-hover specialCollapse \"> ";
            
            echo  "<tr>";
				echo "<td><h3>Giorno</h3></td>";
				//echo "<td><h3>Ora</h3></td>";
				//echo "<td><h3>Partenza</h3></td>";
				echo "<td><h3>Tragitto</h3></td>";
				echo "<td><h3>Prezzo</h3></td>";
            echo "</tr>";
            
            echo  "<br>";
            
					for($i=0; $i < $count; $i++){
						echo "<tr>";
							echo "<td>$giorno[$i]</td>";
							//echo "<td>$ora[$i]</td>";
							//echo "<td>$partenza[$i]</td>";
							echo "<td>$tragitto[$i]</td>";
							echo "<td>$prezzo[$i]</td>";
						echo "</tr>";
						
						echo "<br>";
					}
					$totale = 0;
					for($i=0; $i < $count; $i++){
						$totale = $totale + $prezzo[$i];
						}
					echo "<tr>";
					//echo "<td></td><td></td><td></td><td></td><td>";
					echo "<td></td><td></td><td>";
					echo "Totale: ";
					echo $totale;
					echo "</td>";
					echo "</tr>";
					echo "<br>";
				?>
            </table>
        </div>
    </div>
</div>

<div style="width: 40%; margin-left: 30%; margin-top: 2px;" class="input-group">
<form action="homepage.php" method="get">
  <input style="background-color: #fff; border-radius: .5rem"  type="submit" class="form-control" value="Torna al menu" id="basic-url" aria-describedby="basic-addon3">
</form>

<!--<a href="homepage.php">Torna al menu</a>-->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
