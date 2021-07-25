

<script>

document.querySelector('.menuBars').addEventListener('click', function(){
    if(document.querySelector('.leftSidenav').style.marginLeft == "-70%"){
        document.querySelector('.leftSidenav').style.marginLeft="0px"
        document.querySelector('.leftSidenav').style.width="70%"
    }else{
        document.querySelector('.leftSidenav').style.marginLeft="-70%"
        // document.querySelector('.leftSidenav').style.width="-50%"
    }
})

<?php
  if(isset($myErrNote)){
?>
      window.addEventListener('mouseup', function(event){
      if(event.target != document.querySelector('.myAlertbox') && event.target.parentNode != document.querySelector('.myAlertbox')){
      document.querySelector('.mainBox').style.display='none'
      document.querySelector('.kemBody').style.overflow='auto'
    }
})
<?php
  }
?>
</script>
</body>

</html>
