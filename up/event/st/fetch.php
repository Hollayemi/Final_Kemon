<?php
$mysqli=mysqli_connect('localhost','root','','market');
include('../st/in-session.php');

$curPageName = substr($_SERVER["SCRIPT_NAME"],strpos($_SERVER["SCRIPT_NAME"],"/")+1);
if(!empty($_POST['newPageName'])){
    $newPageNam     =  $mysqli->real_escape_string($_POST['newPageName']);
    $newPageName    = strtolower($newPageNam);
}
$loop = explode('/',$curPageName);
$Fetch_ke = explode('.',$loop[5]);
$sec_name = explode('.',$loop[5]);

$Fetch_key = $Fetch_ke[0];
if(isset($_SESSION['user_info_id'])){
  $user_id = $_SESSION['user_info_id'];
}
$pap = $loop[3].'/st/Home.php';
$sql_fetch_pic = "SELECT profile,email FROM users WHERE   My_page='$pap'";
$run_fetch_pic = mysqli_query($mysqli,$sql_fetch_pic);
$row_fetch_pic = mysqli_fetch_array($run_fetch_pic);

$pic_name   =   $row_fetch_pic['profile'];
$email      =   $row_fetch_pic['email'];

if(isset($pic_name)){
    $re_pic_na   = explode('/',$pic_name);
    $re_pic_nam = explode('~',$re_pic_na[4]);
    $re_pic_name = explode('-',$re_pic_nam[1]);
}
$Mypic = array();
$Mycap = array();

$files2 = glob("../cp/*.*");
$files  = glob("../pic/*.*");
      
for ($i=0; $i<count($files); $i++){ //loop picture folder
  // echo "=-=-=-=".$files[$i]."<br>";
  // echo $files2[$i];
      $num = explode('/',$files[$i]); 
      // echo $num[2];
      $filep = explode('~',$num[2]);
      // echo $filep[1];
      $filepic = explode('-',$filep[1]);

      $New_re_pic = "../".$re_pic_name[0];
      $my_re = explode('/',$New_re_pic);
      $sec_na = explode('-',$sec_name[0]);
      $filepi = explode('-',$filep[0]);
      // echo $filepi[1];
      if(strtolower($sec_na[1]) ==  strtolower($filepi[1])){
        // echo $num[2];
        echo "<div style='display:block;'>";
        $eac_cd= explode('-',$num[2]);
        $each_c= explode('.',$eac_cd[2]);
        $each_cd = $each_c[0].".".$each_c[1];
        $gen_num1 = $each_cd;
        $main_pic = '../pic/'.$num[2];
        // echo $main_pic;
        for ($j=0; $j<count($files2); $j++){        //loop text folder
          
            $name_for_cap = explode('/',$files2[$j]);
            $first_cap_gen = explode('-',$name_for_cap[2]);
            $eac_cd2=explode('.',$first_cap_gen[1]);
            $gen_num2 = $eac_cd2[0].".".$eac_cd2[1];
            if($gen_num1 ==  $gen_num2){              
              // echo $files2[$i];    
                  $name="../cp/".$name_for_cap[2];
                  $myfile = fopen("$name","r"); //or die("Unable to open file!");
                  // str_replace("\n", '', $myfile);
                  
                  // str_replace("\r", '', $myfile);
                  $hol = fgets($myfile);
                  //fclose($hol);
                  $Mycap[] = $hol;
                  $Mypic[] = $main_pic;
                  $myRand = rand(1,sizeof($Mypic));
                  $_SESSION['Mypic']=$Mypic;
                  $_SESSION['Mycap']=$Mycap;
            }

        }

      }


}

?>