<?php
	session_start();
	//connection
	$conn = new mysqli('sql217.main-hosting.eu','u729926683_pesodb','@Light101213','u729926683_pesodb');

	$sql = "SELECT * FROM `users`";
	$query = $conn->query($sql);

	if($query->num_rows > 0){
		$delimiter = ',';
		//create a download filename
		$filename = 'user.csv';

		$f = fopen('php://memory', 'w');

		$headers = array('ID', 'username', 'password', 'user_status', 'date_registered');
    	fputcsv($f, $headers, $delimiter);

    	while($row = $query->fetch_array()){
	        $lines = array($row['id'], $row['username'], $row['password'], $row['user_status'],  $row['date_registered']);
	        fputcsv($f, $lines, $delimiter);
	    }
	    
	    fseek($f, 0);
	    header('Content-Type: text/csv');
	    header('Content-Disposition: attachment; filename="' . $filename . '";');
	    fpassthru($f);
	    exit;
	}
	else{
		$_SESSION['message'] = 'Cannot export. Data empty';
		header('location:index.php');
	}