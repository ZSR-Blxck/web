<?php

session_start();

if(isset($_SESSION["email"])&& $_SESSION["email"] == true)
{
	header("location: welcome.php_uname()");
}
?>