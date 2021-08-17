
var closeForPass= document.querySelector(".closeForPass")
document.querySelector(".Forpassword").addEventListener('click',function(){
    document.querySelector(".loginBody").style.overflow="hidden"
    closeForPass.style.visibility='visible'
    closeForPass.style.height='100%'
    closeForPass.style.width='100%'
    closeForPass.style.top='0'
    closeForPass.style.right='0'
    closeForPass.style.opacity='.95'
})

var cancelX= document.querySelector(".cancelX")
document.querySelector(".cancelX").addEventListener('click',function(){
    document.querySelector(".loginBody").style.overflow="auto"
    closeForPass.style.visibility='hidden'
    closeForPass.style.height='70%'
    closeForPass.style.width='70%'
    closeForPass.style.top='10%'
    closeForPass.style.right='10%'
    closeForPass.style.opacity='0'
    
})

