<?php

if(isset($marketersInfo['MainColor'])){
    $MainColorVal = $marketersInfo['MainColor'];
    $TextColorVal = $marketersInfo['TextColor'];
    $SubColorVal = $marketersInfo['SubColor'];
    $LinkColorVal = $marketersInfo['LinkColor'];
}

if(isset($_POST['faqSub'])){
    $faqAns        =  testInput($_POST['faqAns']);
    $faqNo         =  testInput($_POST['faqNo']);
    $faqQust       =  testInput($_POST['faqQust']);
    $contents      =  $faqQust.'==='.$faqAns;
    $NewPageFile   =  '../up/'.$shop_nick.'/cp/Faq-'.$faqNo. ".txt";
    if(file_put_contents($NewPageFile,$contents)){

         $_SESSION['profileEdited'] =   displayMessage('success',"FAQ number ".$faqNo." was successfully added");
    }
}
?>
<section class="slideeditInput main_side" id="slideeditInput" style="display:none;">
  <div class="profile_Settings_Header" style="display:block">
    <h3>PROFILE SETTINGS</h3>
  </div>
  <div>
      <div>
      <div class="settEditIconDiv"><i class="fa fa-edit fa-2x settEditIcon"></i></div>
            <img src="../up/<?php echo $shop_nick?>/profile.png" alt="no picture uploaded" class="settingProfPicture" title="click to change" style="border-radius:50%;">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="">
                <input type="file" name="myfile" id="fileInput" onchange="settingProfile(this)" class="new-button" style="padding:10px;"> 
                </div><br>
                <span id='blab' style='display:none'></span>
                    <div class="UpSave" style='display:none'>
                        <label class="new-button settinUpload" for="fileInput"><i class="fa fa-upload fa-2x picUp" style="color:rgb(182, 12, 190);margin-left:0px;"></i></label>
                        <button type="submit" name="submitProfPic" style="display:none" class="settinPic"><i class="fa fa-save fa-2x settSaveIcon2"></i></button>
                    </div>
            </form>
            
            <?php
            if(isset($_POST['submitBgPicStyle'])){
                $chooseBgType   =       $_POST['chooseBgType'];
                $run            =       update_bgPicStyle($conn,$myId,$chooseBgType);
                if($run){
                    $_SESSION['profileEdited'] =   displayMessage('success',"Background picture style was successfully saved");
                }
            }
                if(isset($_POST['SubmitColor'])){
                    $MainColor     =  testInput($_POST['MainColor']);
                    $TextColor     =  testInput($_POST['TextColor']);
                    $SubColor      =  testInput($_POST['SubColor']);
                    $LinkColor     =  testInput($_POST['LinkColor']);

                    $run=update_websiteColor($conn,$myId,$MainColor,$TextColor,$SubColor,$LinkColor);
                    if($run){
                        $_SESSION['profileEdited'] =   displayMessage('success',"Template Edited");
                    }
                }


                if(isset($_POST['submitBgPic'])){

                    $myPath         = $_FILES['bgPicBtn'];
                    $fileName       = $_FILES['bgPicBtn']['name'];
                    $fileSize       = $_FILES['bgPicBtn']['size'];
                    $fileTempName   = $_FILES['bgPicBtn']['tmp_name'];
                    $fileType       = $_FILES['bgPicBtn']['type'];
                    $fileError      = $_FILES['bgPicBtn']['error'];
            
                    $fileExt        =   explode('.',$fileName);
                    $fileActualExt  =   strtolower(end($fileExt));
                    $allowed    =   array('jpg','jpeg','png');
                    if(in_array($fileActualExt,$allowed)){
                        if($fileError === 0){
                            if($fileSize > 10){
                                $fileDestination = '../up/'.$shop_nick.'/homeBg'.'.'.'png';
                                if(move_uploaded_file($fileTempName,$fileDestination)){
                                    // if(file_put_contents($memberFile,$contents)){
                                        
                                        $_SESSION['profileEdited'] =   displayMessage('success',"Background picture changed");
                                      // }
                                }
                            }else{
                                $_SESSION['profileEdited'] =   displayMessage('danger',"This file is too big, try with a lesser file size");
                            }
                        }else{
                            $_SESSION['profileEdited'] =   displayMessage('danger',"An error has occured, try again with another file");
                        }
                    }else{
                        $_SESSION['profileEdited'] =   displayMessage('danger',"File must be in PNG or JPG format");
                    }
                }



                if(isset($_POST['submitTeamPic'])){
                    $TeamPic        =  testInput($_POST['TeamPic']);
                    $memberName     =  testInput($_POST['memberName']);
                    $memberPOS      =  testInput($_POST['memberPOS']);
                    $memberPH       =  testInput($_POST['memberPH']);
                    $memberEmail    =  testInput($_POST['memberEmail']);
                    if($TeamPic != "Upload Team Pictures" && $memberName != "" && $memberPOS != ""  && $memberPH != "" && $memberEmail != "" ){
                        $memberFile  =  '../up/'.$shop_nick.'/usersTeam/'.strtolower($TeamPic). ".txt";
                        $contents = $memberName.'---'.$memberPOS.'---'.$memberPH.'---'.$memberEmail;
                        $myPath         = $_FILES['TeamPicBtn'];
                        $fileName       = $_FILES['TeamPicBtn']['name'];
                        $fileSize       = $_FILES['TeamPicBtn']['size'];
                        $fileTempName   = $_FILES['TeamPicBtn']['tmp_name'];
                        $fileType       = $_FILES['TeamPicBtn']['type'];
                        $fileError      = $_FILES['TeamPicBtn']['error'];
                
                        $fileExt        =   explode('.',$fileName);
                        $fileActualExt  =   strtolower(end($fileExt));
                
                        $TeamPic     =  testInput($_POST['TeamPic']);
                        $allowed    =   array('jpg','jpeg','png');

                        if(in_array($fileActualExt,$allowed)){
                            if($fileError === 0){
                                if($fileSize > 10){
                                    $fileDestination = '../up/'.$shop_nick.'/usersTeam/'.$TeamPic.'.'.'png';
                                    if(move_uploaded_file($fileTempName,$fileDestination)){
                                        if(file_put_contents($memberFile,$contents)){
                                            $_SESSION['profileEdited'] =   displayMessage('success', $memberPOS. " was successfully added");
                                        }
                                    }
                                }else{
                                    $_SESSION['profileEdited'] =   displayMessage('danger',"This file is too big, try with a lesser file size");
                                }
                            }else{
                                $_SESSION['profileEdited'] =   displayMessage('danger',"An error has occured, try again with another file");
                            }
                        }else{
                            $_SESSION['profileEdited'] =   displayMessage('danger',"File was not changed");
                        }
                }else{
                    $_SESSION['profileEdited'] =   displayMessage('danger',"All input field must be filled");
                }
            }
                
            ?>

      </div><br><br><br>
      <div class="settinSecInfo"><h4>Basic settings</h4></div>
      <div>    
    <form action="" method="POST" name=myForm enctype="multipart/form-data" class="formSetting">
        <button type="submit" name="submitProf" id="myProfSave" style="display:none; top:-1000%"></button>
        <label for="myProfSave" class="settSaveIconDiv" style="display:none;"><i class="fa fa-save fa-2x settSaveIcon" style="top:200px;"></i></label>
            <div class="settinSec">
                <div>
                    <div class="editLabel"><h3>Business</h3></div><div class="settinInput"><input type="text" class="shopName" id="shopName" disabled="true"  name="shopName" value='<?php echo $myShopName ?>'></div>
                </div>
                <!-- <div>
                    <div class="editLabel"><h3>PKA</h3></div><div class="settinInput"><input type="text" class="shopPka" id="shopPka" disabled="true" name="shopPka" value='<?php //echo $myShopNick ?>'></div>
                </div> -->
                <div>
                    <div class="editLabel"><h3>Opening</h3></div><div class="settinInput"><input type="number" min="1" max="12" class="shopOp" id="shopOp" disabled="true" name="shopOp" value='<?php echo $myShopOpen ?>'></div>
                </div>
                <div>
                    <div class="editLabel"><h3>Closing</h3></div><div class="settinInput"><input type="number"  min="1" max="12"  class="shopCl" id="snInput" disabled="true" name="shopCl" value='<?php echo $myShopClose ?>'></div>
                </div>
            </div>

            <br><br><br>
            <!-- <div class="settinSecInfo"><h4>Basic setting</h4></div><br> -->
            <div class="settinSec">
                <div>
                    <div class="editLabel"><h3>Country</h3></div><div class="settinInput"><input type="text" class="shopCountry" id="nInput" disabled="true" name="shopCountry" value='<?php echo $myShopCountry ?>'></div>
                </div>
                <div>
                    <div class="editLabel"><h3>State</h3></div><div class="settinInput"><input type="text" class="shopState" id="snInput"  disabled="true" name="shopState" value='<?php echo $myShopState ?>'></div>
                </div>
                <div>
                    <div class="editLabel"><h3>City</h3></div><div class="settinInput"><input type="text" class="shopCity" id="snInput" disabled="true" name="shopCity" value='<?php echo $myShopCity ?>'></div>
                </div>
                <div>
                    <div class="editLabel"><h3>Junction</h3></div><div class="settinInput"><input type="text" class="shopJunction" id="snInput" disabled="true" name="shopJunction" value='<?php echo $myShopJunction ?>'></div>
                </div>
                <div>
                    <div class="editLabel"><h3>Bustop</h3></div><div class="settinInput"><input type="text" class="shopBustop" id="snInput" disabled="true" name="shopBustop" value='<?php echo $myShopBustop ?>'></div>
                </div>
                <div>
                    <div class="editLabel"><h3>Very close to</h3></div><div class="settinInput"><input type="text" class="shopVCT" id="snInput" disabled="true" name="shopVCT" value='<?php echo $myShopVCT ?>'></div>
                </div>
            </div>

            <br><br><br>
            <!-- <div class="settinSecInfo"><h4>Basic setting</h4></div><br> -->
            <div class="settinSec">
                <div>
                    <div class="editLabel"><h3>Phone</h3></div><div class="settinInput"><input type="text" class="shopPhn" id="snInput" disabled="true" name="shopPhn" value='<?php echo $myShopPhone ?>'></div>
                </div>
                <div>
                    <div class="editLabel"><h3>Whatsapp</h3></div><div class="settinInput"><input type="text" class="shopWhat" id="snInput" disabled="true" name="shopWhat" value='<?php echo $myShopWhatsapp ?>'></div>
                </div>
                <div>
                    <div class="editLabel"><h3>Facebook</h3></div><div class="settinInput"><input type="text" class="shopFb" id="snInput" disabled="true" name="shopFb" value='<?php echo $myShopFacebook ?>'></div>
                </div>
                <div>
                    <div class="editLabel"><h3>Linked in</h3></div><div class="settinInput"><input type="text" class="shopLi" id="snInput" disabled="true" name="shopLi" value='<?php echo $myShopLinkedin ?>'></div>
                </div>
            </div>

            <br><br>
            
            <!-- <div class="settinSecInfo"><h4>Basic setting</h4></div><br> -->
            <div class="settinSec">
                <div>
                    <div class="editLabel"><h3>Offer</h3></div><div class="settinInput"><textarea id="snInput" width="90%" disabled="true" name="our_offer" class='our_offer' placeholder="<?php echo $myShopOffer ?>"></textarea></div>
                </div>
            </div><br><br><br>
            <div class="settinSecInfo"><h4 class="advance">Advanced <i class="fa fa-angle-down adv-angle"></i></h4></div><br>
                <span style="display:none" class="advanceCont">
                    <br><br>
                    <div class="settinSec">
                    <h5>Team Pictures</h5>
                        <br>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <select class='select-css sec_style' name="TeamPic">
                                <option selected>Choose Picture</option>
                                <option value="Aowner">Owner of business</option>
                                <option value="Asst1">Partner 1</option>
                                <option value="Asst2">Partner 2</option>
                            </select><br>
                            <input type="text" class="teamTextInput" id="nInput" name="memberName" placeholder="Name"><br><br>
                            <input type="text" class="teamTextInput" id="nInput" name="memberPOS" placeholder="Position"><br><br>
                            <input type="number" class="teamTextInput" id="nInput" name="memberPH" placeholder="Phone Number"><br><br>
                            <input type="email" class="teamTextInput" id="nInput" name="memberEmail" placeholder="Email"><br><br>
                            <input type="file" name="TeamPicBtn" id="fileInput2" onchange="settingExec(this)" class="new-button" style="padding:10px;"> 
                            <label class="new-button ExecPic" for="fileInput2"><i class="fa fa-upload myExecFile" style="color:rgb(182, 12, 190);margin-left:0px;"></i></label>
                            <button type="submit" name="submitTeamPic" style="display:block" class="ExecPic "><i class="fa fa-save fa-2x settSaveIcon2 myExecFile2"></i></button>
                            <br>
                        </form>
                    </div><br><br><br>



                    <div class="settinSec">
                    
                        <?php
                            $chkBg = glob('../up/'.$shop_nick.'/homeBg.png');
                           echo (sizeof($chkBg) > 0)?'<center><img src="../up/'.$shop_nick.'/homeBg.png" style="width:100px;height:100px;border-radius:5px"></center>':"";
                           if(sizeof($chkBg) > 0){
                        ?>
                        <h5>Set Backkground Picture</h5>
                        <br>
                        <form action="" method="POST" enctype="multipart/form-data">                        
                            <div class="flexradioBtn1">
                                <label class="radioBtn1">
                                    <input type="radio" name="chooseBgType" id="yes" value="fix" class="bgRadioBtn" <?php echo ($marketersInfo['bgPic']=="fixed") ? "checked":""; ?> >
                                    <span class="checkmark"></span>
                                </label>
                                <h5>Use a Fixed Background Picture</h5>
                            </div>
                            <div class="flexradioBtn1">
                                <label class="radioBtn1">
                                    <input type="radio" name="chooseBgType" id="yes" value="rotate" class="bgRadioBtn" <?php echo ($marketersInfo['bgPic']=="rotate") ? "checked":""; ?> >
                                    <span class="checkmark"></span>
                                </label>
                                <h5>Select Background Picture at Random</h5>
                            </div>
                            <button type="submit" name="submitBgPicStyle" style="display:block" class="ExecPic "><i class="fa fa-save fa-2x settSaveIcon2 myExecFile2"></i></button>
                        </form>
                        <hr>
                        <?php
                           }
                        ?>
                        <h5 style="text-align:center">Upload Background Picture</h5>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="file" name="bgPicBtn" id="fileInput3" onchange="settingExec(this)" class="new-button" style="padding:10px;"> 
                            <label class="new-button ExecPic" for="fileInput3"><i class="fa fa-upload myExecFile" style="color:rgb(182, 12, 190);margin-left:0px;"></i></label>
                            <button type="submit" name="submitBgPic" style="display:block" class="ExecPic "><i class="fa fa-save fa-2x settSaveIcon2 myExecFile2"></i></button>
                            <br>
                        </form>
                    </div><br><br><br>
                    
                    <div class="settinSec">
                    <h5>Webpage Color</h5>
                        <br>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div>
                                <div class="editLabel2 editLabel"><h3>Main color</h3></div><div class="settinInput"><input type="color" name="MainColor" class="inputColor" id="snInput" value="<?php echo (isset($MainColorVal))?"$MainColorVal":""; ?>"></div>
                            </div>

                            <div>
                                <div class="editLabel2 editLabel"><h3>Text color</h3></div><div class="settinInput"><input type="color" name="TextColor" class="inputColor" id="snInput" value="<?php echo (isset($TextColorVal))?"$TextColorVal":""; ?>"></div>
                            </div>

                            <div>
                                <div class="editLabel2 editLabel"><h3>Sub color</h3></div><div class="settinInput"><input type="color" name="SubColor" class="inputColor" id="snInput" value="<?php echo (isset($SubColorVal))?"$SubColorVal":""; ?>"></div>
                            </div>
                            <div>
                                <div class="editLabel2 editLabel"><h3>Link color</h3></div><div class="settinInput"><input type="color" name="LinkColor" class="inputColor" id="snInput" value="<?php if(isset($LinkColorVal)){echo "$LinkColorVal";} ?>"></div>
                            </div><br>
                            <button type="submit" name="SubmitColor" style="display:block" class="ExecPic "><i class="fa fa-save fa-2x settSaveIcon2 myExecFile2"></i></button>
                            <br>
                        </form>
                    </div><br><br><br>


                    <div class="settinSec">
                    <h5>FAQ</h5>
                        <br>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="number" class="teamTextInput" id="nInput" min="1" name="faqNo" placeholder="Number"><br><br>
                            <input type="text" class="teamTextInput" id="nInput" name="faqQust" placeholder="Question"><br><br>
                            <textarea  class="teamTextInput" id="nInput" name="faqAns" placeholder="Answer" style="height:150px"></textarea><br><br>
                            <button type="submit" name="faqSub" style="display:block" class="ExecPic "><i class="fa fa-save fa-2x settSaveIcon2 myExecFile2"></i></button>
                            <br>
                        </form>
                    </div><br><br><br>


                    
                    <div class="settinSec categ">
                        <div class="businessCategories">            
                            <h5>Categories</h5>
                            <div class="cl0"><input type=checkbox name=ckb value='Electronics' id="Electronics" readonly onclick='chkcontrol(0)';><label  for="Electronics" class="">Electronics</label></div>
                            <div class="cl1"><input type=checkbox name=ckb value='Hotel and Suites' id="Hotel"onclick='chkcontrol(1)';><label for="Hotel" class="">Hotel and Suites</label></div>
                            <div class="cl2"><input type=checkbox name=ckb value='Wears' id="Wears"onclick='chkcontrol(2)';><label for="Wears" class="">Wears</label></div>
                            <div class="cl3"><input type=checkbox name=ckb value='Catering and decoration' id="Catering"onclick='chkcontrol(3)';><label for="Catering" class="">Catering and decoration</label></div>
                            <div class="cl4"><input type=checkbox name=ckb value='Restaurant' id="Restaurant"onclick='chkcontrol(4)';><label for="Restaurant" class="">Restaurant</label></div>
                            <div class="cl5"><input type=checkbox name=ckb value='Bar' id="Bar"onclick='chkcontrol(5)';><label for="Bar" class="">Bar</label></div>
                            <div class="cl6"><input type=checkbox name=ckb value='Gym' id="Gym"onclick='chkcontrol(6)';><label for="Gym" class="">Gym</label></div>
                            <div class="cl7"><input type=checkbox name=ckb value='Beauty supply' id="Beauty_supply"onclick='chkcontrol(7)';><label for="Beauty_supply" class="">Beauty supply</label></div>
                            <div class="cl8"><input type=checkbox name=ckb value='Dry cleaning' id="Dry_cleaning"onclick='chkcontrol(8)';><label for="Dry_cleaning" class="">Dry cleaning</label></div>
                            <div class="cl9"><input type=checkbox name=ckb value='Car dealer' id="Car_dealer"onclick='chkcontrol(9)';><label for="Car_dealer" class="">Car dealer</label></div>
                            <div class="cl10"><input type=checkbox name=ckb value='Convenience store' id="Convenience_store"  onclick='chkcontrol(10)';><label for="Convenience_store" class="">Convenience store</label></div>
                            <div class="cl11"><input type=checkbox name=ckb value='Library' id="Library"  onclick='chkcontrol(11)';><label for="Library" class="">Library</label></div>
                            <div class="cl12"><input type=checkbox name=ckb value='Fuel & Gas' id="Fuel_Gas"  onclick='chkcontrol(12)';><label for="Fuel_Gas" class="">Fuel & Gas</label></div>
                            <div class="cl13"><input type=checkbox name=ckb value='Hospital & Pharmacy' id="Hospital_Pharmacy"  onclick='chkcontrol(13)';><label for="Hospital_Pharmacy" class="">Hospital & Pharmacy</label></div>
                            <div class="cl14"><input type=checkbox name=ckb value='Beauty salon' id="Beauty_salon"  onclick='chkcontrol(14)';><label for="Beauty_salon" class="">Beauty salon</label></div>
                            <div class="cl15"><input type=checkbox name=ckb value='Shopping center' id="Shopping_center"onclick='chkcontrol(15)';><label for="Shopping_center" class="">Shopping center</label></div>
                            <div class="cl16"><input type=checkbox name=ckb value='Car wash' id="Car_wash"  onclick='chkcontrol(16)';><label for="Car_wash" class="">Car wash</label></div>
                            <div class="cl17"><input type=checkbox name=ckb value='Movie' id="Movie"onclick='chkcontrol(17)';><label for="Movie" class="">Movie</label></div>
                            <div class="cl18"><input type=checkbox name=ckb value='Furniture' id="Furniture"onclick='chkcontrol(18)';><label for="Furniture" class="">Furniture</label></div>
                            <div class="cl19"><input type=checkbox name=ckb value='Fruits' id="Fruits"onclick='chkcontrol(19)';><label for="Fruits" class="">Fruits</label></div>
                            <div class="cl20"><input type=checkbox name=ckb value='Mechanic' id="Mechanic"onclick='chkcontrol(20)';><label for="Mechanic" class="">Mechanic</label></div>
                            <div class="cl21"><input type=checkbox name=ckb value='Sporting materials' id="Sporting_materials"onclick='chkcontrol(21)';><label for="Sporting_materials" class="">Sporting materials</label></div>
                            <div class="cl22"><input type=checkbox name=ckb value='Laundry' id="laundry" onclick='chkcontrol(22)';><label for="laundry" class="">Laundry</label></div>
                            <div class="cl23"><input type=checkbox name=ckb value='Clothing Materials & Styling' id="Clothing_Materials" onclick='chkcontrol(23)';><label for="Clothing_Materials" class="">Clothing Materials & Styling</label></div>
                            <div class="cl24"><input type=checkbox name=ckb value='Plasterer & Constructing Materials' id="constructing_Materials" onclick='chkcontrol(24)';><label for="constructing_Materials" class="">Plasterer & Constructing Materials</label></div>
                        </div>
                    </div>

                </span>
            </div>


<!-- 
              <input type="text" id="slInput" disabled="true" name="Shop_Line" value='<?php //echo $_SESSION['shop_lines'] ?>' class='editInput'><br>
              <input type="text" id="emailInput" disabled="true" name="Shop_City"  value='<?php //echo $_SESSION['city'] ?>' class='editInput'><br>
              <input type="text" id="phInput" disabled="true" name="Edit shop name" value='<?php //echo $_SESSION['phone'] ?>' class='editInput' ><br>
              <input type="text" id="njInput" disabled="true" name="Junction" value='<?php //echo $_SESSION['junction'] ?>' class='editInput' ><br>
              <input type="text" id="nbInput" disabled="true" name="Bustop" value='<?php //echo $_SESSION['bustop'] ?>' class='editInput' ><br> -->
        </form>
      </div>
  </div>
  <br><br><br>
</section>
<script>
    var shopName = document.querySelector('.shopName')
    var shopPka = document.querySelector('.shopPka')
    var shopOp = document.querySelector('.shopOp')
    var shopCl = document.querySelector('.shopCl')
    var shopCountry = document.querySelector('.shopCountry')
    var shopState = document.querySelector('.shopState')
    var shopJunction = document.querySelector('.shopJunction')
    var shopBustop = document.querySelector('.shopBustop')
    var shopCity = document.querySelector('.shopCity')
    var shopVCT = document.querySelector('.shopVCT')
    var shopFb = document.querySelector('.shopFb')
    var shopWhat = document.querySelector('.shopWhat')
    var shopPhn = document.querySelector('.shopPhn')
    var shopLi = document.querySelector('.shopLi')
    var our_offer = document.querySelector('.our_offer')
    var settEditIcon = document.querySelector('.settEditIcon')
    var settSaveIconDiv = document.querySelector('.settSaveIconDiv')

    document.querySelector('.settEditIcon').addEventListener('click', function(){
        if(shopName.disabled == true){
            // document.getElementById('snInputEd').focus();
            shopName.disabled = ""
            shopOp.disabled = ""
            shopCl.disabled = ""
            // shopPka.disabled = ""
            shopCountry.disabled = ""
            shopState.disabled = ""
            shopJunction.disabled = ""
            shopBustop.disabled = ""
            shopCity.disabled = ""
            shopVCT.disabled = ""
            shopFb.disabled = ""
            shopWhat.disabled = ""
            shopLi.disabled = ""
            shopPhn.disabled = ""
            our_offer.disabled = ""
            settSaveIconDiv.style.display = "block"
            settEditIcon.style.display = "none"
        }
    })




    function settingProfile(input) {    
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
                           document.querySelector('.settinPic').style.display="block"
                           document.querySelector('.settinUpload').style.marginLeft="15%"
                           
               }
            }




    function settingExec(input) {    
        var blab2 = document.getElementById('blab2');
            if (input.files && input.files[0]) {
                    blab2.style.display = "block";
                    console.log("popop")
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#agnblah')
                            .attr('src', e.target.result)
                            .width(150)
                            .height(200);
                            
                            };
                           reader.readAsDataURL(input.files[0]);
                           document.querySelector('.ExecPic').style.display="block"
                           document.querySelector('.settinUpload').style.marginLeft="15%"
                           
               }
            }




    document.querySelector('.settingProfPicture').addEventListener('click', function(){
        if(document.querySelector('.UpSave').style.display=="flex"){
            document.querySelector('.UpSave').style.display="none"
        }else{
            document.querySelector('.UpSave').style.display="flex"
        }
    })
    if(screen.width >= 889 ){
        document.querySelector('.showSetting').addEventListener('click', function(){
        document.querySelector('.slideeditInput').style.display="block"
        document.querySelector('.slideeditInput').classList.toggle('showSlideeditInput')
        document.querySelector(".ant_close").classList.toggle("ant_open");
        document.querySelector('.profBody').style.overflow = "hidden"
    })
    }else{
        var slideeditInput = document.querySelector('.slideeditInput')
        document.querySelector('.showSetting').addEventListener('click', function(){
            document.querySelector('.slideeditInput').style.display="block"
            slideeditInput.style.width='100%'
            slideeditInput.style.height='100%'
            slideeditInput.style.top='0px'
            slideeditInput.style.right='0px'
            slideeditInput.style.opacity='1'
            slideeditInput.style.visibility='visible'
            document.querySelector('.profBody').style.overflow = "hidden"
        // document.querySelector('.slideeditInput').style.display="block"

        })
    
    }

function chkcontrol(j){
    var chosenCtg = []
    var total=0;
    for(var i=0; i < document.myForm.ckb.length; i++){
        if(document.myForm.ckb[i].checked){
          chosenCtg.push(document.myForm.ckb[i].value)
          total = total +1;
        }
        if(document.myForm.ckb[j].checked == false ){
          document.querySelector('.cl'+j).style.border="1px solid black";
          document.querySelector('.cl'+j).style.color="black";
        }
        if(total > 3){
          alert("Error in selecting "+document.myForm.ckb[j].value+", maximum amount reached.") 
          document.myForm.ckb[j].checked = false ;
          return false;
        }
    }
    if(total<=3 && document.myForm.ckb[j].checked == true){
        document.querySelector('.cl'+j).style.border="1px solid rgb(18, 151, 204)";
        document.querySelector('.cl'+j).style.color="rgb(18, 151, 204)";
        document.cookie="_categoriesEdit="+chosenCtg
    }
}

    document.querySelector('.advance').addEventListener('click', function(){
        if(document.querySelector('.advanceCont').style.display=="none"){
            document.querySelector('.advanceCont').style.display="block"
            console.log(document.querySelector('.advanceCont'));
            document.querySelector('.adv-angle').style.transform="scale(-1)"
        }else{
            document.querySelector('.advanceCont').style.display="none"
            document.querySelector('.adv-angle').style.transform="scale(1)"
        }
        
    })


</script>