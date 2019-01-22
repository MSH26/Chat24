<!DOCTYPE html>

<html>
	<head>
		<title>Chat24H</title>
		<link rel="stylesheet" type="text/css" href="complete_profile_style.css" />
		<script type="text/javascript" src="complete_profile.js"></script>
	</head>
	
	<body>
		<div class="header">
			
			<div class="header_img">
				<img id="img_logo" src="System_icon_picture\H20H.png" />
			</div>
			
		</div>
		
		<div class="bodyxx" >
			<form action="Profile.php" method="post" enctype="multipart/form-data">
				<div class="bodyxxx">
					<a><h2>Complete your profile!!</h2></a><br/>
				</div>
				<div class="bodyxxy">
					<h4>upload profile picture(*.jpg, *.png)</h4>
					<input type="file" name="profile_pic" id="profile_pic"><br/>
					<input type="button" name="upload_pro_pic" id="upload_pro_pic" value="Upload" onclick="upload_proPic()">
					<progress id="progressbar_pro" value="0" max="100" style="width:200px;"></progress>
					<a id="status_pro"></a>
					<div id="profile_pic_show">
						
					</div>
					<h4>upload cover picture(*.jpg, *png)<h4>
					<input type="file" name="cover_pic" id="cover_pic"><br/>
					<input type="button" name="upload_cov_pic" id="upload_cov_pic" value="Upload" onclick="upload_coPic()">
					<progress id="progressbar_cov" value="0" max="100" style="width:200px;"></progress>
					<a id="status_cov"></a>
					<div id="cover_pic_show">
						
					</div>
					<h4>Write a question for security:<h4><textarea type="text" rows="4" cols="80" name="question"></textarea>
					<a id="msg_question" style="color:red;"></a><br/>
					<h4>write the answer of the above:<h4><textarea type="text" rows="2" cols="80" name="answer"></textarea>
					<a id="msg_answer" style="color:red;"></a><br/><br/>
					<input type="submit" name="sbt" id="sbt" onclick="return validation()" value="done">
				</div>
			</form>
		</div>
	</body>
</html>