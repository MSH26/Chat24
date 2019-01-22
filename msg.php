<!DOCTYPE html>
<html>
	<head>
		<title>Profile</title>
		<link rel="stylesheet" type="text/css" href="Style.css" />
		<script type="text/javascript" src="msg.js"></script>
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
					<div id="profilearea4" class ="header1"><a href="../Home/Home.php">Home</a></div>	
					<div id="findf" class="header1" onclick="frndReq()"><img src="frn.png"height="22" /></div>
					<div id="message" class="header1" onclick="redChat()" ><img src="chat.png"height="22" /></div>
					<div id="notification" class="header1" onclick="redNotification()" ><img src="noti.png"height="22" /></div>
					<div id="profilearea2" class="header1">|</div>
					<div id="setting" class="header1" onclick="redSettings()" ><img src="set.png"height="22" /></div>
					<div id="logout" class="header1"  onclick="logout()"><img src="lo.png"height="22" /></div>
					<div id="searcharea" class ="header1"> 
						<input placeholder="search here..." type="text" id="searchbox"/>
						<input type="button" value="search" id="srchBoxButt">
					</div>
				</div >
			</div>
			
			<div class="container">
				<div class="container_left">
					<div class='chatbox_head'>Messenger</div>
					<div id="chatbox_body" class='chatbox_body'>
						
					</div>
				</div>
			
				
				<div id="container_right">
					
				</div>
				<div class="footer">
						<div class="txt">
							<textarea type="text" placeholder="Write new message" name="msgtxt" id="msgtxt"></textarea>
						</div>
						<div class="butt">
							<input type="button" onclick="sendmsg()" name="send" id="send" value="Send" />
						</div>
					</div>
			</div>
		</form>
	</body>
</html>