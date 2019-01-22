<!DOCTYPE html>
<html>
	<head>
		<title>Chat24H</title>
		<link rel="stylesheet" type="text/css" href="login_Style.css" />
		<script type="text/javascript" src="login.js"></script>
	</head>
	
	<body>
		<div class="header">
			
			<div class="header_img">
				<img id="img_logo" src="C24H.png" />
			</div>
			
			<div class="header_log" >
				<form action="checkloginfo.php" method="post" >
					<a>Email:</a> <input placeholder="Email" type="text" name="lg_email" id="log_email" />
					<a>password:</a> <input placeholder="Password" type="password" name="lg_password" id="log_password" />
					<input type="button" id="lgin_btn" name="login_btn" onclick="submit_form(this)" value="Login" />
				</form>
			</div>
				
			<div class="header_log" >
				
				<div class="header_log_keeplog" >
					<input type="checkbox" name="keeplg" id="keeplog" /><a>Keep me logged in</a>
				</div>
				
				<div class="header_log_fpass" >
					<a href="#" >Forgot password</a>
				</div>
				
			</div>
		</div>
		
		<div class="bodyxx" >
			<div class="bodyxy" >
				<div class="intro2" >
					<a>create an account</a>
				</div>
				
				<div class="intro3" >
					<a>It's free and always will be</a>
				</div>
				
				<form action="registrationserver.php" method="post" >
					<input placeholder="Firstname" type="text" class="namebox" name="fn" id="fns" onkeyup="check_fn(this)" />
					<a id="fn_msg" > </a> <br/>
					<input placeholder="Lastname" type="text" class="namebox" name="ln" id="lns" onkeyup="check_ln(this)" /> 
					<a id="ln_msg" > </a> <br/>
					<input placeholder="Password" type="password" class="allbox" name="ps" id="pss" onkeyup="check_pass(this)" />
					<a id="ps_msg" > </a> <br/>
					<input placeholder="Confirm password" type="password" class="allbox" name="cps" id="cpss" onkeyup="check_conpass(this)" />
					<a id="cps_msg" ></a> <br/>
					<input placeholder="Email" type="text" class="allbox" name="eml" id="emls" onkeyup="check_email(this)" />
					<a id="eml_msg" > </a> <br/>
					<input placeholder="Re-enter Email" type="text" class="allbox" name="reml" id="remls" onkeyup="check_remail(this)" /> <a id="reml_msg" > </a> <br/>
					<input type="radio" name="gender" value="male" checked />
					<a>Male</a>
					<input type="radio" name="gender" value="female"/>
					<a>Female</a><br/>
					
					<a>DOB: </a>
					
					<select name="day">
						<?php
							for($i=0; $i<32; $i++){
								if($i == 0){
									echo "<option value='day'>Day</option>";
								}
								else{
									echo "<option value=$i>$i</option>";
								}
							}
						?>
					</select>
					
					<select name= "month">
						<?php
							for($i=0; $i<13; $i++){
								if($i == 0){
									echo "<option value='month'>Month</option>";
								}
								else{
									echo "<option value=$i>$i</option>";
								}
							}
						?>
					</select>
					
					<select name="year">
						<?php
							for($i=1970; $i<2017; $i++){
								if($i == 1970){
									echo "<option value='year'>Year</option>";
								}
								else{
									echo "<option value=$i>$i</option>";
								}
							}
						?>
					</select><br/>
					
					<input placeholder="Phone number" type="text" name="phone" id="phone" class="allbox" id="phn" onkeyup="check_phone(this)"/>
					<a id="phn_msg"></a>
					<input type="button" name="register" id="register" onclick="submit_form(this)" value="Register" class="buttons"/>
				</form>
			</div>
			
			<div class="bodyyx">
				<img id="body_img" src="C24H.png" />
			</div>
		</div>
	</body>
</html>