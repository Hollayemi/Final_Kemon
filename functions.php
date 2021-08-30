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
function MyMailer($subject,$to,$message,$token){
        require 'Mailer2/PHPMailer.php';
        require 'Mailer2/Exception.php';
        require 'Mailer2/SMTP.php';
        $mail = new PHPMailer(true);
        $email  ='stephanyemmitty@gmail.com';
        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.ionos.com';
            $mail->SMTPAuth = true;
            $mail->SMTPDebug  = 0;
            $mail->Username   = "support@kemon-market.com";                    
            $mail->Password   = "kemonSupport0123";                    
            $mail->AddEmbeddedImage('img/kemon.png','myImg');          
            $mail->AddEmbeddedImage('img/chatStep.PNG','me');   
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = 587;

            $mail->setFrom("support@kemon-market.com",'Kemon Market');
            $mail->addAddress('stephanyemmitty@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $message;
            if($mail->send()){
            }
        }catch(Exception $e){
            echo displayMessage('danger','Oops something went wrong! please try again');
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





?>