<style>
@charset "utf-8";

html{overflow-y:scroll; overflow-x:hidden;}
html, body{margin:0; padding:0; font-size:14px; line-height:1.6em;}

*, *::before, *::after{box-sizing:border-box;}

.bold{font-weight:bold;}
.center{text-align:center;}
.right{text-align:right;}
.uppercase{text-transform:uppercase;}
.capitalise{text-transform:capitalize;}
.hidden{display:none;}
.nospace{margin:0; padding:0; list-style:none;}
.block{display:block;}
.justified{text-align:justify;}
.inline *{display:inline-block;}
.inline *:last-child{margin-right:0;}
.pushright li{margin-right:20px;}
.pushright li:last-child{margin-right:0;}
.borderedbox{border:1px solid;}
.overlay{position:relative; z-index:1;}
.overlay::after{display:block; position:absolute; top:0; left:0; width:100%; height:100%; content:""; z-index:-1;}
.bgded{background-position:top center; background-repeat:no-repeat; background-size:cover;}
.circle{border-radius:50%; background-clip:padding-box;}

.btn{display:inline-block; padding:5px 18px 16px; text-transform:uppercase; border:1px solid;}
.readMoreBtn{display:inline-block; padding:5px 18px; text-transform:uppercase; border:1px solid; height:50px !important;min-height:50px !important}
.readMore1{width:100%;}

blockquote{display:block; position:relative; width:100%; margin:0; padding:0; line-height:1.4; z-index:1;}
blockquote::before{display:block; position:absolute; top:0; left:0; font-family:"Font Awesome\ 5 Free"; font-weight:900; font-size:60px; line-height:60px; content:"\f10d"; z-index:-1;}

.clear, .group{display:block;}
.clear::before, .clear::after, .group::before, .group::after{display:table; content:"";}
.clear, .clear::after, .group, .group::after{clear:both;}

a{outline:none; text-decoration:none;}

.fl_left, .imgl{float:left;}
.fl_right, .imgr{float:right;}

img{width:auto; max-width:100%; height:auto; margin:0; padding:0; border:none; line-height:normal; vertical-align:middle;}
.imgl{margin:0 15px 10px 0; clear:left;}
.imgr{margin:0 0 10px 15px; clear:right;}


/* Fonts
--------------------------------------------------------------------------------------------------------------- */
body, input, textarea, select{font-family:Verdana, Geneva, sans-serif;}
h1, h2, h3, h4, h5, h6, .heading{font-family:Georgia, "Times New Roman", Times, serif;}


/* Forms
--------------------------------------------------------------------------------------------------------------- */
form, fieldset, legend{margin:0; padding:0; border:none;}
legend{display:none;}
label, input, textarea, select, button{display:block; resize:none; outline:none; color:inherit; font-size:inherit; font-family:inherit; vertical-align:middle;}
label{margin-bottom:5px;}
:required, :invalid{outline:none; box-shadow:none;}
::placeholder{opacity:1;}/* Makes sure the placeholder text is not transparent */


/* Generalise
--------------------------------------------------------------------------------------------------------------- */
h1, h2, h3, h4, h5, h6, .heading{margin:0 0 20px 0; font-size:22px; line-height:normal; font-weight:normal; text-transform:capitalize;}
.heading.nospace{margin-bottom:0;}

address{font-style:normal; font-weight:normal;}
hr{display:block; width:100%; height:1px; border:solid; border-width:1px 0 0 0;}

.font-xs{font-size:.8rem;}
.font-x1{font-size:1.2rem;}
.font-x2{font-size:1.8rem;}
.font-x3{font-size:2.8rem;}

.wrapper{display:block; position:relative; width:100%; margin:0; padding:0; text-align:left; word-wrap:break-word;}
/*
The "hoc" class is a generic class used to centre a containing element horizontally
It should be used in conjunction with a second class or ID
*/
.hoc{display:block; margin:0 auto;}


/* HTML 5 Overrides
--------------------------------------------------------------------------------------------------------------- */
address, article, aside, figcaption, figure, footer, header, main, nav, section{display:block; margin:0; padding:0;}


/* Grid - RS-MQF 1140 V.2 - https://www.os-templates.com/free-basic-html5-templates/rs-mqf-1140
--------------------------------------------------------------------------------------------------------------- */
.one_half, .one_forth, .one_third, .two_third, .one_quarter, .two_quarter, .three_quarter{display:inline-block; float:left; margin:0 0 0 4.21052%; list-style:none;}

.first{margin-left:0; clear:left;}

.one_quarter{width:21.8421%;}
.one_forth{width:23.947265%;}
.one_third{width:30.52631%;}
.one_half, .two_quarter{width:47.89473%;}
.two_third{width:65.26315%;}
.three_quarter{width:73.94736%;}


/* Spacing
--------------------------------------------------------------------------------------------------------------- */
.btmspace-10{margin-bottom:10px;}
.btmspace-15{margin-bottom:15px;}
.btmspace-30{margin-bottom:30px;}
.btmspace-50{margin-bottom:50px;}
.btmspace-80{margin-bottom:80px;}

.rgtspace-5{margin-right:5px;}
.rgtspace-10{margin-right:10px;}
.rgtspace-15{margin-right:15px;}
.rgtspace-30{margin-right:30px;}
.rgtspace-50{margin-right:50px;}
.rgtspace-80{margin-right:80px;}

.inspace-5{padding:5px;}
.inspace-10{padding:10px;}
.inspace-15{padding:15px;}
.inspace-30{padding:30px;}
.inspace-50{padding:50px;}
.inspace-80{padding:80px;}
.faico li a i{padding-top:10px !important;}


.fir{animation: fir 1s ease-out 0s forwards;}
@keyframes fir {0%{margin-top:-40px;transform: translateY(12%)rotate(50deg);opacity:0;}100%{margin-top:5px;transform: translateX(5px);opacity:1;}}
.thr{border:none;background-color:transparent;animation: thr 1s ease-out 0s forwards;color:orange}
@keyframes thr{0%{margin-top:-40px;transform: translateY(12%)rotate(50deg);opacity:0;}100%{margin-top:5px;transform: translateX(34px);opacity:1;}}
.sec{animation: sec 1s ease-out 0s forwards;}
@keyframes sec {0%{margin-top:-40px;transform: translateY(12%)rotate(50deg);opacity:0;}100%{margin-top:5px;transform:translateX(20px);opacity:1;}}
.deleteBtn{margin-top:-55px;margin-left:160px;}

.popIn{
    position:fixed;
    display: block;
    visibility:hidden;
    top:70px;
    right:70px;
    width:80%;
    height:70%;
    transition:.5s;
    opacity:0;
    overflow-y: auto;
    overflow-x:hidden;
}
#changeText{
    width:60%;
    text-align:left;
}
.cancelPopX{
    position:absolute;
    right:10%;
    cursor:pointer;
}
.popOut::-webkit-scrollbar{
    width:5px;
    background-color:#fff;
}
.popOut::-webkit-scrollbar-button{
    background-color: rgb(189, 189, 194);
    display: none;
    
}
.popOut::-webkit-scrollbar-thumb{
    background-color: rgb(18, 151, 204);
    border-radius:30px;
}
.popOut{
    top:0px;
    right:0px;
    opacity:.95;
    visibility:visible;
    width:100%;
    margin-left:10%;
    height:100%;
    padding:30px;
    color:#fff;
    z-index:3000;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif !important;
}
.popOut img{
    width:300px;
    height:300px;
}
.popOut span{
    position:fixed;
    border:transparent;
    right:3%;
    width:70px;
    transform:rotate(-30deg);
    border-radius:50%;
    height:70px;
    background-color: rgb(10, 88, 119)
}
.popOut h5{
    margin-top:5%;
    padding-left:30px;
    font-size: 19px;
}
.btmspace-15::placeholder{
    color:#fff !important;
}
.jq-ry-group, .rating_star{
    
    margin-left:10%;
    margin-bottom:5px;
}
.rate_review{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.subscribeClass{
    border:1px solid rgb(255, 183, 0);
     padding:5px 10px;
     margin-right:20px;
     background-color: rgb(255, 196, 0);
     color:#fff;
     font-size:20px;
     transition:.5s;
     -o-transition:.5s;
     -moz-transition:.5s;
   }
   .subscribeClass:hover{
      background-color:transparent;
      border:1px solid #fff;
   }
  .popLogin{
    display: none;
    position: fixed;
    right:30px;
    top:100px;
    z-index:300;
    color:#fff !important;
    font-size:23px !important;
    height:50px;
    line-height:50px;
    background-color: transparent;
    border:1px solid #fff;
    border-radius:5px;
    padding:0px 15px;
    transition:.5s;
    -o-transition:.5s;
    -moz-transition:.5s;
  }
  .popLogin h4{
   color:#fff !important;
   font-size:23px !important;
   height:40px;
   line-height:50px;
   padding:0px 15px;
  }
 
  .popLogin:hover{
   background-color: red;
   border:1px solid red;
  }
  @media screen and (max-width:978px){
    .row0{
        height:50px;
        
    }
  }
<?php

$mysqli=mysqli_connect('sql105.epizy.com','epiz_28257429','BHiMYLgFzV3pjb','epiz_28257429_market');
$shopName = $_SESSION['in-shop_name'];
$sql="SELECT MainColor, TextColor, SubColor, LinkColor FROM marketers WHERE shop_name = '$shopName'";
$run=mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($run);
  echo "
    .row0, .row0 a{
        background-color:".$row['MainColor']." !important;
    }
    .row0 a{
        color:".$row['LinkColor']." !important;
    }
    .row0 a:hover{
        color:".$row['SubColor']." !important;
    }
    .logoname{
        color:".$row['TextColor']." !important;
    }
    .overlay::after{
        background-color:".$row['MainColor']." !important;
        opacity:.56
    }
    #gallery .gallery-carousel .center {
      border: 6px solid ".$row['MainColor'].";
    }
    .nav-menu a, #header #logo h1 span{
      color:".$row['MainColor']." !important;
      margin-right:10px
    }
    #mainav, #mainav li{
      background-color:".$row['SubColor']." !important;
    }
    #mainav a:hover, #mainav a:active{
        background-color:".$row['MainColor']." !important;
        color:".$row['SubColor']." !important;
    }
    #mainav li li a, #mainav .active li a{
    background-color:".$row['SubColor']." !important;
    color:".$row['LinkColor']." !important;
    opacity:.8;
    }
    .btn:hover, .backtotop:hover{
        background-color:transparent !important;
        color:".$row['MainColor']." !important;
    }
  
    .linklist li a, .mapAdd, .heading a{
        color:".$row['TextColor']." !important;
    }
    
    .btn,.backtotop{
        background-color:".$row['MainColor']." !important;
    }
    .btnOnWhite:hover{
        line-height:20px;
        border-color:".$row['MainColor']." !important;
    }
    .subscribeClass{
        background-color:".$row['MainColor']." !important;
        border: 1px solid".$row['MainColor']." !important;
        box-shadow: 0 4px 6px 0 rgba(0, 0, 0, 0.35), 0 6px 16px 0 rgba(0, 0, 0, 0.35);
    }
    .overview > li figure a::after{
        background-color:".$row['MainColor']." !important;
        opacity:.3;
    }
    .subscribeClass:hover{
        background-color:transparent !important;
        border:1px solid #fff !important;
    }
    #subscribe:before, #about:before{
      background: ".$row['MainColor'].";
      opacity:.5;
    }
    .gradient{
        background-image:linear-gradient(to bottom right,".$row['MainColor'].", ".$row['SubColor'].") !important;
    }
    .nav-menu a, #header #logo h1 span{
      color: ".$row['MainColor'].";
    }
    .nav-menu a:hover, #header #logo h1 span:hover{
      color: ".$row['SubColor'].";
    }
    .nav-menu ul li a{
    color: ".$row['MainColor']." !important;
    }
    .nav-menu ul li:hover > a {
      background:".$row['MainColor'].";
      color: ".$row['LinkColor']." !important;
    }
    .nav-menu > li > a:before{
      background: ".$row['SubColor']." !important;
    }
    .logoname span{
        color: ".$row['MainColor']." !important;
    }
    
    .fa2, .fa3, .shotLnk, .show_shotLink{
        background: ".$row['MainColor']." !important;
        color: ".$row['LinkColor']." !important;
    }
    .shotLnk{opacity:.9}
    .fa2:hover, .fa3:hover, .fa:hover{
        background:transparent !important;
        color: ".$row['MainColor']." !important;
    }
    .powered{
        color: ".$row['MainColor']." !important;
        font-size:15px;
    }
    .secLogoname span{
        font-size:30px !important;
    }
    .kmLogo{
        margin-left:15px;
        color: ".$row['LinkColor']." !important;
        // height:0px;
        display:none;
    }
    @media screen and (max-width:750px){
        .kmLogo{
            diaplay:block !important;
        }
    }
    .pageTitle{
        color: ".$row['MainColor']." !important;
        text-aligbn:center;
    }
    .LLS,.LLSa{
        color: ".$row['LinkColor']." !important;
        background: ".$row['SubColor']." !important;
        border:0px solid ".$row['LinkColor']." !important;
        text-align:center;
        height:35px;
        line-height:35px;
        max-width:200px;
    }
    .LLS:hover,.LLSa:hover, .sm:hover{
        background:transparent !important;
        border: 1px solid ".$row['SubColor']." !important;
    }
    .sm:hover{color: ".$row['TextColor']."!important;}
    .LLS a{
        color: ".$row['LinkColor']." !important;
    }
    .LLSa{min-width:180px !important;min-height:40px !important;}
    .LLSUB{text-align:center !important; width:100%;}
    .loginNav{position:absolute;border: 1px solid ".$row['LinkColor']." !important;max-width:200px;width:100px;text-align:center;padding:5px;right:20px; transition:.3s;}
    .loginNav a{width:100% !important;background:transparent !important;}
    .loginNav:hover{background: ".$row['SubColor']." !important;border: 1px solid ".$row['SubColor']." !important;}
    .subscribeClass{border: 1px solid ".$row['LinkColor']." !important;}
    .subscribeClass:hover{border: 1px solid ".$row['SubColor']." !important;background: ".$row['SubColor']." !important;}
    .readMore1{border: 1px solid ".$row['MainColor']." !important;}
    .popOut{background-image:linear-gradient(to bottom right,".$row['MainColor'].", ".$row['SubColor'].") !important;color: ".$row['LinkColor']." !important;}

    .cancel_x{background-color: ".$row['MainColor']." !important;color: ".$row['LinkColor']." !important;}
    ";
?>
  </style>