
function _(el){
	return document.getElementById(el);
}

function loadALL(){
	loadPP();
	loadNM();
	loadPCP();
	loadIntro();
	loadCL();
	loadpost();
}

function loadpost() {
	_("container_contents_right_createdpost").innerHTML = "";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			_("container_contents_right_createdpost").innerHTML = xmlhttp.responseText;
		}
	};
	url="loadPOST.php";
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function loadPP() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			_("PP").innerHTML = "<img id='profile_picture' src='"+xmlhttp.responseText+"'/>";;
		}
	};
	url="loadPP.php";
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function loadPCP() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			_("PCP").innerHTML = "<img id='cover_picture' src='"+xmlhttp.responseText+"'/>";
		}
	};
	url="loadPCP.php";
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function loadNM() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			_("usnm").innerHTML = xmlhttp.responseText;
		}
	};
	url="loadNM.php";
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function loadIntro() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var res = (xmlhttp.responseText).split("|");
			_("intro_email").innerHTML = res[0];
			_("intro_phone").innerHTML = res[1];
		}
	};
	url="loadIntro.php";
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function loadCL() {
	_("chatbox_body").innerHTML = "";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var res = (xmlhttp.responseText).split("|");
			for(var i=0; i<res.length; i++){
				var person = res[i].split(",");
				_("chatbox_body").innerHTML += "<a value='"+person[0]+"'>"+person[1]+" "+person[2]+"</a><br/>";
			}
		}
	};
	url="loadCL.php";
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function like(e){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			alert(xmlhttp.responseText);
		}
	};
	url="likePOST.php?id="+e;
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function comment(a, e){
	var val = _(a).innerHTML;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			alert(xmlhttp.responseText);
		}
	};
	url="commentPOST.php?id="+e+"&msg="+val;
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function frndReq(){
	window.location="friendRequest.php";
}

function redChat(){
	window.location="msg.php";
}

function redNotification(){
	window.location="notification.php";
}

function redSettings(){
	window.location="setting.html";
}

function logout(){
	window.location="logout.php";
}

function chatAction(e){
	window.location="msg.php?id="+e.value;
}

function uploadp(){
	//alert("s");
	var file = _("uploadStatusPhoto").files[0];
	//alert(file.name+" | "+file.size+" | "+file.type);
	var check = file.type.split("/");
	if(check[0] == "image"){
		if(check[1] == "png" || check[1] == "jpg"){
			
			var formdata = new FormData();
			formdata.append("uploadStatusPhoto", file);
			
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler, false);
			ajax.addEventListener("load", completeHandler, false);
			ajax.addEventListener("error", errorHandler, false);
			ajax.addEventListener("abort", abortHandler, false);
			if(file.name.length > 0 && _("container_contents_right_createpost_middle_textarea").value.length>0){
				var url = "uploadFile.php?msg="+_("container_contents_right_createpost_middle_textarea").value+"&flag=0&name=uploadStatusPhoto";
			}
			else if(file.name.length==0 && _("container_contents_right_createpost_middle_textarea").value.length>0){
				var url = "uploadFile.php?msg="+_("container_contents_right_createpost_middle_textarea").value+"&flag=1";
			}
			else if(file.name.length>0 && _("container_contents_right_createpost_middle_textarea").value.length==0){
				var url = "uploadFile.php?&flag=2&name=uploadStatusPhoto";
			}
			
			ajax.open("POST", url);
			ajax.send(formdata);
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
	//alert(event.target.responseText);
}

function completeHandler(event){
	alert(event.target.responseText);

}

function errorHandler(event){
	alert("Upload Failed");
}

function abortHandler(event){
	alert("Upload Aborted");
}