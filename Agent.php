<?php

$Agent = "True";
include('kem_header.php');
include('whatsapp.php');
$user_id = $myId;
include('updateAgent.php');



if (isset($_POST['Agents'])){
    $AccNum        = testInput($_POST['agentAcc']);
    $AgnMail       = testInput($_POST['mail']);
    $AgnUsername   = testInput($_POST['agentUsername']);
    $AgnAccName    = testInput($_POST['agentAccName']);
    $AgnBank       = testInput($_POST['agentBank']);
    $AgnPhone      = testInput($_POST['agentPhoneNum']);

    
    $run2=allAgentByName($conn,$myId,$AgnUsername);

    $num_of_rows=sizeof($run2);
    if($num_of_rows < 1){
        $myPath         = $_FILES['Agnfile'];
        $fileName       = $_FILES['Agnfile']['name'];
        $fileSize       = $_FILES['Agnfile']['size'];
        $fileTempName   = $_FILES['Agnfile']['tmp_name'];
        $fileType       = $_FILES['Agnfile']['type'];
        $fileError      = $_FILES['Agnfile']['error'];
        $fileExt        =  explode('.',$fileName);
        $fileActualExt  =  strtolower(end($fileExt));
        if (isset($fileExt)){
            $allowed = array("jpg","png","jpeg");
            $fileActualExt  =  strtolower(end($fileExt));
            if(in_array($fileActualExt,$allowed)){
                if($fileError === 0){
                    if($fileSize < 100000){
                        $mylink = $user_id+30;
                        
                            $fileDestination = 'AgentPic/'.$AgnUsername.'.png';     
                            move_uploaded_file($fileTempName,$fileDestination);
                    }else{
                        echo "This file is too big, try with a lesser file size";
                    }
        
                }else{
                    echo "An error has occured, try again with another file";
                }
        
            }else{
                echo "This type of file cannot be uploaded";
            }
        }else{
            echo "Please choose a file";
        }
    

        $userIdentifierlink = str_word_count($AgnUsername,1);
        $referralLink = $userIdentifierlink[0].'-'.md5($user_id);
        // $sql="INSERT INTO agent (id,agnUsername,agnAccName,agnAccNumber, Bank,accPhoneNumber,mail,regID,agnPic,referralLink) VALUES ('NULL','$AgnUsername','$AgnAccName','$AccNum','$AgnBank','$AgnPhone','$AgnMail','$user_id','$fileDestination','$referralLink')";
        $run=insertIntoAgent($conn,$AgnUsername,$AgnAccName,$AccNum,$AgnBank,$AgnPhone,$AgnMail,$myId,$fileDestination,$referralLink);

            if($run){
                $alertAgent = 'true';
                $NewPageFile  =  'agent/'.$referralLink.".php";
                $contents ="<?php  
                include('../referralPage.php'); 
                ?>";
                if(file_put_contents($NewPageFile,$contents));

            }else{
                echo "<br><br><br><br><br>";
                echo "<div style='color:#f0ff;width:150px;
                text-align: center;
                font-size:20px;
                width:100%;'>Not Submitted</div>";
            }

            }else{
                echo "<br><br><br><br><br>";
                echo "<div style='color:red;width:150px;
                text-align: center;
                font-size:20px;
                width:100%;'>Username alread exist. Try with another username</div>";

            }

            

            // $sendMessSQL= "SELECT * FROM agent WHERE agnUsername='$AgnUsername'";
            // $run=mysqli_query($mysqli,$sendMessSQL);
            // $sendMessFetch = mysqli_fetch_array($run);

            // $sendMessFetch['agnAccName'];

            // $firstAgnAccName    =   explode(' ',$sendMessFetch['agnAccName']);
            // if($firstAgnAccName[0] != " "){
            //     $mySpecCode = $firstAgnAccName[1].($sendMessFetch['id']+5555);
            // }else{
            //     $mySpecCode = $firstAgnAccName[0];
            // }

        
}
  ?>

<br><br><br><br><br>
<body class="agnBody">

<main role="main">
      <article>
        
        <header class="background-dark" style="margin-top:-120px">
          <div class="line">        
            <p class="cla"><h1 class="tab-head"  style="margin-top:150px"></h1></p>
            
          </div>  
        </header>
      </article>
    </main>
    <?php
     
    if(!isset($selectRow['agnUsername'])){
    ?>
    <div class="gen">
        <div class="agnFlex">
            <div class="agnInputsPage">
                <div class="withImg">
                    <img src="img/agent.png" alt="">
                </div>
                <form action="" method="POST" autocomplete='off' enctype="multipart/form-data">
                    <div class="inputs ">
                        <input type="text" name="agentUsername" value="" placeholder="Username" style="padding:10px;" required> 
                    </div><br>
                    <div class="inputs">
                        <input type="text" name="agentAcc" value="" placeholder="Your Account Number" style="padding:10px;" required>
                    </div><br>

                    <div class="inputs">
                        <input type="text" name="agentAccName" value="" placeholder="Your Account Name" style="padding:10px;" required>
                    </div><br>

                    <div class="inputs">
                        <input type="text" name="agentPhoneNum" value="" placeholder="Your Phone Number" style="padding:10px;" required>
                    </div><br>

                    <div class="inputs">
                        <input type="email" name="mail" value="" placeholder="Your Email" style="padding:10px;" required>
                    </div><br>
                  <!--===============_____________=================--------hidden pic------------____________________=========================== -->
                    <span id='blab' style='display:none'>
                        <img id='agnblah' src='#'  class='agnTot tum'>             
                    </span>
                    <div class="inputs">
                        <label class="new-button uploadAgentPic Up_New-btn" for="upload">Picture <i class="fa fa-upload"></i></label>
                        <input type="file" name="Agnfile" id="upload" onchange="readURL(this)" class="new-button" style="padding:10px;"> 
                    </div><br>
                    <div class="inputs">
                        <input type="text" name="agentBank" value="" placeholder="Bank Name" style="padding:10px;" required>
                    </div><br>
                    <div class="Create_Acc" style="margin-bottom:75px; border-radius:10px">
                        <button type="submit" class="Create_Acc_Btn" name="Agents">Submit</button>
                    </div><br><br>
                
                </form>
            </div>
            <div class="preSec">
                  <div>
                      <img src="img/instant-earning.png" alt="">
                      <h2>INSTANT EARNING</h2>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dolor cum, nobis et cupiditate, 
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dolor cum, nobis et cupiditate, 
                      </p>
                  </div>
                  <div>
                      <img src="img/invest-reward.png" alt="">
                      <h2>INVEST REWARD</h2>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dolor cum, nobis et cupiditate, 
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dolor cum, nobis et cupiditate, 
                      </p>
                  </div>

                  <div>
                      <img src="img/Save-Reward.png" alt="">
                      <h2>SAVE REWARD</h2>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dolor cum, nobis et cupiditate, 
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dolor cum, nobis et cupiditate, 
                      </p>
                  </div>
            </div>
        </div>
    </div>
<?php
       }else{

        
$collectquerry  =     allAgentById($conn,$myId);
$totalAmount    =    ($collectquerry['counting']*1200) + ($collectquerry['3_months']*1400) + ($collectquerry['6_months']*1600) + ($collectquerry['1_year']*1900);
if(isset($collectquerry['counting'])){
    if($collectquerry['counting'] != 0 || $collectquerry['3_months'] !=0 || $collectquerry['6_months'] != 0 || $collectquerry['1_year'] != 0){
        if(ucwords(date('l'))=="Friday" && date('H') > 0 && date('H') <= '24'){
            $updatesql      =    "UPDATE agent SET pendingCash = '$totalAmount' WHERE regID = '$user_id'";
            mysqli_query($mysqli,$updatesql);

            
            $updatesql2     =    "UPDATE agent SET counting=0,3_months=0, 6_months=0, 1_year=0 WHERE regID = '$user_id'";
            mysqli_query($mysqli,$updatesql2);
        }
    
    }
}
       
        
?>
<section class="myAgn">
       <div class="AgnFlexin">
            <div class="agnInfo">

                <div class="agnInfo1">
                    <h3>Agent Options</h3>
                    <h5 style="margin-left:10px;font-size:18px">Agent Profile</h5>
                    <h5 style="margin-left:10px;font-size:18px">Change details</h5>
                </div>
                <div class="agnInfo2">
                    <h5>Referral link</h5>
                    <a target="_blank" href="http://localhost/dashboard/Kemon/agent/<?php echo $collectquerry['referralLink'].'.php'?>" title="http://localhost/dashboard/Kemon_market/agent/<?php echo $collectquerry['referralLink'].'.php'?>">Visit Link</a>
                    <input type="text" value="<?php echo 'https://Kemon/agent/'.ucwords($collectquerry['referralLink']).'.com'?>"readonly  id="copyElement" style="border:none; width:100%;margin-bottom:20px">
                    <button onclick="copyToClipboard()" class="shareGra1"><h6><i style="color:#fff" class="fa fa-copy share_fa"></i> Copy to clipboard</h5></button><br><br>
                    <h5>Share On:</h5>
                    <div class='socMedia'>
                        <a href=""><h5 class="shareGra2"><i class=" fa fa-facebook share_fa"></i></h5></a>
                        <a style="" href="https://api.whatsapp.com/send?text= Hello%20Guys,%20my%20name%20is%20(....).%20Please%20register%20your%20business%20with%20kemon-%20market%20using%20this%20link%20<?php echo 'https://Kemon-Market/'.ucwords($collectquerry['referralLink']).'.com'?>"><h5 class="shareGra3"><i class=" fa fa-whatsapp share_fa"></i></h5></a>
                        <a style="" href=""><h5 class="shareGra4"><i class=" fa fa-instagram share_fa"></i></h5></a>
                    </div><br>
                    <h4>Click to Withdraw</h4>
                    <form action="resetPayment.php" method="POST">
                        <input type="submit" name="withdraw" value="Withdraw" class="btn btn-primary" style="font-size:20px">
                    </form>
                </div>
                
            </div>
            <div class="agnDetails"> 
                <?php
                    if(isset($Submitted))
                    echo "<h4 style='color:green;font-size:20px;text-align:center;margin-top:5px;'>$Submitted</h3>";
                ?>
                <h6 style='float:right;margin-top:40px;color:green'>Available Cash: &#x20A6 <?php echo $collectquerry['pendingCash']?></h5>
                <form action="" method="POST" autocomplete='off'>
                    <h5>Username:<b class="rezDiz" style="margin-left:70px"><input type="text" id="gnUname" name="agnUname" disabled="true" value="<?php  echo ucwords($collectquerry['agnUsername']) ?>" ></b><br><br></h5>
                </form>
                    <h4 class='photoH4'>Photo: </h4>
                        <div class="agnShowPicGen" title="click to change picture">
                            <div>
                                <img src="<?php echo $collectquerry['agnPic']?>" class="agnShowPic">
                            </div>
                            <div class="agnPicBg" style="display:none">
                                <div class="inputs" id="agnUp">
                                    <form action="" method="POST" autocomplete='off' enctype="multipart/form-data">
                                        <label class="new-button upLabel" for="Agnupload" title="Choose picture"><i class="fa fa-upload fa-2x"></i></label>
                                        <input type="file" name="myfile" id="Agnupload" onchange="readURL(this)" class="new-button" style="padding:10px;"> 
                                        <button type="submit" name="UpdateAgentPicture" class="upLabel2" style="display:none" title="Save"><i class="fa fa-save fa-2x"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <span id='blab' style='display:none'>
                        
                         <img id='agnblah' src='#'  class='agnTot2 tum' style="display:none">             
                    </span>
                    <form action="" method="POST" autocomplete='off'>
                        <h3 name="UpdateAgent" id="agnsave"class="agnEdit">EDIT</h3>
                        <input name="UpdateAgent" id="agnsave" type="submit"  class="agnSave" value="SAVE" >
                        <h5>Account Name:           <span  class="rezDiz h5_1"><input type="text" id="acnam" name="acnam" disabled="true" value="<?php echo $collectquerry['agnAccName']?>"></span><br><br></h5>
                        <h5>Account Number:         <span  class="rezDiz h5_2"><input type="text" id="acnum" name="acnum" disabled="true" value="<?php echo $collectquerry['agnAccNumber']?>"></span><br><br></h5>
                        <h5>Phone Number:           <span  class="rezDiz h5_3"><input type="text" id="Phnum" name="Phnum" disabled="true" value="<?php echo $collectquerry['accPhoneNumber']?>"></span><br><br></h5>
                        <h5>Bank:                   <span  class="rezDiz h5_4"><input type="text" id="bnk" name="bnk" disabled="true" value="<?php echo $collectquerry['Bank']?>"></span><br><br></h5>
                        <h5>Email:                  <span  class="rezDiz h5_5"><input type="text" id="mail" name="mail" disabled="true" value="<?php echo $collectquerry['mail']?>"></span><br><br></h5>
                        <h5>Total number transactions:  <span class="rezDiz h5_6"><input type="text" id="mail" name="" disabled="true" value="<?php echo $collectquerry['Total_reg']?>"></span><br><br></h5>
                        <h5>This week reffered:     <span  class="rezDiz h5_7"><input type="text" id="mail" name="" disabled="true" value="<?php echo $collectquerry['counting']?>"></span><br><br></h5>
                        <h5>This week earned:     <span  class="rezDiz h5_7"><input type="text" id="mail" name="" disabled="true" value="&#x20A6 <?php echo $totalAmount ?>"></span><br><br></h5>
                        <h5>Available Cash:         <span  class="rezDiz h5_8"><input type="text" id="mail" name="" disabled="true" value="&#x20A6 <?php echo $collectquerry['pendingCash'] ?>"></span><br><br></h5>
                    </h5>
                </form>
            </div>
       
       </div>
       <br><br><br>
</section>


<?php
    }
    include('kem_footer.php')
?>

  <script>
      var mail = document.getElementById('mail');
      var bnk = document.getElementById('bnk');
      var acnum = document.getElementById('acnum');
      var acnam = document.getElementById('acnam');
      var Phnum = document.getElementById('Phnum');

document.querySelector('.agnEdit').addEventListener('click',function(){
    document.querySelector('.agnSave').style.display="block"
    document.querySelector('.agnEdit').style.display="none"

    // inputs
    acnam.style.border = "1px solid rgba(26, 132, 245,.3)"
    acnum.style.border = "1px solid rgba(26, 132, 245,.3)"
    mail.style.border = "1px solid rgba(26, 132, 245,.3)"
    bnk.style.border = "1px solid rgba(26, 132, 245,.3)"
    Phnum.style.border = "1px solid rgba(26, 132, 245,.3)"

    
    Phnum.disabled= ''
    bnk.disabled= ''
    mail.disabled = ''
    acnam.disabled = ''
    acnum.disabled = ''
})



document.querySelector('.agnShowPic').addEventListener('click',function(){
    document.querySelector('.agnPicBg').style.display="block"
    document.querySelector('.agnShowPic').style.opacity='.5';
})

function readURL(input) {    
        var blab = document.getElementById('blab');
            if (input.files && input.files[0]) {
                    blab.style.display = "block";
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#agnblah')
                            .attr('src', e.target.result)
                            .width(150)
                            .height(200);
                            };
                           reader.readAsDataURL(input.files[0]);
                           document.querySelector('.upLabel2').style.display="block"
                           document.querySelector('.agnPicBg').style.display='block'
                           document.querySelector('.agnShowPic').style.opacity='.5';
               }
            }



            function copyToClipboard(){
                var copyText =  document.getElementById("copyElement");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");

                alert('Referral Link Copied '+ t.value)
            }

            window.addEventListener('mouseup', function(event){
                if(event.target != document.querySelector('.agnPicBg') && event.target.parentNode != document.querySelector('.agnPicBg')){
                    document.querySelector('.agnPicBg').style.display='none'
                    document.querySelector('.agnShowPic').style.opacity='1';
                }
            });
            

            


</script>

<?php
 if(isset($_GET['err'])){
    $myErrNote = "popo";
    include_once('functions.php');
    $err = "Try to earn more this week, Available balance too low to be cashed out <i class='ion-sad'></i>  ";
    myMessage("err","Amount Too Low",$err,"ion-android-cancel");
  }

  if(isset($_GET['notice'])){
    $myErrNote = "popo";
    $n=$_GET['amt'];
    include_once('functions.php');
    $err = "We have received your message, we will get back to you in 24 hours";
    myMessage("notice","Transaction in Processing",$err,'ion-android-checkmark-circle');
  }
?>