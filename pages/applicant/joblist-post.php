<?php
    if(isset($_GET['jid'])){
        $id = $mysqli->real_escape_string($_GET['jid']);
        $query = "SELECT *
                    FROM employer_company_profile
                    RIGHT JOIN employer_vacancy_profile
                    ON employer_company_profile.eid = employer_vacancy_profile.eid
                    WHERE employer_vacancy_profile.id = '$id'";

    if (!$result = $mysqli->query($query)) {
        exit($mysqli->error);
    }

    $result = $mysqli->query($query);
        $row = $result->fetch_array();

    $eid = $row['eid'];
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
                        <div class="col-xl-6 col-sm-6">
                            <?php echo $jqualifications;?>
                        </div>
                        <div class="col-xl-6 col-sm-6 ">
                            <?php echo $jrequirements;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="float-right pt-2 pr-2">
            <!-- <form action="../../php-func/applicant/JobListingApplicant.php" method="POST">
                <input type="hidden" name="jid" id="" value="<?php echo $jid; ?>">
                <input type="hidden" name="eid" id="" value="<?php echo $eid; ?>">
                <input type="hidden" name="aid" id="" value="<?php echo $_SESSION['uid']; ?>">
                <button type="submit" class="btn btn-primary">Apply</button>
            </form> -->
            <a href="joblist-apply.php?jid=<?php echo $jid;?>" class="btn btn-primary">Apply</a>
        </div>
    </div>
</div>
<?php
    }
    
?>


