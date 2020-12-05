<?php 

$servername = "127.0.0.1:49635";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "localdb";
		
// I NEED TO CREATE ANOTHER CONNECTION HERE SINCE I DO NOT NEED A SESSION 

		// get the values entered in the form
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phonenumber'];
		$companyname = $_POST['companyname'];
		$position = $_POST['position'];
		$industry = $_POST['industry'];
		$ideas = $_POST['ideas'];
		$userid = rand(1000,10000);
		$userpassword = rand(10000,100000);
		$orderid = rand(1,999);
		$orderstatus = 1;
		
		
	
		echo ("<br/>Hello, ". "$name "."! Your RFI is sent. We will contact you as soon as possible.<br/> Please use next credentials: <br/> Your login ID: ". "$userid"."<br/> Your password: ". "$userpassword". "<br/> Please write down your credentials<br/>");
		echo ("<br/>You can immediately login into your account by <a href='loginform.php'>clicking here</a>");

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql  = "INSERT INTO `rfi` (`name`, `email`, `phone`, `company`, `position`, `industry`, `ideas`, `userid`, `orderid`) VALUES ('$name', '$email', '$phone', '$companyname', '$position', '$industry', '$ideas', '$userid', '$orderid')";
		$sql2  = "INSERT INTO `userdb` (`UserID`, `UserPassword`, `UserName`) VALUES ('$userid', '$userpassword', '$name')";
		$sql3  = "INSERT INTO `clientorders` (`orderid`, `orderstatus`, `userid`) VALUES ('$orderid', '1', '$userid')";
		
		if ($conn->query($sql) === TRUE) {
			echo "";
		} else {
			echo "" . $sql . "" . $conn->error;
		}
		
		if ($conn->query($sql2) === TRUE) {
			echo "";
		} else {
			echo "" . $sql2 . "" . $conn->error;
		}
		
		if ($conn->query($sql3) === TRUE) {
			echo "";
		} else {
			echo "" . $sql3 . "" . $conn->error;
		}
		
		$conn->close();
		
 

?>
