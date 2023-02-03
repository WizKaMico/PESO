<?php
	if(ISSET($_POST['search'])){
		$job_title = $_POST['job_title'];
?>
<div>

	<hr style="border-top:2px dotted #ccc;"/>
	<?php
		require 'conn.php';
		$query = mysqli_query($conn, "SELECT * FROM `employer_vacancy_profile` WHERE `job_title` LIKE '%$job_title%' OR `job_location` LIKE '%$job_title%'") or die(mysqli_error());
		while($fetch = mysqli_fetch_array($query)){
	?>
	
	
	   <div class="card m-4 shadow ">
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <div style="font-size:20px;"><strong><?php echo $fetch['job_title'];?></strong></div>
                </div>
                <div class="col-xl-12 col-sm-12">
                    <div style="font-size:18px;"><label><?php echo $fetch['job_qualifications'];?></label></div>
                </div>
                <div class="col-xl-12 col-sm-12">
                    <div style="font-size: 16px;"><label><?php echo $fetch['job_location'];?></label></div>
                </div>    
                <div class="col-xl-12 col-sm-12">
                    <?php echo $fetch['job_salary'];?>
                </div>
            </div>
            <div class="float-right pt-2 pr-2">
                <a href="joblist-view.php?jid=<?php echo $fetch['id'];?>" class="btn btn-primary">View More</a>
            </div>
        </div>
    </div>
	
	
	
	
	
	<hr style="border-bottom:1px solid #ccc;"/>
	<?php
		}
	?>
</div>
<?php
	}
?>