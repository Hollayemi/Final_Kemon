

<?php
session_start();
$Mypic= $_SESSION['Mypic'];
$sizeof = sizeof($Mypic);
echo $sizeof;
for ($i=$sizeof; $i >= 0; $i--){
    if(isset($_GET['deleteNo'.$i])){
        unlink($Mypic[$i]);
        header("Location:javascript://history.go(-1)" );
    }
}
?>
