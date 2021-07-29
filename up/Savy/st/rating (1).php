<!DOCTYPE html>
<html lang="en">
  <head>
    <title>RateYo - Scratchpad</title>
    <meta charset="utf-8"></meta>
    <link rel="stylesheet" href="./jquery.rateyo.min.css"/>
    <!-- <script src="https://kit.fontawesome.com/bf2c5b2891.js" crossorigin="anonymous"></script> -->
    <!-- <link rel="stylesheet" href="font-awesome.min.css"> -->
    
  </head>
  <body>
   

  <div  class="rating_star" style="padding:5px">
    <i class="fa fa-star fa-2x" style="color:#ccc" data-index=0></i> 
    <i class="fa fa-star fa-2x" style="color:#ccc" data-index=1></i>
    <i class="fa fa-star fa-2x" style="color:#ccc" data-index=2></i>
    <i class="fa fa-star fa-2x" style="color:#ccc" data-index=3></i>
    <i class="fa fa-star fa-2x" style="color:#ccc" data-index=4></i>
  </div>

    <div class="rateyo-readonly-widg"></div>
    <div id="rateYo"></div>

    <script type="text/javascript" src="./jquery.min.js"></script>
    <script type="text/javascript" src="./jquery.rateyo.js"></script>


    
    <script>
    $(function () {
      var chk = localStorage.getItem('rate')
      console.log(chk)
     if(chk == null){
        var rateYoInstance = chk
        console.log(rateYoInstance)
        $('.rating_star').css('display','none')
      $("#rateYo").rateYo({
        fullStar: true,
        onSet: function (rating,rateYoInstance){
          // alert(rating)
          localStorage.setItem('rate',rating)

        }
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
  </body>
</html>
