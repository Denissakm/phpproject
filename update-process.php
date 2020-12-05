<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
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
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE clientorders SET orderstatus='" . $_POST['orderstatus'] . "', review='" . $_POST['review'] . "', instructions='" . $_POST['instructions'] . "', testingnotes='" . $_POST['testingnotes'] . "', tnat='" . $_POST['tnat'] . "', finalreport='" . $_POST['finalreport'] . "' WHERE orderid='" . $_GET['userid'] . "'");
}
$result = mysqli_query($conn,"SELECT * FROM clientorders WHERE orderid='" . $_GET['userid'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Employee Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="adminpanel.php">Order List</a>
</div>
Order ID: <br>
<input type="text" name="orderid"  value="<?php echo $row["orderid"]; ?>" readonly>
<br>
Order status: <br>
<input type="text" name="orderstatus" class="txtField" value="<?php echo $row['orderstatus']; ?>"> 
<br>
Review:<br>
<input type="text" name="review" class="txtField" value="<?php echo $row['review']; ?>">
<br>
Instructions (attachment, write down name of file and extension, i.e: project_document.pdf):<br>
<input type="text" name="instructions" class="txtField" value="<?php echo $row['instructions']; ?>">
<br>
Testing notes:<br>
<input type="text" name="testingnotes" class="txtField" value="<?php echo $row['testingnotes']; ?>">
<br>
Testing notes (attachment, write down name of file and extension, i.e: project_document.pdf):<br>
<input type="text" name="tnat" class="txtField" value="<?php echo $row['tnat']; ?>">
<br>
Final report (attachment, write down name of file and extension, i.e: project_document.pdf):<br>
<input type="text" name="finalreport" class="txtField" value="<?php echo $row['finalreport']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">
</form>
</body>
</html>