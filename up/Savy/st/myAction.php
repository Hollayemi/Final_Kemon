<?php

require_once "configuration/db.php";

function deletePicture($conn,$page,$Skey)
{
    $sql    ="DELETE FROM trackk WHERE page=? AND Skey=?";
    $stmt   = $conn->prepare($sql);
    $stmt->execute([$page,$Skey]);
    return True;
}
session_start();
$Mypic= $_SESSION['Mypic'];
$sizeof = sizeof($Mypic);
echo $sizeof;
for ($i=$sizeof; $i >= 0; $i--){
    if(isset($_GET['deleteNo'.$i])){
        unlink("../../pic/".$Mypic[$i]);
        $_SESSION['extPage'];
        if(deletePicture($conn,$_SESSION['extPage'],$_SESSION['MySkey'][$i])){
            header("Location:javascript://history.go(-1)" );
        }

    }
}
?>