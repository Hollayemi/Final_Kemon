<?php 
    require('db.php');
    function testInput($data){
        $data = trim($data);
        $data = stripslashes($data); 
        $data = htmlspecialchars($data);
        return $data;
    }

    function BusinessInfo($conn,$id)
    {
        $sql="SELECT * FROM users WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function AllCategory($conn)
    {
        $sql="SELECT category FROM category";
        $stmt = $conn->prepare($sql);
        $stmt->execute([]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

  
    function distance($lat1, $lon1, $lat2, $lon2) { 
        $pi80 = M_PI / 180; 
        $lat1 *= $pi80; 
        $lon1 *= $pi80; 
        $lat2 *= $pi80; 
        $lon2 *= $pi80; 
        $r = 6372.797; // mean radius of Earth in km 
        $dlat = $lat2 - $lat1; 
        $dlon = $lon2 - $lon1; 
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2); 
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a)); 
        $km = $r * $c; 
        //echo ' '.$km; 
        return $km; 
    }


    function searchBusiness($conn,$searchBy)
    {
        $sql = "SELECT * FROM marketers 
        WHERE our_offer LIKE ? OR category LIKE ? OR shop_name LIKE ?
              OR shop_nick LIKE ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            "%".$searchBy."%","%".$searchBy."%","%".$searchBy."%","%".$searchBy."%"
        ]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
  
    $rez    =   searchBusiness($conn,'wear');



    
    function searchBusinessByShopNick($conn,$shop_nick)
    {
        $sql = "SELECT * FROM marketers WHERE shop_nick = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$shop_nick]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
?>