<?php
if(isset($_POST['login'])){
require_once("conect.php");
      $msg="";
    $username=htmlspecialchars(stripcslashes(trim($_POST['Username'])));
    $Pin=htmlspecialchars(stripcslashes(trim($_POST['pin'])));
     $query="SELECT * FROM `registration` WHERE Username='$username' OR Email='$username' LIMIT 1";
    $sql=mysqli_query($cn,$query);
    $rw=mysqli_num_rows($sql);
   if(($rw)==1){
    $row=mysqli_fetch_array($sql);
    $role=$row['Role'];
    $pwd=$row['Pin'];
    $users=$row['ID'];
    $data=password_verify($Pin,$pwd);
    if($data){
        if($role==='Admin'){
        session_start();
        $_SESSION['Admin']=$users;
        header("location:Admin.php");}
        if($role==='user'){
            session_start();
        $_SESSION['ID']=$users;
        header("location:user.php");
        }  
    }
    else{
        $msg="wrong username or password";
        header("refresh:2;url=index.php");
    }

   }
        else{
        $msg="wrong username or password";
        header("refresh:2;url=index.php");
        }

    }else{
        $msg="all field are required";
    }


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
	
        <form method="POST">
            <table>
                <tr>
                    <h1>LOGIN SYSTEM FORM</h1>
                </tr>
                <tr>
                <td>UserName</td><td><input type="text" name="Username"></td>
            </tr>
            
            <tr>
                <td>Password</td><td><input type="password" name="pin"></td>
            </tr>
            
            <tr>
               <td><button name="login">Login</button></td><td><a href="logout.php">Logout</a></td>
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