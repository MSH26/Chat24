/*Flag variables*/

var fna = false;
var lna = false;
var pas = false;
var cpas = false;
var em = false;
var rem = false;
var phne = false;

/*Validation*/

function validatePhone(x) {
	for(i=0; i<x.length; ++i){
		if (x.charCodeAt(i)<48 || x.charCodeAt(i)>57) {
			return false;
		}
	}
	return true;
}

function validateEmail(x) {
	var atpos = x.indexOf("@");
	var dotpos = x.lastIndexOf(".");
	
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		return false;
	}
	return true;
}

function check_fn(e){
	if(e.value.length > 3){
		fna = true;
		document.getElementById("fn_msg").innerHTML="ok";
	}
	else{
		fna = false;
		document.getElementById("fn_msg").innerHTML="name is not ok";
	}
}

function check_ln(e){
	if(e.value.length > 3){
		lna = true;
		document.getElementById("ln_msg").innerHTML="ok";
	}
	else{
		lna = false;
		document.getElementById("ln_msg").innerHTML="name is not ok";
	}
}

function check_pass(e){
	if(e.value.length > 5){
		pas=true;
		document.getElementById("ps_msg").innerHTML="ok";
	}
	else{
		pas=false;
		document.getElementById("ps_msg").innerHTML="not ok";
	}
}

function check_conpass(e){
	if(e.value == document.forms[1].pss.value){
		cpas=true;
		document.getElementById("cps_msg").innerHTML="matched";
	}
	else{
		cpas=false;
		document.getElementById("cps_msg").innerHTML="not matched";
	}
}

function check_email(e){
	if(validateEmail(e.value) == true){
		em=true;
		document.getElementById("eml_msg").innerHTML="ok";
	}
	else{
		em=false;
		document.getElementById("eml_msg").innerHTML="invalid";
	}
}

function check_remail(e){
	if(e.value == emls.value){
		rem=true;
		document.getElementById("reml_msg").innerHTML="matched";
	}
	else{
		rem=false;
		document.getElementById("reml_msg").innerHTML="not matched";
	}
}

function check_phone(e){
	if(validatePhone(e.value)==true && e.value.length==11){
		phne = true;
		document.getElementById("phn_msg").innerHTML="ok";
	}
	else{
		phne = false;
		document.getElementById("phn_msg").innerHTML="not ok";
	}
}

function validate_date(){
	if(document.forms[1].day.value!="day" && document.forms[1].month.value!="month" && document.forms[1].year.value!="year"){
		if(document.forms[1].month.value == 2){
			if(((document.forms[1].year.value)%4) == 0){
				if(document.forms[1].day.value > 29){
					return false;
				}
			}
			else if(((document.forms[1].year.value)%4) != 0){
				if(document.forms[1].day.value > 28){
					return false;
				}
			}
		}
		else if(document.forms[1].month.value==4 || document.forms[1].month.value==6 || document.forms[1].month.value==9 || document.forms[1].month.value==11){
			if(document.forms[1].day.value > 30){
				return false;
			}
		}
		return true;
	}
	else{
		return false;
	}
}

/*Form submition*/

function submit_form(buttons){
	if(buttons.value == "Login"){
		if(validateEmail(document.getElementById("log_email").value) == true){
			if(document.getElementById("log_password").value.length>0){
				document.forms[0].submit();
			}
			else{
				alert("Please enter a password!");
			}
		}
		else{
			alert("Please enter a valid email!");
		}
	}
	else if(buttons.value == "Register"){
		if(document.forms[1].gender.value.length>0 && fna==true && lna==true && pas==true && cpas==true && em==true && rem==true && phne==true){
			if(validate_date() == true){
				document.forms[1].submit();
			}
			else{
				alert("Please select a valid date!");
			}
		}
		else{
			alert("Please fill up all the box!");
		}
	}
}

