<?php

require_once "dbconfig.php";
require_once "session.php";

$error = '';

if ($_SERVER['REQUEST_METHOD']== "POST" && isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	if (empty($email)){
		$error .= '<p class="error"> Please enter email.</p>';
	}
	if (empty($password)){
		$error .= '<p class="error"> Please enter password.</p>';
	}
	if(empty($error)){
		if($query = $db->prepare("SELECT * FROM users WHERE email = ?"))
		{
			$query-> bind_param('s',$email);
			$query-> execute();
			$row = $query->fetch();
			if ($row){
				if (password_verify($password, $row['password'])){
					$_SESSION['email'] = $row['email'];
					$_SESSION["email"] = $row;

					header("location: welcome.php");
					exit;
				}
				else{
					$error .= '<p class="error">Invalid Password. </p>';
				}
			}else{
				$error .= '<p class="error">No User Found.</p>';
			}
		}
		$query->close();
	}
	mysqli_close($db);

}