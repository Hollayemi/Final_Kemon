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
                  <h4 class="close rmvChance" ><i class="fa fa-remove"></i></h4>
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
