var prevScrollpos = window.pageYOffset;
  window.onscroll= function(){
      var currentScrollPos = window.pageYOffset;
      if(currentScrollPos > 200){
          document.querySelector(".headerBtum").style.width="100%";
          document.querySelector(".headerBtum2").style.width="100%";
          
      }else{
        document.querySelector(".headerBtum").style.width="0%";
        document.querySelector(".headerBtum2").style.width="0%";
      }

      //.slideScroll
    if(document.querySelector(".sideAdvert").style.left == "-450px"){
        if(currentScrollPos > 700){
            document.querySelector(".sideAdvert").style.left = "30px"
            document.querySelector(".sideAdvert").style.opacity = "1"
        }else{
            document.querySelector(".sideAdvert").style.left = "-450px"
            document.querySelector(".sideAdvert").style.opacity = "0"
        }
    }

      document.querySelector('.hideSideAdvert').addEventListener('click', function(){
          document.querySelector(".sideAdvert").style.left = "-445px"
          document.querySelector(".sideAdvert").style.opacity = "0"
      })
      prevScrollpos=currentScrollPos;
  }