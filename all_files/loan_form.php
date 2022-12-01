<?php
header("location:loginpage.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="../bootstrap5/css/bootstrap.css">
    <link rel='stylesheet' href="../style/loan_form.css">
    <title>customer loan</title>
</head>
<body>
<div class="container d-flex justify-content-center p-3">
<div class="loan w-75 mt-3 h-50">
<form action="" method="" id="formdata">
<div class="row">
<div class="col">
<h6 class="text-uppercase text-center">customer Loan</h6>
</div>
</div>
<div class="row">
    <div class="col-md-6 text-center">Customer Account Number</div>
        <div class="col-md-6"><input type="number" id="account" placeholder="Customer Account" class="w-100 text-center"></div>
    </div>
    <div class="row">
        <div class="col-md-6 text-center">Customer Name</div>
            <div class="col-md-6"><input type="text" placeholder="Customer Name" class="w-100 text-center"></div>
        </div>
<div class="row">
<div class="col-md-6 text-center">Loan Amount</div>
    <div class="col-md-6"><input type="number" name="loan" placeholder="Loan Amount" class="w-100 text-center" id="loan"></div>
</div>
<div class="row">
    <div class="col-md-6 text-center">Loan Time</div>
        <div class="col-md-6 text-center">
            <select class="w-100" name="loan_year" id="year">
<option value="">Loan Time</option>
<option value="365">1 Year</option>
<option value="730">2 Year</option>
            </select>
        </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">Loan Rate</div>
                <div class="col-md-6"><input type="text" name="rate" placeholder="Loan Rate" class="w-100 text-center"></div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">Loan Stolement</div>
                    <div class="col-md-6 text-center">
                        <select class="w-100" name="stolement" id="stole">
            <option value="">Select Stolement</option>
            <option value="30">Monthaly</option>
            <option value="15">Half</option>
            <option value="7">Weekly</option>
                        </select>
                    </div>
                    </div>
        <div class="add">

        </div>
            <div class="row">
                    <div class="col d-flex justify-content-center"><input type="submit" placeholder="" class=""></div>
                </div>
            </form>
</div>
</div>   

</body>
</html>

<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$(document).on('change keyup','#formdata',function(){
var formData=new FormData(this);
$.ajax({
        url:"../php/loanform.php",
        type:"POST",
        data:formData,
        contentType:false,
        processData:false,
        success:function(data){
            $('.add').html(data);
        }
    });
});
});
</script>