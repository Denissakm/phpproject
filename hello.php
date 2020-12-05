<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <head>
 
  <title>RFI Test Form</title>
  
 <?php 
 include 'phpconnect.php' 
 ?>
 <style>
 body,h1 {font-family: "Raleway", Arial, sans-serif}
h1 {letter-spacing: 6px}
.w3-row-padding img {margin-bottom: 12px}
 </style>
  
 </head>
 <body>
 <a href="index.html">Homepage</a>

<h2> RFI </h2>
 
 	<form action="basicinputresponse.php" method="post">
		Enter your full name:<br>
		<input type="text" name="name">
 		<br>
 		<br>
  
  		Enter your e-mail:<br>
  		<input type="text" name="email">
  		<br>
  		<br>

  		Enter your phone number (with no +):<br>
  		<input type="text" name="phonenumber">
  		<br>
  		<br>

  		Enter your company name:<br>
  		<input type="text" name="companyname">
  		<br>
  		<br>
		
  		Enter your position:<br>
  		<input type="text" name="position">
  		<br>
  		<br>
		
  		Enter your industry type:<br>
  		<input type="text" name="industry">
  		<br>
  		<br>
		
  		Describe your ideas (briefly):<br>
  		<input type="text" name="ideas">
  		<br>
  		<br>
		

	
  		
		<input type="submit" value="Send input!">
	</form>
 
 
 
 </body>
</html>

