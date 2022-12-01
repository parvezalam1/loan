<?php
session_start();
if(!isset($_SESSION['useremail']))
header("location:../all_files/loginpage.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="../bootstrap5/css/bootstrap.css">
</head>
<style>
*{
    margin: 0px;
    padding: 0px;
}
body{
    width: 100%;
}
.edit{
    width:300px;
    border:1px solid black;
    height:220px;
    position: relative;
    top:10px;
}
span{
    position:relative;
    display:block;
    top:10px;
    right:-130px;
    width:40px;
    height:40px;
    border-radius:50%;
    border:2px solid black;
    z-index: 20;
    cursor: pointer;
}
span::before{
    content:'';
    position:absolute;
    display:block;
    top:50%;
  left:0px;
    width:100%;
    height:2px;
    border:1px solid black;
transform:rotate(45deg);
}
span::after{
    content:'';
    position:absolute;
    display:block;
    top:50%;
  left:0px;
    width:100%;
    height:2px;
    border:1px solid black;
transform:rotate(-45deg);
}
.edit input{
    margin-top:6px;
    width:250px;
}
.edit,span{
    visibility: hidden;
}
button,a{
    border:none;
}
.message{
    top:20px;
    left:30px;
}
.mes{
    position: relative;
    top:-8px;
}
body{
    background-color:rgba(104,908,252,0.6);
}
</style>
<body class="">
<form id="frm">
<div class="container d-flex justify-content-center position-relative">
<span id="span"></span>
<div class="container position-absolute bg-secondary text-info edit d-flex justify-content-center flex-column align-items-center">
<div class="row">
<div class="col">
<h6 class="text-center mes">Edit Account</h6>
</div>
</div>
<div class="row">
<div class="col">
<h6 class="text-center message position-absolute "></h6>
</div>
</div>
<div class="row">
<div class="col">
<input type="text" id="Editid" name="eid" value="">
</div>
</div>
<div class="row">
<div class="col">
<input type="text" id="Edituser" name="euser" value="">
</div>
</div>
<div class="row">
<div class="col">
<input type="text" id="Editemail" name="eemail" value="">
</div>
</div>
<div class="row">
<div class="col">
<input type="text" id="Editpassword" name="epassword" value="">
</div>
</div>
<div class="row">
<div class="col">
<input type="button" id="ebtn" value="Edit" name="mybtn">
</div>
</div>
</div>
</div>
</form>
<div class="container bg-info text-info d-flex justify-content-start flex-column">
    <div class="row">
    <div class="col text-center text-light">
        <h5 class="text-center">All Account</h5>
    </div>
    </div> 
     <div class="row">
    <div class="col">
        <div class="table table-responsive">
        <table class="table">
            <tr>   
            <th>User Name</th>
            <th>User Email</th>
            <th>User Password</th>
            <th>Date</th>
            <th>Action</th>
            </tr> 
          
           
            <?php
            include "../php_database/connection.php";
            $sql="select * from owneraccount";
            $res=mysqli_query($conn,$sql);
            while($data=mysqli_fetch_assoc($res)){
            ?>
            <tr>
                <td><?php echo $data['userName'];?></td>
                <td><?php echo $data['userEmail'];?></td>
                <td><?php echo $data['userPassword'];?></td>
                <td><?php echo date('d-M-Y',$data['date']);?></td>
                <td><button class=" text-dark mx-2"><a href="#" class="btn btn-danger delbtn" data-delid=<?php echo $data['id'];?>>Delete</a></button>
                <button class=" mx-2"><a href="#" class="editbtn btn btn-success" data-editid=<?php echo $data['id'];?> data-editname=<?php echo ($data['userName']);?> data-editemail=<?php echo $data['userEmail'];?> data-editpassword=<?php echo $data['userPassword'];?>>Edit</button></a></td>
            </tr>
           <?php
            }
            ?>
        
         
            </table>
    </div>
    </div>
    </div> 
</div>
</body>
</html>


<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript">



$(document).ready(function(){
$('.editbtn').click(function(){
var id=$(this).data('editid');
var user=$(this).data("editname");
alert(user)
var email=$(this).data('editemail');
var password=$(this).data('editpassword');
document.querySelector('.edit').style.visibility="visible";
document.querySelector('#span').style.visibility="visible";
$('#Editid').val(id);
document.querySelector('#Edituser').value=user;
// $('#Edituser').val(user);
$('#Editemail').val(email);
$('#Editpassword').val(password);

$('#span').click(function(){
    document.querySelector('.edit').style.visibility="hidden";
document.querySelector('#span').style.visibility="hidden";
})
});

});
$(document).ready(function(){
    $('#ebtn').on('click',function(){
var id2=$('#Editid').val();
var email2=$('#Editemail').val();
var user2=$('#Edituser').val();
var password2=$('#Editpassword').val();
$.ajax({
    url:"../php_database/accountedit.php",
    type:"POST",
    data:{id2:id2,email2:email2,user2:user2,password2:password2},
    success:function(data){
    $('#frm').trigger('reset');
$('.message').text(data);
    }
})
});


$('.delbtn').on('click',function(){
    var del=$(this).data('delid');
if(confirm("do you want to delete account")){
    alert();
$.ajax({
    url:"../php_database/accountedit.php",
    type:"POST",
    data:{delid:del},
    success:function(data){

    }
});
}
});
})
</script>