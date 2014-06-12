<?php
session_start();

if(!session_is_registered('name'))
{
	session_destroy();
	header("Location: ../index.php");

}

else {

}
?>
