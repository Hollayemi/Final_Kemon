<?php
 $Agent="bet";
 include('adminHeader.php');
?>
<section class="contain">

<style>
 table{
    width:100%;
}
table, th, td {
    border: 0px solid black;
    border-collapse: collapse;
    margin-left:0%;
    margin-right:10%;
    margin-top:30px;
    margin-bottom:130px;

}
th, td {
    min-width:150px !important;
    padding: 5px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
    background-color: #fff;
}
</style>





<table id="t01" style="width:100%">
  <tr>
    <th>Pay</th>
    <th>id</th>
    <th>Agent Username</th>
    <th>Account Name</th>
    <th>Account Number</th>
    <th>Bank</th>
    <th>Phone</th>		
    <th>Email</th>
    <th>1 year</th>
    <th>6 months</th>
    <th>3 months</th>
    <th>Amount to pay</th>
    
  </tr>


<?php
    $mysqli=mysqli_connect('localhost','root','','market');

    $sql="SELECT id,agnUsername,agnAccName,agnAccNumber,Bank,accPhoneNumber,mail,1_year,6_months,3_months,counting FROM agent";
    $run=mysqli_query($mysqli,$sql);

    while($row = mysqli_fetch_assoc($run)) {
        $id                  =       $row["id"];
        $agnUsername         =       $row["agnUsername"];
        $agnAccName          =       $row["agnAccName"];
        $agnAccNumber        =       $row["agnAccNumber"];
        $Bank                =       $row["Bank"];
        $accPhoneNumber      =       $row["accPhoneNumber"];
        $mail                =       $row["mail"];
        $y1                  =       $row["1_year"];
        $m6                  =       $row["6_months"];
        $m3                  =       $row["3_months"];
        $amt2Pay             =       ($row['counting']*1200) + ($row['3_months']*1400) + ($row['6_months']*1600) + ($row['1_year']*1900);
        
        
        if(isset($_POST['delete'.$id])){
            echo "<h1>".$id."</h1>";
            $newAgnUsername = $agnUsername."s";
            $sql66="UPDATE agent SET 1_year=0,6_months=0,3_months=0,counting=0 WHERE id='$id'";
            mysqli_query($mysqli,$sql66);
        }
   
?>


    <tr>
        <td>
            <form action="<?php echo $_SERVER["PHP_SELF"]."?submitted=Paid&parentID=".$agnUsername."&amount=".$amt2Pay ?>" method="POST">
                <input type="text" value="<?php echo $id ?>" name="updateId" style="display:none">
                <input type="submit" value="Paid" name="delete<?php echo $id ?>">
            </form>
        </td>
        <td><?php echo $id ?> </td>
        <td><?php echo $agnUsername ?> </td>
        <td><?php echo $agnAccName ?> </td>
        <td><?php echo $agnAccNumber ?> </td>
        <td><?php echo $Bank ?> </td>
        <td><?php echo $accPhoneNumber ?> </td>		
        <td><?php echo $mail ?></td>        
        <td><?php echo $y1 ?></td>  
        <td><?php echo $m6 ?></td>  
        <td><?php echo $m3 ?></td>  
        <td><?php echo '&#x20A6 '.$amt2Pay ?></td>
    </tr>
  
    
<?php 
}
     
if(isset($_GET['submitted'])){
    $myErrNote = "popo";
    include_once('functions.php');
    $err = "Transaction was successful. Amount of &#x20A6 ".$_GET['amount']." as been sent to ".$_GET['parentID'];
    myMessage("notice","Paid",$err,"fa fa-money");
  }

?>

</section>
<?php include('AdminFooter.php') ?>
