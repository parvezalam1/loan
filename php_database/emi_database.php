<head>

<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.css">
<style>
.convert ul{
    display:none;
    position: relative;
    top:3px;
    left:0px;
}
ul li:hover{
background-color:gray;
}
</style>
</head>
<?php
$start_time=date('d-F-Y',time());


$tr='';
$saif=0;
$loan_amount=$_REQUEST['loanamount'];
$temp=$loan_amount;
$add=0;
$loan_year=$_REQUEST['loanyear'];
$loan_rate=$_REQUEST['loanrate'];
$loan_year2=$_REQUEST['loanyear2'];
$paytime=$_REQUEST['paytime'];
if($loan_year==1){
    $y=date('Y',time());
    $m=date('M',time());
    $d=date('d',time());
    $m2=$loan_year2;
    $date=date_create("$m-$d-$y");
    date_add($date,date_interval_create_from_date_string("$m2 month"));
    $monthly=date_format($date,"d-F-Y");

}else if($loan_year==12){
    $y=date('Y',time());
    $m=date('M',time());
    $d=date('d',time());
    $y2=$loan_year2;
    $date=date_create("$m-$d-$y");
    date_add($date,date_interval_create_from_date_string("$y2 years"));
    $monthly=date_format($date,"d-F-Y");
    
}
if($paytime==12){
$time=1*$loan_year2;
$loan_interest_rate_yearly=($loan_rate/$loan_year2)/100;
$emi=floor(($loan_amount*$loan_interest_rate_yearly)*(pow(1+$loan_interest_rate_yearly,$time)/(pow(1+$loan_interest_rate_yearly,$time)-1)));
$saif=1;
}
else{
    $loan_monthly_interest_rate=(($loan_rate/12)/100)/$paytime;
    $time=$loan_year*$loan_year2*$paytime;
    $emi=ceil(($loan_amount*$loan_monthly_interest_rate)*(pow(1+$loan_monthly_interest_rate,$time)/(pow(1+$loan_monthly_interest_rate,$time)-1)));

}

// $loan_interest_monthly=$loan_amount*$loan_monthly_interest_rate;
while($time>0){
    if($saif==1){
        $loan_interest_yearly=$loan_amount*$loan_interest_rate_yearly;
        $emi2=$emi-$loan_interest_yearly;
        $add+=$loan_interest_yearly;
        $loan_amount=$loan_amount-$emi2;
       
    }else{
     $loan_interest_monthly=$loan_amount*$loan_monthly_interest_rate;
     $add+=$loan_interest_monthly;
    $emi2=$emi-$loan_interest_monthly;
     $loan_amount=$loan_amount-$emi2;
    
    }
     
    $time--;
 
}
?>
<div class="row">
<div class="col-6">
<h6 class="text-center text-uppercase">Loan Start Date</h6>
</div>
<div class="col-6 text-center">
<h6 class="text-center"><?php echo $start_time;?></h6>
</div>
</div>
<div class="row">
<div class="col-6">
<h6 class="text-center text-uppercase">emi</h6>
</div>
<div class="col-6 text-center">
<h6 class="text-center"><?php echo floor($emi);?></h6>
</div>
</div>
<div class="row">
<div class="col-6">
<h6 class="text-center">Total Interest</h6>
</div>
<div class="col-6 text-center">
<h6 class="text-center"><?php echo floor($add);?></h6>
</div>
</div>
<div class="row">
<div class="col-6">
<h6 class="text-center">Total Amount
<span>&lang;Principal+Interest&rang;</span>
</h6>
</div>
<div class="col-6 text-center">
<h6 class="text-center"><?php echo floor($temp+$add);?></h6>
</div>
</div>
<div class="row">
<div class="col">
<h6 class="text-center">EMI End Date</h6>
</div>
<div class="col">
<h6 class="text-center"><?php echo $monthly;?></h6>
</div>
</div>
<div class="row">
<div class="col d-flex justify-content-end ">
<i class="fa fa-user-circle fa-lg m-2 myicon" aria-hidden="true" data-loan=<?php echo $temp;?> ,
data-rate=<?php echo $loan_rate;?> ,
data-year1=<?php echo $loan_year;?>,
data-year2=<?php echo $loan_year2;?>,
data-paytime=<?php echo $paytime;?>
>
</i>
<i class="fa fa-file fa-lg m-2 convert" aria-hidden="true">
<ul class="list-unstyled list-group">
<li class="list-group-item"><i class="fa fa-file-excel-o" aria-hidden="true"></i><a href="" onclick="excel()">Excel</a></li>
<li class="list-group-item"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>pdf</li>
<li class="list-group-item"><i class="fa fa-file-o" aria-hidden="true"></i>Both</li>
</ul>
</i>
</div>
</div>;
<?php
// }
// $arr=array('table'=>'$tr','div'=>'$div');
// $encode=json_encode($arr);
// echo $encode;
?>


<script>
function excel(){
    alert('excel');
}
</script>


