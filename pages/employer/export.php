<?php
	session_start();
	//connection
	
	  $uid = $_GET['uid'];  
	
	$conn = new mysqli('sql217.main-hosting.eu', 'u729926683_pesodb', '@Light101213', 'u729926683_pesodb');

	$sql = "SELECT *  FROM employer_vacancy_applicant RIGHT JOIN applicant_profile ON employer_vacancy_applicant.aid = applicant_profile.uid RIGHT JOIN employer_vacancy_profile ON employer_vacancy_applicant.jid = employer_vacancy_profile.id RIGHT JOIN employer_company_profile ON employer_vacancy_profile.eid = employer_company_profile.eid RIGHT JOIN applicant_vacancy_file ON employer_vacancy_applicant.eid = applicant_vacancy_file.eid RIGHT JOIN applicant_file ON employer_vacancy_applicant.aid = applicant_file.aid
        WHERE employer_vacancy_applicant.aid = '".$uid."' OR employer_vacancy_applicant.eid = '".$uid."' GROUP BY employer_vacancy_applicant.jid";
	$query = $conn->query($sql);

	if($query->num_rows > 0){
	    
	    
	  
	    
	    
		$delimiter = ',';
		//create a download filename
		$filename = 'applicant.csv';

		$f = fopen('php://memory', 'w');

		$headers = array('Id', 'Firstname', 'Lastname', 'Position Applied', 'Resume Link');
    	fputcsv($f, $headers, $delimiter);

    	while($row = $query->fetch_array()){
    	    
    	       $E_Id = $row['eid'];
                                            $A_Id = $row['aid'];
                                            $J_Id = $row['jid'];
                                            $E_JobName = $row['job_title'];
                                            $E_JobSummary = $row['job_summary'];
                                            $E_JobQualifications = $row['job_qualifications'];
                                            $E_JobRequirements = $row['job_requirements'];
                                            $E_JobArchived = $row['job_status'];
                                            $A_LName = $row['lname'];
                                            $A_FName = $row['fname'];
                                            $A_MName = $row['mname'];
                                            $A_Suffix = $row['suffix'];
                                            $A_Name = "$A_FName $A_MName $A_LName $A_Suffix"; 
                                            
                                            $E_JobStatus = $row['job_status'];
                                            
                                            $link = 'https://devcommerceph.store/upload/';
                                            $up =  $row['file_name'];
                                            $A_link = "$link$up";
                                            
    	    
	        $lines = array($A_Id,  $A_FName,  $A_LName, $E_JobName, $A_link);
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
		header('location:manage-applicant.php');
	}
?>