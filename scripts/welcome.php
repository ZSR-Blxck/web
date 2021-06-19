<?php

session_start();

if (!isset($_SESSION["email"]) || $_SESSION["email"] !== true){
	header("location:login.php");
	exit;
}
?>
<html>
<head>
	<title> Grocery </title>
	<link rel="stylesheet" type="text/css" href="Styles/styles.css">
</head>

<body>
	<div id="header">
		<p>Welcome, user</p>
		<a href="index.html">
		 	<h1> Grocery </h1>
		</a>
		
		<div class= "navbar">
			<a href="meat.html"> Meat </a>
			<a href="dairy.html"> Dairy </a>
			<a href="pastries.html"> Pastries </a>
			<a href="beverages.html"> Beverages </a>
			<a href="snacks.html"> Snacks </a>
			<a href="sales.html"> Sales </a>
		</div>
	</div>

	<div class="notice-board">
		<h2>Sale</h2>
		<div id = "item1">
			<a href="">
				<img src="images/33044-Ice-Cream-Sundae.jpg" width="100" height="100" alt="IceCream">
			</a>
			<span><br>Ice Cream</span>
		</div>
		<div id = "item2">
			<a href="">
				<img src="images/33044-Ice-Cream-Sundae.jpg" width="100" height="100" alt="IceCream">
			</a>
			<span><br>Ice Cream</span>
		</div>
		<div id = "item3">
			<a href="">
				<img src="images/33044-Ice-Cream-Sundae.jpg" width="100" height="100" alt="IceCream">
			</a>
			<span><br>Ice Cream</span>
		</div>
		<div id = "item4">
			<a href="">
				<img src="images/33044-Ice-Cream-Sundae.jpg" width="100" height="100" alt="IceCream">
			</a>
			<span><br>Ice Cream</span>
		</div>
		<div id = "item5">
			<a href="">
				<img src="images/33044-Ice-Cream-Sundae.jpg" width="100" height="100" alt="IceCream">
			</a>
			<span><br>Ice Cream</span>
		</div>
		<div id = "item6">
			<a href="">
				<img src="images/33044-Ice-Cream-Sundae.jpg" width="100" height="100" alt="IceCream">
			</a>
			<span><br>Ice Cream</span>
		</div>
	</div>
</body>
<footer>
	<section id="address">
		<span>Address:</span><br>
		Downtown<br>Round Corner
		<div id="contact">
			Email:
			<a href="">
				<span>grocers@live.com</span>
			</a>
		</div>
		
	</section>
</footer>
	
</html>