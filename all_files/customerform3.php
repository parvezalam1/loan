
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
    <link rel='stylesheet' href="../style/stolementform.css">
    <title>Document</title>
</head>
<body>
<div class="container d-flex justify-content-center p-2">

<div class="form w-75 mt-2">
    <form class="" id="formdata">
<div class="row">
<div class="col">
<h6 class="text-center text-uppercase " id="success">Customer Registration </h6>
</div>
</div>
<div class="row">
<div class="col">
<h5 class="text-center text-uppercase" id="successss"> </h5>
</div>
</div>
<div class="row">
    <div class="col-md-6 text-center">
    <h5>Customer Account Number</h5>
    </div>
    <div class="col-md-6 text-center">
    <input type="number" name="caccount" required placeholder="Customer Account Number" class="w-100 text-center font-weight-bold">
    </div>
    </div>
<div class="row">
<div class="col-md-6 text-center">
<h5>Customer Name</h5>
</div>
<div class="col-md-6 text-center">
<input type="text" name="cname" placeholder="Enter Customer Name" class="w-100 text-center font-weight-bold">
</div>
</div>
<div class="row">
    <div class="col-md-6 text-center">
    <h5>Select Option</h5>
    </div>
    <div class="col-md-6">
    <div class="row">
    <div class="col-sm-4">
        <input type="radio" placeholder="" class="w-sm-50 text-center font-weight-bold" name="mar" id="m" value="Married" class="c"> <label for="m"> Married</label>
    </div>
    <div class="col-sm-4">
        <input type="radio" placeholder="" class="w-sm-50 text-center font-weight-bold" name="mar" id="u" value="Unmarried" class="c"> <label for="u"> Unmarried</label>
    </div>
        <div class="col-sm-4">
        <input type="radio" placeholder="" class="w-sm-50  text-center font-weight-bold" name="mar" id="s" value="Single" class="c"> <label for="s"> Single</label>
        </div>
        </div>
  
    </div>
    </div>
<div class="find">

</div>
<div class="find2">

</div>
    <div class="row">
        <div class="col-md-6 text-center">
        <h5>Customer Age</h5>
        </div>
        <div class="col-md-6 text-center">
        <input type="number" name="cage" placeholder="Enter Customer Age" class="w-100 text-center font-weight-bold">
        </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">
            <h5>Customer Permanent Address</h5>
            </div>
            <div class="col-md-6 text-center">
            <input type="text" name="paddress" placeholder="Enter Permanent Address" class="w-100 text-center font-weight-bold">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">
            <h5>Customer Temporary Address</h5>
            </div>
            <div class="col-md-6 text-center">
            <input type="text" name="taddress" placeholder="Enter Temporary Address" class="w-100 text-center font-weight-bold">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">
            <h5>Customer Mobile</h5>
            </div>
            <div class="col-md-6 text-center">
            <input type="text" name="cmobile" placeholder="Enter Customer Mobile" class="w-100 text-center font-weight-bold">
            </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center">
                <h5>Customer Email</h5>
                </div>
                <div class="col-md-6 text-center">
                <input type="email" name="cemail" placeholder="Enter Customer Email" class="w-100 text-center font-weight-bold">
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                    <h5>Customer Aadhar Number</h5>
                    </div>
                    <div class="col-md-6 text-center">
                    <input type="number" name="caadhar" placeholder="Customer Aadhar Number" class="w-100 text-center font-weight-bold">
                    </div>
                    </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                    <h5>Customer Gender</h5>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="radio" placeholder="" class="w-sm-50 text-center font-weight-bold" name="gen" id="M" value="Male" required> <label for="M"> Male</label>
                            </div>
                            
                                <div class="col-sm-6">
                                    <input type="radio" placeholder="" class="w-sm-50  text-center font-weight-bold" name="gen" id="f" value="Female" required> <label for="f" > Female</label>
                                </div>
                                </div>
            
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 text-center">
                        <h5>Date Of Birth</h5>
                        </div>
                        <div class="col-md-6 text-center">
                        <input type="date" name="cdob" placeholder="" class="w-100 text-center font-weight-bold">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-center">
                            <h5>Upload Image</h5>
                            </div>
                            <div class="col-md-6 text-center">
                            <input type="file" name="file" required id="myfile" placeholder="" class="w-100 text-center font-weight-bold">
                            </div>
                            </div>

    <div class="row">
    <div class="col text-center">
    <input type="submit" class="mybtn" id=''>
    </div>
    </div>
</div>
</form>
</div> 

</body>

</html>


<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('#s,#m,#u').on('change',function(){
var gen=$(this).val();

$.ajax({
url:"../php/customerform.php",
type:"POST",
data:{g:gen},
success:function(data){
    $('.find2').html('');
$('.find').html(data);
}
});
})

});



$(document).on('change','#boy,#girl',function(){
var gen=$(this).val();
$.ajax({
url:"../php/customerform.php",
type:"POST",
data:{g:gen},
success:function(data){
// $('.find').html('');
$('.find2').html(data);
}
});

});


</script>


<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('#formdata').on('submit',function(e){
e.preventDefault();
var formdata=new FormData(this);
$.ajax({
    url:"../php_database/registerdatabase.php",
type:"POST",
contentType:false,
processData:false,
data:formdata,

success:function(data){
$('#formdata').trigger('reset');
alert(data);
}
});

});
});
</script>









 