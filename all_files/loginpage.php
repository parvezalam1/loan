<?php
$msg='';
if(array_key_exists('msg',$_REQUEST)){
    $msg=$_REQUEST['msg'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="../bootstrap5/css/bootstrap.css">
    <link rel='stylesheet' href="../style/loginpage.css">
    <title>login page</title>
</head>
<body>
<form id="formdata" action="../php_database/logindatabase.php" method="post">
<div class="container-xxl d-flex justify-content-center align-items-center">

<div class="login">
<div class="row">
<div class="col">
<h5 class=' text-center text-uppercase position-relative'>login system</h5>
</div>
</div>
<div class="row">
<div class="col">
<p class=' text-center text-uppercase  '><?php echo $msg;?></p>
</div>
</div>
<div class="row">
<div class="col-12">
<input class=" text-center p-2" type="text"  placeholder="User_Name Or Email" name="user_email">
</div>
</div>
<div class="row">
<div class="col-12">
<input class="text-center mt-2 p-2" type="password" placeholder="User_Password" name="password">
</div>
</div>
<div class="row">
<div class="col-12">
<input class="text-center mt-2  font-weight-bold" name="btn" type="submit" value="Login">
</div>
</div>

</div>

</div> 
</form>
</body>
</html>
<!-- <p id="d"></p> -->

<!-- <script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('#formdata').on('submit',function(e){
e.preventDefault();
var formData=new FormData(this);
$.ajax({
url:"../php_database/logindatabase.php",
type:"POST",
data:formData,
contentType:false,
processData:false,
success:function(data){
$('#d').html(data);
}
});
});
});
</script> -->
