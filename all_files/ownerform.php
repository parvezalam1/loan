<?php
$msg='';
if(array_key_exists('msg',$_REQUEST)){
    $msg=$_REQUEST['msg'];
}
?>

<?php
session_start();
if(!isset($_SESSION['useremail'])){
    header("location:loginpage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="../bootstrap5/css/bootstrap.css">
    <link rel='stylesheet' href="../style/ownerform.css">
    <title>owner form</title>
</head>
<body>
<div class="container-xxl bg-dark">
<form name="frm" action="../php_database/owneraccount.php" method="get">
<div class="container mt-2">
<div class="row">
<div class="col">
<h5 class="text-uppercase text-light">Owner Details</h5>
</div>
</div>
<div class="row">
<div class="col">
<h5 class="text-capitalize text-light"><?php echo $msg;?></h5>
</div>
</div>
<div class="row">
<div class="col">
<input type="text" placeholder="Enter Your Name" name="ownername">
</div>
</div>
<div class="row">
<div class="col">
<input type="text" placeholder="Enter User Name" name="username" required>
</div>
</div>
<div class="row">
<div class="col">
<input type="email" placeholder="Enter Your Email" name="useremail" required>
</div>
</div>
<div class="row">
<div class="col">
<input type="password" placeholder="Enter Your Passowrd" name="userpassword" required>
</div>
</div>
<div class="row">
<div class="col">
<input type="submit" name="btn">
</div>
</div>
</div>
</form>
</div> 
</body>
</html>