<?php
require "connection.php";
$serial=1;
$searchitem=$_REQUEST['item'];
$tr='';
$sql="SELECT * from ((registeraccount r left join cusfather c on r.rid=c.cid)left join cushusband h on r.rid=h.hid)  where accountNumber like '%{$searchitem}%'

";
// $searchdata="SELECT * from registeraccount r left join cusfather f on r.rid=r.cid left join cushusband h on r.rid=h.hid  where accountNumber like '%{$searchitem}%'";
// $sql="SELECT *
//             FROM ((registeraccount LEFT JOIN cusfather ON registeraccount.rid = cusfather.cid)LEFT JOIN cushusband ON registeraccount.rid = cushusband.hid)
//              where accountNumber like '{%$searchitem%}'";
$result=mysqli_query($conn,$sql) or die("query failed");

    ?>
  <div class="row">
    <div class="col">
        <div class="table  table-responsive">
        <table class="text-center table  table-striped">
            <tr>   
            <th class="text-nowrap">Serial Number</th>
            <th>Account</th>
            <th>Name</th>
            <th class="text-nowrap">Father's Name</th>
            <th class="text-nowrap">Husband Name</th>
            <th>Age</th>
            <th class="text-nowrap">Temporary Address</th>
            <th class="text-nowrap">Permanent Address</th>
            <th>Mobile</th>
            <th>Email</th>
            <th class="text-nowrap">Aadhar Number</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Date</th>
            <th>Photo</th>
            <th class="">Action</th>
            </tr> 
    <?php
    while($data=mysqli_fetch_assoc($result)){
        if(isset($data['cFather'])){
          $cfather=$data['cFather'];
          $temp="unmarried";
        }
        else{
            
            $chusband=$data['cHusband'];
            $temp="married";
        }
        ?>

<tr>
<td><?php echo $serial?></td>
<td><?php echo $data['accountNumber'];?></td>
<td><?php echo $data['cName']?></td>
<?php
if(isset($data['cFather'])){
    ?>
    <td class="text-nowrap"><?php echo $data['cFather'];?></td>
    <td class="text-nowrap"><?php echo "Unmarried";?></td>
    <?php
}else{
    ?>
     <td class="text-nowrap"><?php echo "Status Married";?></td>
<td class="text-nowrap"><?php echo $data['cHusband'];?></td>
   
<?php
}
?>

<td class="text-nowrap"><?php echo $data['cAge'];?></td>
<td class="text-nowrap"><?php echo $data['tAddress'];?></td>
<td class="text-nowrap"><?php echo $data['pAddress'];?></td>
<td class="text-nowrap"><?php echo $data['cMobile'];?></td>
<td class="text-nowrap"><?php echo $data['cEmail'];?></td>
<td class="text-nowrap"><?php echo $data['aadharNo'];?></td>
<td class="text-nowrap"><?php echo $data['cGender'];?></td>
<td class="text-nowrap"><?php echo date('d-M-Y',$data['cDOB']);?></td>
<td class="text-nowrap"><?php echo date('d-M-Y',$data['date']);?></td>
<td class="text-nowrap"><img src="../customer_images/<?php echo $data['cPhoto'];?>.jpg" style="width:50px;"></td>



<td class="text-nowrap">
<button class="text-dark mx-2"><a href="#" class="btn btn-danger delbtn"   data-delid=<?php echo $data['rid'];?>>Delete</a></button>
    
<button class=" mx-2"><a href="#" class="editbtn2 btn btn-success" data-account=<?php echo $data['accountNumber'];?> 
                data-name=<?php echo $data['cName'];?>
                data-rid=<?php echo $data['rid'];?>
                data-age=<?php echo $data['cAge'];?>
                data-taddress=<?php echo $data['tAddress'];?>
                data-paddress=<?php echo $data['pAddress'];?>
                data-mobile=<?php echo $data['cMobile'];?>
                data-email=<?php echo $data['cEmail'];?>
                 data-aadhar=<?php echo $data['aadharNo'];?>
                 data-gender=<?php echo $data['cGender'];?>
                
                 data-dob=<?php echo date('Y-m-d',$data['cDOB']);?>
                 data-dob=<?php echo date('Y-m-d',$data['date']);?>
                 data-photo=<?php echo $data['cPhoto'];?>
                 data-file=<?php echo $data['cPhoto'];?>
                 <?php
                 if(isset($data['cHusband'])){
                    ?>
                         data-husband=<?php echo $data['cHusband'];?> 
                    <?php
                 }
                
                 ?>
                  <?php
                 if(isset($data['cFather'])){
                    ?>
                        data-father=<?php echo $data['cFather'];?>
                    <?php
                 }
                
                 ?>
                
                  >Edit</button></a></td>


<!-- <td class="text-nowrap"><a href="#">Delete</a></td>
<td class="text-nowrap"><a href="#">Edit</a></td> -->
    </tr>
<?php
        // $tr.="<tr>
        // <td class='text-nowrap'>".$serial."</td>
        // <td class='text-nowrap'>".$data['accountNumber']."</td>
        // <td class='text-nowrap'>".$data['cName']."</td>
        // <td class='text-nowrap'>".$data['cName']."</td>
        // <td class='text-nowrap'>".$data['cAge']."</td>
        // <td class='text-nowrap'>".$data['tAddress']."</td>
        // <td class='text-nowrap'>".$data['pAddress']."</td>
        // <td class='text-nowrap'>".$data['cMobile']."</td>
        // <td class='text-nowrap'>".$data['cEmail']."</td>
        // <td class='text-nowrap'>".$data['aadharNo']."</td>
        // <td class='text-nowrap'>".$data['cGender']."</td>
        // <td class='text-nowrap'>".$data['cDOB']."</td>
        // <td class='text-nowrap'><img src='../customer_images/$data[cPhoto])'></td>
        // <td class='text-nowrap'><button><a href='#'>Delete</a></button></td>
        // <td class='text-nowrap'><button><a href='#'>Edit</a></button></td>
        // </tr>";
        $serial++;
    }
    echo $tr;


?>
</div>
</div>