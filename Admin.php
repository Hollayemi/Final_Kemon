<?php
$mainDasdboard = "Adko";
include('adminHeader.php');
?>



<section class="content" >
<h3>Total Registered</h3> <br><br><br>
    <div>
        <a href="AdminShop_registered.php" style="text-decoration:none;">
                <h4>Shop Registered</h4>           
                <h5><?php echo $_SESSION['tot_shop_reg']?></h5>
        </a>
        <a href="Admin_agents.php" style="text-decoration:none">
            
                <h4>Agents Registered</h4>
                <h5><?php echo $_SESSION['tot_agn_reg']?><br><br></h5>
        </a>
        <a href="#" style="text-decoration:none;">
                <h4>Total Registered</h4>
                <h5><?php echo $_SESSION['tot_shop_reg']+ $_SESSION['tot_agn_reg']?></h5>
                 
        </a>
    </div>
<br><br><br><br>
<!-------------------------------------2--------------------------------------->
<h3 >Subscribers</h3> <br><br><br>

    <div >
        <a href="Admin_subscribers.php">
            <h4>1 year Subscribers</h4>
            <h5><?php echo $_SESSION['type_of_sub_for_year'];?></h5>
        </a>
        <a href="Admin_subscribers.php">
            <h4>6 months Subscribers</h4>
            <h5><?php echo $_SESSION['type_of_sub_for_6months']?></h5>
        </a>

        <a href="Admin_subscribers.php">
            <h4>3 months Subscribers</h4>
            <h5><?php echo $_SESSION['type_of_sub_for_3months']?></h5>
        </a>
    </div><br><br><br>

    <!-------------------------------------2--------------------------------------->
<h3>Agents Payments and Award</h3> <br><br><br>

<div >
    <a href="Admin_agents.php">
            <h4>Agents to Pay </h4>
            <h5><?php echo $_SESSION['counting5']?></h5>
    </a>



    <a href="Admin_agents.php">
        <h4>Agents with over 20 referrals</h4>
        <h5><?php echo $_SESSION['bestReferrals']?></h5>
    </a>


    <a href="Admin_agents.php" >
        <h4>Total Agent</h4>
        <h5><?php echo $_SESSION['tot_agn_reg']?></h5>
    </a>

   
</div><br><br><br><br><br><br>

</section>
<?php include('AdminFooter.php') ?>