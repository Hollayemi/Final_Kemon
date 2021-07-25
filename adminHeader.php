<?php 
    session_start();
    include('session.php');
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>KM-Panel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon"type="" href="fashion/n/awesome.png" style="width: 150px;">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Admin.css">
    <link rel="stylesheet" type="text/css" href="font-awesome.min.css">
    <link href="img/km.png" rel="icon">
</head>
<body>
    <div class="adm">
        <h4 class="menuBars"><i class="fa fa-bars"></i></h4>
        <?php 
            if(isset($shopReg)){
                echo"<h3> KEMON PANEL - Shops Reg</h3>";
            }elseif(isset($subscribers)){
                echo"<h3> KEMON PANEL - Subscribers</h3>";
            }elseif(isset($Agent)){
                echo"<h3> KEMON PANEL - Agents</h3>";
            }else{
                echo"<h3> KEMON PANEL</h3>";
            }
        ?>
    </div>
    <div class="leftSidenav">
        <ul class="sidenav">
            <?php
            if(isset($mainDasdboard)){
                echo '<li><a class="active" href="Admin.php"><i class="fa fa-diamond faHeader"></i>Dashboard</a></li>';
                }else{
                    echo '<li><a href="Admin.php"><i class="fa fa-diamond faHeader"></i>Dashboard</a></li>';
                }
            ?>
                <?php
            if(isset($shopReg)){
                echo '<li><a class="active" href="AdminShop_registered.php"><i class="fa fa-home faHeader"></i>Shops Registered</a></li>';
                }else{
                    echo '<li><a href="AdminShop_registered.php"><i class="fa fa-home faHeader"></i>Shops Registered</a></li>';
                }

                if(isset($subscribers)){
                echo '<li><a class="active" href="Admin_subscribers.php"><i class="fa fa-money faHeader"></i>Subscribers</a></li>';
                }else{
                    echo '<li><a href="Admin_subscribers.php"><i class="fa fa-money faHeader"></i>Subscribers</a></li>';
                }

                if(isset($Agent)){
                echo '<li><a class="active" href="Admin_agents.php"><i class="fa fa-users faHeader"></i>Agent</a></li>';
                }else{
                    echo '<li><a href="Admin_agents.php"><i class="fa fa-users faHeader"></i>Agent</a></li>';
                }
            ?>
            <li><a href="excos.php">Executives</a></li>
        </ul>
    </div>