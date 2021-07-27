<script>
  function toggle(e) {
    var id      = e.id;
    var myClass = "."+id + "-d"

    var forDelete = "."+id + "-delete"

    var x = document.getElementsByClassName("ddam");
      for (i = 0; i < x.length; i++) {
        x[i].style.visibility = "hidden";
        x[i].style.top = "25px";
      }
    var elem    = document.querySelector(forDelete)

    var forDelete_p = document.querySelector(forDelete)
    if(elem.style.visibility == "hidden"){
      forDelete_p.style.visibility = "visible"
      forDelete_p.style.top = "30px"
    }else{  
      forDelete_p.style.visibility = "hidden"
      forDelete_p.style.top = "25px"
    }
  }


  document.querySelector('.advance').addEventListener('click', function(){
        if(document.querySelector('.advanceCont').style.display=="none"){
            document.querySelector('.advanceCont').style.display="block"
            document.querySelector('.adv-angle').style.transform="scale(-1)"
        }else{
            document.querySelector('.advanceCont').style.display="none"
            document.querySelector('.adv-angle').style.transform="scale(1)"
        }
        
    })




  document.querySelector(".arrRight").addEventListener('click',function(){
            document.getElementById('Profile').style.marginLeft="-3%"
            document.getElementById('Profile').style.opacity="1"
            document.querySelector(".cloudCover").style.visibility="visible"
        
      });




document.querySelector(".questionInfo").addEventListener('click',function(){
  if(document.querySelector(".is-active").style.padding != "20px 30px"){
    document.querySelector(".is-active").style.width   = "auto"
    document.querySelector(".is-active").style.height  = "auto"
    document.querySelector(".is-active").style.padding = "20px 30px"
    document.querySelector(".spanErr").style.opacity  = "0"
  }else{
    document.querySelector(".is-active").style.padding = "0px"
    document.querySelector(".is-active").style.width   = "0px"
    document.querySelector(".is-active").style.height  = "0px"
  }
});



window.addEventListener('mouseup', function(event){
    if(event.target != document.getElementById('.is-active') && event.target.parentNode != document.getElementById('.is-active')){
      document.querySelector(".is-active").style.padding = "0px"
      document.querySelector(".is-active").style.width   = "0px"
      document.querySelector(".is-active").style.height  = "0px"
    }
})




      // $(function () {
      //   var rating = <?php //echo $averageStars?>;
      //   $(".rateyo-readonly-widg").rateYo({
      //     rating: rating,
      //     numStars: 5,
      //     precision: 2,
      //     minValue: 1,
      //     maxValue: 5
      //   })
      //   console.log(<?php //echo $averageStars?>)
      // });





    //   window.addEventListener('mouseup', function(event){
    //   if(event.target != document.getElementById('Profile') && event.target.parentNode != document.getElementById('Profile')){
    //     document.getElementById('Profile').style.marginLeft="-79%"
    //   }

    // })

    
      document.querySelector(".arrRight").addEventListener('click',function(){
            document.getElementById('Profile').style.marginLeft="-3%"
            document.getElementById('Profile').style.opacity="1"
            document.querySelector(".cloudCover").style.visibility="visible"
        
      });

      document.querySelector(".lArr").addEventListener('click',function(){
            document.getElementById('Profile').style.marginLeft="-349px"
            document.getElementById('Profile').style.opacity=".8"
            document.querySelector(".cloudCover").style.visibility="hidden"
        
      });
    
  
    function moveNotify(){
      if(document.querySelector(".notify").style.right != "-85px"){
        document.querySelector(".notify").style.right="-85px"
        document.querySelector(".bell-2").style.display="block"
      }else{
        document.querySelector(".notify").style.right="0px"
        document.querySelector(".bell-2").style.display="none"
      }
    }
  </script>
  <script>
    function readURLProfile(input) {    
        var blab = document.getElementById('blab');
            if (input.files && input.files[0]) {
                    blab.style.display = "block";
                    var reader = new FileReader();
                    reader.onload = function (e){
                        $('#agnblah')
                            .attr('src', e.target.result)
                            .width(150)
                            .height(200);
                            };
                           reader.readAsDataURL(input.files[0]);
               }
            }
    // <input type='file' onchange="readURL(this);"/>
    // <img id="blah" src="#" alt="your image"/>

   
function readURL(input) {    
        var blab2 = document.getElementById('myblab');
        var blab = document.getElementById('secblab');
            if (input.files && input.files[0]) {
                document.querySelector('.myCme').style.display="none"
                blab.style.display = "block";
                blab2.style.display = "block";
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#myblab')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                        };
                        reader.readAsDataURL(input.files[0]);
               }
            }
        
  
<?php
  if(isset($_GET['alert'])){
    ?>
    window.addEventListener('mouseup', function(event){
    if(event.target != document.querySelector('.myAlertbox') && event.target.parentNode != document.querySelector('.myAlertbox')){
      document.querySelector('.mainBox').style.display='none'
      document.querySelector('.profBody').style.overflow='auto'
    }
})
<?php
  }
?>


<?php 
			if(isset($knwO)){
				?>
				window.addEventListener('mouseup', function(event){
				if(event.target != document.querySelector('.loginStatus') && event.target.parentNode != document.querySelector('.loginStatus')){
				document.querySelector('.loginStatus').style.marginTop = '-400px';
				}

			})
		<?php
			}
		?>

function remACt(){
  var ele  =   document.getElementById('activityModal');
    ele.style.display="none"
    ele.style.paddingRight = null
    ele.classList.remove("show")         
    ele.removeAttribute("aria-hidden")  
    ele.setAttribute("aria-modal","true")  
    $('.modal-backdrop'). remove();  
    document.querySelector('.profBody').style.overflow ="auto"
}

function rmvChances(){
  var ele  =   document.getElementById('chances');
    ele.style.display="none"
    ele.style.paddingRight = null
    ele.classList.remove("show")         
    ele.removeAttribute("aria-hidden")  
    ele.setAttribute("aria-modal","true")  
    $('.modal-backdrop'). remove();  
    document.querySelector('.profBody').style.overflow ="auto"
}


document.querySelector(".rmvModal").addEventListener('click',function(){
  remACt();
});

window.addEventListener('mouseup', function(event){
    if(
        event.target != document.querySelector('.myTableHeader') && event.target.parentNode != document.querySelector('.myTableHeader')&&
        event.target != document.querySelector('.Tabble') && event.target.parentNode != document.querySelector('.Tabble')&&
        event.target != document.querySelector('.maiT') && event.target.parentNode != document.querySelector('.maiT')&&
        event.target != document.getElementsByTagName('.tr') && event.target.parentNode != document.getElementsByTagName('.tr')
    ){
      remACt();
    }
})

function delayBit(){
  document.querySelector('.loadTab').style.display = 'flex';
  

  return true;
}

function switchPage(PageName) {
    var eeClass  = '.'+PageName+'-ee'
    document.querySelector('.loadTab').style.display = 'flex';
    setTimeout(function(){
      var i;
      var x = document.getElementsByClassName("main_side");
      for (i = 0; i < x.length; i++) {
        //  x[i].style.display = "none";  
        x[i].style.transform = "scale(0)";
        x[i].style.height = "0px";
        x[i].style.minHeight = "0px";
        x[i].style.padding = "0px";
        //  x[i].style.margin = "0px";
        x[i].style.opacity = "0";
      }

      document.getElementById(PageName).style.display = "block";  
      document.getElementById(PageName).style.height = "auto";  
      document.getElementById(PageName).style.transform = "scale(1)";
      document.getElementById(PageName).style.opacity = "1";
      if(screen.width < 890){
        document.getElementById('Profile').style.marginLeft="-349px"
        document.getElementById('Profile').style.opacity=".8"
        document.querySelector(".cloudCover").style.visibility="hidden"
      }
      setTimeout(function(){
        document.querySelector('.loadTab').style.display = 'none'; 
      },1000)
      
    },1000)
}


document.querySelector(".dropCreate").addEventListener('click',function(){
  if(document.querySelector(".CreateDropdown_btns").style.visibility == "visible"){
    document.querySelector(".CreateDropdown_btns").style.width = "100px"
    document.querySelector(".CreateDropdown_btns").style.height = "0px"
    document.querySelector(".CreateDropdown_btns").style.visibility = "hidden"
  }else{
    document.querySelector(".CreateDropdown_btns").style.width = "180px"
    document.querySelector(".CreateDropdown_btns").style.height = "150px"
    document.querySelector(".CreateDropdown_btns").style.visibility = "visible"
  }

});



// document.querySelector(".rmvChance").addEventListener('click',function(){
//   rmvChances();
// });

window.addEventListener('mouseup', function(event){
    if(
       event.target != document.querySelector('.chan') && event.target.parentNode != document.querySelector('.chan')&&
       event.target != document.querySelector('.main-chance') && event.target.parentNode == document.querySelector('.main-chance')
    )
    
    {
      rmvChances();
    }
})




</script>
