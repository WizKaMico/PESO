<?php
    $limit = 10;
    $pn = '';
    $UserStatus1 = 'Employer';
    $UserStatus2 = 'Activated';
    $UserStatus3 = 'DeArchived';
    
    
    if (isset($_GET["page"])) { 
        $pn  = $_GET["page"]; 
    } else { 
        $pn=1; 
    }
    
    $start_from = ($pn-1) * $limit;
    
    $query1 ="
            SELECT COUNT(*)
            FROM users
            RIGHT JOIN employer_profile
            ON users.id = employer_profile.uid
            WHERE users.user_status = '$UserStatus1'
            AND users.user_activation = '$UserStatus2'
            ";
    if (!$result = $mysqli->query($query1)) {
        exit($mysqli->error);
    }
    $row = $result->fetch_row();
    $total_records = $row[0];
    $total_pages = ceil($total_records / $limit);
    $k = (($pn+2>$total_pages)?$total_pages-2:(($pn-1<2)?2:$pn));   
    $pagLink='' ;
          

    $query2 = "
            SELECT 
                users.id, 
                users.user_activation,
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
            FROM users 
            RIGHT JOIN employer_profile 
            ON users.id = employer_profile.uid
            RIGHT JOIN employer_vacancy_profile
            ON users.id = employer_vacancy_profile.eid
            RIGHT JOIN employer_company_profile
            ON users.id = employer_company_profile.eid
            WHERE users.user_status = '".$UserStatus1."'
            AND users.user_activation = '".$UserStatus2."'
            ORDER BY users.id DESC
            LIMIT $start_from, $limit ";
      
    if (!$result = $mysqli->query($query2)) {
                exit($mysqli->error);
    }

    $result = $mysqli->query($query2);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            
            $eid = $row['id'];
            $jid = $row['id'];
            $jstatus = $row['job_status'];
            $cname = $row['company_name'];
            $jname = $row['job_title'];
            $jlocation = $row['job_location'];
            $jsalary = $row['job_salary'];
            
            if($jstatus == 'Hiring'){ 
?>

    <div class="card m-4 shadow ">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <div style="font-size:20px;"><strong><?php echo $jname;?></strong></div>
                </div>
                <div class="col-xl-12 col-sm-12">
                    <div style="font-size:18px;"><label><?php echo $cname;?></label></div>
                </div>
                <div class="col-xl-12 col-sm-12">
                    <div style="font-size: 16px;"><label><?php echo $jlocation;?></label></div>
                </div>    
                <div class="col-xl-12 col-sm-12">
                    <?php echo $jsalary;?>
                </div>
            </div>
            <div class="float-right pt-2 pr-2">
                <a href="joblist-view.php?jid=<?php echo $jid;?>" class="btn btn-primary">View More</a>
            </div>
        </div>
    </div>


<?php
            }
		}
    }else{
?>

<div class="card m-4">
    <div class="card-body h-100">
        <div class="text-center font-weight-bold">
            <p>No Job Listing Yet</p>
        </div>
    </div>
</div>

<?php
    }
            
            if($total_records > 10){
                echo'
                <ul class="pagination justify-content-center">';                
                    if($pn>1){
                        echo '<li class="page-item"><a class="page-link" href="index.php?page=1"> &lt;&lt; First </a></li>';
                        echo '<li class="page-item"><a class="page-link" href="index.php?page='.($pn-1).'"> &lt; Prev </a></li>';
                    }elseif($pn=1){
                        echo '<li class="page-item disabled"><a class="page-link" href="index.php?page=1"> &lt;&lt; First </a></li>';
                        echo '<li class="page-item disabled"><a class="page-link" href="index.php?page='.($pn-1).'"> &lt; Prev </a></li>';
                        }
                           for ($i=-1; $i<=2; $i++){ 
                               if($k+$i==$pn){ 
                                   $pagLink .='<li class="page-item active"><a class="page-link" a href="index.php?page=' .($k+$i).'">'.($k+$i).'</a></li>';
                               }else{
                                   $pagLink .= '<li class="page-item"><a class="page-link" href="index.php?page='.($k+$i).'">'.($k+$i).'</a></li>';
                                }
                            }
                        echo $pagLink;
                        if($pn<$total_pages){ 
                            if ($pn>$total_pages) {
                                echo '<li class="page-item"><a class="page-link" href="index.php?page='.$total_pages.'"> Next &gt; </a></li>';
                                } else {
                                echo '<li class="page-item"><a class="page-link" href="index.php?page='.($pn+1).'"> Next &gt; </a></li>';
                                }
                                echo '<li class="page-item"><a class="page-link" href="index.php?page='.$total_pages.'"> Last &gt;&gt;</a></li>';
                        }elseif($pn=$total_pages){ 
                            if ($pn>$total_pages) {
                                echo '<li class="page-item disabled"><a class="page-link" href="index.php?page='.$total_pages.'"> Next &gt; </a></li>';
                            } else {
                                echo '<li class="page-item disabled"><a class="page-link" href="index.php?page='.($pn+1).'"> Next &gt; </a></li>';
                            }
                                echo '<li class="page-item disabled"><a class="page-link" href="index.php?page='.$total_pages.'"> Last &gt;&gt;</a></li>';
                        }
                echo'</ul>';
                //echo $total_records;
            }elseif($total_records < 10){
                echo'
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" >&lt;&lt; First</a></li>
                    <li class="page-item disabled"><a class="page-link">Prev</a></li>
                    <li class="page-item disabled"><a class="page-link">Next</a></li>
                    <li class="page-item disabled"><a class="page-link"> Last &gt;&gt;</a></li>
                </ul>';
            }
?>