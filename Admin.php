<?php
session_start();
require_once("conect.php");
if(isset($_SESSION['Admin'])){
    // header("location:index.php");
$msg="";
    if(isset($_POST['send'])){
    $a=$_POST['cname'];
    $b=$_POST['cprice'];
    }
    else{
        $msg="Image upload Fail";
    }
    
}
else{
    header("location:index.php");
}
//  $username=$_SESSION['user'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="header">
	<div id="logo"><img src="images/bin.jpg" width="200px"></div>
	<div id="nav">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
	</div>

			
			
			
	
</div>
<div id="wrapper">
<div id="main">
<h1>Welcome Admin To Upload More Cars</h1>
   <form method="POST"> <label for="">Car Name:</label>
    <input type="text" name="cname" id="cname"><br><br>

    <label for="">Car Price:</label>
    <input type="text" name="cprice" id="cprice"><br><br>


    <label for="">Upload Car Image:</label>
    <input type="file" name="image" id="image"><br>
<input type="submit" value="Upload" name="send">
<button type="reset" name="cancel">Cancel</button> <br>
<?php echo $msg; ?>
   </form> 
   <a href="logout.php?logout">Logout</a>
       
</div>

<div id="footer"><br />&copy;2023 Justine Car project. All rights reserved. 
	<br />
	contact : +255689612998/ +255625955584
</div>
</div>