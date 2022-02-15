<?php
include("../conn.php");
if(isset($_POST['id']) && isset($_POST['id']) != ""){
	$id = $_POST['id'];
    
    // $query = "
    //     SELECT 
    //     employer_company_profile.eid,
    //     employer_company_profile.company_name,
    //     employer_company_profile.company_description,
    //     employer_company_profile.industry_type,
    //     employer_company_profile.building_no,
    //     employer_company_profile.street_name,
    //     employer_company_profile.barangay_name,
    //     employer_company_profile.city_name,
    //     employer_company_profile.province_name,
    //     employer_company_profile.zip_code,
    //     employer_vacancy_profile.id,
    //     employer_vacancy_profile.eid,
    //     employer_vacancy_profile.job_title,
    //     employer_vacancy_profile.job_qualifications,
    //     employer_vacancy_profile.job_summary,
    //     employer_vacancy_profile.job_requirements,
    //     employer_vacancy_profile.job_posted,
    //     employer_vacancy_profile.job_categories,
    //     employer_vacancy_profile.job_type,
    //     employer_vacancy_profile.job_salary,
    //     employer_vacancy_profile.job_status,
    //     employer_vacancy_profile.job_location
    //     FROM employer_vacancy_profile 
    //     INNER JOIN employer_company_profile 
    //     ON employer_vacancy_profile.eid = employer_profile.uid 
    //     WHERE employer_vacancy_profile.eid = '$id'";

    $query = "
        SELECT *
        FROM employer_vacancy_profile 
        INNER JOIN employer_company_profile 
        ON employer_vacancy_profile.eid = employer_company_profile.eid
        WHERE employer_vacancy_profile.id = '$id'";
	
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