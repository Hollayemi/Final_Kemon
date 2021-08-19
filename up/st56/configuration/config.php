<?php
    require_once "db.php";
    $curPageName        =           substr($_SERVER["SCRIPT_NAME"],strpos($_SERVER["SCRIPT_NAME"],"/")+1);
    $extr               =           explode('/',$curPageName);
    $genId              =           $extr[3];

    

    if(!empty(marketersInfo($conn,$genId))){
        $row_id             =           marketersInfo($conn,$genId);
        $market_id          =           $row_id['id'] ;
        $id                 =           $row_id['id'] ;
    }

    if(!empty(sellerInfo($conn,$id))){
        $sellerInfo =   sellerInfo($conn,$id);
    }

    function testInput($data){
        $data = trim($data);
        $data = stripslashes($data); 
        $data = htmlspecialchars($data);
        return $data;
    }

    function marketersInfo($conn,$genId)
    {
        $sql    ="SELECT * FROM marketers WHERE shop_nick=:shop_nick";
        $stmt   = $conn->prepare($sql);
        $stmt->execute(['shop_nick'=>$genId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    function selectAllCat($conn,$id)
    {
        $sql    ="SELECT * FROM category WHERE id=?";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    function sellerInfo($conn,$id)
    {
        $sql    ="SELECT * FROM users WHERE id=?";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    

    if(isset($_SESSION['user_info_id'])){
        $myVisitor      =  $_SESSION['user_info_id'];
        function visitors($conn,$myVisitor)
        {
            $sql    ="SELECT * FROM users WHERE id=?";
            $stmt   = $conn->prepare($sql);
            $stmt->execute([$myVisitor]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }


    function category($conn,$myVisitor)
    {
        $sql    ="SELECT category FROM category WHERE id=?";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$myVisitor]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function selectNewsletters($conn,$myVisitor)
    {
        $sql    ="SELECT senderShop FROM newsletters WHERE id=?";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$myVisitor]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    function newsletters($conn,$receiverName,$receiverEmail,$senderEmail,$senderShop,$myVisitor)
    {
        $sql    ="INSERT INTO newsletters (receiverName,receiverEmail,senderEmail,senderShop,id) VALUES (?,?,?,?,?)";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$receiverName,$receiverEmail,$senderEmail,$senderShop,$myVisitor]);
        return TRUE;
    }


    function insertRating($conn,$raterID,$extRate,$rateeShop)
    {
        $sql    ="INSERT INTO rating (id,star,F_id) VALUES (?,?,?)";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$raterID,$extRate,$rateeShop]);
        return TRUE;
    }



    function selectStar($conn,$myVisitor)
    {
        $sql    ="SELECT * FROM rating WHERE id=?";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$myVisitor]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    function SelectTrack($conn,$Skey)
    {
        $sql    ="SELECT * FROM trackk WHERE Skey=?";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$Skey]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    




    function SelectTrackForDisplay($conn,$page,$market_id)
    {
        $sql    ="SELECT * FROM trackk WHERE page=? AND real_ID=? ORDER BY date";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$page,$market_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }


    function SelectTrackByPage($conn,$page,$Skey)
    {
        $sql    ="SELECT * FROM trackk WHERE page=? AND Skey=?";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$page,$Skey]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    function SelectAllPage($conn)
    {
        $sql    ="SELECT page FROM trackk";
        $stmt   = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $result;
    }

    function SelectAllPageById($conn,$id)
    {
        $sql    ="SELECT * FROM trackk WHERE real_ID=? ORDER BY date DESC";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



    function SelectAllPic($conn)
    {
        $sql    ="SELECT picture FROM trackk";
        $stmt   = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $result;

    }

    function deletePicture($conn,$page,$Skey)
    {
        $sql    ="DELETE FROM trackk WHERE page=? AND Skey=?";
        $stmt   = $conn->prepare($sql);
        $stmt->execute([$page,$Skey]);
        return True;
    }











    
    function rating($secId,$star,$id,$nameOfBusiness){
        if(isset($_SESSION['user_info_id'])){
            if(empty($star)){
                ?>
                <section class="myRatingSec">
                <div class="cancelRating">
                    <button class="btn">GO Back</button>
                </div>
                    <div>
                    <center>
                            <?php 
                            echo "<h2>Rate ".$nameOfBusiness." Now <i class='fa fa-heart'></i></h2>";
                            
                            include("st/sec.php");
                            ?>
                            <div class="rateyo-readonly-widg myRater" style="block;background-color:#fff;padding:10px 20px;border-radius:5px"><h4 id="ratingVeri"></h4></div>
                            <form action="" method="POST">
                            <input type="text" value="<?php echo $id ?>" name="raterID"  style="display:none">
                            <input type="text" value="<?php echo $secId ?>" name="rateeShop"  style="display:none">
                            <input type="text" value="" id="rateValueId" name="extRate" style="display:none">
                            <input type="submit" value="Submit" class="btn submitRate" name="rateMyShop" style="visibility:hidden; margin-top:10px; height:40px;line-height:30px;margin-left:0px">
                            </form>
                    </center>
                    </div>
    
                </section>
    
                <script>
                    document.querySelector('.cancelRating').addEventListener('click', function(){
                        document.querySelector('.myRatingSec').style.display="none"
                    })
    
                </script>
                <?php
            }
        }
    }
?>