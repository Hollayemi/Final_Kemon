<?php
  session_start();
  $mysqli=mysqli_connect('sql105.epizy.com','epiz_28257429','BHiMYLgFzV3pjb','epiz_28257429_market');
  $amount = 2000;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <link rel="stylesheet" type="text/css" href="Register.css">
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" href="test.css">
  <link rel="shortcut icon"type="" href="pic/kemon.png" style="width: 150px;">
  <!-- <link rel="stylesheet" href="bootstrap-4.5.0/dist/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="font-awesome.min.css">
  <title>Subscribe</title>
  <script src="jquery-3.3.1.slim.min.js" ></script>
  <script src="popper.min.js" ></script>
  <!-- <script src="bootstrap-4.5.0/dist/js/bootstrap.min.js" ></script> -->
  <script src="https://js.paystack.co/v1/inline.js"></script>
</head>
<body style="background-color:#00b8e6; text-align:center;margin-top:15%">
<h2>Hi <?php echo $_SESSION['shop_name'];?>, You are about to make three month subscription with token of <?php echo $_SESSION['month3']?></h2><br>
<form action="" method="POST">
  <input type="text" name="refer" placeholder="Agent Username" required style="width:35% !important; margin-left:33%"><br>
  <script src="https://js.paystack.co/v1/inline.js"></script>
  
 <?php 
 $bbu = $_SESSION['user_info_id'];
 
 $rem_sql0 = "SELECT Subscribed FROM users WHERE id = '$bbu'";
  $rem_run0 = mysqli_query($mysqli,$rem_sql0);
  $rems = mysqli_fetch_array($rem_run0);

  if($rems['Subscribed']==0){
  echo '<button type="submit" onclick="payPageWithPaystack()"> Proceed </button>';
  echo '<h5 style="font-size:15px"><i>click proceed three times to continue with your payment</i></h5>';
  }else{
    echo '<button name="sub" type="submit" onclick="alert(\'Already Subscribed, with '.$_SESSION['daysLeft'].' days left \')"> Proceed </button>';
  }
  ?>
</form>
 <?php
 $first_name = $_SESSION['firstname']
 ?>
<script>
 
  function payPageWithPaystack(){
    <?php

        if(isset($_POST['sub'])){
          $AgnUser     =  $mysqli->real_escape_string($_POST['refer']);
          if($AgnUser != ""){
          $_SESSION['AgnUser']=$AgnUser;
          $sql = "SELECT * from Agent WHERE agnUsername='$AgnUser'";
          $run=mysqli_query($mysqli,$sql);
          $row = mysqli_fetch_assoc($run);
        
          $_SESSION['name']= $row['agnAccName'];
          $_SESSION['reffered']= $row['counting'];
          }
        }
?>


const api = "pk_test_0b4537f09ca0e3bef10015f41440b242d75757e9";
    var handler = PaystackPop.setup({
      key: api,
      email: "<?php echo $_SESSION['email']; ?>",
      amount: <?php echo $amount*100; ?>,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: "<?php echo". $first_name."; ?>",
      shopname: "<?php echo $_SESSION['shop_name']; ?>",
      phone: "<?php echo $_SESSION['phone']; ?>",
      // label: "Optional string that replaces customer email"
      metadata: {
         custom_fields: [
            {
                display_name: "Shop Name:",
                variable_name: "Shop_Name",
                value: "<?php echo  $_SESSION['shop_name']; ?>"
            },
             {
                display_name: "Shop Line:",
                variable_name: "Shop_Line",
                value: "<?php echo  $_SESSION['phone']; ?>"
            },
             {
                display_name: "Phone Number:",
                variable_name: "phone_number",
                value: "<?php echo $_SESSION['phone']; ?>"
            },
             {
                display_name: "City",
                variable_name: "Shop_City",
                value: "<?php echo  $_SESSION['city']; ?>"
            }
         ]
      },
      callback: function(response){
           const referenced = response.reference;
		       window.location.href='gathering_important _data_for_the_user_for_3_months.php?Registration_Fee_Successfullypaid='+ referenced+<?php echo "'__".$_SESSION['name'].'-'.$_SESSION['reffered']."'"?>;

      },
      onClose: function(){
          alert('window closed');


          
      }
    });
    handler.openIframe();
  }

  
</script>
</body>
</html>