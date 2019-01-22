<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
		<link rel="stylesheet" type="text/css" href="Profile_Style.css" />
		<script type="text/javascript" src="Profile.js"></script>
	</head>
	
	<body onload="loadALL()">
		<form>
			<div class="header">
				<div class="headerx">
					<img src="C24H.png" id="img_logo"/>
				</div>
				<div class ="header1">
					<div id="profilearea1" class="header1"><a href="Profile.php">Profile</a></div> 
					<div id="profilearea3" class ="header1">|</div>
					<div id="profilearea4" class ="header1"><a href="Home.php">Home</a></div>	
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
			
			<div class="container">
				<div class="container_left">
					<div class="container_left_control">
						<div class="container_left_control_profile">
							<div id="PP" class="container_left_control_profile_pic">
								
							</div>
							<div id="usnm" class="container_left_control_profile_name">
								
							</div>
						</div>
						<div class="container_left_control_cover">
							<div id="PCP" class="container_left_control_cover_pic">
								
							</div>
							<div class="container_left_control_cover_controlers">
								<ul>
									<li><a href="#">About</a></li>
									<li><a href="#">Timeline</a></li>
									<li><a href="#">Friends</a>	</li>
									<li><a href="#">Photos</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="container_contents">
						<div class="container_contents_left">
							<div class="container_contents_left_intro">
								<div style="background-color:grey;">
									<a>Intro</a>
								</div>
								<div>
									<br/><br/>
									<a>Email : </a><a id="intro_email"></a><br/><br/>
									<a>Phone : </a><a id="intro_phone"></a><br/>
								</div>
							</div>
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
							<div id="container_contents_right_createdpost" class="container_contents_right_createdpost">
								
							</div>
						</div>
					</div>
				</div>
				
				<div class="container_right">
					<div class='chatbox_head'>Chat</div>
					<div id="chatbox_body" class='chatbox_body'></div>
				</div>
			</div>
		</form>
	</body>
</html>