<?php
  if(isset($_SESSION['user_info_id'])){
    $user_id = $_SESSION['user_info_id'];

    $chkRaSql="SELECT * FROM rating WHERE id='$user_id'";
    $chkRaRun=mysqli_query($mysqli,$chkRaSql);
    $chkRaRow = mysqli_fetch_assoc($chkRaRun);
    $sn = $_SESSION['in-shop_name'];
    echo "<script>document.cookie='_duequiues68293::yibon =".($user_id+999)."'</script>";
    echo "<script>document.cookie='_duequiues68293::yibsn =".$sn."'</script>";
    echo "<script>document.cookie='_duequiues68293::yibst =4'</script>";
    if(isset($chkRaRow['star']) && $chkRaRow['shopname']==$_SESSION['in-shop_name']){
      echo "<script>localStorage.setItem('rate',".$chkRaRow['star'].")</script>";
    }
}else{
  $user_id = -23;
}
?>

  
<script>
  var myId = "<?php echo $user_id ?>"
  var shopName = "<?php echo $_SESSION['in-shop_name'] ?>";
  
   $(function () {
    var chk = localStorage.getItem('rate')
    // console.log('hhkj')
   if(chk == null){
      var rateYoInstance = chk
      console.log(rateYoInstance)
      $('.rating_star').css('display','none')
    $("#rateYo").rateYo({
      fullStar: true,
      onSet: function (rating,rateYoInstance){
        if(myId != -23){
          
          localStorage.setItem('rate',rating)
          document.cookie = ':rebis_jrle2234-edcd = '+5
          document.cookie="_quesdeil332246="+(rating+999)


          <?php
        
          
          $myRasn = $_COOKIE['_duequiues68293::yibsn'];
          $myRaid = $_COOKIE['_duequiues68293::yibon']-(999);
          $myRast = $_COOKIE['_duequiues68293::yibst']-999;
          $raSql="INSERT INTO rating (id,star,shopname) VALUES ('$myRaid','$myRast','$myRasn')";
          mysqli_query($mysqli,$raSql);
          ?>

          }else{

          }
          
        
       
        
       
        }
      // }else{
        
      //   localStorage.setItem('rate',rating)
      //   document.cookie = ':rebis_jrle2234-edcd = '+5<?php //echo $_SESSION['user_info_id']+999; ?>;
      //   document.cookie="_quesdeil332246="+(rating+999)
        
      // }
    
          });
   }else{
     var chosen_index = chk-1;
     for(var i= 0; i <= chosen_index; i++){
      $('.rating_star').css('display','block')
     $('.fa-star:eq('+i+')').css('color','green')
   }
  }
  });

  
  
  

  </script>