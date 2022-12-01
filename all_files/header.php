<?php
if(!isset($_SESSION['useremail']))
header("location:loginpage.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="../bootstrap5/css/bootstrap.css">
    <link rel='stylesheet' href="../style/header.css">
    <title>header page</title>
    <style>

    </style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col">
<li class="list-inline-item m-1 order-md-1 "><a href="../fetchdata/account.php">User Account</a></li>
</div>
<div class="col d-flex justify-content-end">
<li class="list-inline-item m-1 order-md-1"><a style="font-size:18px;" href="../php_database/logindatabase.php?id=1">Logout</a></li>
</div>
</div>
<div class="row">
<div class="col">
<ul class="list-unstyle list-inline link2 d-sm-flex  justify-content-center">
<li class="list-inline-item m-1"><a href="../all_files/mainpage.php">Home</a></li>
<li class="list-inline-item m-1"><a href="#">About Us</a></li>
<li class="list-inline-item m-1"><a href="../nav/services_list.php">Services</a></li>
</ul>
</div>
</div>


</div>
</body>
</html>