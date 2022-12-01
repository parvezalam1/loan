<?php

if(isset($_REQUEST['pay'])){
    $serial=1;
    require "connection.php";
    $searchitem=$_REQUEST['item'];
    $tr='';
    $output='';
    $sql="SELECT * from (registeraccount r left join emi e on r.rid=e.cid)  where accountNumber like '%{$searchitem}%'";
    $res=mysqli_query($conn,$sql) or die("query filed");
    if(mysqli_num_rows($res)>0){
        $output="
        <div class='table table-responsive'>
        <table class='table table-striped'><tr class='bg-dark'>
        <div class='bg-dark'>
        <th class='text-nowrap text-center text-info'>Serial Number</th>
        <th class='text-nowrap text-center text-danger'>customer Name</th>
        <th class='text-nowrap text-center text-warning'>Address</th>
        <th class='text-nowrap text-center text-light'>Mobile Number</th>
        <th class='text-nowrap text-center text-danger'>Account Number</th>
        <th class='text-nowrap text-center text-warning'>EMI</th>
        <th class='text-nowrap text-center text-warning'>EMI Date</th>
        </div>
        </tr>";
    while($data=mysqli_fetch_assoc($res)){
        // if($data['loan_time_year']!=NULL){
        //     $dd=date('d',$data['loandate']);
        //     $mm=date('M',$data['loandate']);
        //     $yy=date('Y',$data['loandate']);
        //     $y=$data['loan_time_year'];
        //     $date=date_create("$yy-$mm-$dd");
        //     date_add($date,date_interval_create_from_date_string("$y years"));
        //     $year= date_format($date,'d-M-Y');
        // }else{
        //     $dd=date('d',$data['loandate']);
        //     $mm=date('M',$data['loandate']);
        //     $yy=date('Y',$data['loandate']);
        //     $m=$data['loan_time_month'];
        //     $date=date_create("$yy-$mm-$dd");
        //     date_add($date,date_interval_create_from_date_string("$m month"));
        //     $year= date_format($date,'d-M-Y');
        // }
    
     $output.="<tr>
     <td class='text-nowrap text-center'>{$serial}</td>
    <td class='text-nowrap text-center'>{$data['cName']}</td>
    <td class='text-nowrap text-center'>{$data['pAddress']}</td>
    <td class='text-nowrap text-center'>{$data['cMobile']}</td>
    <td class='text-nowrap text-center'>{$data['accountNumber']}</td>
    <td class='text-nowrap text-center'>{$data['pay_emi']}</td>
    <td class='text-nowrap text-center'>".date('d-M-Y D',$data['emidate'])."</td>
  
    </tr>";
    $serial++;
    }
    $output.="</table></div>";
    echo $output;
    }else{
        echo "not account match";
    }
}

if(isset($_REQUEST['loan'])){
$serial=1;
require "connection.php";
$searchitem=$_REQUEST['item'];
$tr='';
$output='';
$sql="SELECT * from (registeraccount r left join loan_amount l on r.rid=l.cid)  where accountNumber like '%{$searchitem}%'";
$res=mysqli_query($conn,$sql) or die("query filed");
if(mysqli_num_rows($res)>0){
    $output="
    <div class='table table-responsive'>
    <table class='table table-striped'><tr class='bg-dark'>
    <div class='bg-dark'>
    <th class='text-nowrap text-center text-info'>Serial Number</th>
    <th class='text-nowrap text-center text-danger'>customer Name</th>
    <th class='text-nowrap text-center text-warning'>Address</th>
    <th class='text-nowrap text-center text-light'>Mobile Number</th>
    <th class='text-nowrap text-center text-danger'>Account Number</th>
    <th class='text-nowrap text-center text-info'>Loan Amount</th>
    <th class='text-nowrap text-center text-light'>Loan Rate</th>
    <th class='text-nowrap text-center text-warning'>Loan Date</th>
    <th class='text-nowrap text-center text-warning'>Loan End Date</th>
    </div>
    </tr>";
while($data=mysqli_fetch_assoc($res)){
    if($data['loan_time_year']!=NULL){
        $dd=date('d',$data['loandate']);
        $mm=date('M',$data['loandate']);
        $yy=date('Y',$data['loandate']);
        $y=$data['loan_time_year'];
        $date=date_create("$yy-$mm-$dd");
        date_add($date,date_interval_create_from_date_string("$y years"));
        $year= date_format($date,'d-M-Y');
    }else{
        $dd=date('d',$data['loandate']);
        $mm=date('M',$data['loandate']);
        $yy=date('Y',$data['loandate']);
        $m=$data['loan_time_month'];
        $date=date_create("$yy-$mm-$dd");
        date_add($date,date_interval_create_from_date_string("$m month"));
        $year= date_format($date,'d-M-Y');
    }

 $output.="<tr>
 <td class='text-nowrap text-center'>{$serial}</td>
<td class='text-nowrap text-center'>{$data['cName']}</td>
<td class='text-nowrap text-center'>{$data['pAddress']}</td>
<td class='text-nowrap text-center'>{$data['cMobile']}</td>
<td class='text-nowrap text-center'>{$data['accountNumber']}</td>
<td class='text-nowrap text-center'>{$data['loan']}</td>
<td class='text-nowrap text-center'>{$data['rate']}</td>
<td class='text-nowrap text-center'>".date('d-M-Y',$data['loandate'])."</td>
<td class='text-nowrap text-center'>".$year."</td>
</tr>";
$serial++;
}
$output.="</table></div>";
echo $output;
}else{
    echo "not account match";
}
}
?>