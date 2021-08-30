<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="./img/myKemon.png" rel="apple-touch-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../loader.css">
    <link href="../img/km.png" rel="icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <title>. . .</title>
</head>
<body class="cover">
    <?php  
        include('session.php');
        $real_id       =  $myId;
        $username      =    $myIdFetch['username'];
    ?>
     
        <div id="loadingFrame"> 
            <h1 class="Kemon"><span class="k">K</span><span class="e">E</span><span class="m">M</span><span class="o">O</span><span class="n">N</span></h1>
            <?php 
                if($myIdFetch['page_exist'] < 1){
                    echo '<h5 class="loading">Creating your website...</h5>';
                }else{
                    echo "<h5 class='loading'>Checking autoralizati...</h5>";
                }
            ?>
        </div>
       
<?php

if(!empty($myId)){
    if (TRUE){
        $user_id = $myId;
        $username = $myIdFetch['username'];
        $profile = "True";
        $paif = false;
        $nwe = 0;
        
        // echo $_SESSION['page_exist'];
    
        $emailName = $_SESSION['user'];
        if($myIdFetch['page_exist'] < 1){
            $shop_nick    =    ucwords($shop_nick);
            $mylink       = $myIdFetch['id']+30;
            $type = 'sugu';
            if(setDefaultStorage($conn,$myId) && setDefaultTemplate($conn,$myId,$type) && setDefaultPicture($conn,$myId))
            {
                mkdir('../up/'.$shop_nick);
                mkdir('../up/'.$shop_nick.'/pic');
                mkdir('../up/'.$shop_nick.'/cp');
                mkdir('../up/'.$shop_nick.'/pg');
                mkdir('../up/'.$shop_nick.'/tb');
                mkdir('../up/'.$shop_nick.'/usersTeam');

                $eventType = "Creation";
                $myAction = "Created";
                $activity = "Your store has been created and ready for modification";
                updateActivite($conn,$eventType,$myAction,$myId,$activity);
                $eventType = "Verification";
                $myAction = "Verified";
                $activity = "Payment has been accepted. Note, your account is not accessible. 
                Create at least a brand page, two products page and 10 pictures. You are welcome!!!";
                updateActivite($conn,$eventType,$myAction,$myId,$activity);


                $NewPageFile  =  '../up/'.$shop_nick.'/'.$shop_nick.'.php';
                $contents ="<?php include('../sugu/st/Home.php')?>";            
                if(file_put_contents($NewPageFile,$contents)){ }

                if(require_once('../functions.php')){
                    copyFolder("../img/profile","../up/".$shop_nick);
                }
                
                if(setPageExistence($conn,$myId))
                {
                
                    if(isset($_GET['subscription_was_successfulpaid'])){
                        header('Refresh: 5;'.$username.($user_id+30).'.php?transaction=successful');
                    }else{
                        header('Refresh: 5;'.$username.($user_id+30).'.php?done');
                    }
                }
            }else{
                echo "unexpected err";
            }
        }else{
            if(isset($_GET['subscription_was_successfulpaid'])){
                header('Refresh: 5;'.$username.($myId+30).'.php?transaction=successful&ref='.$_GET['rreef']);
            }elseif(isset($_GET['successfullypaid'])){
                header('Refresh: 5;'.$username.($myId+30).'.php?transaction=successful&ref='.$_GET['rreef'].'&type=register');
            }else{
                header('Refresh: 5;'.$username.($myId+30).'.php?done');
            }
        }    
    }
}else{
    header('Location:../exp.php');
}
?>
</body>
</html>