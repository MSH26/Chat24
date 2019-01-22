<!DOCTYPE html>
<html>
	<head>
		<title>Chat24H</title>
		<link rel="stylesheet" type="text/css" href="failure_style.css" />
		<script type="text/javascript" src="login.js"></script>
	</head>
	
	<body>
		<div class="header">
			
			<div class="header_img">
				<img id="img_logo" src="System_icon_picture\H20H.png" />
			</div>
			
		</div>
		
		<div class="bodyxx" >
			<div class="bodyxy">
				<a align="center">Registration failed!!</a>
				<?php
					echo $_REQUEST['msg'];
				?>
			</div>
		</div>
	</body>
</html>