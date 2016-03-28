// JavaScript Document

<!-- Begin
function CheckRequired(which) {
  var pass=true;
  	for (i=0;i<which.length;i++) {
      var tempobj=which.elements[i];
	  //alert ("Now checking "+tempobj.type+" name= "+tempobj.name+" value= "+tempobj.value);
      if (tempobj.name.substring(0,3)=="rqd") {
        if (((tempobj.type=="text"||tempobj.type=="textarea")&& tempobj.value=='')
			||(tempobj.type.toString().charAt(0)=="s"&& tempobj.selectedIndex==0)) {
          pass=false;
          break;
        }		
      }
    }
    //  }
  if (!pass) {
    shortFieldName=tempobj.name.substring(3,30).toUpperCase();
    alert("Please make sure that all the fields marked in red bold are properly completed.");
	tempobj.focus();
    return false;
  }
  else
    return true;
}
//  End -->

function ValidateForm(forma){
	if (CheckRequired(forma))
		return true;
	else
		return false;
}
//  End -->

function SubmitLink(forma) {
	//Used to submit a form from a link		
	document.forms[forma].submit();
}
//  End -->

function DisableTextField(forma, TextField, Value) {
	//Used to make visible/invisible a text field
	//alert(Value);
	var obj= 0;		
	for (i=0;i<forma.length;i++) {
    	//alert (forma.elements[i].name+" = "+TextField);
		if (forma.elements[i].name == TextField) {
			obj = i;
		}
	}
	if (Value == "TXT") {
		//forma.elements[obj].disabled = true;
		forma.elements[obj].style.display="none";		
	}
	else if (Value == "DD") {
		//forma.elements[obj].disabled = false;
		forma.elements[obj].style.display="block";
	}
}
//  End -->

function DisableTextDeleteDDValues(forma, TextField, Value, DeleteField) {
	//Used to make visible/invisible a text field
	//alert(Value);
	var obj= 0;
	var delobj= 0;
	for (i=0;i<forma.length;i++) {
    	//alert (forma.elements[i].name+" = "+TextField);
		if (forma.elements[i].name == TextField) {
			obj = i;
		}
		if (forma.elements[i].name == DeleteField) {
			delobj = i;
		}
	}
	if (Value == "TXT") {
		//forma.elements[obj].disabled = true;
		forma.elements[obj].style.display="none";
		forma.elements[delobj].value = "YES";
	}
	else if (Value == "DD") {
		//forma.elements[obj].disabled = false;
		forma.elements[obj].style.display="block";
		forma.elements[delobj].value = "NO";
	}
}
//  End -->

function ErrorMsg(Err) {
	alert(Err);	
}
