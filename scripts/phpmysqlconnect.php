<!-- AUTHOR: 620110914
DATE:27/11/20 -->
<?php
// DECLARE VARIABLES TO BE USED THROUGHOUT
$fn_id= $_POST['fn_id'];
$ln_id = $_POST['ln_id'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordCon = $_POST['passwordCon'];
$passwor_hash = password_hash($password, PASSWORD_BCRYPT);
$date = date('Y-m-d H:i:s');
$fn_idErr = $ln_idErr = $phoneErr = $emailErr = $passwordErr= $passwordConErr = "";

// DECLARE ARRAY TO STORE ERRORS
$err = array();

// DECLARE VARIABLES TO STORE VALUES FOR SUM OF Candidate VOTES AND REFECTED VOTES


// NESTED-IF STATEMENT TO PERFORM VALIDATION OF DATA  
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	// CHECKS IF FIELD IS EMPTY
	if (empty($_POST["fn_id"])) 
	{
		// PRINTS ERROR STATEMENT
		$fn_idErr = "Please enter First Name";
		// INSERTS ERROR INTO ARRRAY
		header("location:p2.html");
	}
	// CHECKS IF FIELD IS EMPTY
  	elseif (empty($_POST["ln_id"])) 
  	{
  		// PRINTS ERROR STATEMENT
		$ln_idErr = "Please enter Last Name";
		// INSERTS ERROR INTO ARRRAY
		header("location:p2.html");
	}
	// CHECKS IF FIELD IS EMPTY
    elseif (empty($_POST["email"]))
    {
    	// PRINTS ERROR STATEMENT
		$emailErr = "Please enter email address";
		// INSERTS ERROR INTO ARRRAY
		header("location:p2.html");
	}
	// CHECKS IF FIELD IS EMPTY
    elseif (empty($_POST["password"])) 
    {
    	// PRINTS ERROR STATEMENT
		$passwordErr = "Please enter a password";
		// INSERTS ERROR INTO ARRRAY
		header("location:p2.html");
	}

	// CHECKS IF VALUE WAS NOT ALPHANUMERIC 
	if(!preg_match("/^[a-zA-Z0-9]*$/", $password))
	{
		// PRINTS ERROR STATEMENT
		$passwordErr= "Password Should Contain Alpha-Numerical Data";
		// INSERTS ERROR INTO ARRRAY
		header("location:p2.html");
	}
	else
	{
		$password = $_POST["password"];
	}
	// CHECKS IF FIELD IS EMPTY
    if (empty($_POST["passwordCon"])) 
    {
    	// PRINTS ERROR STATEMENT
		$passwordConErr = "Please confirm password";
		// INSERTS ERROR INTO ARRRAY
		header("location:p2.html");
	}
	elseif($password != $passwordCon)
	{
			// PRINTS ERROR STATEMENT
			$passwordConErr= "Password Should be Identical";
			// INSERTS ERROR INTO ARRRAY
			array_push($err, $passwordConErr);
				echo nl2br("$passwordConErr \r\n");
		}else{
			$passwordCon = $_POST["passwordCon"];
	}
}

// CHECKS ERROR ARRAY AND IF EMPTY CONNECTS TO DATABASE
if (sizeof($err)==0) 
{

	// USES 'dbconfig.php' TO RETREIVE DATABASE INFORMATION TO CONNECT
	require_once 'dbconfig.php';
	require_once 'session.php';

	// CONNECTS TO DATABASE USING A PDO CONNECTION
	try {
		// IF INFRMATION RETREIVED FROM 'dbconfig.php' MATCHES A CREATED DATABASE CONNECTION CREATED AND CONFIRMATION MESSAGE PRINTED
	    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
	    echo ( "Registration Successful");
	    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    // CATCHES ERRORS AND PRINTS FAILURE MESSAGE
	} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

// INSERT VALUES FROM THE HTML INTO THE DATABASE AND STORES THEM
$sql = "INSERT INTO users(fn_id, ln_id, phone,email,password,date) VALUES ('$fn_id','$ln_id','$phone','$email','$password','$date')";
$conn->exec($sql);

header("location: welcome.php");

}
// RETREIVES ALL VALUES STORED IN THE DATABASE 
//$stmt =$conn->prepare("SELECT * FROM users");
//$stmt->execute();
//$results = $stmt->fetchAll();

// CREATES THE TABLE TO STORE THE VALUES RETRIEVED IN ACCORDANCE TO SPECIFICATIONS DESCRIBED IN "PROBLEM 1 VERSION B"
/*$dataTable = '<div>
					<table style="border:10px solid #687291;border-radius: 15px; padding: 20px; margin: auto; width:80%;">
			        <thead style= "text-align:left;">
			            <tr style= "font-size: 13px;font-family: Gill-Sans;">
			            <th>Constitu</th>  
			            <th>Polling Div.</th>
			            <th>Polling Station</th>
			            <th>Candidate1</th>
			            <th>Candidate2</th>
			            <th>Rejected</th>
			            <th>Total</th>
			            </tr>
			    	</thead>
			    	<tfoot style= "text-align:left;"><tr><th style= "font-size:13px;">Total</th><td></td><td><td></td></tr></tfoot>
			    	<tbody>';
			    	// INSERTS VALUES INTO THE CREATED TABLE AND STYLES ACCORDINGLY
			        foreach ($results as $row)
			        {
			        	 $dataTable .=  '<tr style="font-family: Gill-sans; font-size: 13px;"><td>' . $row['constituency_id'].'</td><td>'. $row['poll_division_id'] . '</td><td>' . $row['polling_station_code'] .'</td><td>' . $row['candidate1Votes'] .'</td><td>'. $row['candidate2Votes'] . '</td><td>' . $row['rejectedVotes'] .'</td><td>'. $row['totalVotes'].'</td></tr>';
			        }
			        $dataTable .= '</tbody></table></div>';	
			        // PRINTS THE FILLED TABLE TO THE USERS SCREEN			       
			        echo $dataTable;*/
 