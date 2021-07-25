<?php
$profile = "True";
include('header.php');


$paif = false;
$nwe = 0;
$real_id       =  $_SESSION['user_info_id'];
//echo $_SESSION['subscription_message'];
//echo $_SESSION['daysLeft'];

$sql_does_my_page_exist   =   "SELECT email,more,shop_name,page_exist From users Where id='$real_id'";
$run_does_my_page_exist   =   mysqli_query($mysqli,$sql_does_my_page_exist);
$row_page_exist           =   mysqli_fetch_array($run_does_my_page_exist);

$emailName = $_SESSION['emailNameReal'];
if($row_page_exist['page_exist'] < 1){
  echo "<br><h5 style='text-align:center; color:green' font-size:10>Your page has been generated successfully</h5>";
  
  $sql_MyPage = "UPDATE users SET My_page = '$emailName/$emailName' WHERE id='$real_id'";
  mysqli_query($mysqli,$sql_MyPage);
  
  $emailName = $_SESSION['emailNameReal'];
  mkdir('pages/'.$emailName);
  mkdir('pages/'.$emailName.'/pictures');
  mkdir('pages/'.$emailName.'/captions');


  if($run_MyPage){
  $nwe = $row_page_exist['page_exist'] + 1;
  $sql_MyPage_2 = "UPDATE users SET page_exist='$nwe' WHERE id='$real_id'";
  mysqli_query($mysqli,$sql_MyPage_2);
  $_SESSION['run_MyPage']=$run_MyPage;
  }
}
$emailName = $_SESSION['emailNameReal'];
//echo $emailName;

// =============================--------------Pages--------------=======================

$allPages = array();
        echo "</div>";
 $proPages = glob("pages/".$emailName."/*.php");
echo "<div class='each_page'>";
for ($i=0; $i<count($proPages); $i++){
    $page = $proPages[$i];
    $pageCheck = explode('.',$page);
        if($pageCheck[1] ==  'php'){
          $ext=explode('/',$pageCheck[0]);
          if($ext[2]!=$emailName){
            if($ext[2] !="pageFrame")
            $allPages[]=$ext[2];
            
          }
          
    echo "<span>";


  }
}
$numPages = sizeof($allPages);

// =============================--------------Pages--------------=======================




$myPagetxt          =   fopen("$emailName".'.txt', "w");
$_SESSION['myPagetxt']   =  $myPagetxt;
//fwrite($myPagetxt,$myPage_codetxt);
$myPage         =       fopen("./pages/$emailName/$emailName".'.php','w');
$getMyCode      =       '<?php
include("../../notPaid.php");

      ?> 
';
fwrite($myPage,$getMyCode);

$real_id       =  $_SESSION['user_info_id'];
$sql="UPDATE users SET veri_payment='True' WHERE id='$real_id'";
$run=mysqli_query($mysqli,$sql);

if(isset($_POST['submit'])){
  include('EditProfile.php');
  $myPath         = $_FILES['myfile'];
  $fileName       = $_FILES['myfile']['name'];
  $fileSize       = $_FILES['myfile']['size'];
  $fileTempName   = $_FILES['myfile']['tmp_name'];
  $fileType       = $_FILES['myfile']['type'];
  $fileError      = $_FILES['myfile']['error'];

  $fileExt        =   explode('.',$fileName);
  $fileActualExt  =   strtolower(end($fileExt));

  $email = $_SESSION['email'];
  $idSum = $_SESSION['user_info_id']+30;
  $splitedEmail= explode('.',$email);
  $splitedEmai = explode('@',$splitedEmail[0]);
  $forEachPic= $splitedEmai[0].$idSum.'page';
  
  $_SESSION['splitedEmail']=$forEachPic;

  $_SESSION['emailName'] = $forEachPic;

  $myProfilePic = $_SESSION['emailName'] .'.'.'jpg';
  $_SESSION['myPictures'] = $myProfilePic;
 

  //$normProfilePic=$profilePic->resizeImage(100,100,'crop');

  

     
  $sql="SELECT my_pic, profile, email FROM users WHERE email LIKE '%$$forEachPic%'";

  $run=mysqli_query($mysqli,$sql);
  $queryRun = mysqli_num_rows($run);

  if ($queryRun > 0){

      while($row = mysqli_fetch_assoc($run)) {
          
          $pic_loc                     =       $row["my_pic"];
          $email_app                   =       $row["email"];
      }
    }

    

  $allowed    =   array('jpg','jpeg','png');

  if(in_array($fileActualExt,$allowed)){
      if($fileError === 0){

          if($fileSize > 1000){
                  $real_id       =  $_SESSION['user_info_id'];

                  $fileNewName = $forEachPic;
                  $_SESSION['fileNewName']=$fileNewName;
                  $fileDestination = 'pages/'.$emailName.'/'.$fileNewName.'.'.'png';
                  $sql="UPDATE users SET my_pic='$fileDestination' WHERE id='$real_id'";
                  $run=mysqli_query($mysqli,$sql);
                  if($run){
                    //echo $fileDestination;
                    move_uploaded_file($fileTempName,$fileDestination);
                    
                    $_SESSION['normProfilePic']=$fileDestination;

                  }else{
                      echo "pic not uploaded";
                    }
          }else{
              echo "This file is too big, try with a lesser file size";
          }

      }else{
          echo "An error has occured, try again with another file";
      }

  }else{
      echo "This type of file cannot be uploaded";
  }

  }


  $Num_file = array();
 $files = glob("uploads/*.*");
     
      for ($i=1; $i<count($files); $i++)
      {
      $num = $files[$i];
      $filepi= explode('-',$num);
      $filepic=explode('/',$filepi[0]);
      
      if($_SESSION['emailName']==  $filepic[1]){
        $Num_file[] = $num;
      }
      }
     
   $Total_files_uploaded = sizeof($Num_file);
    
?>
<br><br><br><br><br>
<?php include('rating.php') ?>
<section style="margin-left">
    <div class="About_me cent" style="margin-left:-5%">        
        <div id="prof" class="ant" >
          <div>
            <img src="pages/<?php echo $emailName.'/'. $_SESSION['emailNameReal'].'.png'?>" alt="no picture uploaded"  height='250' width='200' style="border-radius:100%;">
          </div>
          <form action=""><input type="checkbox" name="edit" id="edit"><label for="edit" style="float:left; z-index:1">Edit profile</label></form>
          
         <div style='text-align:left; margin-top:15px'>
          <br>
            <h4 style='color:red'><?php echo $_SESSION['username'] ?></h4><br>

            <h5 style="margin-top:-50px">Account Details</h5> <br>

            <form action="profile.php?profileSuccessfullyedited" method="POST" enctype="multipart/form-data">
                  
                  <h5 id="info" style="float:left;font-size:16px; color:green; display:none;margin-top:-70px"><i class="icon-edit"></i>Edit your profile and click submit button for submittion </h5><br>
                  <div id="entries" style="margin-top:-140px">
                      <h5>shop name:<input type="text" id="snInput" disabled="true" name="Shop_Name" value='<?php echo $row_page_exist['shop_name'] ?>'class='editInput' style="width:55%;height:35px; background-color:#fff;border:none; margin-top:-30px;  margin-left:150px; "></h5>

                      <h5>shop line:<input type="text" id="slInput" disabled="true" name="Shop_Line" value='<?php echo $_SESSION['shop_lines'] ?>' class='editInput' style="width:55%;height:35px; background-color:#fff;border:none; margin-top:-30px;  margin-left:150px"></h5>

                      <h5>city: <input type="text" id="emailInput" disabled="true" name="Shop_City"  value='<?php echo $_SESSION['city'] ?> ' class='editInput' style="width:55%;height:35px; background-color:#fff;border:none; margin-top:-30px;  margin-left:150px"></h5>

                      <h5>phone number: <input type="text" id="phInput" disabled="true" name="Edit shop name" value='<?php echo $_SESSION['phone'] ?>' class='editInput' style="width:55%;height:35px; background-color:#fff;border:none; margin-top:-30px;  margin-left:150px"></h5>

                      <h5>nearest junction: <input type="text" id="njInput" disabled="true" name="Junction" value='<?php echo $_SESSION['junction'] ?>' class='editInput' style="width:55%;height:35px; background-color:#fff;border:none; margin-top:-30px;  margin-left:150px"></h5>

                      <h5>nearest bustop: <input type="text" id="nbInput" disabled="true" name="Bustop" value='<?php echo $_SESSION['bustop'] ?>' class='editInput' style="width:55%;height:35px; background-color:#fff;border:none; margin-top:-30px;  margin-left:150px"></h5>
                      
                      <h5>What you offer: <br><textarea id="nbOff" disabled="true" name="MyOffer" placeholder='<?php echo $row_page_exist['more']?>' class='editInput' cols="25" rows="3" style="background-color:#fff;width:55%;border:none;width:80%; margin-top:30px;"></textarea></h5>
                      <div  style="text-align:center">
                        <label class="new-button" for="fileInput">Upload profile picture</label>

                        <input type="file" id="fileInput"  disabled="true" name='myfile' disabled="true" class="input_file" style="width:1%">
                      <br>
                      
                          <button type="submit" name=submit>Submit</button>
                      </div>
                  </div>
            </form>
         </div>
        </div>
        <div class="sec_side">
            <div>
                <?php
                  include('new_upload.php')            
                ?>
                <div class="pages_info">
                  <?php
                  if($_SESSION['veri_payment']== 'True'){
                    echo "<img src='pic/ad/subscribed.png' alt='subscribed' width='100'> <br>" ;
                    echo "<h4><i class='fa fa-clock' style='color:#000'></i>With ". $_SESSION['daysLeft']." days left </h4> <br>";
                    echo  "<h4>".$_SESSION['numOfFiles'].' Pictures were uploaded </h4><br>';
                    echo "<h4>".$numPages ." pages were created</h4>";
                  }else{
                    echo "<img src='pic/ad/sub_now.png' alt='subscribed' width='100'>"  ;
                    echo $numPages;
                  }
                   ?>   
                </div>
                
                <span>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <select style="width:15%;line-height:20px;" name="selected">
                        <option  selected="selected" class="select" style='line-height:20px;color:blue'>select page</option>
                        <?php
                        foreach($allPages as $listpage){
                        ?>
                        <option value="<?php echo strtolower($listpage);?>"><?php echo $listpage?></option> ;
                      <?php
                        }
                        ?>
                        </select><br>
                          
                          <label class="new-button" for="myPageFile">Upload to my page</label>
                            <input type="file" name="myPageFile" id="myPageFile" style="margin-left:2%; background-color:skyblue" >
                            <input type="text" name="amount" id="amount" style="margin-left:2;width:30%;" placeholder="Enter the amount cost" >
                            <textarea name="myPageCaption" id="myPageCaption" placeholder="Enter your caption"></textarea>
                            <button type='post' name='post' style="margin-left:10%; width:200px">Post</button>
                    </form>
                </span>
            </div>
        </div>
 </div>
</section>
<a href="Edit.php"><i class="icon-edit">Edit your login credentials</i></a>
<br><br><br>

 <?php
 echo "<br><br><br>";
 for($t= date("s"); $t <=52; $t++){
     echo "<img src='pic/f".$t.".jpg' alt'Advert' width='60%' height='650' style=margin-left:20%;";
     echo $t;
 }

 
   echo" <br><br><br>";
  include('footer.php')
  
?>
<script>
    function toggleNav(){
      document.querySelector(".holla").classList.toggle("navbar--open");
    }
  </script>
  <script>
    (function(){
      var info = document.getElementById('info');
      var entry = document.getElementById('entries');
      var myEdit = document.getElementById('edit');
      var shopName = document.getElementById('snInput');
      var shopline = document.getElementById('slInput');
      var email = document.getElementById('emailInput');
      var phoneNumber = document.getElementById('phInput');
      var bustop = document.getElementById('nbInput');
      var junction = document.getElementById('njInput');
      var Offer = document.getElementById('nbOff');
      var file = document.getElementById('fileInput');
      myEdit.addEventListener('click', function(){
        if(this.checked){
          shopName.disabled = ''
          entry.style.margin = "-90px 0px 0px 0px"
          entry.style.transition = "0.5s"
          info.style.transition = "0s"
          info.style.display = "block"
          shopName.style.border = "1px solid lightgreen"
          Offer.style.border = "1px solid lightgreen"
          shopline.disabled= ''
          email.disabled = ''
          phoneNumber.disabled = ''
          bustop.disabled = ''
          junction.disabled = ''
          Offer.disabled = ''
          file.disabled = ''
        }else{
          
          info.style.display = "none"
          entry.style.margin = "-140px 0px 0px 0px"
          shopName.disabled = 'false'
          shopName.style.border = "none"
          Offer.style.border = "none"
          shopline.disabled = 'false'
          email.disabled = 'false'
          phoneNumber.disabled = 'false'
          bustop.disabled = 'false'
          junction.disabled = 'false'
          Offer.disabled = 'false'
          file.disabled = 'false'
        }
      });
    })();
  </script>