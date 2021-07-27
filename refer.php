<?php
    if(isset($_POST['agentCode'])){
        $AgnUsers = htmlentities($_POST['nameToSet']);
        
        $row = allAgentByName($conn,$myId,$agnName);
        if(isset($row['agnPic'])){
            if(!isset($_COOKIE['Code-Agent'])){
                    
                $_SESSION['name']= $row['agnPic'];
                $_SESSION['reffered']= $row['counting'];
                $pp =  $_SESSION['name'];
                setcookie('Code-Agent',$pp, time()+3600);
            }else{
                header('Location:Register.php');

            }
        }else{
            header('Location:Register.php?_vagent=abs');
        }
    }elseif(isset($_SESSION['referralCookie']) && !isset($_COOKIE['Agent'])){
            $deriveCode = $_SESSION['referralCookie'];
            // echo $deriveCode;
            
            $details = allAgentById($conn,$myId);
            if(isset($details['agnPic'])){
                $agnPic = $details['agnPic'];
                setcookie('Agent',$agnPic, time()-3600);
                setcookie('Agent', $agnPic, time() + 3600 );
            }else{
                header('Location:Register.php');
            }

    }elseif(isset($_SESSION['referralCookie']) && isset($_COOKIE['Agent'])){
             $deriveCode = $_SESSION['referralCookie'];
             
             $details = allAgentById($conn,$myId);
             if(isset($details['agnPic'])){
                
         }else{
            header('Location:Register.php?_vagent=abs');
        }
    }
        
?>
