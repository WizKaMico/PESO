<!-- LOGOUT MODAL -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- UPDATE MODAL -->
<div class="modal fade" id="UpdateJobListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form method="POST" action="../../php-func/admin/ClientAccountUpdateFunction.php">
                <div class="modal-header">
                    <div class="modal-title">
                        <h5>Edit Coordinator</h5>
                    </div>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">Profile</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-5">
                                                <div class="form-label-group">
                                                    <input type="text" name="c_fname" id="UpdateFirstName" class="form-control" placeholder="Last name" required="required">
                                                    <label for="UpdateFirstName">Firstname</label>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-label-group">
                                                    <input type="text" name="c_lname" id="UpdateLastName" class="form-control" placeholder="Last name" required="required">
                                                    <label for="UpdateLastName">Last name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-label-group">
                                                    <input type="text" name="c_mname" id="UpdateMiddleName" class="form-control" placeholder="M.I">
                                                    <label for="UpdateMiddleName">M.I</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="text" name="c_email" id="UpdateEmail" class="form-control" placeholder="Username" varequired="required">
                                            <label for="UpdateEmail">Email</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="text" name="c_username" id="UpdateUsername" class="form-control" placeholder="Username" varequired="required">
                                            <label for="UpdateUsername">Username</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="text" name="c_pass1" id="UpdatePassword1" class="form-control" placeholder="Password">
                                            <label for="UpdatePassword1">Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <input type="text" name="c_pass2" id="UpdatePassword2" class="form-control" placeholder="Confirm Password">
                                            <label for="UpdatePassword2">Confirm Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="eid" id="hidden_eid">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update-confirm">Update Account</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- VIEW APPLICANT MODAL -->
<div class="modal fade" id="UpdateJobListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h5>View Applicants</h5>
                </div>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Applicant</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Applicant</th>
                            <th>View</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        $query="SELECT
                            employer_vacancy_applicant.eid,
                            employer_vacancy_applicant.aid,
                            applicant_file.aid,
                            applicant_file.file_name
                            FROM employer_vacancy_applicant
                            INNER JOIN applicant_file
                            ON employer_vacancy_applicant.aid = applicant_file.aid
                            WHERE eid = '".$_SESSION['uid']."'";
                        if (!$result = $mysqli->query($query)){
                            exit($mysqli->error);
                        }
                        if($result->num_rows > 0){
                            $number = 1;
                            
                            while($row = $result->fetch_assoc()){
                                $E_Id = $row['eid'];
                                $E_JobName = $row['job_title'];
                                $E_JobSummary = $row['job_summary'];
                                $E_JobQualifications = $row['job_qualifications'];
                                $E_JobRequirements = $row['job_requirements'];
                                $E_JobArchived = $row['job_status'];
                                
                                    if($E_JobArchived == 'Hiring'){
                    ?>

                        <tr>
                            <td><?php echo $number;?></td>
                            <td><?php echo $E_JobName;?></td>
                            <td>
                                <button onclick="GetUpdateDetails(<?php echo $row['eid'] ?>)" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </td>
                        </tr>
                    <?php
                                    $number++;
                                }
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
