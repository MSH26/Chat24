
var progressbarID = "";
var statusID = "";
var statpro = true;
var statcov = true;
var prostat = true;
var covstat = true;

function _(el){
	return document.getElementById(el);
}

function validate(){
	flag = true;
	if(document.forms[0].question.value.length<10){
		_("msg_question").innerHTML = "Please fill up";
		flag = false;
	}
	else{
		_("msg_question").innerHTML = "";
	}
	if(document.forms[0].answer.value.length==0){
		_("msg_answer").innerHTML = "Please fill up";
		flag = false;
	}
	else{
		_("msg_answer").innerHTML = "";
	}
	return flag;
}

xmlhttp = new XMLHttpRequest();
function validation() {
	if(validate() == true){
		ques = document.forms[0].question.value;
		ans = document.forms[0].answer.value;
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				flag = xmlhttp.responseText;
				if(flag == 1){
					return true;
				}
				else if(flag == 0){
					alert("Server client error!");
					return false;
				}
			}
		};
		var url="completeProfiledata.php?question="+ques+"&answer="+ans;
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
	else{
		return false;
	}
}

function upload_proPic(){
	var file = _("profile_pic").files[0];
	//alert(file.name+" | "+file.size+" | "+file.type);
	var check = file.type.split("/");
	if(check[0] == "image"){
		if(check[1] == "png" || check[1] == "jpg" || check[1] == "jpeg"){
			if(statpro == true){
				progressbarID = "progressbar_pro";
				statusID = "status_pro";
				statpro = false;
				statcov = false;
				prostat = false;
				
				var formdata = new FormData();
				formdata.append("profile_pic", file);
				
				var ajax = new XMLHttpRequest();
				ajax.upload.addEventListener("progress", progressHandler, false);
				ajax.addEventListener("load", completeHandler, false);
				ajax.addEventListener("error", errorHandler, false);
				ajax.addEventListener("abort", abortHandler, false);
				var url = "uploadFileCompleteProfile.php?name=profile_pic&flag=0";
				ajax.open("POST", url);
				ajax.send(formdata);
			}
			else{
				alert("Please wait...cover photo uploading");
			}
		}
		else{
			alert("Please check the file extension!");
		}
	}
	else{
		alert("Please upload a picture!");
	}
}

function upload_coPic(){
	var file = _("cover_pic").files[0];
	alert(file.name+" | "+file.size+" | "+file.type);
	var check = file.type.split("/");
	if(check[0] == "image"){
		if(check[1] == "png" || check[1] == "jpg"){
			if(statcov == true){
				progressbarID = "progressbar_cov";
				statusID = "status_cov";
				statpro = false;
				statcov = false;
				covstat = false;
				
				var formdata = new FormData();
				formdata.append("cover_pic", file);
				
				var ajax = new XMLHttpRequest();
				ajax.upload.addEventListener("progress", progressHandler, false);
				ajax.addEventListener("load", completeHandler, false);
				ajax.addEventListener("error", errorHandler, false);
				ajax.addEventListener("abort", abortHandler, false);
				var url = "uploadFileCompleteProfile.php?name=cover_pic&flag=1";
				ajax.open("POST", url);
				ajax.send(formdata);
			}
			else{
				alert("Please wait...profile photo uploading");
			}
		}
		else{
			alert("Please check the file extension!");
		}
	}
	else{
		alert("Please upload a picture!");
	}
}

function progressHandler(event){
	var percent = (event.loaded / event.total) * 100;
	_(progressbarID).value = Math.round(percent);
	_(statusID).innerHTML = Math.round(percent)+"%uploaded...please wait!";
}

function completeHandler(event){
	_(statusID).innerHTML = event.target.responseText;
	_(progressbarID).value = 0;
	if(prostat == true){
		statpro = true;
	}
	if(covstat == true){
		statcov = true;
	}
}

function errorHandler(event){
	_(statusID).innerHTML = "Upload Failed";
}

function abortHandler(event){
	_(statusID).innerHTML = "Upload Aborted";
}