<?php
session_start();
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
    <link rel='stylesheet' href="../style/mainpage.css">
    <title>main page</title>

<style>
ul li{
    position: relative;
}
ul ul{
    position: relative;
    width:130px;
    background-color:none;
}
ul ul li{
   width: 
    position: absolute;
    left:-3px;
}
ul ul li:hover{
    background-color:gray;
}
ul li .nextul{
    position: absolute;
    left:0px;
    top:100%;
    display:none;
    padding:0px;
    background-color:none;
    z-index: 100;
    
}
ul .nextul li a{

    padding:14px;

    position: relative;
    left:-12px;
   
}
ul li:hover ul{
    display:block;
}
</style>
</head>
<body>
<div class="container cont">
<div class="row">
<div class="col"><h5 class="text-center text-capitalize mt-sm-1 ">Shri laksami micro finacial services p.v.t l.t.d</h5></div>
</div>
<?php
require "header.php";
?>
<!-- <div class="row">
<div class="col">
<ul class="list-unstyle list-inline link d-sm-flex  justify-content-center">
<li class="list-inline-item m-1"><a href="#">Home</a></li>
<li class="list-inline-item m-1"><a href="#">About Us</a></li>
<li class="list-inline-item m-1"><a href="../nav/services_list.php">Services</a></li>
</ul>
</div>
</div> -->
<div class="row">
<div class="col">
<ul class="list-unstyled list-inline link d-sm-flex  justify-content-evenly postion-relative">
<li class="list-inline-item m-2 p-1"><a href="customerform3.php" class="">Register New Customer</a></li>
<li  class="list-inline-item m-2 p-1"><a href="#" class="">All Table List</a>
<a class=" dropdown-toggle dropdown-toggle-split" ></a>
<ul class="list-group  nextul list-flush">
<li class="list-group-item text-nowrap"><a class="link-item" href="../fetchdata/customerrecord.php">User Register</a></li>
<li class="list-group-item text-nowrap"><a href="../fetchdata/loan_table.php">Loan Table</a></li>
<li class="list-group-item text-nowrap"><a href="../fetchdata/emi_paytable.php">EMI Table</a></li>
</ul>
</li>

<li  class="list-inline-item m-2 p-1"><a href="emi_loan.php" class="">Loan Form</a></li>
<li  class="list-inline-item m-2 p-1"><a href="stolementpayform.php" class="">EMI Form</a></li>
</ul>
</div>
</div>
</div>
<hr>
<div class="container footer">
<div class="row">
<div class="col-md-4">
<h6 class="text-center">directior</h6>
<p class="text-center">Lorem, ipsum dolor.</p>
</div>
<div class="col-md-4">
<h6 class="text-center">address</h6>
<p class="text-center">Lorem ipsum dolor sit.</p>
</div>
<div class="col-md-4">
<h6 class="text-center">Contect Number</h6>
<p class="text-center">---------------</p>

</div>
</div>
</div>
</body>
</html>