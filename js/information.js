document.addEventListener('DOMContentLoaded',function()
{
	var button=document.getElementById('bu');
	button.addEventListener('click',function(){
	
	var strResults="";
	var textInputs=document.getElementById("form1").getElementsByTagName("input");
	var textName=document.getElementById("form1").getElementsByTagName("label");

	for(var i=0;i<textInputs.length;i++)
	{
		if(textInputs[i].value==null||textInputs[i].value=="")
		{
				
					strResults+=textName[i].innerHTML+"不能为空"+"\n";
		}
	}
	if (strResults != '') {
			alert(strResults);
			document.form1.action="information.php";
		}
		else{
			document.form1.action="php/update_info.php";
		}
	
},false)
},false);
