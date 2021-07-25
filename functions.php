<?php
function removeFolder($dir){
    if(is_dir($dir)=== true ){
        $folderContent = scandir($dir);
        unset($folderContent[0],$folderContent[1]);

        foreach($folderContent as $content => $contentName){
            $currentPath = $dir.'/'.$contentName;
            $fileType = filetype($currentPath) ;

            if($fileType == 'dir'){
                removeFolder($currentPath);
            }else{unlink($currentPath);
            }
        }unset($folderContent[$content]);
    }rmdir($dir);
}

function copyFolder($FromDir, $toDir){
    if(is_dir($FromDir) === true ){
        $folderContent = scandir($FromDir);
        unset($folderContent[0],$folderContent[1]);

        foreach($folderContent as $content => $contentName){
            
            $currentPath = $FromDir.'/'.$contentName;
            $toNewDir = $toDir.'/'.$contentName;
            $fileType = filetype($currentPath) ;
    
            if($fileType == 'dir'){
               $dir = explode('/',$currentPath );
               $dirp = array_reverse($dir);
               $loop = $dirp[0];

                $breakLink = explode($contentName,$toNewDir);
                // echo $breakLink[0];
                

                // echo $toNewDir;
                mkdir("$breakLink[0]".'/'."$loop");
                copyFolder($currentPath,$toNewDir);
            }else{
                copy($currentPath,$toNewDir);
            }
        }unset($folderContent[$content]);
    }else{
        echo "not dir";
        // echo "copied".$FromDir."()()()()(())";
        copy($FromDir,$toDir);
    }

}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMPT;
use PHPMailer\PHPMailer\Exception; 
function MyMailer($subject,$to,$message){
        require 'Mailer2/PHPMailer.php';
        require 'Mailer2/Exception.php';
        require 'Mailer2/SMTP.php';
       

        $mail = new PHPMailer();
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'stephanyemmitty@gmail.com';               
        $mail->Password   = 'sholly0123';                              
        $mail->Port       = 587;                                   
        $mail->AddEmbeddedImage('img/myKemon.png','myImg');

        $mail->SMPTSecure = 'tls';  

        $mail->setFrom('stephanyemmitty@gmail.com', 'Stephen Olayemi');
        $mail->addAddress($to);
        $mail->addReplyTo('stephanyemmitty@gmail.com');

        
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        
        if($mail->send()){
            echo 'Message has been sent';

        } else{
            echo  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

}
// function copyFolder($FromDir, $toDir){
//     if(is_dir($FromDir)=== true ){
//         $folderContent = scandir($FromDir);
//         unset($folderContent[0],$folderContent[1]);

//         foreach($folderContent as $content => $contentName){
//             $currentPath = $FromDir.'/'.$contentName;
//             $fileType = filetype($currentPath) ;

//             if($fileType == 'dir'){
//                 echo $currentPath."=-=-=-=-=-=<br>";
//                 copyFolder($FromDir,$currentPath);
//             }else{
//                 echo $toDir.'/'.$contentName."<br>";
//                 copy($currentPath,$toDir.'/'.$contentName);
//             }
//         }unset($folderContent[$content]);
//     }else{
//         removeFolder($toDir);
//     }
// }

function myMessage($typeOfMessage,$infoHeader,$info,$icon){
    ?>
    <div class="mainBox">
        <div class="mainBox">
            <div <?php if($typeOfMessage == "err"){echo "class=' crossAlign'";}elseif($typeOfMessage == "warning"){echo "class=' crossAlign'";}
            elseif($typeOfMessage == "info crossAlign"){echo "class='infoAlert crossAlign'";}else{echo "class='fa-mark crossAlign'";} ?>>

        <div <?php if($typeOfMessage == "err"){echo "class='errorAlert myAlertbox'";}elseif($typeOfMessage == "warning"){echo "class='warningAlert myAlertbox'";}
        elseif($typeOfMessage == "notice"){echo "class='notice myAlertbox'";}else{echo "class='successAlert myAlertbox'";} ?>>
            <h2><i class="<?php echo $icon?>"></i></h2>
            <h2><?php  echo $infoHeader ?></h2>
            <h5><?php  echo $info ?></h5>
        </div>
    </div>

    <script>document.querySelector('.kemBody').style.overflow='hidden'</script>
    <?php
}




function rating($nameOfBusiness){
    if(isset($_SESSION['user_info_id'])){
        require_once('config.php');
        $ppID = $_SESSION['user_info_id'];
        $sql="SELECT star FROM rating WHERE id='$ppID'";
        $run=mysqli_query($mysqli,$sql);
        $queryRun = mysqli_fetch_assoc($run);
        if(!isset($queryRun['star'])){
            ?>
            <section class="myRatingSec">
            <div class="cancelRating">
                <button class="btn">GO Back</button>
            </div>
                <div>
                <center>
                        <?php 
                        echo "<h2>Rate ".$nameOfBusiness." Now <i class='fa fa-heart'></i></h2>";
                        
                        include("st/sec.php");
                        ?>
                        <div class="rateyo-readonly-widg myRater" style="block;background-color:#fff;padding:10px 20px;border-radius:5px"><h4 id="ratingVeri"></h4></div>
                        <form action="" method="POST">
                        <input type="text" value="<?php echo $_SESSION['user_info_id'] ?>" name="raterID"  style="display:none">
                        <input type="text" value="<?php echo $nameOfBusiness ?>" name="rateeShop"  style="display:none">
                        <input type="text" value="" id="rateValueId" name="extRate" style="display:none">
                        <input type="submit" value="Submit" class="btn submitRate" name="rateMyShop" style="visibility:hidden; margin-top:10px; height:40px;line-height:30px;margin-left:0px">
                        </form>
                </center>
                </div>

            </section>

            <script>
                document.querySelector('.cancelRating').addEventListener('click', function(){
                    document.querySelector('.myRatingSec').style.display="none"
                })

            </script>
            <?php
        }
    }
}




?>