<?php

if($_REQUEST['g']=='Married'){
    echo "<div class='row'>
    <div class='col-md-6'><h5 class='text-center'>Married Confirmation</h5></div>
    <div class='col-md-6'>
    <div class='row'>
    <div class='col-md-6'><input type='radio' id='boy' name='sta' value='man'> <label for='boy'>Man</label></div>
    <div class='col-md-6'><input type='radio' id='girl' name='sta' value='woman'> <label for='girl'>Woman</label></div>
    </div>
    </div>
    </div>";
}
else if($_REQUEST['g']=='Unmarried' || $_REQUEST['g']=='Single'){
    echo "<div class='row'>
    <div class='col-md-6 text-center'><h5>Customer Father's Name</h5></div>
    <div class='col-md-6 text-center'><input type='text' name='cfather' class='w-100 text-center' placeholder='Customer Father&#039;s Name'></div>
    </div>";
}
else if($_REQUEST['g']=='man'){
    echo "<div class='row'>
    <div class='col-md-6 text-center'><h5>Customer Father's Name</h5></div>
    <div class='col-md-6 text-center'><input type='text' name='cfather' class='w-100 text-center' placeholder='Customer Father&#039;s Name'></div>
    </div>";
}
else if($_REQUEST['g']=='woman'){
    echo "<div class='row'>
    <div class='col-md-6 text-center'><h5>Customer Husband Name</h5></div>
    <div class='col-md-6 text-center'><input type='text' name='chusband' class='w-100 text-center' placeholder='Customer Husband Name'></div>
    </div>";
}

?>