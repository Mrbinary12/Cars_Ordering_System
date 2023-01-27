<?php
session_start();
require_once("conect.php");
$msg="";
if(isset($_POST['register'])){
    $fn=htmlspecialchars(stripcslashes(trim($_POST['fn'])));
    $us=htmlspecialchars(stripcslashes(trim($_POST['us'])));
    $em=htmlspecialchars(stripcslashes(trim($_POST['em'])));
    $pin=htmlspecialchars(stripcslashes(trim($_POST['pn'])));
    $pn1=htmlspecialchars(stripcslashes(trim($_POST['pn1'])));
    if(!empty($fn)&& !empty($us) && !empty($em)&& !empty($pin) && !empty($pn1) ){
        if($pin==$pn1){
            $newpin=password_hash($pin,PASSWORD_DEFAULT);
            $sql="INSERT INTO `registration`(`Fullname`, `Username`, `Email`, `Pin`) VALUES ('$fn','$us','$em','$newpin')";
            $qry=mysqli_query($cn,$sql);
            if($qry){
                $msg="Your registered Succefully";
                header("refresh:2;url=login.php");
            }
            else{
                $msg="Fail to register";
            }
        }
        else{
            $msg="Password does not match";
        }
        
    }
    else{
        $msg="All field must be filled";
    }
}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About</title>
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
	  <form method="POST">
            <table>
                <tr>
                    <h1>REGISTRATION SYSTEM FORM</h1>
                </tr>
            <tr>
                <td>FullName</td><td><input type="text" name="fn"></td>
            </tr>
            <tr>
                <td>UserName</td><td><input type="text" name="us"></td>
            </tr>
            <tr>
                <td>Email</td><td><input type="email" name="em"></td>
            </tr>
            <tr>
                <td>Password</td><td><input type="password" name="pn"></td>
            </tr>
            <tr>
                <td>ConfirmPassword</td><td><input type="password" name="pn1"></td>
            </tr>
            <tr>
            <td><button name="register">Register</button></td><td><a href="login.php">Login</a></td>
            </tr>
            <tr><td></td><td><?php echo $msg; ?></td>
    
</tr>
            </table>
        </form>

</div>

<div id="footer"><br />&copy;2023 Justine Car project. All rights reserved. 
	<br />
	contact : +255689612998/ +255625955584
</div>
</div>