
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
</head>
<body>
    you are about to PASSWORD_BCRYPT
    <button type="button" onclick="payWithPaystack()">PAY</button>
<script>

const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
        e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_0b4537f09ca0e3bef10015f41440b242d75757e9, // Replace with your public key
    email:"<?php echo $_SESSION['Email'] ?>",
    amount:1000,
    Username:"<?php echo $_SESSION['Username'] ?>",
    Shop Name:"<?php echo $_SESSION['shop_name'] ?>",
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
   callback: function(response){
       const referenced = response.reference;
            wiindow.location.href='success.php?successfullypaid='+referenced;
    }
  });

  handler.openIframe();
}
</body>
</html>