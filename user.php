<?php
session_start();
require_once("conect.php");
$msg="";
if(isset($_SESSION['ID'])){
    echo'Welcome'.$_SESSION['ID'];
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome to oour  Cars ordering system</h1>
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
</body>
</html>