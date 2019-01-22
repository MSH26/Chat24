<?php
	
session_start();

//print_r($GLOBALS);

if($_COOKIE['PHPSESID'] == md5($_SESSION['ID'])){
	
	require("mysql-to-json.php");
	
	$sql = "select secondperson from friends where firstperson='".$_SESSION['ID']."'";
	
	$jsonData= getJSONFromDB($sql);
	$jsn=json_decode($jsonData);
	
	for($i=0;$i<sizeof($jsn);$i++){
		
		$sql = "select id, text, photoid from status where userid='".$jsn[$i]->secondperson."'";
		$jsonData= getJSONFromDB($sql);
		$jsn_status=json_decode($jsonData);
		
		if(sizeof($jsn_status)>0){
			
			for($j=0;$j<sizeof($jsn_status);$j++){
				echo "<div class='createdpost_post'><div class='createdpost_post_UP'>";
		
				$sql = "select name from profilephotos where userid='".$jsn[$i]->secondperson."' and state='active'";
				$jsonData= getJSONFromDB($sql);
				$jsn_name=json_decode($jsonData);
				if(sizeof($jsn_name) > 0){
					echo "<img src='".$jsn_name[0]->name."' style='width:40px;height:40px;'/>";
				}
				
				$sql = "select firstname, lastname from user where id='".$jsn[$i]->secondperson."'";
				$jsonData= getJSONFromDB($sql);
				$jsn_pname=json_decode($jsonData);
				echo "<a>".$jsn_pname[0]->firstname." ".$jsn_pname[0]->firstname."</a></div>";
				
				echo "<div class='createdpost_post_BODY'>";
				
				if($jsn_status[$j]->text != ""){
					echo "<a class='statText'>".$jsn_status[$j]->text."</a>";
				}
				if($jsn_status[$j]->photoid > 0){
					$sql = "select name from photos where id='".$jsn_status[$j]->photoid."'";
					$jsonData= getJSONFromDB($sql);
					$jsn_ph=json_decode($jsonData);
					echo "<img src='".$jsn_ph[0]->name."' style='width:100%;height:350px;'/>";
				}
				
				echo "</div><div class='createdpost_post_MIDDLE'><a onclick='like(".$jsn_status[$j]->id.")'>Like</a></div>";
				echo "<div class='createdpost_post_DOWN'><div class='createdpost_post_DOWN_COMMENTS'>";
				
				$sql = "select text,userid from comments where statusid='".$jsn_status[$j]->id."'";
				$jsonData= getJSONFromDB($sql);
				$jsn_c=json_decode($jsonData);
				if(sizeof($jsn_c)>0){
					for($k=0; $k<sizeof($jsn_c); $k++){
						$sql = "select firstname, lastname from user where id='".$jsn_c[$k]->userid."'";
						$jsonData= getJSONFromDB($sql);
						$jsn_pe=json_decode($jsonData);
						echo "<a style='color:blue'><b>".$jsn_pe[0]->firstname." ".$jsn_pe[0]->firstname."</b></a><br/>";
						echo "<div class='com'><a>".$jsn_c[$k]->text."</a></div>";
					}
				}
				echo "</div>";
				echo "<div class='createdpost_post_DOWN_Write'><textarea type='text' placeholder='Comment here somthing!' id='createdpost_post_text".$j."'></textarea><input type='button' value='Post' onclick='comment(createdpost_post_text".$j.", ".$jsn_status[$j]->id.")' id='createdpost_post_comment'></div></div></div>";
			}
		}
	}
}
else{
	 echo "<a>No post</a>";
}
?>