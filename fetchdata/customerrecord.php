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
    min-height:220px;
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
    width:200px;
}
#frmupdate{
    /* visibility: hidden; */
    display:none;
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
    top:8px;
}
body{
    background-color:rgba(104,908,252,0.6);
}

</style>
<body class="">
<form id="frmupdate">
<div class="container d-flex justify-content-center position-relative">
<span id="span"></span>
<div class="container position-absolute bg-secondary text-info edit d-flex justify-content-center flex-column align-items-center">
<div class="row">
<div class="col">
<h6 class="text-center mes">Edit Customer Record</h6>
</div>
</div>
<div class="row">
<div class="col">
<h6 class="text-center message-success"></h6>
</div>
</div>
<div class="row">
<div class="col">
<h6 class="text-center message-error"></h6>
</div>
</div>
<div class="row">
<div class="col">
<h6 class="text-center message position-absolute"></h6>
</div>
</div>
<div class="row">
<div class="col">
<input type="text" id="eaccount" name="eaccount" value="">
</div>
</div>
<div class="row">
<div class="col">
<input type="text" id="ename" name="ename" value="">
</div>
</div>
<div class="row" id="">
<div class="col">
<input type="text" id="efather" name="efather" value="" placeholder="father">
</div>
</div>
<div class="row" id="">
<div class="col">
<input type="text" id="ehusband" name="ehusband" value="" placeholder="husband">
</div>
</div>
<div class="row">
<div class="col">
<input type="number" id="eage" value="eage" name="eage">
</div>
</div>
<div class="row">
<div class="col">
<input type="text" id="taddress" name="taddress" value="">
</div>
</div>
<div class="row">
<div class="col">
<input type="text" id="paddress" name="paddress" value="">
</div>
</div>
<div class="row">
<div class="col">
<input type="text" id="emobile" name="emobile" value="">
</div>
</div>
<div class="row">
<div class="col">
<input type="text" id="eemail" name="eemail" value="">
</div>
</div>
<div class="row">
<div class="col">
<input type="text" id="eaadhar" name="eaadhar" value="">
</div>
</div>
<div class="row">
<div class="col d-flex justify-content-center flex-column">
<div class="col-6">
<input type="radio" id="m" name="gen" value="Male"> <label for="m"> Male</label>
</div>
<div class="col-6 d-flex-none">
<input type="radio" id="f" name="gen" value="Female"> <label for="f"> Female</label>
</div>
</div>
</div>
<div class="row">
<div class="col">
<input type="date" id="edob" name="edob" value="">
</div>
</div>
<div class="row">
<div class="col">
<input type="file" id="efile" name="ephoto">
</div>
</div>
<div class="row">
<div class="col">
<input type="submit" id="mybtn" name="mybtn" value="Update Data">
<input type="hidden" name="hid" id="hid">
<input type="hidden" name="hidphoto" id="hidphoto">
</div>
</div>
</div>
</div>
</form>
<div class="container-xxl bg-info text-info d-flex justify-content-start flex-column">
    <div class="row">
    <div class="col text-center text-light">
        <h5 class="text-center">All Customer Record</h5>
    </div>
    </div> 
    <div class="row">
    <div class="col text-center text-light p-2 d-sm-flex justify-content-end">
    <input type="text" name="search" id="search" class="text-center px-4 border-dark text-weight-bold" placeholder="Search Record">
    </div>
    </div>
     <div class="row">
    <div class="col">
        <div class="table hidetable table-responsive">
        <table class="text-center table  table-striped">
            <tr>   
            <th class="text-nowrap">Serial Number</th>
            <th>Account</th>
            <th>Name</th>
            <th class="text-nowrap">Father's Name</th>
            <th class="text-nowrap">Husband Name</th>
            <th>Age</th>
            <th class="text-nowrap">Temporary Address</th>
            <th class="text-nowrap">Permanent Address</th>
            <th>Mobile</th>
            <th>Email</th>
            <th class="text-nowrap">Aadhar Number</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Date</th>
            <th>Photo</th>
            <th class="">Action</th>
            </tr> 
          
            <?php
            include "../php_database/connection.php";
            // $sql="select * from ((registeraccount inner join cusfather on registeraccount.rid=cusfather.cid)inner join cushusband on registeraccount.rid=cushusband.hid)";

            $sql="SELECT *
            FROM ((registeraccount LEFT JOIN cusfather ON registeraccount.rid = cusfather.cid)LEFT JOIN cushusband ON registeraccount.rid = cushusband.hid)";
            $serialNumber=1;
            $res=mysqli_query($conn,$sql);
            while($data=mysqli_fetch_assoc($res)){
            
            ?>
            
            <tr class=" trow align-middle" >
                <td><?php echo $serialNumber;?></td>
                <td><?php echo $data['accountNumber'];?></td>
                <td class="text-nowrap align-middle"><?php echo $data['cName'];?></td>

                <?php
                    if($data['cFather']!=''){
                        ?>
                        <td class="text-nowrap"><?php echo $data['cFather'];?></td>
                        <?php
                    }
                    else{
                        ?>
                        <td class="text-nowrap"><?php echo "Staus Married";?></td>
                       <?php
                    }
            ?>
                 <?php
                    if($data['cHusband']!=''){
                        ?>
                      <td class="text-nowrap"><?php echo $data['cHusband'];?></td>
                        <?php
                    }
                    else{
                        ?>
                        <td class="text-nowrap"><?php echo "Not Married";?></td>
                       <?php
                    }
            ?> 
                
                <td><?php echo $data['cAge'];?></td>
                <td class="text-nowrap"><?php echo $data['tAddress'];?></td>
                <td class="text-nowrap"><?php echo $data['pAddress'];?></td>
                <td class="text-nowrap"><?php echo $data['cMobile'];?></td>
                <td><?php echo $data['cEmail'];?></td>
                <td class="text-nowrap"><?php echo $data['aadharNo'];?></td>
                <td class="text-nowrap"><?php echo $data['cGender'];?></td>
                <td class="text-nowrap"><?php echo date('d-M-Y',$data['cDOB']);?></td>
                <td class="text-nowrap"><?php echo date('d-M-Y',$data['date']);?></td>
                <td class="text-nowrap"><img src="../customer_images/<?php echo $data['cPhoto'];?>.jpg" style="width:60px;"></td>
                <td class="text-nowrap"><button class=" text-dark mx-2"><a href="#" class="btn btn-danger delbtn"   data-delid=<?php echo $data['rid'];?>>Delete</a></button>
                <button class=" mx-2"><a href="#" class="editbtn2 btn btn-success" data-account=<?php echo $data['accountNumber'];?> 
                data-name=<?php echo $data['cName'];?>
                data-rid=<?php echo $data['rid'];?>
                data-age=<?php echo $data['cAge'];?>
                data-taddress=<?php echo $data['tAddress'];?>
                data-paddress=<?php echo $data['pAddress'];?>
                data-mobile=<?php echo $data['cMobile'];?>
                data-email=<?php echo $data['cEmail'];?>
                 data-aadhar=<?php echo $data['aadharNo'];?>
                 data-gender=<?php echo $data['cGender'];?>
                 data-photo=<?php echo $data['cPhoto'];?>
                 data-dob=<?php echo date('Y-m-d',$data['cDOB']);?>
                 data-file=<?php echo $data['cPhoto'];?>
                 <?php
                 if(isset($data['cHusband'])){
                    ?>
                         data-husband=<?php echo $data['cHusband'];?> 
                    <?php
                 }
                
                 ?>
                  <?php
                 if(isset($data['cFather'])){
                    ?>
                        data-father=<?php echo $data['cFather'];?>
                    <?php
                 }
                
                 ?>
                
                  >Edit</button></a></td>

                </tr>
                
           <?php
            $serialNumber++;
            }
        
        
        
            ?>
            </table>
            
    
    </div>
    <div class="loaddata">

</div>
    </div>
    </div> 
</div>

</body>
</html>


<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript">

$(function(){


    $(document).on('click','.editbtn2',function(){
    
    document.querySelector('#frmupdate').style.display="block";
    if($(this).data('father')){
        var father=$(this).data('father');
        $('#efather').val(father);
        $('#ehusband').hide();
    }
    if($(this).data('husband')){
        var husband=$(this).data('husband');
        $('#ehusband').val(husband);
        $('#efather').hide();
    }
var name=$(this).data('name');
var rid=$(this).data('rid');
var age=$(this).data('age');
var taddress=$(this).data('taddress');
var account=$(this).data('account');
var paddress=$(this).data('paddress');
var mobile=$(this).data('mobile');
var email=$(this).data('email');
var aadhar=$(this).data('aadhar');
var gender=$(this).data('gender');
var dob=$(this).data('dob');
var photo=$(this).data('photo');
if(gender==$('#m').val()){
    document.querySelector('#m').checked=true;
}
if(gender==$('#f').val()){
    
    document.querySelector('#f').checked=true;
}

$('#eaccount').val(account);
$('#ename').val(name);
$('#eage').val(age);
$('#taddress').val(taddress);
$('#paddress').val(paddress);
$('#emobile').val(mobile);
$('#eemail').val(email);
$('#eaadhar').val(aadhar);
$('#edob').val(dob);
$('#hid').val(rid);

$('#hidphoto').val(photo);
});





$('.editbtn2').click(function(){
    
    document.querySelector('#frmupdate').style.display="block";
    if($(this).data('father')){
        var father=$(this).data('father');
        $('#efather').val(father);
        $('#ehusband').hide();
    }
    if($(this).data('husband')){
        var husband=$(this).data('husband');
        $('#ehusband').val(husband);
        $('#efather').hide();
    }
var name=$(this).data('name');
var rid=$(this).data('rid');
var age=$(this).data('age');
var taddress=$(this).data('taddress');
var account=$(this).data('account');
var paddress=$(this).data('paddress');
var mobile=$(this).data('mobile');
var email=$(this).data('email');
var aadhar=$(this).data('aadhar');
var gender=$(this).data('gender');
var dob=$(this).data('dob');
var photo=$(this).data('photo');
if(gender==$('#m').val()){
    document.querySelector('#m').checked=true;
}
if(gender==$('#f').val()){
    
    document.querySelector('#f').checked=true;
}

$('#eaccount').val(account);
$('#ename').val(name);
$('#eage').val(age);
$('#taddress').val(taddress);
$('#paddress').val(paddress);
$('#emobile').val(mobile);
$('#eemail').val(email);
$('#eaadhar').val(aadhar);
$('#edob').val(dob);
$('#hid').val(rid);

$('#hidphoto').val(photo);
});
$('#span').click(function(){
    document.querySelector('#frmupdate').style.display="none";  
})

});

$(function(){
    $('#frmupdate').on('submit',function(e){
e.preventDefault();
var formdata=new FormData(this);
$.ajax({
    url:"../php_database/customerupdate.php",
type:"POST",
contentType:false,
processData:false,
data:formdata,

success:function(data){
    $('.message-success').html(data)
alert(data);
location.reload();
}
});

});
$(document).on('click','.delbtn',function(){
    var delid=$(this).data('delid');
if(confirm("do you want to delete record")){
$.ajax({
    url:"../php_database/customerupdate.php",
type:"POST",

data:{delid:delid},

success:function(data){
    $('.message-success').html(data)
alert(data);
}
});
}
})
// $('.delbtn').click(function(){
// var delid=$(this).data('delid');
// if(confirm("do you want to delete record")){
// $.ajax({
//     url:"../php_database/customerupdate.php",
// type:"POST",

// data:{delid:delid},

// success:function(data){
//     $('.message-success').html(data)
// alert(data);
// }
// });
// }
// });

$('#search').on('keyup',function(){
var searchitem=$(this).val();
$('.hidetable').html("");
$.ajax({
url:"../php_database/search.php",
type:"POST",
data:{item:searchitem},
success:function(data){
  
    $('.loaddata').html("");
$('.loaddata').html(data);
}
});
});


});

</script>