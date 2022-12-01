<?php
include "connection.php";
if($_FILES['file']!=''){
 $account=$_REQUEST['caccount'];
 $cname=$_REQUEST['cname'];
 if(isset($_REQUEST['cfather'])){
    $father=$_REQUEST['cfather'];
 }
 if(isset($_REQUEST['chusband'])){
    $husband=$_REQUEST['chusband'];
 }
$age=$_REQUEST['cage'];
$taddress=$_REQUEST['taddress'];
$paddress=$_REQUEST['paddress'];
$mobile=$_REQUEST['cmobile'];
$email=$_REQUEST['cemail'];
$aadhar=$_REQUEST['caadhar'];
$gender=$_REQUEST['gen'];
$dob=$_REQUEST['cdob'];
$dt=time();
$cdob=strtotime($dob);

$name=$_FILES['file']['name'];
$size=$_FILES['file']['size'];
$file_extension=pathinfo($name,PATHINFO_EXTENSION);
$match_extension=['jpg','jpeg','png'];
if(in_array($file_extension,$match_extension)){
   $new_name=time().".".$file_extension;
  $file_location="../customer_images/".$new_name;
  if(move_uploaded_file($_FILES['file']['tmp_name'],$file_location)){
    $sql="insert into registeraccount set 
    accountNumber={$account},
    cName='{$cname}',
    cAge={$age},
    tAddress='{$taddress}',
    pAddress='{$paddress}',
    cMobile='{$mobile}',
    cEmail='{$email}',
    aadharNo={$aadhar},
    cGender='{$gender}',
    cDOB={$cdob},
    cPhoto='{$new_name}',
    date=$dt";
    if(mysqli_query($conn,$sql)){  
        $rowid=mysqli_insert_id($conn);
        if(isset($father)){
            $sql2="insert into cusfather set cFather='{$father}', cid=$rowid";
            if(mysqli_query($conn,$sql2)){
                echo "Record Save Successfully";
            }
        }if(isset($husband)){
             $sql2="insert into cushusband set cHusband='{$husband}', hid=$rowid";
            if(mysqli_query($conn,$sql2)){
                echo "Record Save Successfully";
            }
        }
    }
    else{
        unlink($file_location="../customer_images/".$new_name);
        echo "query failed";
    }

  }
  else{
    echo "image not uploaded";
  }
}
else{
    echo "image format allow only jpg or png";
}
}
    
else{
        echo "plese upload image";
    }


?>