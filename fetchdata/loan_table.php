<?php
session_start();
if(!isset($_SESSION['useremail']))
header("location:../all_files/loginpage.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="../bootstrap5/css/bootstrap.css">
    <link rel='stylesheet' href="../style/loan_table.css">
    <title>loan table</title>
</head>
<body>

<div class="container">
<!-- <div class="row">
<div class="col">
<h5 class="text-center bg-dark text-light position-absolute">Customer Loan</h5>
</div>
</div> -->
<div class="row">
<div class="col">
<div class="row">
<div class="col">
<h5 class="text-center bg-dark text-light text-uppercase">Customer Loan table</h5>
</div>
</div>
<div class="row">
    <div class="col text-center text-light p-2 d-sm-flex justify-content-end">
    <input type="text" name="search" id="search" class="text-center px-4 border-dark text-weight-bold" placeholder="Search Record">
    </div>
    </div>
    <div class="insert">
    
</div>
<div class="table tablehide table-responsive ">

<table class="table table-striped">
<tr class="text-center text-nowrap bg-dark">
<th class="text-info">Serial Number</th>
<th class="text-danger">Customer Name</th>
<th class="text-light">Address</th>
<th class="text-info">Mobile Number</th>
<th class="text-primary">Account Number</th>
<th class="text-info">Loan Amount</th>
<th class="text-info">Loan Rate</th>
<th class="text-warning">Loan Date</th>
<th class="text-warning">Loan End Date</th>
</tr>
<?php
$tr='';
$serialNumber=1;
include "../php_database/connection.php";
$select="select * from loan_amount l inner join registeraccount r on l.cid=r.rid";
$result=mysqli_query($conn,$select);
while($data=mysqli_fetch_assoc($result)){
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
$tr.="
<tr class='text-center'><td>".$serialNumber."</td>
<td class='text-nowrap'>".$data['cName']."</td>
<td class='text-nowrap'>".$data['pAddress']."</td>
<td class='text-nowrap'>".$data['cMobile']."</td>
<td class='text-nowrap'>".$data['accountNumber']."</td>
<td class='text-nowrap'>".$data['loan']."</td>
<td class='text-nowrap'>".$data['rate']."%</td>
<td class='text-nowrap'>".date('d-M-Y',$data['loandate'])."</td>
<td class='text-nowrap'>".$year."</td>
</tr>";
$serialNumber++;
}

echo $tr;
?>
</div>
</table>
</div>
</div>
</div>
</body>
</html>


<script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript">
$(function(){
$('#search').on('keyup',function(){
    $('.tablehide').hide();
    // $('.row ').html('');
var search=$(this).val();
var loan=1;
$.ajax({
url:"../php_database/searchloan.php",
type:"POST",
data:{item:search,loan:loan},
success:function(data){
    $('.insert').html("");
$('.insert').html(data);
}
});
});
});

</script>