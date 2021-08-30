if(localStorage.getItem('rate') != null){
    // document.querySelector('.myRater').style.display="none"
  }else{
    document.querySelector('.myRater').style.display="block"
  }

    $(function () {
      var rating = 0;
      $(".rateyo-readonly-widg").rateYo({
        rating: rating,
        numStars: 5,
        precision: 2,
        minValue: 1,
        maxValue: 6
      }).on("rateyo.change", function (e, data) {
        document.getElementById('rateValueId').value=data.rating
        if(data.rating > 0){
          document.querySelector('.submitRate').style.visibility="visible"
        }else{
          document.querySelector('.submitRate').style.visibility="hidden"
        }
      });
    });


  

  $(function () {
    var chk = localStorage.getItem('rate')
   if(chk == null){
      var rateYoInstance = chk
      console.log(rateYoInstance)
      $('.rating_star').css('display','none')
    $("#rateYo").rateYo({
      fullStar: false,
      onSet: function (rating,rateYoInstance){
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
