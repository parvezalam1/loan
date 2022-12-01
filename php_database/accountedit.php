<?php
include "connection.php";
if(isset($_REQUEST['delid'])){
$del="delete from owneraccount where id=$_REQUEST[delid]";
if(mysqli_query($conn,$del)){
echo "Account Delete Successfully";
}else{
    echo "Account Not Delete ";
}
}
if($_REQUEST['id2']){

$update="update owneraccount set 
userName='$_REQUEST[user2]',
userEmail='$_REQUEST[email2]',
userPassword='$_REQUEST[password2]' where id=$_REQUEST[id2]";
if(mysqli_query($conn,$update)){
    echo "Account Update Successfully";
}else{
    echo "query Failed";
}
}

?>