<?php
// $loan_year=$_REQUEST['loan_year'];
// $rate=$_REQUEST['rate'];
// $stolement=$_REQUEST['stolement'];
// $loan=$_REQUEST['loan'];
// echo $loan;
if($_REQUEST['stolement']!='' && $_REQUEST['loan']!='' && $_REQUEST['loan_year']!='' && $_REQUEST['rate']!=''){
     $l=$_REQUEST['loan'];
     $y=$_REQUEST['loan_year'];
     $r=intval($_REQUEST['rate']);
     $s=$_REQUEST['stolement'];
     if($y==365)
     {
        $si=($l/100)*1*$r;
        $addition=$l+$si;
        $stolement=floor(($y/$s));
        $stoamount=($addition/$stolement);
     }
     else if($y==730)
     {
        $si=($l/100)*2*$r;
        $addition=$l+$si;
        $stolement=floor(($y/$s));
        $stoamount=($addition/$stolement);
     }
     
     ?>
     <div class="row">
    <div class="col-md-6 text-center">Simple Interest</div>
        <div class="col-md-6"><input type="number" value="<?php echo $si;?>" id="account" placeholder="Customer Account" class="w-100 text-center" ></div>
    </div>
    <div class="row">
    <div class="col-md-6 text-center">Addition Amount</div>
        <div class="col-md-6"><input type="number" value="<?php echo $addition;?>" placeholder="Customer Account" class="w-100 text-center"></div>
    </div>
    <div class="row">
    <div class="col-md-6 text-center">Istolment Pay Time</div>
        <div class="col-md-6"><input type="number" value="<?php echo $stolement;?>" placeholder="Customer Account" class="w-100 text-center"></div>
    </div>
    <div class="row">
    <div class="col-md-6 text-center">Istolment Amount</div>
        <div class="col-md-6"><input type="number" value="<?php echo $stoamount;?>" placeholder="Customer Account" class="w-100 text-center"></div>
    </div>
    <?php
}
?>