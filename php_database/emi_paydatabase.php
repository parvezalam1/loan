<?php
include "connection.php";
$account=$_REQUEST['caccount'];
$sql="select rid,accountNumber from registeraccount where accountNumber=$account";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
    $data=mysqli_fetch_assoc($res);
    $dt=time();
$insert="insert into emi set pay_emi='$_REQUEST[pay_amount]', cid=$data[rid],emidate=$dt";
if(mysqli_query($conn,$insert)){
    echo 1;
}
else{
    echo 0;
}
}
else{
    echo "account not match please check it";
}
?>