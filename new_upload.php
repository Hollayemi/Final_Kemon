<?php
if (isset($_POST['post'])){
    $caption    =  testInput($_POST['myPageCaption']);
    $selected   =  testInput($_POST['selected']);
    $amount     =  testInput($_POST['amount']);
    $UPCs    =  testInput($_POST['UPC']);
    $EPCs   =  testInput($_POST['EPC']);
    $PKEYs    =  testInput($_POST['PKEY']);
    $MPNs    =  testInput($_POST['MPN']);
    $PNs    =  testInput($_POST['PN']);
    $sKey   =  generate_string($permitted_chars,50);
    $optional = array($UPCs,$EPCs,$PKEYs,$MPNs,$PNs);

    
       if($UPCs == ""){$UPCs = "*******";}
       if($EPCs == ""){$EPCs = "*******";}
       if($PKEYs == ""){$PKEYs = "*******";}
       if($MPNs == ""){$MPNs= "*******";}
       if($PNs == ""){$PNs= "*******";}
    
    // if(function_exists('upload'))
    function upload($pi,$capf,$selected,$amt,$UPC,$EPC,$PKEY,$MPN,$PN,$sKey,$shop_nick,$myId,$conn){
        $myPath           =     $_FILES[$pi];
        $myfileName       =     $_FILES[$pi]['name'];
        $fileSize         =     $_FILES[$pi]['size'];
        $myfileTempName   =     $_FILES[$pi]['tmp_name'];
        $fileType         =     $_FILES[$pi]['type'];
        $fileError        =     $_FILES[$pi]['error'];

        $fileExt          =     explode('.',$myfileName);
        $fileActualExt    =     strtolower(end($fileExt));
        
        $_SESSION['uploadEmailName'] = $shop_nick.'--'.$selected ."~". $sKey . '.png';
        $uploadEmailName = $_SESSION['uploadEmailName'];
        //$normProfilePic=$profilePic->resizeImage(100,100,'crop');   
        
        $allowed    =   array('jpg','jpeg','png');
        echo $fileActualExt;
        if(isset($myPath)){
            if(in_array($fileActualExt,$allowed)){
                echo "popo";
                if($fileError === 0){
                    if($fileSize < 10000000){
                            $real_id       =  $myId;
                            $myfileNewName   = $uploadEmailName;

                            $myfileDestination = '../up/'.$shop_nick.'/pic/'.$myfileNewName;

                            $run=catchUploads($conn,$myId,$capf,$myfileNewName,$sKey,$amt,$selected);

                            if($run){
                                if(strlen($capf)>100){
                                    $pagename =  $selected.'-'.$sKey;
                                    $newFileName  =  '../up/'.$shop_nick.'/cp/'.$pagename . ".txt";

                                $contents = $capf."<br><br><br><br>Universal Product Code (UPC):".$UPC."<br>Electronic Product Code (EPC): ".$EPC."<br>Product Key (P-Key): ".$PKEY."<br>Marketing Part Number (MPN): ".$MPN."<br>Part Number (PN): ".$PN."<br>_This was uploaded on_".date('d/m/y'."20").'         `for`'.$amt.'<br><br><br><br>';
                                $contents2 = str_replace('\r\n', '<br>', $contents);
                            
                                if(file_put_contents($newFileName,$contents2)){
                                    //echo "File created(' " . basename($newFileName) .")";
                                }else{
                                    echo "nothing happened";
                                    }
                                // $myfileDestination;
                                $piUpload =  "<h5 class='piUpload' style='color:green'>File uploaded successfully</h5>";
                                move_uploaded_file($myfileTempName,$myfileDestination);

                            }else{
                                $piUpload = "<h5 class='piUpload'>Tell us more about the upload".(100-strlen($amt))." characters left";
                                }
                            
                        }else{
                            echo "pic not uploaded";
                            }
                    }else{
                        $piUpload="<h5 class='piUpload'>This file is too big, try with a lesser file size</h5>";
                    }

            }else{
                $piUpload = "<h5 class='piUpload'>An error has occured, try again with another file</h5>";
            }

        }else{
            $piUpload= "<h5 class='piUpload'>This type of file cannot be uploaded</h5>";
        }

    }else{
        $piUpload= "<h5 class='piUpload'>please choose a file</h5>";
    }
    }

    if(array_key_exists('post',$_POST)){
        
        if(isset($selected) && isset($caption) && $selected !='select page' ){
            
    
                 if(upload('myPageFile',$caption,$selected,$amount,$UPCs,$EPCs,$PKEYs,$MPNs,$PNs,$sKey,$shop_nick,$myId,$conn)){
                   echo "done";
            }else{
                // echo "<h5 class='piUpload'> Required *  entries must be filled</h5>";
                // echo error_reporting(E_ALL);
            }
        }else{
            echo "<h5 class='piUpload'> Required <i style='color:red'>*</i> entries must be filled</h5>";
        }
    }else{
        echo "Not Uploaded ";
    }

}
 ?>