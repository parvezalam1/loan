<?php
session_start();
if(!isset($_SESSION['useremail']))
header("location:../all_files/loginpage.php");
?>
<?php
$paytime=$_REQUEST['paytime'];
if($paytime==1){
$view="Monthly";
}else if($paytime==2){
    $view="Quaterly";
}else if($paytime==4){
    $view="Weekly";
}
else if($paytime==12){
    $view="Yearly";
}
$loan=$_REQUEST['loan'];
$temp=$loan;
$number=1;
$rate=$_REQUEST['rate'];
// $time_increase=0;
$year2=$_REQUEST['year2'];
$year1=$_REQUEST['year1'];
// $time_increase=$year2*$year1*$paytime;

// $mounthly_interest_rate=(($rate/12)/100)/$paytime;
// $emi=ceil(($loan*$mounthly_interest_rate)*(pow(1+$mounthly_interest_rate,$time_increase)/(pow(1+$mounthly_interest_rate,$time_increase)-1)));

$saif=0;
if($paytime==12){
    $time=1*$year2;
    $loan_interest_rate_yearly=($rate/$year2)/100;
     $emi=floor(($loan*$loan_interest_rate_yearly)*(pow(1+$loan_interest_rate_yearly,$time)/(pow(1+$loan_interest_rate_yearly,$time)-1)));
    $saif=1;
    }
    else{
        $loan_monthly_interest_rate=(($rate/12)/100)/$paytime;
        $time=$year1*$year2*$paytime;
        $emi=ceil(($loan*$loan_monthly_interest_rate)*(pow(1+$loan_monthly_interest_rate,$time)/(pow(1+$loan_monthly_interest_rate,$time)-1)));
    
    }


?>

<!-- <div class="container d-flex justify-content-center">
<div class="row">
<div class="col">
<span></span>
</div>
</div>
<div class="row">
<div class="col">
<table style="border:1px solid black;" class="table-bordered table-striped upload_table bg-success" cellpadding="5px">
  -->
<div class="row rowid">
<div class="col colfixed position-fixed mt-2" >

<tr>
<th colspan="5" align="center" style="text-align:center;" class="bg-info">Repayment Schedule</th>
</tr>
<tr>
<th colspan="2" style="text-align:center;">Loan Amount</th>
<th colspan="2" style="text-align:center;">Interest Rate</th>
<th style="text-align:center;" >Tenure</th>
</tr>
<tr>
<td colspan="2" style="text-align:center;"><?php echo $temp;?></td>
<td colspan="2" style="text-align:center;"><?php echo $rate."%";?></td>
<td style="text-align:center;"><?php echo $year2." Years";?></td>
</tr>
<tr>
<th colspan="3" style="text-align:right;">Chart View</th><th style="text-align:left;"><?php echo $view;?></th>
</tr>
<tr>
<th class=" text-nowrap text-center" >EMI #</th>
<th  class="text-nowrap text-center">EMI</th>
<th class="  text-nowrap text-center">principle</th>
<th class=" text-nowrap text-center">Interest</th>
<th class=" text-nowrap text-center">Balance</th>
</tr>
</div>
</div>
<?php
while($time>0){
    if($saif==1){
        $loan_interest_yearly=$loan*$loan_interest_rate_yearly;
        $emi2=$emi-$loan_interest_yearly;
        // $add+=$loan_interest_yearly;
        $loan=$loan-$emi2;
        $lo=$loan_interest_yearly;
    
    }else{
     $loan_interest_monthly=$loan*$loan_monthly_interest_rate;
    //  $add+=$loan_interest_monthly;
    $emi2=$emi-$loan_interest_monthly;
     $loan=$loan-$emi2;
     $lo=$loan_interest_monthly;
     
    }
     
  
    // $monthly_interest=$loan*$mounthly_interest_rate;
    // $emi2=$emi-$monthly_interest;
    // $loan=$loan-$emi2;
    if($loan<0){
        $loan=0;
    }
?>
<!-- <div class="row">
    <div class="col"> -->

<tbody>
<tr>
<td class="text-center"><?php echo $number;?></td>
<td class="text-center"><?php echo floor($emi);?></td>
<td class="text-center"><?php echo ceil($emi2);?></td>
<td class="text-center"><?php echo ceil($lo);?></td>
<td class="text-center"><?php echo ceil($loan);?></td>
</tr>
</tbody>
<?php
$time--;
$number++;
}

?>
<!-- </table>
</div>
</div></div>
<?php
?> -->


