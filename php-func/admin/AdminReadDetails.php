<?php
include("../conn.php");
if(isset($_POST['id']) && isset($_POST['id']) != ""){
	$id = $_POST['id'];
    
    $query = "
        SELECT * 
        FROM announcement
        WHERE id = '$id'";

	
	if (!$result = $mysqli->query($query)) {
		exit($mysqli->error);
	}
	
	$response = array();
	if($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		$response = $row;
		}
	}else{
		$response['status'] = 200;
		$response['message'] = "Data not found!";
	}
	echo json_encode($response);
}else{
	$response['status'] = 200;
	$response['message'] = "Invalid Request!";
}