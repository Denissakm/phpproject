<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>User Login</title>
<style>
body,h1 {font-family: "Raleway", Arial, sans-serif}
h1 {letter-spacing: 6px}
.w3-row-padding img {margin-bottom: 12px}
</style>
</head>

<body>
<a href="index.html">Homepage</a>

<?php
include 'phpconnect.php';

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: loginform.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: loginform.php');
}
?>
<!doctype html>
<html>
    <head></head>
    <body>
        <h3>Homepage</h3>
		
<?php
	include 'phpconnect.php';
	$sql = "SELECT * FROM rfi WHERE userid = '".$_SESSION['uname']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        	echo "Hi, " . $row["name"] ."! Your order ID: " . $row["orderid"] . "<br/>";
    }
} else {
    echo "0 results";
}

?>
<?php

	include 'phpconnect.php';
	$sql = "SELECT * FROM clientorders WHERE userid = '".$_SESSION['uname']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if ($row["orderstatus"] == 1) {
			echo "<br/> Your order is <b>waiting for approval</b>. Please wait";
		}
		
		if ($row["orderstatus"] == 2) {
			echo "<br/> Your order is <b>approved</b>. Now we are going to consult you. Here are some details: <br/> <h2>Review</h2>". $row["review"]. "<br/><h2>Instructions</h2> You may download your file by <a href=". $row["instructions"]. " download>clicking here</a>";
		}
		
		if ($row["orderstatus"] == 3) {
			echo "<br/> We are almost done with your project! Now we are testing your project. Here are some details: <br/> <h2>Review</h2>". $row["review"]. "<br/><h2>Instructions</h2> You may download your file by <a href=". $row["instructions"]. " download>clicking here</a> <h2>Testing notes</h2> <h2>Testing report (attachment)</h2>";
		}
		
		if ($row["orderstatus"] == 4) {
			echo "<br/> We are done with your project! Now you have an access to everything you need to know. Here are some details: <br/> <h2>Review</h2>". $row["review"]. 
"<br/><h2>Instructions</h2> You may download your file by <a href=". $row["instructions"]. " download>clicking here</a> <h2>Testing notes</h2>" . $row["testingnotes"]. "<h2>Testing report (attachment)</h2> Download your report by <a href=". $row["tnat"]. " download>clicking here</a><h2> Final report about the system </h2> Download final report by <a href=". $row["finalreport"]. " download>clicking here</a>";
		}
    }
} else {
    echo "0 results";
}

?>
		
		
		
		
        <br/><form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>
   


</body>
</html>

