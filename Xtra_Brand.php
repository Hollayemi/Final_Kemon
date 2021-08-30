<!DOCTYPE html>
<html lang="en">
<head>
<head>
  <link rel="stylesheet" href="css/xtra.css">
  <link href="img/km.png" rel="icon">
  <link rel="stylesheet" href="bootstrap-4.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="font-awesome.min.css">
  <link rel="stylesheet" href="./lib/ionicons/css/ionicons.css">
  <title>Xplans</title>
</head>
  <body class="paymentBody">

      <header id="navbar">
        <nav>
          <div class="mainLogo">
             <img src="./img/kemon.png" alt="">
          </div>


          <div class="XtraLinks">

              <div class="main-link">
                  <ul>
                      <li><a href="index.php">Home</a><div></div></li>
                      <li><a href="Register.php">Register</a><div></div></li>
                      <li><a href="Agent.php">Agent</a><div></div></li>
                  </ul>
              </div>



              <div class="shop-link">
                  <ul>
                      <li class="dashboard"><a href="dashboard.php">Dashboard</a></li>
                      <li class="visitStore"><a href="Register.php">Visit Store</a></li>
                  </ul>
              </div>
          </div>
        </nav>
      </header>


        <div class="th-sdjs-a">
            <h3>Upgrade Your Store</h3>
            <p>purchase brands, product to upgrade your website</p>
        </div>

        <main>
          
          <div class="contLev">
              <h4><a href="Xtra_Brand.php">Brand</a></h4>
              <h4><a href="Xtra_Product.php">Product</a></h4>
              <h4><a href="Xtra_Memory.php">Memory</a></h4>
          </div>

          <div class="level"><div></div></div>
          

          <section class="setPricing">
              <div class="genPricin">
                  <h2>Bleto</h2><br>
                  <h3>Only for &#x20A6 3000</h3>

                  <h4>1 Brand</h4>

                  <button>Purchase </button><br>

                  <p>This Bleto choice offers 1 product and 5MB of memory For free</p>
              </div>

              <div class="genPricin">
                  <h2>Nelik</h2><br>
                  <h3>Only for &#x20A6 5500</h3>

                  <h4>2 Brands</h4>

                  <button>Purchase </button><br>

                  <p>This Nelik choice offers 1 product and 10MB of memory For free</p>
              </div>

              <div class="genPricin">
                  <h2>Dejut</h2><br>
                  <h3>Only for &#x20A6 10,000</h3>

                  <h4>4 Brands</h4>

                  <button>Purchase </button><br>

                  <p>This Dejut choice offers 2 product and 10MB of memory For free</p>
              </div>

              <div class="genPricin">
                  <h2>Lilap</h2><br>
                  <h3>Only for &#x20A6 12,000</h3>

                  <h4>5 brands</h4>

                  <button>Purchase </button><br>

                  <p>This Lilap choice offers 2 product and 15MB of memory For free</p>
              </div>
          </section>
      </main>


      <script>

    var prevScrollpos = window.pageYOffset;
    console.log(prevScrollpos)
    window.onscroll= function(){
        var currentScrollPos = window.pageYOffset;
        if(prevScrollpos > currentScrollPos){
            document.getElementById("navbar").style.top = "0";
        }else{
            // if(prevScrollpos<100)
            document.getElementById("navbar").style.top = "-75px";
        }
        prevScrollpos=currentScrollPos;

        // document.querySelector(".relativeOnStart").classList.toggle("fixedOnScroll");
    }
</script>
  </body>
</html>