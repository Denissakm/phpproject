<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Admin Test Panel</title>
<style>
table, th, td {
    border: 1px solid black;
}

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
    header('Location: adminlogin.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: adminlogin.php');
}
?>


<h1> ADMIN PANEL </h1>
<h2> ORDERS ARE LISTED BELOW </h2>

<?php
include 'phpconnect.php'; 
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM rfi";
$result = $conn->query($sql);

//if ($result->num_rows > 0) {
	//echo "<table><tr><th>Name</th><th>Email</th><th>Phone</th><th>Company</th></tr>"; // making a table 
    // output data of each row
  //  while($row = $result->fetch_assoc()) {
  //      echo "<tr><td>" . "". $row["name"]. "</td><td>" . "". $row["email"] . "</td><td>" . "" . $row["phone"] . "</td><td>" . "" . $row["company"] . "</td><td>" . "<a id='myBtn' href='test'>DETAILS</a>" . "</td></tr>" . "<br>";
  //  }
//} else {
  //  echo "0 results";
//}

$conn->close();
?>

<table>
<tr>
<td>Name</td>
<td>Email</td>
<td>Phone</td>
<td>Company</td>
<td>UserID</td>
<td>OrderID</td>
<td>Action</td>
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
if($i%2==0)
$classname="even";
else
$classname="odd";
?>
<tr class="<?php if(isset($classname)) echo $classname;?>">
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["phone"]; ?></td>
<td><?php echo $row["company"]; ?></td>
<td><?php echo $row["userid"]; ?></td>
<td><?php echo $row["orderid"]; ?></td>
<td><a href="update-process.php?userid=<?php echo $row["orderid"]; ?>">Details & Update</a></td>
</tr>
<?php
$i++;
}
?>
</table>

        <br/><form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
        </form>

</body>
</html>