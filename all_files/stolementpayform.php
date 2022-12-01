<?php
session_start();
if(!isset($_SESSION['useremail'])){
    header("location:loginpage.php");
}
?>

<style>

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="../bootstrap5/css/bootstrap.css">
    <link rel='stylesheet' href="../style/paystolementform.css">
    <title>stolement pay</title>
<style>
.success_message,.error_message,.rowhid{
    dispaly:hide;
}
</style>
</head>
<body>
<form id="formdata">
<div class="container d-flex justify-content-center">
<div class="pay w-75">
<div class="row">
<div class="col-12">
<h5 class=" heading text-center">stolement pay form</h5>
</div>
</div>
<div class="row rowhid">
<div class="col-12">
<div class="success_message bg-success text-light text-center"></div>
<div class="error_message bg-danger text-light text-center"></div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<h5 class="text-center">Customer Account Number</h5>
</div>
<div class="col-md-6">
<input type="number" name="caccount" placeholder="Customer Account Number" class=" text-center w-100">
</div>
</div>
<div class="row">
<div class="col-md-6">
<h5 class="text-center">Pay Amount</h5>
</div>
<div class="col-md-6">
<input type="number" name="pay_amount" placeholder="Pay Amount" class=" text-center  w-100">
</div>
</div>

<div class="row">
<div class="col d-flex justify-content-center mt-2">
<input type="submit" value="Apply" class="">
</div>
</div>
</div>
</div>
</form>
</body>
</html>

<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('#formdata').on('submit',function(e){
e.preventDefault();
var formData=new FormData(this);
$.ajax({
url:"../php_database/emi_paydatabase.php",
type:"POST",
data:formData,
contentType:false,
processData:false,
success:function(data){
$('.rowhid').slideDown('slow');
if(data==1){
$('.success_message').slideDown('slow').text("EMI Save Successfully");
setTimeout(()=>{
    $('.success_message').slideUp();
    $('.rowhid').slideUp('slow');
},3000);
}
else if(data==0){
    $('.error_message').slideDown('slow').text("quert failed");
setTimeout(()=>{
    $('.error_message').slideUp();
    $('.rowhid').slideUp('slow');
},3000);
}
else{
    $('.error_message').slideDown('slow').text(data);
setTimeout(()=>{
    $('.error_message').slideUp();
    $('.rowhid').slideUp('slow');
},3000); 
}
}

});
});
});
</script>