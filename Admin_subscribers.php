<?php
 $subscribers="whj";
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
    <th>Usernames</th>
    <th>Emails</th>
    <th>Shops Subscribed</th>
    <th>Expires on</th>
    <th>Subscribed on</th>
    <th>Days Left</th>
    <th>Type of subscription</th>
  </tr>


<?php
    $mysqli=mysqli_connect('localhost','root','','market');

    $sql="SELECT username,email,shop,Date_expired,Date_subscribed,type_of_sub,Days_left FROM subscribers";

    $run=mysqli_query($mysqli,$sql);

    function Delete($id) {
        $sql="DELETE * FROM users WHERE id='$id'";
        mysqli_query($mysqli,$sql);
    }

    while($row = mysqli_fetch_assoc($run)) {
        $Usernames          =       $row["username"];
        $Emails             =       $row["email"];
        $Shops              =       $row["shop"];
        $Expire             =       $row["Date_expired"];
        $Subscribed         =       $row["Date_subscribed"];
        $Days               =       $row['Days_left'];
        $Type               =       $row["type_of_sub"];
        
        
        
   
?>


    <tr>
        <td><?php echo $Usernames ?> </td>
        <td><?php echo $Emails ?> </td>
        <td><?php echo $Shops ?> </td>
        <td><?php echo $Expire ?> </td>		
        <td><?php echo $Subscribed ?> </td>		
        <td><?php echo $Days ?> </td>	
        <td><?php echo $Type ?></td>        
    </tr>
  
    
<?php 

    
}
     


?>

</section>
<?php include('AdminFooter.php') ?>