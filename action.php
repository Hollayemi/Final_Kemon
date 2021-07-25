<?php
session_start();
include('session.php');
$mysqli = mysqli_connect('localhost','root','','market');
$mylink = $_SESSION['user_info_id'] + 30;
$usersId = $_SESSION['user_info_id'];
// echo $mylink;

$sql_upd    =   "SELECT num_Page,num_Tab From users Where id='$usersId'";
$run_upd    =   mysqli_query($mysqli,$sql_upd);
$row_upd    =   mysqli_fetch_assoc($run_upd);


if(isset($_POST['deleteSelectedTabBtn'])){
    $TabSelect     =  $mysqli->real_escape_string($_POST['deleteSelectedTab']);
    $TabSelected = strtoupper($TabSelect);
    if($TabSelected != 'select link'){
        echo "</div>";
        $FetchAllTans = glob("up/".$mylink."/tb/*.php");
        echo "<div class='each_page'>";
        for ($i=0; $i<count($FetchAllTans); $i++){
            $Tabpage = $FetchAllTans[$i];
            
            $TabpageCheck = explode('.',$Tabpage);
                if($TabpageCheck[1] ==  'php'){
                
                $Tabsext=explode('/',$TabpageCheck[0]);
                
                $Tabsex = explode('-',$Tabsext[3]);
                $derived = $Tabsext[3];
                // echo strtoupper($derived);
                if(strtoupper($derived) == ($TabSelected)){
                    if(unlink($Tabpage)){
                        $newNumTab = $row_upd['num_Tab']+1;
                        $sql="UPDATE users SET num_Tab='$newNumTab' WHERE id='$usersId'";
                        $run=mysqli_query($mysqli,$sql);
                        $FetchAllPic = glob("up/".$mylink."/pic/*.png");
                        if($run){
                            for ($a=0; $a<count($FetchAllPic); $a++){
                                $veri = explode('/',$FetchAllPic[$a]);
                                $verri = explode('~',$veri[3]);
                                if(strtoupper($derived) == strtoupper($verri[0])){
                                    if (unlink($FetchAllPic[$a])){
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
    $TabSelected2     =  $mysqli->real_escape_string($_POST['deleteSelectedPage']);
    if($TabSelected2 != 'select page'){
        echo "</div>";
        $FetchAllTans = glob("up/".$mylink."/pg/*.php");
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
                        $newNumPage = $row_upd['num_Page']+1 ;
                        $sql="UPDATE users SET num_Page='$newNumPage' WHERE id='$usersId'";
                        $run=mysqli_query($mysqli,$sql);
                        $FetchAllPic = glob("up/".$mylink."/pic/*.png");
                        $FetchAllTab = glob("up/".$mylink."/tb/*.php");
                        if($run){
                            if(count($FetchAllPic) > 0){
                                for ($a=0; $a<count($FetchAllPic); $a++){
                                    $veri = explode('/',$FetchAllPic[$a]);
                                    $verri = explode('~',$veri[3]);
                                    $verrri = explode('-',$verri[0]);
                                    if(ucfirst($derived)==ucfirst($verrri[0])){
                                        if(unlink($FetchAllPic[$a])){           
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
                                    echo $derived."oio";
                                    if(ucfirst($derived)==ucfirst($Terrri[0])){
                                        if(unlink($FetchAllTab[$a])){           
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