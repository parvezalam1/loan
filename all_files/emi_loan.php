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
    <link rel='stylesheet' href="../style/emi_loan.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
    <title>emi loan ammount</title>
   
</head>
<body>
<div class="hid">
<div class="row">
<div class="col col2 d-flex justify-content-center align-items-center">
<div class="crose">
<span class="text-light align-self-auto mb-4">Go To Previous Page</spa>
</div>
</div>
</div>
<form id="frm">
<div class="row">
<div class="col col3 d-flex justify-content-center flex-column">
<div class="d-flex justify-content-center flex-column align-items-start">
<div class="table table-responsive  d-flex flex-column justify-content-center align-items-center">
<table class="loadtable table tab table-responsive">

</table>
</div>
</div>
</div>
</div>
</div>
<div class="container message_container position-absolute">
<div class="row">
<div class="col">
<div class="success_message bg-success text-center"></div>
<div class="error_message bg-danger text-center"></div>
</div>
</div>
</div>
<div class="container container2 bg-info ">
<div class="row">
<div class="col d-flex justify-content-center">
<h5 class="text-dark text-uppercase">emi loan form</h5>
</div>
</div>
<div class="row">
    <div class="col-md-6">
    <h6 class="text-center">Customer Account Number</h6>
    </div>
    <div class="col-md-6 text-center">
    <input type="number" name="caccount" placeholder="Enter Account Number" required class="text-center">
</div>
</div>
<!-- <div class="row">
    <div class="col-md-6">
    <h6 class="text-center">Customer Name</h6>
    </div>
    <div class="col-md-6 text-center">
    <input type="text" name="cname" placeholder="Enter Customer Name" class="text-center">
</div>
</div> -->
<div class="row">
    <div class="col-md-6">
    <h6 class="text-center">Loan Ammount</h6>
    </div>
    <div class="col-md-6 text-center">
    <input type="number" name="loanamount" placeholder="Enter Loan Ammount" required class="text-center" id="loan_amount">
</div>
</div>
<div class="row">
    <div class="col-md-6">
    <h6 class="text-center">Interest Rate</h6>
    </div>
    <div class="col-md-6 text-center">
    <input type="number" name="rate" required placeholder="Interest Rate" class="text-center" id="loan_rate">
</div>
</div>
<div class="row">
<div class="col-md-6 text-center">
<h6>Year</h6>
</div>
<div class="col-md-6 text-center">
<select name="loan_time" id="loan_year" required>
<option value=""></option>
<option value="1">Month</option>
<option value="12">Years</option>

</select>
<input type="number" name="loan_my" class="loan_year">
</div>
</div>
<div class="row">
<div class="col-md-6 text-center">
<h6>Loan Pay Time</h6>
</div>
<div class="col-md-6 text-center">
<select name="pay_time" id="pay_time" required>
<option value=""></option>
<option value="12">Yearly</option>
<option value="1">Monthly</option>
<option value="2">Quoterly</option>
<option value="4">Weekly</option>
</select>
</div>
</div>
<div class="append">

</div>
<div class="row">
<div class="col text-center">
<input type="submit" value="Loan Amount Submit" class="loan">
</div>
</div>
</div>
</form>

</body>
</html>

<script src="../js/jquery.js"></script>
<script>
$(function(){

$('#loan_amount,#loan_rate,#loan_year,.loan_year,#pay_time').on('keyup change',function(){
var loan_amount=$('#loan_amount').val();
var loan_rate=$('#loan_rate').val();
var loan_year=$('#loan_year').val();
var loan_year2=$('.loan_year').val();
var paytime=$('#pay_time').val();
var temp=2;
if(loan_amount!='' && loan_rate!='' && loan_year!='' && loan_year2!='' && paytime!=''){

$.ajax({
url:"../php_database/emi_database.php",
type:"POST",
data:{loanamount:loan_amount,loanrate:loan_rate,loanyear:loan_year,loanyear2:loan_year2,temp:temp,paytime:paytime},
success:function(data){
$('.append').html(data);
}
});
}
else{
$('.append').html("");
}
})

$(document).on('click','.myicon',function(){
    var loan=$(this).data('loan');
    var rate=$(this).data('rate');
    var year=parseInt($(this).data('year1'));
    var year2=parseInt($(this).data('year2'));
    var paytime=parseInt($(this).data('paytime'));
    // window.location.href="../fetchdata/emi_table.php";
    $.ajax({
url:"../fetchdata/emi_table.php",
type:"POST",
data:{loan:loan,rate:rate,year1:year,year2:year2,paytime:paytime},
success:function(data){
    document.querySelector('.hid').style.display="block";
// document.querySelector('.mythead').style.position="fixed";
$('.container').hide();
$('.tab').html(data);
}
}); 
})
$(document).on('click','.convert',function(){
// document.querySelector('.convert ul').style.display="block";
$('.convert ul').slideToggle('slow');
});
$(document).on('click','.crose',function(){
    $('.container').show(); 
    document.querySelector('.hid').style.display="none";
})

$('#frm').on('submit',function(e){
e.preventDefault();
var formdata=new FormData(this);
$.ajax({
url:"../php_database/emi_submit_database.php",
type:"POST",
data:formdata,
contentType:false,
processData:false,
success:function(data){
window.onscroll=function() {myfunction()};
$('.message_container').show();
document.querySelector('.message_container').style.zIndex="120";
document.querySelector('.message_container').style.top=document.documentElement.scrollTop+"px";
if(data==1){
   $('#frm').trigger("reset");
    $('.success_message').slideDown('slow').text('save successfully');
setTimeout(()=>{
	$('.success_message').slideUp();
			$('.message_container').slideUp();
},3000);
}else if(data==0){
  
$('.error_message').slideDown('slow').text('loan not send');
setTimeout(()=>{
	$('.error_message').slideUp();
			$('.message_container').slideUp();
},3000);
}
else{
    $('.error_message').slideDown('slow').html(data);
    setTimeout(()=>{
				$('.error_message').slideUp();
			$('.message_container').slideUp();
			},3000);
}
}
});
})

});

</script>
