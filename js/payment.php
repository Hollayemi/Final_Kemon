<?php
    $sKey =  $myIdFetch['sKey'];
    if(isset($_COOKIE['Code-Agent'])){
        $AgnUser     =  $_COOKIE['Code-Agent'];
        if($AgnUser != ""){
            $_SESSION['AgnUser']=$AgnUser;
            $row = allAgentByPic($conn,$AgnUser);
            $_SESSION['name']= $row['agnAccName'];
            $_SESSION['reffered']= $row['counting'];
        }
    }
    elseif(isset($_COOKIE['Agent'])){
        $AgnUser     = $_COOKIE['Agent'];
        if($AgnUser != ""){
            $_SESSION['AgnUser']=$AgnUser;
            
            $row = allAgentByPic($conn,$AgnUser);
            
            $_SESSION['name']= $row['agnAccName'];
            $_SESSION['reffered']= $row['counting'];
        }
    }
    else{
        $AgnUser = 'AgentPic/stephanyemmitty.png';
        $row = allAgentByPic($conn,$AgnUser);

        $_SESSION['name']= $row['agnAccName'];
        $_SESSION['reffered']= $row['counting'];
    }
?>
<script>
  
    function regPayPageWithPaystack(){
    //     if('<?php echo $_SESSION['name'] ?>'){
    //         alert('No agent is active')
    // }
    <?php
        $amount = $_SESSION['ProfilePayment'];
        $first_name = $_SESSION['username'];
       ?>
    const api = "pk_test_0b4537f09ca0e3bef10015f41440b242d75757e9";
    var handler = PaystackPop.setup({
      key: api,
      email: "<?php echo $_SESSION['email']; ?>",
      amount: <?php echo $amount*100; ?>,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: "<?php echo". $first_name."; ?>",
      shopname: "<?php echo $_SESSION['username']; ?>",
      phone: "<?php echo $_SESSION['phone']; ?>",
      // label: "Optional string that replaces customer email"
      metadata: {
         custom_fields: [
            {
                display_name: "Shop Name:",
                variable_name: "Shop_Name",
                value: "<?php echo  $_SESSION['username']; ?>"
            },
             {
                display_name: "Shop Line:",
                variable_name: "Shop_Line",
                value: "<?php echo  $_SESSION['phone']; ?>"
            },
             {
                display_name: "Email:",
                variable_name: "email",
                value: "<?php echo $_SESSION['email']; ?>"
            }
         ]
      },
      callback: function(response){
           const referenced = response.reference;
                document.cookie = "ref = "+referenced
		       window.location.href='gathering_important_data_for_normal_paym.php?Registration_Fee_Successfullypaid='+referenced+'&sub-crol_err-key=<?php echo $sKey?>&refferal=<?php echo $_SESSION['reffered']?>';
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
  
  
 
    
  
  function payPageWithPaystackfor3mth(){
    <?php
        $amount = $_SESSION['month3'];
    ?> 
            const api = "pk_test_0b4537f09ca0e3bef10015f41440b242d75757e9";
                var handler = PaystackPop.setup({
                  key: api,
                  email: "<?php echo $_SESSION['email']; ?>",
                  amount: <?php echo $amount*100; ?>,
                  currency: "NGN",
                  ref: ''+Math.floor((Math.random() * 1000000000) + 1),//generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                  firstname: "<?php echo". $first_name."; ?>",
                  shopname: "<?php echo $_SESSION['username']; ?>",
                  phone: "<?php echo $_SESSION['phone']; ?>",//label:"Optional string that replaces customer email"
                  metadata: {
                    custom_fields: [
                        {
                            display_name: "Shop Name:",
                            variable_name: "Shop_Name",
                            value: "<?php echo  $_SESSION['username']; ?>"
                        },
                        {
                            display_name: "Shop Line:",
                            variable_name: "Shop_Line",
                            value: "<?php echo  $_SESSION['phone']; ?>"
                        },
                        {
                            display_name: "Email:",
                            variable_name: "email",
                            value: "<?php echo $_SESSION['email']; ?>"
                        }
                    ]
                  },
                  callback: function(response){
                      const referenced = response.reference;
                      window.location.href='gathering_important _data_for_the_user_for_3_months.php?sg-ref-kcl='+ referenced+'&agent=<?php echo $_SESSION['name'] ?>&sub-crol_err-key=<?php echo $sKey?>&efri-fsf=<?php echo $_SESSION['reffered']?>';
                  },
                  onClose: function(){
                      alert('window closed');         
                  }
                });
                handler.openIframe();
              }



              function payPageWithPaystackfor6mth(){
    <?php
        $amount = $_SESSION['month6'];
      ?> 
            const api = "pk_test_0b4537f09ca0e3bef10015f41440b242d75757e9";
                var handler = PaystackPop.setup({
                  key: api,
                  email: "<?php echo $_SESSION['email']; ?>",
                  amount: <?php echo $amount*100; ?>,
                  currency: "NGN",
                  ref: ''+Math.floor((Math.random() * 1000000000) + 1),//generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                  firstname: "<?php echo". $first_name."; ?>",
                  shopname: "<?php echo $_SESSION['username']; ?>",
                  phone: "<?php echo $_SESSION['phone']; ?>",//label:"Optional string that replaces customer email"
                  metadata: {
                    custom_fields: [
                        {
                            display_name: "Shop Name:",
                            variable_name: "Shop_Name",
                            value: "<?php echo  $_SESSION['username']; ?>"
                        },
                        {
                            display_name: "Shop Line:",
                            variable_name: "Shop_Line",
                            value: "<?php echo  $_SESSION['phone']; ?>"
                        },
                        {
                            display_name: "Email:",
                            variable_name: "email",
                            value: "<?php echo $_SESSION['email']; ?>"
                        }
                    ]
                  },
                  callback: function(response){
                      const referenced = response.reference;
                      window.location.href='gathering_important_data_for_the_user_for_6_months.php?sg-ref-kcl='+ referenced+'&subscriber\'s-name=<?php echo $_SESSION['name'] ?>&sub-crol_err-key=<?php echo $sKey?>&refferal=<?php echo $_SESSION['reffered']?>';
                      

                  },
                  onClose: function(){
                      alert('window closed');         
                  }
                });
                handler.openIframe();
              }






              function payPageWithPaystackfor1year(){
    <?php
        $amount = $_SESSION['year1'];
          ?> 
            const api = "pk_test_0b4537f09ca0e3bef10015f41440b242d75757e9";
                var handler = PaystackPop.setup({
                  key: api,
                  email: "<?php echo $_SESSION['email']; ?>",
                  amount: <?php echo $amount*100; ?>,
                  currency: "NGN",
                  ref: ''+Math.floor((Math.random() * 1000000000) + 1),//generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                  firstname: "<?php echo". $first_name."; ?>",
                  shopname: "<?php echo $_SESSION['username']; ?>",
                  phone: "<?php echo $_SESSION['phone']; ?>",//label:"Optional string that replaces customer email"
                  metadata: {
                    custom_fields: [
                        {
                            display_name: "Shop Name:",
                            variable_name: "Shop_Name",
                            value: "<?php echo  $_SESSION['username']; ?>"
                        },
                        {
                            display_name: "Shop Line:",
                            variable_name: "Shop_Line",
                            value: "<?php echo  $_SESSION['phone']; ?>"
                        },
                        {
                            display_name: "Email:",
                            variable_name: "email",
                            value: "<?php echo $_SESSION['email']; ?>"
                        }
                    ]
                  },
                  callback: function(response){
                      const referenced = response.reference;
                      window.location.href='gathering_important _data_for_the_user_for_a_year_subscription.php?sg-ref-kcl='+ referenced+'&subscriber\'s-name=<?php echo $_SESSION['name'] ?>&sub-crol_err-key=<?php echo $sKey?>&refferal=<?php echo $_SESSION['reffered']?>';

                  },
                  onClose: function(){
                      alert('window closed');         
                  }
                });
                handler.openIframe();
              }
          </script>