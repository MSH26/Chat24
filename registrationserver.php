<pre>
<?php

session_start();

//print_r($GLOBALS);

function validatePhone() {
	if(strlen(trim($_REQUEST['phone'])) == 11){
		for($i=0; $i<strlen(trim($_REQUEST['phone'])); $i++){
			if (ord(substr(trim($_REQUEST['phone']), $i, 1))<48 || substr(trim($_REQUEST['phone']), $i, 1)>57){
				return false;
			}
		}
		return true;
	}
	else{
		return false;
	}
}

function validateEmail() {
	$atpos = strpos(trim($_REQUEST['eml']), "@");
	$dotpos = strpos(trim($_REQUEST['eml']), ".");
	if ($atpos<1 || $dotpos<$atpos+2 || $dotpos+2>=strlen(trim($_REQUEST['eml']))) {
		return false;
	}
	
	$atpos = strpos(trim($_REQUEST['reml']), "@");
	$dotpos = strpos(trim($_REQUEST['reml']), ".");
	if ($atpos<1 || $dotpos<$atpos+2 || $dotpos+2>=strlen(trim($_REQUEST['reml']))) {
		return false;
	}
	
	if(trim($_REQUEST['eml']) != trim($_REQUEST['reml'])){
		return false;
	}
	
	return true;
}

function validate_date(){
	if($_REQUEST['day']!="day" && $_REQUEST['month']!="month" && $_REQUEST['year']!="year"){
		if($_REQUEST['month'] == 2){
			if((($_REQUEST['year'])%4) == 0){
				if($_REQUEST['day'] > 29){
					return false;
				}
			}
			else if((($_REQUEST['year'])%4) != 0){
				if($_REQUEST['day'] > 28){
					return false;
				}
			}
		}
		else if($_REQUEST['month']==4 || $_REQUEST['month']==6 || $_REQUEST['month']==9 || $_REQUEST['month']==11){
			if($_REQUEST['day'] > 30){
				return false;
			}
		}
		return true;
	}
	else{
		return false;
	}
}

function password_match(){
	if(strlen($_REQUEST['ps'])>5){
		if(trim($_REQUEST['ps']) == trim($_REQUEST['cps'])){
			return true;
		}
		return false;
	}
	return false;
}

if(strlen($_REQUEST['fn'])>3 && strlen($_REQUEST['ln'])>3 && strlen($_REQUEST['gender'])>0 && password_match()==true && validate_date()==true && validatePhone()==true && validateEmail()==true){
	require("mysql-to-json.php");
	
	$jsonData= getJSONFromDB("select * from user");
	
	$check = false;
	$jsn=json_decode($jsonData);
	
	for($i=0;$i<sizeof($jsn);$i++){
		if(trim($_REQUEST['eml']) == trim($jsn[$i]->email)){
			$check = true;
			break;
		}
	}
	
	if($check == false){
		$sq =  "insert into user (firstname, lastname, gender, dob, email, phone, password, usertype, status) values ( '". $_REQUEST['fn'] ."', '". $_REQUEST['ln'] ."', '". $_REQUEST['gender'] ."', '". $_REQUEST['day'] . "/" . $_REQUEST['month'] . "/" . $_REQUEST['year'] . "', '". $_REQUEST['eml'] ."', '". $_REQUEST['phone'] ."', '". md5($_REQUEST['ps']) ."', 'regular', 'unband')";
		if(ExecuteQuery($sq)){
			$jsonData= getJSONFromDB("select * from user where email='". $_REQUEST['eml'] ."'");
			$jsn=json_decode($jsonData);
			
			$_SESSION['ID'] = $jsn[0]->id;
			
			setcookie("PHPSESID", md5($_SESSION['ID']), time() + 86400, "/");
			
			header("Location:complete_profile.php");
		}
		else{
			header("Location:registration_failure.php?msg=Database exception!!!");
		}
	}
	else{
		header("Location:registration_failure.php?msg=Email exist!!!");
	}
}
else{
	header("Location:registration_failure.php?msg=Error in server connection!!!");
}
?>
</pre>