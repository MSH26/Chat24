
function _(el){
	return document.getElementById(el);
}

function validateEmail(x) {
	var atpos = x.indexOf("@");
	var dotpos = x.lastIndexOf(".");
	
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
		return false;
	}
	return true;
}

function sub(){
	if(_("nm").value != "" && _("ps").value != ""){
		if(validateEmail(_("nm").value)==true){
			document.forms[0].submit();
		}
		else{
			_("ch").innerHTML = "Please insert valid email or fillup all";
		}
	}
	else{
			_("ch").innerHTML = "Please fillup all";
	}
}