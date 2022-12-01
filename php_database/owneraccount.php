<?php
include "connection.php";
if(array_key_exists('btn',$_REQUEST)){
$ownername=$_REQUEST['ownername'];
$username=$_REQUEST['username'];
$useremail=$_REQUEST['useremail'];
$userpassword=$_REQUEST['userpassword'];
$dt=time();
$sql="insert into owneraccount set 
ownerName='{$ownername}',
userName='{$username}',
userEmail='{$useremail}',
userPassword='{$userpassword}',
date=$dt
";
if(mysqli_query($conn,$sql)){
$msg="<b style='color:black;'>Your Account Save Successfully</b>";
header("location:../all_files/ownerform.php?msg=$msg");
}else{
    $msg="<b style='color:black;'>"."Query Failed"."</b>";
    header("location:../all_files/ownerform.php?msg=$msg");
    // header("location:prog_2.php?msg=$msg");
}

}
?>
