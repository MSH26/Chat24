<?php
function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "", "chat24h");
	
	//echo $sql;
	$result = mysqli_query($conn, $sql)or die(mysqli_connect_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}

function ExecuteQuery($sql){
	$conn = mysqli_connect("localhost", "root", "", "chat24h");
	
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	return $result;
}
?>