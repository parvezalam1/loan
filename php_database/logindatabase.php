<?php
session_start();
if(array_key_exists('id',$_REQUEST)){
  session_destroy();
  header("location:../all_files/loginpage.php");
}
include "connection.php";
if(array_key_exists('btn',$_REQUEST)){
   $user_email=mysqli_real_escape_string($conn,$_REQUEST['user_email']);
  $password=$_POST['password'];
 $sql="select * from owneraccount WHERE userName='{$user_email}' || userEmail='{$user_email}' || userPassword='{$password}'";
  $res=mysqli_query($conn,$sql);
   if(mysqli_num_rows($res)>0){
    while($data=mysqli_fetch_assoc($res)){
      if($data['userName']==$user_email || $data['userEmail']==$user_email){
        if($data['userPassword']==$password){
            $_SESSION['useremail']='123';
            header("Location:../all_files/mainpage.php");
        }else{
            $msg="user password is incorrect";;
            header("location:../all_files/loginpage.php?msg=$msg");
        }
      }else{
        $msg="user email is incorrect";;
        header("location:../all_files/loginpage.php?msg=$msg");
      }
       
    }
}
else{
    $msg="user and password are incorrect";;
    header("location:../all_files/loginpage.php?msg=$msg");
}
}
?>