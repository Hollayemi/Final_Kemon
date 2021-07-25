const firstBtn = document.querySelector('.Next-1');
const slide1 = document.querySelector('.slide1');
firstBtn.addEventListener("click", function(){
        slide1.style.marginLeft = "-33.3%";
    });
        

const SecBtn = document.querySelector('.Next-2');
const slide2 = document.querySelector('.no2');
SecBtn.addEventListener("click", function(){
    slide2.style.marginLeft="-33.0%"
        })
const prevBtn = document.querySelector('.prev-1');
const back1 = document.querySelector('.slide1');
prevBtn.addEventListener("click", function(){
    back1.style.marginLeft="0%"
        })


		











        function validateEmail(email){
			var re = /\S+@\S+\.\S+/;
			return re.test(email);
		}

		var mark2 = document.getElementById('mark2');
        var passw = document.getElementById('passw');
        var iif = document.getElementById('iif');



        document.addEventListener('DOMContentLoaded', function(){
           passw.addEventListener('focus', function(){
            iif.style.display="block"
            iif.style.opacity="1"
            iif.style.marginTop="10px"
           })
        })








		function checkPass(){
			var ho = passw.value
			var bo = ho.split("")
			var last = bo[bo.length -1]

			if(last.toUpperCase() ===last && isNaN(last)){
				if(cancel1.style.opacity=="1"){
					cancel1.style.opacity="0"
					document.querySelector('.ico11').classList.toggle("iconn");
					document.querySelector('.ico1').classList.toggle("iconn2");
				}
				
			}

            if(!isNaN(last)){
				if(cancel2.style.opacity=="1"){
					cancel2.style.opacity="0"
					document.querySelector('.ico22').classList.toggle("iconn");
					document.querySelector('.ico2').classList.toggle("iconn2");
				}
			}

			if(bo.length > 7){
				console.log(last)
				if(cancel3.style.opacity=="1"){
					cancel3.style.opacity="0"
					document.querySelector('.ico33').classList.toggle("iconn");
					document.querySelector('.ico3').classList.toggle("iconn2");
				}
			}
			var email = document.getElementById('email')
			console.log(validateEmail(email))
			console.log(email)
			
		}
		function checkName(){
			var uName = document.getElementById('uName');
			var fName = document.getElementById('fName');
			var phone = document.getElementById('phone');
			var uNameNext = document.getElementById('uNameNext');
			if((uName.value !="") && (fName.value  !="") && (phone.value  !="")){
				uNameNext.style.display = "block"
			}
		}

	
		