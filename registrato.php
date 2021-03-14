<?php

//session_start();

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = $_POST['password'];

touch($email); //crea un file chiamato con l'email del nuovo utente
chmod($email, 0777); 

$nomecompleto = $nome.$cognome;


$fp = fopen($nome, "r"); 
if($fp){
	fclose($fp);
	
  $fp = fopen($nome, "a");	
  fprintf($fp,"%s %s %s %s\n", $nome, $cognome, $email, $password); //scrive sul file i dati
  fclose($fp);
}else{
  $fp = fopen($nome, "w");	
  fprintf($fp,"%s %s %s %s\n", $nome, $cognome, $email, $password); //scrive sul file i dati
  fclose($fp);
}

mkdir($nomecompleto); //crea una cartella chiamata nome+cognome
chmod($nomecompleto, 0777);
chdir($nomecompleto);

header("location: index.php");

?>

