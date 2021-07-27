<?php
include('session.php');
$mylink = $myId+ 30;
$usersId = $myId;

$_SESSION['myProfLink'] =   $myIdFetch['username'].$mylink.'.php';
if(isset($_POST['deleteSelectedTabBtn'])){
    $TabSelect     =  testInput($_POST['deleteSelectedTab']);
    $TabSelected = strtoupper($TabSelect);
    if($TabSelected != 'select link'){
        echo "</div>";
        $FetchAllTans = glob("up/".$shop_nick."/tb/*.php");
        echo "<div class='each_page'>";
        for ($i=0; $i<count($FetchAllTans); $i++){
            $Tabpage = $FetchAllTans[$i];
            $TabpageCheck = explode('.',$Tabpage);
                if($TabpageCheck[1] ==  'php'){
                
                $Tabsext=explode('/',$TabpageCheck[0]);
                
                $Tabsex = explode('-',$Tabsext[3]);
                $derived = $Tabsext[3];
                
                if(strtoupper($derived) == ($TabSelected)){
                    if(unlink($Tabpage)){
                        $to = $myIdFetch['num_Tab']+1;
                        $run=update_numTab($conn,$myId,$to);
                        $FetchAllPic = glob("up/".$shop_nick."/pic/*.png");
                        if($run){
                            for ($a=0; $a<count($FetchAllPic); $a++){
                                $veri = explode('/',$FetchAllPic[$a]);
                                $verri0 = explode('~',$veri[3]);
                                $verri = explode('--',$verri0[0]);
                                if(strtoupper($derived) == strtoupper($verri[1])){
                                    if (unlink($FetchAllPic[$a])){
                                        echo $veri[3];
                                        deleteUploads($conn,$veri[3]);
                                        header('Location: 1/'.$_SESSION['myProfLink'].'?'.strtolower($TabSelected).'_has_been_deleted');
                                    }else{
                                        header('Location: 1/'.$_SESSION['myProfLink']);
                                    }
                                }else{
                                    header('Location: 1/'.$_SESSION['myProfLink']);
                                }
                            }
                        }else{
                            header('Location: 1/'.$_SESSION['myProfLink'].'?gh');
                        }
                    }else{
                        header('Location: 1/'.$_SESSION['myProfLink']);
                    }
                }else{
                    header('Location: 1/'.$_SESSION['myProfLink']);
                  }
            }else{
                header('Location: 1/'.$_SESSION['myProfLink']);
              }
        }
    }else{
        header('Location: 1/'.$_SESSION['myProfLink']);
      }
}









if(isset($_POST['deleteSelectedPageBtn'])){
    $TabSelected2     =  testInput($_POST['deleteSelectedPage']);
    if($TabSelected2 != 'select page'){
        echo "</div>";
        $FetchAllTans = glob("up/".$shop_nick."/pg/*.php");
        echo "<div class='each_page'>";

        for ($i=0; $i<count($FetchAllTans); $i++){
            $Tabpage = $FetchAllTans[$i];
            $TabpageCheck = explode('.',$Tabpage);
                if($TabpageCheck[1] ==  'php'){
                $Tabsext=explode('/',$TabpageCheck[0]);
                $Tabsex = explode('-',$Tabsext[3]);
                $derived = $Tabsex[0];

                if(ucwords(strtolower($derived))== ucwords(strtolower($TabSelected2))){
                    if(unlink($Tabpage)){
                        $to = $myIdFetch['num_Page']+1 ;
                        $run=update_numPage($conn,$myId,$to);
                        $FetchAllPic = glob("up/".$shop_nick."/pic/*.png");
                        $FetchAllTab = glob("up/".$shop_nick."/tb/*.php");
                        if($run){
                            if(count($FetchAllPic) > 0){
                                for ($a=0; $a<count($FetchAllPic); $a++){
                                    $veri = explode('/',$FetchAllPic[$a]);
                                    $verri = explode('~',$veri[3]);
                                    $verri = explode('--',$verri[0]);
                                    $verrri = explode('-',$verri[1]);
                                    if(ucfirst($derived)==ucfirst($verrri[0])){
                                        if(unlink($FetchAllPic[$a])){           
                                            deleteUploads($conn,$veri[3]);
                                            header('Location: 1/'.$_SESSION['myProfLink'].'?'.strtolower($TabpageCheck[0]).'_has_been_deleted');                                 
                                        }else{
                                            header('Location: 1/'.$_SESSION['myProfLink']);
                                        }
                                    }else{
                                        header('Location: 1/'.$_SESSION['myProfLink']);
                                    }

                                }
                             }else{
                                header('Location: 1/'.$_SESSION['myProfLink']);
                            }

                             if(count($FetchAllTab) > 0){
                                for ($a=0; $a<count($FetchAllTab); $a++){
                                    $Teri = explode('/',$FetchAllTab[$a]);
                                    $Terrri = explode('-',$Teri[3]);
                                    if(ucfirst($derived)==ucfirst($Terrri[0])){
                                        if(unlink($FetchAllTab[$a])){    
                                            $to = $myIdFetch['num_Tab']+1;
                                            update_numTab($conn,$myId,$to);       
                                                header('Location: 1/'.$_SESSION['myProfLink'].'?'.strtolower($TabpageCheck[0]).'_has_been_deleted');                                 
                                        }else{
                                            header('Location: 1/'.$_SESSION['myProfLink']);
                                        }
                                    }else{
                                        header('Location: 1/'.$_SESSION['myProfLink']);
                                    }
                                }
                            }else{
                                header('Location: 1/'.$_SESSION['myProfLink']);
                            }
                        }else{
                            header('Location: 1/'.$_SESSION['myProfLink']);
                        }
                    }else{
                        header('Location: 1/'.$_SESSION['myProfLink'].'?not_deleted');
                    }
                }else{
                    header('Location: 1/'.$_SESSION['myProfLink']);
                }
               
            }else{
                header('Location: 1/'.$_SESSION['myProfLink'].'?err');
            }
        }

    }else{
        header('Location: 1/'.$_SESSION['myProfLink'].'?err');
    }
}

?>
