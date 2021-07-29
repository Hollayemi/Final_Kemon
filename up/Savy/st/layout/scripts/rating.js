function showLinkMenu(){
    document.querySelector(".shotLnk_cancle").classList.toggle("shotLnk");
    var showLinkMe = document.getElementById('showLinkMe')
  
    if(showLinkMe.style.display == "none"){
      showLinkMe.style.display= "block"
    }else{
      showLinkMe.style.display= "none"
    }
    
   }
  
  
  
  
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
        alert(rating)
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
  
  
  
  
  
  
  