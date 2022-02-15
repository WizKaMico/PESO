<?php
include("../conn.php");
if(isset($_POST['id']) && isset($_POST['id']) != ""){
	$id = $_POST['id'];
    
    $query = "
        SELECT * 
        FROM users
        INNER JOIN employer_profile
        ON users.id = employer_profile.uid
        INNER JOIN employer_company_profile 
        ON employer_profile.uid = employer_company_profile.eid 
        WHERE users.id = '$id'";

	
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