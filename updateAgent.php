<?php
$user_id = $myId;
if (isset($_POST['UpdateAgent'])){
    $updateAccNum        =      testInput($_POST['acnum']);
    $updateAgnMail       =      testInput($_POST['mail']);
    $updateAgnAccName    =      testInput($_POST['acnam']);
    $updateAgnBank       =      testInput($_POST['bnk']);
    $updatePhone         =      testInput($_POST['Phnum']);
    $run=updateAgentName($conn,$myId,$updateAgnAccName,$updateAccNum,$updatePhone,$updateAgnBank,$updateAgnMail);
        if($run){
            $Submitted = 'done';
        }else{
            $Submitted = 'err';
        }  

    }
    $selectRow = allAgentById($conn,$myId);
    if (isset($selectRow['agnUsername'])){

        $myAgnUsername=$selectRow['agnUsername'];


        if (isset($_POST['UpdateAgentPicture'])){
            $myPath         = $_FILES['myfile'];
            $fileName       = $_FILES['myfile']['name'];
            $fileSize       = $_FILES['myfile']['size'];
            $fileTempName   = $_FILES['myfile']['tmp_name'];
            $fileType       = $_FILES['myfile']['type'];
            $fileError      = $_FILES['myfile']['error'];
            $fileExt        =  explode('.',$fileName);
            $fileActualExt  =  strtolower(end($fileExt));        
                if (isset($fileExt)){
                    $allowed = array("jpg","png","jpeg");
                    $fileActualExt  =  strtolower(end($fileExt));
                    if(in_array($fileActualExt,$allowed)){
                        if($fileError === 0){
                            if($fileSize > 10000){
                                $mylink = $user_id+30;
                                    $fileDestination = 'AgentPic/'.$myAgnUsername.'.png';     
                                    move_uploaded_file($fileTempName,$fileDestination);
                                        }else{
                                            $Submitted = "This file is too big, try with a lesser file size";
                                        }
                                    }else{
                                        $Submitted = "An error has occured, try again with another file";
                                    }
                                }else{
                                    $Submitted = "This type of file cannot be uploaded";
                                }
                            }
            if(isset($fileDestination)){
                $run=updateAgentPic($conn,$myId,$fileDestination);
                if($run){
                    $Submitted = 'done';
                }else{
                    echo "<div style='background-color:#f0ff;width:150px;
                    text-align: center;
                    font-size:20px;
                    color: #fff;
                    width:100%;'>Not Submitted</div>";
                 }
            }else{
                $Submitted = "This type of file cannot be uploaded";
            }
            }  

        }
    
?>



