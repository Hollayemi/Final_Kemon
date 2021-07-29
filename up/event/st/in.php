<?php
include("sessionP.php");
$curPageName = substr($_SERVER["SCRIPT_NAME"],strpos($_SERVER["SCRIPT_NAME"],"/")+1);
// echo "=========================". $curPageName;
if(!empty($_POST['newPageName'])){
$newPageNam     =  $mysqli->real_escape_string($_POST['newPageName']);
$newPageName    = strtolower($newPageNam);
}

$loop = explode('/',$curPageName);
$Fetch_ke = explode('.',$loop[5]);
$sec_name = explode('.',$loop[5]);
$Fetch_key = $Fetch_ke[0];

print_r($loop)."jhgjhldfj";

$user_id = $_SESSION['user_info_id'];


$pap = $loop[3].'/st/Home.php';
// echo "---------------====================".$pap ;
// $sec_name = "mum92page";
$real_id       =  $_SESSION['user_info_id'];

$sql_fetch_pic = "SELECT id,profile,shop_line,shop_name,more FROM users WHERE My_page='$pap'";

$run_fetch_pic = mysqli_query($mysqli,$sql_fetch_pic);

$row_fetch_pic = mysqli_fetch_array($run_fetch_pic);

$pic_name=$row_fetch_pic['profile'];
$shop_line=$row_fetch_pic['shop_line'];
$shop_name=$row_fetch_pic['shop_name'];
$desc=$row_fetch_pic['more'];
$visitor_id = $row_fetch_pic['id'];

if($user_id == $visitor_id){
   echo"
   <br><br>
   <div style='width:300px;float:right; position:relative;'>
   <button id='CP' onclick='myFunction()'>create a page</button><br><br><br>
   <form action='' method='POST'>
       <input id='newPageName' name='newPageName' style='display:none;transition:1s' type='text' width='30px'><br>
       <input id='newPageButton' name='newPageButton' style='display:none' type='submit' value='Create Page' width='30'>
   </form>
</div>
";
  
}

if(array_key_exists('newPageButton',$_POST)){
 

  $pageName         =       fopen($newPageName.'.php','w');
  $getMyNewPageCode =       '<?php
  include("pageFrame.php");
  ?>';
  fwrite($pageName,$getMyNewPageCode);
}

echo "</div>";
 $paging = glob("../tb/*.*");
 
echo "<div class='each_page'>";
for ($i=0; $i<count($paging); $i++){
    $pages = $paging[$i];
    
    $pag = explode('/',$pages);
    $page = explode('-',$pag[2]);
    $PN = ucwords($page[0]).".php";
    echo $pages;
    if($PN==$loop[5]){
      $sec_name = explode('.',$page[1]);
        if($sec_name[1] ==  'php'){
            echo "<a href='../tb/".$pag[2]."'><span style='margin-left:10px; font-style:bold;font-size:20px;background-color:#310611;color:#fff;padding:10px'>".$sec_name[0]."</span></a>";
        }
    echo "<span>";

  }
}
// echo $pic_name."<br>";
if(isset($pic_name)){
  // echo "yeye";
$re_pic_na   = explode('/',$pic_name);
$re_pic_nam = explode('~',$re_pic_na[3]);
$re_pic_name = explode('-',$re_pic_nam[1]);
}
      $Mypic = array();
      $Mycap = array();
  
      $files2 = glob("../cp/*.*");
      $files  = glob("../pic/*.*");
      
      
      echo"<h1 style='text-align:center'>".ucwords($shop_name)."</h1>";
      echo "<div style='text-align:center'>".$desc."</div>"."<br>";
      echo "<div class='About_me' style='text-align:left;'>";
        echo '<span><a href="tel:'.$shop_line.'" class="icons fa-phone" style="color: skyblue;margin-left:49%; width:30px"></a></span>';
        echo '<span><a href="https://wa.me/'.$shop_line.'" class="icons fa-whatsapp" style="color: Green; padding-left:-21% !important"></a></span><br><br><br>';
      echo "</div>";
      // .
      for ($i=0; $i<count($files); $i++){ //loop picture folder
        // echo "=-=-=-=".$files[$i];
        // echo $files2[$i];

            echo "<div style='width:99%;text-align:left;margin-left:0.5%'>";
            $num = explode('/',$files[$i]); 
            // echo $num[2];
            $filepi = explode('~',$num[2]);
            $filepic = explode('-',$filepi[1]);

            $New_re_pic = "../".$re_pic_name[0];
            $my_re = explode('/',$New_re_pic);
            $sec_na = explode('-',$sec_name[0]);
                  
            if(strtolower($sec_na[1]) ==  strtolower($filepi[0])){
              // echo $num[2];
              echo "<div style='display:block;'>";
              $eac_cd= explode('-',$num[2]);
              $each_c= explode('.',$eac_cd[1]);
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
                        str_replace("\n", '', $myfile);
                        
                        str_replace("\r", '', $myfile);
                        $hol = fgets($myfile);
                        //fclose($hol);
                        $Mycap[] = $hol;
                        $Mypic[] = $main_pic;
                        echo "<div>";
                 }

              }

           }


      }

      echo "</div>";
      echo "</div>";
      ?>
      <style>
      table {
      border-collapse: collapse;
      width: 100% !important;

      }

      th, td {
      text-align: left;
      padding: 0px;
      width:50px;

      }

      tr:nth-child(even){
        background-color: blue
      }
      </style>
      </head>
      <body>

      <?php 
      $Pict=sizeof($Mypic)-1;
      for ($i=$Pict; $i >= 0; $i--){
        ?>
        <table>
        <tr>
  
        <td><a href="<?php echo $Mypic[$i] ?>"><img src="<?php echo $Mypic[$i] ?>" alt="err"  width=100 height=90></a></td>
        <?php
        $txt = strlen( $Mycap[$i]);
        $ti = explode('_This was uploaded on_',$Mycap[$i]);

        $time =  $ti[1];
        
        if($txt < 30){
        echo '<td style="text-align:left">'.$Mycap[$i].'"<br><br>"'.$time.'</td>';
        }else{
          $remo = substr($Mycap[$i],0,30);
          
          echo '
          <style>
          #more'.$i.'{display:none;}
          button{
            height:25px !important;
          }
        </style>
          <td style="text-align:left"><p><span id="remo'.$i.'">'.$remo.'</span> <span id="dots'.$i.'">...</span><span id="more'.$i.'">'.$Mycap[$i].'</span></p><br>
           <button onclick="myFunction'.$i.'()" id="myBtn'.$i.'" style"height:10px !important">Read more</button><br><br>'.$time.'
          </td>
          
          <script>
          function myFunction'.$i.'() {
            var remo = document.getElementById("remo'.$i.'");
            var dots = document.getElementById("dots'.$i.'");
            var moreText = document.getElementById("more'.$i.'");
            var btnText =document.getElementById("myBtn'.$i.'");
            
    
            if (dots.style.display === "none") {
              dots.style.display = "inline";
              btnText.innerHTML = "Read more"; 
              moreText.style.display = "none";
              remo.style.display = "inline";
            } else {
              dots.style.display = "none";
              btnText.innerHTML = "Read less"; 
              moreText.style.display = "inline";
              remo.style.display = "none";
      }
    }
          </script>
          
          ';
        }
        ?>
        <td style="text-align:right">$100</td>
        </tr>
        <?php
        }
        ?>
        </table>
        <script>
        function toggleNav(){
          document.querySelector(".holla").classList.toggle("navbar--open");
        }
      </script>
  <script>
 function myFunction() {
            var newPageName = document.getElementById("newPageName"); 
            var newPageDis = document.getElementById("newPageDis");           
    
            if (newPageName.style.display === "none") {
                newPageName.style.display = "block";
                newPageButton.style.display = "block";
             
            } else {
                newPageName.style.display = "none";
                newPageButton.style.display = "none";
      }
    }
    
</script>
    
    </body>
  </html>
  
