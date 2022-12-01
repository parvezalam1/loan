<?php
include "connection.php";
if(isset($_FILES['ephoto'])){
    $file_name=$_FILES['ephoto']['name'];
    $extension=pathinfo($file_name,PATHINFO_EXTENSION);
    $match_extension=['jpg','png'];
    if(in_array($extension,$match_extension)){
        $new_name=time().'.'.$extension;
        $path="../customer_images/".$new_name;
        if(move_uploaded_file($_FILES['ephoto']['tmp_name'],$path)){
            $strtotime=strtotime($_REQUEST['edob']);
    $update="update registeraccount set 
    accountNumber=$_REQUEST[eaccount],
    cName='$_REQUEST[ename]',
    cAge=$_REQUEST[eage],
    tAddress='$_REQUEST[taddress]',
    pAddress='$_REQUEST[paddress]',
    cMobile='$_REQUEST[emobile]',
    cEmail='$_REQUEST[eemail]',
    aadharNo=$_REQUEST[eaadhar],
    cGender='$_REQUEST[gen]',
    cDOB=$strtotime,
    cPhoto='{$new_name}' where rid=$_REQUEST[hid]";
    if(mysqli_query($conn,$update)){
        unlink("../customer_images/".$_REQUEST['hidphoto']."."."jpg");
        if(isset($_REQUEST['efather'])){
            $update2="update cusfather set cFather='$_REQUEST[efather]' where cid=$_REQUEST[hid]";
            mysqli_query($conn,$update2) or die("query failed");
            echo "Record Update Successfully";
        }
        if(isset($_REQUEST['ehusband'])){
            $update2="update cushusband set cHusband='$_REQUEST[ehusband]' where hid=$_REQUEST[hid]";
            mysqli_query($conn,$update2) or die("query failed");
            echo "Record Update Successfully";
        }
    }
        }
        else{
            echo "file not uploaded";
        }
    }
    else{
        $strtotime=strtotime($_REQUEST['edob']);
        $update="update registeraccount set 
        accountNumber=$_REQUEST[eaccount],
        cName='$_REQUEST[ename]',
        cAge=$_REQUEST[eage],
        tAddress='$_REQUEST[taddress]',
        pAddress='$_REQUEST[paddress]',
        cMobile='$_REQUEST[emobile]',
        cEmail='$_REQUEST[eemail]',
        aadharNo=$_REQUEST[eaadhar],
        cGender='$_REQUEST[gen]',
        cDOB=$strtotime where rid=$_REQUEST[hid]";
        if(mysqli_query($conn,$update)){
            if(isset($_REQUEST['efather'])){
                $update2="update cusfather set cFather='$_REQUEST[efather]' where cid=$_REQUEST[hid]";
                mysqli_query($conn,$update2) or die("query failed");
                echo "Record Update Successfully";
            }
            if(isset($_REQUEST['ehusband'])){
                $update2="update cushusband set cHusband='$_REQUEST[ehusband]' where hid=$_REQUEST[hid]";
                mysqli_query($conn,$update2) or die("query failed");
                echo "Record Update Successfully";
            }
        }
    }
}



if(isset($_REQUEST['delid'])){
    // echo $_REQUEST['delid'];
$del="select cPhoto from registeraccount where rid=$_REQUEST[delid]";
mysqli_query($conn,"delete from loan_amount where cid=$_REQUEST[delid]");
mysqli_query($conn,"delete from emi where cid=$_REQUEST[delid]");
$res=mysqli_query($conn,$del);
if(mysqli_num_rows($res)>0){
$data=mysqli_fetch_assoc($res);
unlink("../customer_images/".$data['cPhoto'].'.'.'jpg');
$fhdel="select * from cusfather where cid=$_REQUEST[delid]";
$delres=mysqli_query($conn,$fhdel);
if(mysqli_num_rows($delres)>0){
    mysqli_query($conn,"delete from cusfather where cid=$_REQUEST[delid]");
}
$fhdel2="select * from cushusband where hid=$_REQUEST[delid]";
$delres2=mysqli_query($conn,$fhdel2);
if(mysqli_num_rows($delres2)>0){
    mysqli_query($conn,"delete from cushusband where hid=$_REQUEST[delid]") or die("query failed");
    echo "Record Delete Successfully";
}
}
if(mysqli_query($conn,"delete from  registeraccount where rid=$_REQUEST[delid]")){
    echo "record delete";
}

}

// if(!isset($_FILES['ephoto'])){
//     $strtotime=strtotime($_REQUEST['edob']);
//     $update="update registeraccount set 
//     accountNumber=$_REQUEST[eaccount],
//     cName='$_REQUEST[ename]',
//     cAge=$_REQUEST[eage],
//     tAddress='$_REQUEST[taddress]',
//     pAddress='$_REQUEST[paddress]',
//     cMobile='$_REQUEST[emobile]',
//     cEmail='$_REQUEST[eemail]',
//     aadharNo=$_REQUEST[eaadhar],
//     cGender='$_REQUEST[gen]',
//     cDOB=$strtotime where rid=$_REQUEST[hid]";
//     if(mysqli_query($conn,$update)){
//         if(isset($_REQUEST['efather'])){
//             $update2="update cusfather set cFather='$_REQUEST[efather]' where cid=$_REQUEST[hid]";
//             mysqli_query($conn,$update2);
//         }
//         if(isset($_REQUEST['ehusband'])){
//             $update2="update cushusband set cHusband='$_REQUEST[ehusband]' where hid=$_REQUEST[hid]";
//             mysqli_query($conn,$update2) or die("query failed");
//         }
//     }
        
// }
?>