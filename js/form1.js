document.addEventListener('DOMContentLoaded',function()
{
	var button=document.getElementById('button');
	button.addEventListener('click',function(){
	
	var strResults="";
	var textInputs=document.getElementById("form1").getElementsByTagName("input");
	var textName=document.getElementById("form1").getElementsByTagName("label");

	for(var i=0;i<textInputs.length-(2+number);i++)
	{
		if(textInputs[i].value==null||textInputs[i].value=="")
		{
				if(i==3||i==4||i==5)
				{
					strResults+=textName[3].innerHTML+"不能为空"+"\n";
				}
				 if(i==6||i==7||i==8)
					{
					strResults+=textName[4].innerHTML+"不能为空"+"\n";
				}
				if(i>8){
					strResults+=textName[i-4].innerHTML+"不能为空"+"\n";}
				if(i<3){
					strResults+=textName[i].innerHTML+"不能为空"+"\n";}
		}
	}
	if (strResults != '') {
		alert(strResults);	
		document.form1.action="form1.php"
	}
	else{
		document.form1.action="php/apply.php";
	}
	
},false)
},false)
number=0;
function addName(){

	
	var a=document.getElementById("name");
	var number2=document.getElementById("form1").getElementsByTagName("input")[9].value;
	var  number1=document.getElementById("form1").getElementsByTagName("input")[10].value;
	number=parseInt(number1);
	
	for(var i=0;i<number-1;i++){
	var newNamebox=document.createElement("input");
	newNamebox.type="text";
	newNamebox.className="form-control";
	newNamebox.placeholder="使用人姓名";
	newNamebox.name=(i + 2);
	newNamebox.display="block";
	newNamebox.height="34px";
	newNamebox.padding="6px 12px";
	newNamebox.fontSize="14px";
	newNamebox.color="#555555";
	newNamebox.border="1px solid #cccccc";
	newNamebox.lineHeight="1.42857";
	a.appendChild(newNamebox);
	}


	number3=parseInt(number1);
	number4=parseInt(number2);
	
	if(number4>number3)
	{
		var newNamebox=document.createElement("input");
			newNamebox.type="text";
	newNamebox.className="form-control";
	newNamebox.placeholder="项目其他人姓名";
	newNamebox.name="others";
	newNamebox.display="block";
	newNamebox.height="34px";
	newNamebox.padding="6px 12px";
	newNamebox.fontSize="14px";
	newNamebox.color="#555555";
	newNamebox.border="1px solid #cccccc";
	newNamebox.lineHeight="1.42857";
	a.appendChild(newNamebox);
	}

}



	document.addEventListener('DOMContentLoaded',function()
	{
		var button=document.getElementById('button');
		button.addEventListener('click',function(){
		
		var strResults="";
		var textInputs=document.getElementById("form1").getElementsByTagName("input");
		var textName=document.getElementById("form1").getElementsByTagName("label");
		for(var i=10;i<10+number+1;i++)
		{console.log(i);
			console.log(10+number);
			if(textInputs[i].value==null||textInputs[i].value=="")
			{
					
						strResults+=textName[7].innerHTML+"不能为空"+"\n";
			}
		}
		if (strResults != '') {
			alert(strResults);	
		}		
	},false)
	},false)
