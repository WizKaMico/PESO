<?php
	session_start();
	//connection
	$conn = new mysqli('sql217.main-hosting.eu','u729926683_barangay','@Light101213','u729926683_barangay');

	$sql = "SELECT * FROM non_pay";
	$query = $conn->query($sql);

	if($query->num_rows > 0){
		$delimiter = ',';
		//create a download filename
		$filename = 'nonpayable_request.csv';

		$f = fopen('php://memory', 'w');

		$headers = array('ID', 'Name', 'Age', 'Date Submitted', 'Email', 'Contact',  'Status');
    	fputcsv($f, $headers, $delimiter);

    	while($row = $query->fetch_array()){
	        $lines = array($row['id'], $row['name'], $row['age'], $row['date_created'], $row['email'], $row['contact'], $row['status']);
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
		header('location:nopay.php');
	}