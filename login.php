<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.header {background:url(about.jpg);
		background-size: 1350px 500px;
		background-repeat: no-repeat;
      padding-bottom: 300px;
	  padding-left:0;
	  padding-right:10px;
	  height:70px;
	width: 1342px;
    text-align:center;
    text-color:	white;}
img {
    float: left;
	padding:20px;
}
ul {
    list-style-type: none;
    margin:0;
	width: 4000px
    padding: 0;
    overflow: hidden;
    background-color:white;
	border-bottom: 20px #D4AF37;
	border-top: 20px solid #D4AF37;
}

li {
    float: left;
	border-right:150px solid white;
	border-left:150px solid white;
	
}

li a {
    display: block;
    color:	#D4AF37;
    text-align: center;
    padding: 14px 6px;
    text-decoration: none;
}
	
	li a:hover {
     border-bottom: 3px solid #D4AF37;}
	 
	 .input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
}

.icon {
    padding: 10px;
    background: black;
    color:#D4AF37 ;
    min-width: 50px;
    text-align: center;
}

.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid black;
}

/* Set a style for the submit button */
.btn {
    background-color:black;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
	font-size:30px;
}

.btn:hover {
    opacity: 0.5;
}
.container {
    padding: 16px;
    background-color: white;
	max-width:500px;
	padding-left:400px;
}

.signin {
    background-color:transparent;
    text-align: center;
}
input[type="date"]:not(.has-value):before{
  color: gray;
  content: attr(placeholder);
}
</style>
</head>
<body>
<div class="header">

<ul style="border-bottom:none;border-top:none;background-color:transparent;position:top;font-size:20px;">
 
    <li style="border-right:none; border-left:none;"><a href="home.html">Home</a></li>
	
</ul>
	<h1 style="color:#D4AF37;letter-spacing: 10px; font-size:60px;"><em><strong><br>BOOKING DETAILS</strong></em><br><p style="font-size:45px;"><p></h1><br><br>
</div><br>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db="wta";

$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn,"wta");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE); 

$name=$_POST[fullname];
//echo $name;
$email=$_POST[email];
$address=$_POST[address];
$phno=$_POST[phno];

$chosendate = date('Y-m-d', strtotime($_POST[chosendate]));
$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

if (filter_var($emailB, FILTER_VALIDATE_EMAIL) === false ||
    $emailB != $email
) {
    trigger_error("THIS EMAIL ADDRESS IS NOT VALID!");exit(0);
    
}

$curdate=date("Y-m-d");
//$chosendate=date("Y-m-d");
if($chosendate<$curdate)
{
	 trigger_error(" DATE NOT AVAILABLE");
    exit(0);
}

mysqli_query($conn,"insert into book(name,email,address,phno,date) values('$name','$email','$address',$phno,'$chosendate')");

echo ("<p style=\"padding-left:400px\">NAME</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-user icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$name readonly>
					</div>\n\n");
	echo ("<p style=\"padding-left:400px\">EMAIL</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-envelope icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$email readonly>
					</div>\n\n");
	echo ("<p style=\"padding-left:400px\">ADDRESS</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-home icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$address readonly>
					</div>\n\n");
	echo ("<p style=\"padding-left:400px\">CONTACT NUMBER</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-phone icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$phno readonly>
					</div>\n\n");
	
	echo ("<p style=\"padding-left:400px\">SELECTED DATE</p>");
	echo  ("<div class=\"input-container\" style=\"max-width:500px;padding-left:400px;\">
					<i class=\"fa fa-calendar icon\"></i>
					<input class=\"input-field\" type=\"number\" placeholder=$chosendate readonly>
					</div>\n\n");

	


?>
</form>
<h1 style="color:#D4AF37;letter-spacing: 2px; font-size:30px;"><em><strong><br>Please contact to cancel appointment</strong></em><br><p style="font-size:45px;"><p></h1><br><br>
</body>
</html>