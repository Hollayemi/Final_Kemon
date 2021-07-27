<!-- <section id="modify" class="main_side">

    <div class="generalAbtMe">
        <div class="aboutMe">
            <i class="fa fa-user"></i>
            <h3>My name</h3>
        </div> 
    </div>

</section>
 -->




<!-- <div class="modal fade lla" id="chances" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true"> -->
<section class="main_side" id="Chances" style="display:none;">
      <div class="activity-tableBroad">
            <div class="mainTable chan">
                <div class="firTopBar"></div>
                <div class="myTableChanHeader">
                  <h4> Chances</h4>
                </div>
               
                <div class="main-chance">
                    <div class="borderGrad">
                         <div class="eachChance">
                            <div class="subTopBar"></div>
                            <i class="material-icons">memory</i>
                            <h4>Memory Space Available<br>
                                <?php echo $_SESSION['spaceLeft'] ?></h4>
                         </div>
                    </div>

                    <div class="borderGrad">
                         <div class="eachChance">
                            <div class="subTopBar"></div>
                            <i class="material-icons">find_in_page</i>
                            <h4> You Have <?php echo sizeof($allPages); ?> Brand(s)  Used</h4>
                         </div>
                    </div>

                    <div class="borderGrad">
                         <div class="eachChance">
                            <div class="subTopBar"></div>
                            <i class="material-icons">insert_drive_file</i>
                            <h4>Xtra <?php echo $myIdFetch['num_Page'] ?> Brand(s) <br> Available</h4>
                         </div>
                    </div>
                    





                    <div class="borderGrad">
                         <div class="eachChance">
                            <div class="subTopBar"></div>
                            <i class="material-icons">find_in_page</i>
                            <h4>You Have <?php echo sizeof($FetchAllTans); ?> Product(s) Used</h4>
                         </div>
                    </div>

                    <div class="borderGrad">
                         <div class="eachChance">
                            <div class="subTopBar"></div>
                            <i class="material-icons">insert_drive_file</i>
                            <h4>Xtra <?php echo $myIdFetch['num_Tab'] ?> Product(s) <br> Available</h4>
                         </div>
                    </div>
                </div>
            </div>
      </div>
    </section>



    <!--  -->



    <!-- <div class="modal fade lla" id="activityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true"> -->
    <section class="main_side" id="Activity" style="display:none;">
      <div class="activity-tableBroad">
            <div class="mainTable maiT">
                <div class="myTableHeader">
                  <h4> Activity Log</h4>
                  <h4 class="close rmvModal"><i class=""></i></h4>
                </div>
                <div class="Tabble">
                    <table>
                      <tr>
                        <th class="mainReq">Request</th>
                        <th>Event Type</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Access</th>
                      </tr>
                      <?php 
                        $result  =  getActivities($conn,$myId);

                        for($i = 0; $i < count($result); $i++){
                            $Request      =   $result[$i]['activity'];
                            $eventType    =   $result[$i]['eventType'];
                            $da           =   $result[$i]['date'];
                            $myAction     =   $result[$i]['myAction'];
                            $dat          =   explode(' ',$da);
                            $date         =   $dat[0];
                            $ti           =   explode('.',$dat[1]);
                            $time         =   $ti[0];
                      ?>
                          <tr>
                            <td><?php echo $Request ?></td>
                            <td><?php echo $eventType ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $time ?></td>
                            <td><?php echo $myAction ?></td>
                          </tr>
                      <?php
                        }
                      ?>
                    </table>
                </div>
            </div>
      </div>
    </section>


<!-- All brands -->

    <section class="main_side for_files_display" id="Brands_s" style="display:none;">
    <div class="show_file_top">
          <h4>Active Brands</h4>
          <h4>Total = <?php echo count($allPages); ?></h4>
      </div>
       <div class="showBrands">
          <?php
              foreach($allPages as $allPage){
                ?>
                <div class="centt_col showBrands_div">
                    <i class='fa fa-file'></i>
                    <h5><?php echo $allPage ?></h5>
                    <div class="showBrands_functons centt_col">
                      <span class="material-icons <?php echo $allPage ?>-d " id="<?php echo $allPage ?>" onclick="toggle(this)">more_vert</span>

                      

                      <form action="../action.php" method="POST" class=" ddam centt_col" style="display:none;">
                        <input type="text" value="<?php echo $allPage?>" name="deleteSelectedPage" style="visibility:hidden; visimility" >
                        <button type='post' name='deleteSelectedPageBtn'id="sadEL" >
                          <span class="material-icons" title="delete page">delete</span>
                        </button>
                      </form>

                      <h4 class="<?php echo $allPage ?>-delete ddam" style="top:55px;position:absolute;right:-0px;visibility:hidden;"><label class="new-button upLabel1" for="sadEL">
                          <span class="material-icons" title="delete page">delete</span>
                      </h4>
                    </div>
                    
                </div>
                <?php
              }
                ?>
       </div>
       <br><br><br><br><br><br><br><br><br><br><br><br><br>
    </section>


    <!-- All products -->
    <section class="main_side for_files_display" id="Product_s" style="display:none;">
      <div class="show_file_top">
          <h4>Active Products</h4>
          <h4>Total = <?php echo count($Main_tabs); ?></h4>
      </div>
       <div class="showBrands">
          <?php
              foreach($Fetch_tabs as $Main_tab){
                ?>
                <div class="centt_col showBrands_div">
                    <i class='fa fa-file'></i>
                    <h5><?php echo $Main_tab ?></h5>
                    <div class="showBrands_functons centt_col">
                      <span class="material-icons <?php echo $Main_tab ?>-d " id="<?php echo $Main_tab ?>" onclick="toggle(this)">more_vert</span>

                      

                      <form action="../action.php" method="POST" class=" ddam centt_col" style="display:none;">
                        <input type="text" value="<?php echo $Main_tab?>" name="deleteSelectedTab" style="visibility:hidden; visimility" >
                        <button type='post' name='deleteSelectedTabBtn'id="sadEL" >
                          <span class="material-icons" title="delete page">delete</span>
                        </button>
                      </form>

                      <h4 class="<?php echo $Main_tab ?>-delete ddam" style="top:55px;position:absolute;right:-0px;visibility:hidden;"><label class="new-button upLabel1" for="sadEL">
                          <span class="material-icons" title="delete page">delete</span>
                      </h4>
                    </div>
                    
                </div>
                <?php
              }
                ?>
       </div>
       <br><br><br><br><br><br><br><br><br><br><br><br><br>
    </section>



    <!-- inactive pages -->

    <section class="main_side for_files_display" id="inactive_page" style="display:none;">
    <div class="show_file_top">
          <h4>Inactive pages</h4>
          <h4>Total = <?php echo count($allPages); ?></h4>
      </div>
       <div class="showBrands">
          <?php
              foreach($allErrArr as $allErrArr_1){
                ?>
                <div class="centt_col showBrands_div">
                    <i class='fa fa-file'></i>
                    <h5><?php echo $allErrArr_1 ?></h5>
                    <div class="showBrands_functons centt_col">
                      <span class="material-icons <?php echo $allErrArr_1 ?>-d " id="<?php echo $allErrArr_1 ?>" onclick="toggle(this)">more_vert</span>
                      
                      <form action="../action.php" method="POST" class=" ddam centt_col" style="display:none;">
                        <input type="text" value="<?php echo $allErrArr_1?>" name="deleteSelectedPage" style="visibility:hidden; visimility" >
                        <button type='post' name='deleteSelectedPageBtn'id="sadEL" >
                          <span class="material-icons" title="delete page">delete</span>
                        </button>
                      </form>

                      <h4 class="<?php echo $allErrArr_1 ?>-delete ddam" style="top:55px;position:absolute;right:-0px;visibility:hidden;"><label class="new-button upLabel1" for="sadEL">
                          <span class="material-icons" title="delete page">delete</span>
                      </h4>
                    </div>
                    
                </div>
                <?php
              }
                ?>
       </div>
       <br><br><br><br><br><br><br><br><br><br><br><br><br>
    </section>
