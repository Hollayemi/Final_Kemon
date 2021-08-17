<?php
    include('config/config.php');

    if(isset($_SESSION['user'])){
        
        if(isset($_SESSION['user_info_id2'])){
            $user_id = $_SESSION['user_info_id2'];
            $_SESSION['user_info_id'] = $_SESSION['user_info_id2'];
        }


        include('config/main_Handler.php');
    
    }else
    {
            //  header('Location:exp.php');
    }
?>