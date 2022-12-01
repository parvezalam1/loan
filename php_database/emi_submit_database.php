<?php
require_once "../php_database/connection.php";
$account=$_REQUEST['caccount'];
$sql="select rid,accountNumber from registeraccount where accountNumber=$account";
$query=mysqli_query($conn,$sql);
if(mysqli_num_rows($query)>0){
    $data=mysqli_fetch_assoc($query);
   
    $loanamount=$_REQUEST['loanamount'];
    $rate=$_REQUEST['rate'];
    $month_year=$_REQUEST['loan_time'];
    $paytime=$_REQUEST['pay_time'];
    $loan_my=intval($_REQUEST['loan_my']);
    $dt=time();
    if($paytime==12){
        $temp="Yearly";
    }
    else if($paytime==1){
        $temp="Monthly";
    }
    else if($paytime==2){
        $temp="Quaterly";
    }
    else{
        $temp="Weekly";
    }
    if($month_year==1){
        $insert="insert into loan_amount set 
        loan=$loanamount,
        rate=$rate,
        loan_time_month=$loan_my,
        emi='{$temp}',
        loandate=$dt,
        cid=$data[rid]";
        if(mysqli_query($conn,$insert)){
            echo 1;
        }
        else{
            echo 0;
        }
    }
    else{
        $insert="insert into loan_amount set 
        loan=$loanamount,
        rate=$rate,
        loan_time_year=$loan_my,
        emi='{$temp}',
        loandate=$dt,
        cid=$data[rid]";
        if(mysqli_query($conn,$insert)){
            echo 1;
        }else{
            echo 0;
        }
    }

 
}
else{
 echo "account number not match";
}


?>