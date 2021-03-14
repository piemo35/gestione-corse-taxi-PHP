<?php
session_start();

function logout(){
	session_destroy();
	header("REFRESH:3; URL=index.php");
}

?>