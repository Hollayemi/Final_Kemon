<?php
$curPageName = substr($_SERVER["SCRIPT_NAME"],strpos($_SERVER["SCRIPT_NAME"],"/")+1);

$loop = explode('/',$curPageName);
$Fetch_ke = explode('.',$loop[5]);
$sec_name = explode('.',$loop[5]);

$briefFetch = SelectTrackForDisplay($conn,$sec_name[0],$market_id);

    $Mypic   = array();
    $Mycap   = array();
    $Mydat   = array();
    $Myamt   = array();
    $MySkey   = array();
  
      
for($i=0; $i<count($briefFetch); $i++){
    $Mypic[]    =   $briefFetch[$i]['picture'];
    $Mycap[]    =   $briefFetch[$i]['caption'];
    $Mydat[]    =   $briefFetch[$i]['date'];
    $Myamt[]    =   $briefFetch[$i]['amount'];
    $MySkey[]   =   $briefFetch[$i]['Skey'];
}
$_SESSION['Mypic']    =     $Mypic;
$_SESSION['extPage']  =     $sec_name[0];
$_SESSION['MySkey']   =     $MySkey;
?>