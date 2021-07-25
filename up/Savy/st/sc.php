<?php $sc ='yes'; ?>
<!DOCTYPE html>
<html lang="en">
<?php 
  if(isset($_SESSION['user_info_id'])){
    $Pagehommie = "true"; 
  }
  ?>
<head>
  <meta charset="utf-8">
  <title>Kemon-Market</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" href="../v2.3.2/jquery.rateyo.min.css"/>
  <script>document.cookie = "_quex224My= "+screen.width</script>
  <link href="st/img/km.png" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../lib/venobox/venobox.css" rel="stylesheet">
  <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link rel="stylesheet" href="st/css/mycss.css">
  <?php
    include('in-session.php');
    include('css/style.css.php');
    include('dropdown.php');
  ?>
</head>
<body>

<div class="mapBodyBlack" style="visibility:hidden;display:none;">
   <div class="mainMap">
      <div class="removeMap">
          
      </div>
      <i class="fa fa-remove removeMapIcon"></i>
      <!-- <iframe width="100%" height="100%" 
      src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyBltSf8GhZIwPFark4NkUJhY53P-CY3a0M&origin=<?php// echo $_SESSION['latitude'].','. $_SESSION['longitude']?>&destination=6.5528867999999995,3.3538272&avoid=tolls|highways" frameborder="0"></iframe> -->
      <iframe width="100%" height="100%" src="https://maps.google.com/maps/place?q<?php echo $_SESSION['latitude'].','. $_SESSION['longitude']?>&output=embed" frameborder="0"></iframe>
   </div>
</div>



<!-- <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0" nonce="WHM8mb9K"></script> -->
 <?php
  
    $secId  =  $row_id['id'];
    if(empty($selectStar['star'])){$maStar = ""; }else{$maStar = $selectStar['star'];}
        if(isset($myVisitor)){
            rating($secId,$maStar,$myVisitor,$row_id['shop_name']);
        }
  
?>
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#main">Ke<span>m</span>on</a></h1>
      </div>
             <nav id="nav-menu-container">
              <ul class="nav-menu">
              <li class="menu-active"><a href="#intro">Home</a></li>
            <?php
            
              foreach($allMyReadyPageArr as $tabb){
                echo '<li class="mainDropper"><a href="'.$tabb.'.php">'.ucwords(strtolower($tabb)).'</a>';
                echo "<ul>";
                
                for($b=0;$b<count($allMyReadyTabArr); $b++){
                  
                  $eacT = explode('-', $allMyReadyTabArr[$b]);
                  if(strtolower($eacT[0]) == strtolower($tabb)){
                      echo '<li><a href="../tb/'.strtolower($allMyReadyTabArr[$b]).'.php"> '.ucwords($eacT[1]).'</a></li>';
                  }
                }
                
                ?>
                </ul>
                
              </li><?php
                

              }
            ?>
            <li style="position:absolute;right:15px">

              <?php
              if(isset($_SESSION['user_info_id'])){
                  echo '<form method="POST" action="'.$_SERVER["PHP_SELF"].'">
                        <button type="submit" name="Newsletter"style="margin-left:90px"class="subscribeClass" value="submit">Subscribe</button>
                      
                  </form>';
                  echo '<li class="subscribeClass" style="margin-top:-5px"><a href="../../signin.php">Logout</a></li>';
                  
              }else{
                echo '<li class="subscrib. before the `shown.bs.popover` or `hidden.bs.popover` event occurs). This is considered a "manual" triggering of the popover.

{% highlight js %}$('#element').popover('toggle'){% endhighlight %}

#### `.popover('dispose')`

Hides and destroys an element's popover. Popovers that use delegation (which are created using [the `selector` option](#options)) cannot be individually destroyed on descendant trigger elements.

{% highlight js %}$('#element').popover('dispose'){% endhighlight %}

#### `.popover('enable')`

Gives an element's popover the ability to be shown. **Popovers are enabled by default.**

{% highlight js %}$('#element').popover('enable'){% endhighlight %}

#### `.popover('disable')`

Removes the ability for an element's popover to be shown. The popover will only be able to be shown if it is re-enabled.

{% highlight js %}$('#element').popover('disable'){% endhighlight %}

#### `.popover('toggleEnabled')`

Toggles the ability for an element's popover to be shown or hidden.

{% highlight js %}$('#element').popover('toggleEnabled'){% endhighlight %}

#### `.popover('update')`

Updates the position of an element's popover.

{% highlight js %}$('#element').popover('update'){% endhighlight %}

### Events

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th style="width: 150px;">Event Type</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>show.bs.popover</td>
      <td>This event fires immediately when the <code>show</code> instance method is called.</td>
    </tr>
    <tr>
      <td>shown.bs.popover</td>
      <td>This event is fired when the popover has been made visible to the user (will wait for CSS transitions to complete).</td>
    </tr>
    <tr>
      <td>hide.bs.popover</td>
      <td>This event is fired immediately when the <code>hide</code> instance method has been called.</td>
    </tr>
    <tr>
      <td>hidden.bs.popover</td>
      <td>This event is fired when the popover has finished being hidden from the user (will wait for CSS transitions to complete).</td>
    </tr>
    <tr>
      <td>inserted.bs.popover</td>
      <td>This event is fired after the <code>show.bs.popover</code> event when the popover template has been added to the DOM.</td>
    </tr>
  </tbody>
</table>

{% highlight js %}
$('#myPopover').on('hidden.bs.popover', function () {
  // do something...
})
{% endhighlight %}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              <div class="details">
         <?php echo '<h3><a href="'.$matchLink[$_SESSION['randRange2']-1].'">'.$matchName[$_SESSION['randRange2']-1].'</a></h3>';?>
         <div class="social">
             <a href=""><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$_SESSION['in-phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$_SESSION['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>
         </div>
       </div>
     </div>
    
     <div class="col-lg-4 col-md-6">
       <div class="speaker">
       <?php echo '<img src="'.$matchPic[$_SESSION['randRange3']-1].'" alt="Speaker 1" height="350px" width="100%" class="picBox">'?>
         <div class="details">
         <?php echo '<h3><a href="'.$matchLink[$_SESSION['randRange3']-1].'">'.$matchName[$_SESSION['randRange3']-1].'</a></h3>';?>

           <div class="social">
             <a href=""><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$_SESSION['in-phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$_SESSION['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>
         </div>
       </div>
     </div>
     <div class="col-lg-4 col-md-6">
       <div class="speaker">
       <?php echo '<img src="'.$matchPic[$_SESSION['randRange4']-1].'" alt="Speaker 1" height="350 !important" width="100%" class="picBox">'?>
         <div class="details">
         <?php echo '<h3><a href="'.$matchLink[$_SESSION['randRange4']-1].'">'.$matchName[$_SESSION['randRange4']-1].'</a></h3>';?>

           <div class="social">
             <a href=""><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$_SESSION['in-phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$_SESSION['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>

         </div>
       </div>
     </div>

     <div class="col-lg-4 col-md-6">
       <div class="speaker">
       <?php echo '<img src="'.$matchPic[$_SESSION['randRange5']-1].'" alt="Speaker 1" height="350px" width="100%" class="picBox">'?>
         <div class="details">
         <?php echo '<h3><a href="'.$matchLink[$_SESSION['randRange5']-1].'">'.$matchName[$_SESSION['randRange5']-1].'</a></h3>';?>

         <div class="social">
             <a href=""><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$_SESSION['in-phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$_SESSION['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>
           </div>
         </div>
       </div>
     </div>
    </section>
  