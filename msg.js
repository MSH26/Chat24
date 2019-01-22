
var flag = "";

function _(el){
	return document.getElementById(el);
}

function loadALL(){
	 loadCL();
}

function loadCL() {
	_("chatbox_body").innerHTML = "";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var res = (xmlhttp.responseText).split("|");
			for(var i=0; i<res.length; i++){
				var person = res[i].split(",");
				_("chatbox_body").innerHTML += "<a onclick='chatAction("+person[0]+")'>"+person[1]+" "+person[2]+"</a><br/>";
			}
		}
	};
	url="loadCL.php";
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
	window.location="settings.php";
}

function logout(){
	window.location="logout.php";
}

function chatAction(e){
	flag = e;
	_("container_right").innerHTML = "";
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var res = (xmlhttp.responseText).split("|");
			for(var i=0; i<res.length; i++){
				_("container_right").innerHTML += "<a>"+ res[i] +"</a>";
					alert(res[i]);
				if(i<(res.length-1)){
					_("container_right").innerHTML += "<br/><hr>";
				}
			}
		}
	};
	url="loadmsg.php?id="+e;
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}

function sendmsg(){
	if( _("msgtxt").value.length>0){
		
		var ajaxh = new XMLHttpRequest();
		ajaxh.onreadystatechange = function() {
			if (ajaxh.readyState == 4 && ajaxh.status == 200) {
				if(ajaxh.responseText == 1){
					alert("s");
					chatAction(flag);
				}
				else if(ajaxh.responseText == 0){
					alert("Failed!!");
				}
			}
		};
		url="sendmsg.php?id="+flag+"&msg="+_("msgtxt").value;
		ajaxh.open("GET", url, true);
		ajaxh.send();
	}
}