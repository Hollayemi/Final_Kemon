<script>
function chkcontrol(j){
    var chosenCtg = []
    var total=0;
    for(var i=0; i < document.form1.ckb.length; i++){
        if(document.form1.ckb[i].checked){
          chosenCtg.push(document.form1.ckb[i].value)
          total = total +1;
        }
        if(document.form1.ckb[j].checked == false ){
          document.querySelector('.cl'+j).style.border="1px solid black";
          document.querySelector('.cl'+j).style.color="black";
        }
        if(total > 3){
          alert("Error in selecting "+document.form1.ckb[j].value+", maximum amount reached.") 
          document.form1.ckb[j].checked = false ;
          return false;
        }
    }
    if(total<=3 && document.form1.ckb[j].checked == true){
        document.querySelector('.cl'+j).style.border="1px solid rgb(18, 151, 204)";
        document.querySelector('.cl'+j).style.color="rgb(18, 151, 204)";
        document.cookie="_categories="+chosenCtg
    }

    localStorage.setItem('rate',chosenCtg);
  }   
</script>