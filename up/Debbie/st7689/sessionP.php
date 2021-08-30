<?php
$mysqli=mysqli_connect('localhost','root','','market');
if(isset($_SESSION['user_info_id'])){


        $user_id = $_SESSION['user_info_id'];
        $sql="SELECT username,firstname,email,phone,shop_name,bustop,junction,shop_line,more,City FROM users WHERE id='$user_id'";

        $run=mysqli_query($mysqli,$sql);
        $queryRun = mysqli_num_rows($run);

        while($row = mysqli_fetch_assoc($run)) {
            $_SESSION['email']          =       $row["email"];
            $_SESSION['username']       =       $row["username"];
        }
       
        $uniq=uniqid('',true);
        $_SESSION['payment_uniqid'] = $uniq;
        $email = $_SESSION['email'];
        $splitedEmail= explode('.',$email);
        $forEachPic= $splitedEmail[0];
        $_SESSION['emailName']=($forEachPic);
        $_SESSION['splitedEmail']=$forEachPic;
}else{
    header('Location:../../exp.php');
}

?>