<!DOCTYPE html>

<script>
function test(){
	flag=true;
	if(document.getElementById("uploadStatusPhoto").value.length==0 && document.getElementById("container_contents_right_createpost_middle_textarea").velue.length==0){
		//alert("Please insert a picture or write something");
		flag = false;
	}
	return flag;
}
</script>
<html>
	<head>
		<title>Profile</title>
		<link rel="stylesheet" type="text/css" href="Home_Style.css" />
		<script type="text/javascript" src="Home.js"></script>
	</head>
	
	<body onload="loadALL()">
		<div class="header">
			<div  class="header">
				<div class="headerx">
					<img src="C24H.png" id="img_logo"/>
				</div>
				<div class ="header1">
					<div id="profilearea1" class="header1"><a href="Profile.php">Profile</a></div> 
					<div id="profilearea3" class ="header1">|</div>
					<div id="profilearea4" class ="header1"><a href="../Home/Home.php">Home</a></div>	
					<div id="findf" class="header1" onclick="frndReq()"><img src="frn.png"height="22" /></div>
					<div id="message" class="header1" onclick="redChat()" ><img src="chat.png"height="22" /></div>
					<div id="notification" class="header1" onclick="redNotification()" ><img src="noti.png"height="22" /></div>
					<div id="profilearea2" class="header1">|</div>
					<div id="setting" class="header1" onclick="redSettings()" ><img src="set.png"height="22" /></div>
					<div id="logout" class="header1"  onclick="logout()"><img src="lo.png"height="22" /></div>
					<div id="searcharea" class ="header1"> 
						<input placeholder="search here..." type="text" id="searchbox"/>
						<input type="button" value="search" id="srchBoxButt" onclick="search()">
					</div>
				</div >
			</div>
		</div>
		
		<div class="container">
			<div class="container_left">
				<div class="container_contents">
					<div class="container_contents_left">
					SAKIB
					</div>
					
					<div class="container_contents_right">
						<form action="upload_post.php" method="post" enctype="multipart/form-data">
							<div class="container_contents_right_createpost">
								<div class="container_contents_right_createpost_UP">
									<a>update status | </a>
									<a >add photo</a>
									<input type="file" id="uploadStatusPhoto" name="uploadPhoto"></a>
								</div>
								<div class="container_contents_right_createpost_middle">
									<textarea placeholder="What is in your mind" type="text" id="container_contents_right_createpost_middle_textarea"></textarea>
								</div>
								<div class="container_contents_right_createpost_DOWN"> 
									<div id="container_contents_right_createpost_DOWN_tag">
										<ul>
											<li><a href="#">Tag</a></li>
										</ul>
									</div>
									<div >
										<input type="button" id="container_contents_right_createpost_DOWN_buttonpost" onclick="uploadp()" value="post"/>
									</div>
								</div>
							</div>
						</form>	
						<div id="container_contents_right_createdpost_posts" class="container_contents_right_createdpost">
							<a>Old post</a>
						</div>
					</div>
				</div>
			</div>
			<div class="container_right">
				<div class='chatbox_head'>Chat</div>
				<div id="chatbox_body" class='chatbox_body'></div>
			</div>
		</div>
	</body>
</html>