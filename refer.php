<?php
    if(isset($_POST['agentCode'])){
        $AgnUsers = htmlentities($_POST['nameToSet']);
        
        $row = allAgentByName($conn,$myId,ucwords($AgnUsers));
        if(isset($row['agnPic'])){
            if(!isset($_COOKIE['Code-Agent'])){
                $_SESSION['name']= $row['agnPic'];
                $_SESSION['reffered']= $row['counting'];
                $picuure =  $_SESSION['name'];
                setcookie('Code-Agent',$picuure, time()-3600);
                setcookie('Code-Agent',$picuure, time()+3600);
            }else{
                header('Location:Register.php');

            }
        }else{
            header('Location:Register.php?_vagent=abs');
        }
    }elseif(isset($_COOKIE['referredAgn']) && !isset($_COOKIE['Agent'])){
            $deriveCode = $_COOKIE['referredAgn'];
            // echo $deriveCode;
            
            $details = allAgentById($conn,$myId);
            if(isset($details['agnPic'])){
                $agnPic = $details['agnPic'];
                setcookie('Agent',$agnPic, time()-3600);
                setcookie('Agent', $agnPic, time() + 3600 );
            }else{
                header('Location:Register.php');
            }

    }elseif(isset($_COOKIE['referredAgn']) && isset($_COOKIE['Agent'])){
             $deriveCode = $_COOKIE['referredAgn'];
             
             $details = allAgentById($conn,$myId);
             if(isset($details['agnPic'])){
         }else{
            header('Location:Register.php?_vagent=abs');
        }
    }
        

    // deactivate

    if(isset($_POST['De_Agent'])){
        $AgnUsers = htmlentities($_POST['nameToSet']);
        $row = allAgentByName($conn,$myId,ucwords($AgnUsers));
        if(isset($row['agnPic'])){
            if(isset($_COOKIE['Code-Agent'])){
                $_SESSION['name']= $row['agnPic'];
                $_SESSION['reffered']= $row['counting'];
                $picuure =  $_SESSION['name'];
                setcookie('Code-Agent',$picuure, time()-3600);
            }else{
                header('Location:Register.php');
            }
        }else{
            header('Location:Register.php?_vagent=abs');
        }
    }
?>
