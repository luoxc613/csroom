document.addEventListener('DOMContentLoaded',function()
{
  var button=document.getElementById('button');
  button.addEventListener('click',function(){
  
  var strResults="";
  var textInputs=document.getElementById("form1").getElementsByTagName("input");
  var textName=document.getElementById("form1").getElementsByTagName("label");
  for(i=0;i<textInputs.length-1;i++)
  {
    if(textInputs[i].value==null||textInputs[i].value=="")
    {
        if(i==1||i==2||i==3){
          strResults+=textName[1].innerHTML+"不能为空"+"\n";}
          if(i==0){
          strResults+=textName[0].innerHTML+"不能为空"+"\n";}
          if(i==4){

          strResults+=textName[2].innerHTML+"不能为空"+"\n";}
         
    }
  }
  if (strResults != '') {
    alert(strResults);  
    document.form1.action="form3.php";
  }
  else{
    document.form1.action="php/apply_room.php";
  }
  
},false)
},false)
