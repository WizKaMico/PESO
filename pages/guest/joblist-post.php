<?php
    if(isset($_GET['jid'])){
        $id = $mysqli->real_escape_string($_GET['jid']);
        $query = "SELECT
        employer_company_profile.company_name,
        employer_company_profile.company_description,
        employer_vacancy_profile.id,
        employer_vacancy_profile.job_title,
        employer_vacancy_profile.job_qualifications,
        employer_vacancy_profile.job_summary,
        employer_vacancy_profile.job_requirements,
        employer_vacancy_profile.job_status,
        employer_vacancy_profile.job_salary,
        employer_vacancy_profile.job_categories,
        employer_vacancy_profile.job_type,
        employer_vacancy_profile.job_location
    FROM employer_company_profile
    RIGHT JOIN employer_vacancy_profile
    ON employer_company_profile.eid = employer_vacancy_profile.eid
    WHERE employer_vacancy_profile.id = '$id'";

    if (!$result = $mysqli->query($query)) {
        exit($mysqli->error);
    }

    $result = $mysqli->query($query);
        $row = $result->fetch_array();

    $jid = $row['id'];
    $jstatus = $row['job_status'];
    $cname = $row['company_name'];
    $jname = $row['job_title'];
    $jlocation = $row['job_location'];
    $jsalary = $row['job_salary'];
    $jtype = $row['job_type'];
    $jemployement = $row['job_categories'];
    $jqualifications = $row['job_qualifications'];
    $jsummary = $row['job_summary'];
    $jrequirements = $row['job_requirements'];
?>

    <div class="card m-4 shadow ">
    <div class="card-body">
        <div class="row">
            <div class="ml-3 mr-3">   
                <div class="col-xl-12 col-sm-12" style="font-size: 20px;">
                    <strong><?php echo $jname;?></strong>
                </div>
                <div class="col-xl-12 col-sm-12" style="font-size: 18px;">
                    <?php echo $cname;?>
                </div>
                <div class="col-xl-12 col-sm-12" style="font-size: 16px;">
                    <?php echo $jlocation;?>
                </div>
                <div class="col-xl-12 col-sm-12">
                    Php <?php echo $jsalary;?>/Per Month
                </div>
                <hr>
                <div class="col-xl-12 col-sm-12 mb-3">
                        <?php echo $jsummary;?>
                </div>
                <div class="col-xl-12 col-sm-12">
                    <div class="row">
                        <div class="col-xl-6 col-sm-6 mr-3">
                            <?php echo $jqualifications;?>
                        </div>
                        <div class="col-xl-6 col-sm-6 ml-3 ">
                            <?php echo $jrequirements;?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="float-right pt-2 pr-2">
            <a href="applyjob.php" class="btn btn-secondary">Apply</a>
        </div>
    </div>
</div>
<?php
    }
    
?>

