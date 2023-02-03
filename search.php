
<?php
	if(ISSET($_POST['search'])){
		$keyword = $_POST['keyword'];
?>
       
    <?php
		require 'SEARCH/conn.php';
		$query = mysqli_query($conn, "SELECT * FROM `employer_vacancy_profile` WHERE `job_title` LIKE '%$keyword%' OR `job_location` LIKE '%$keyword%'") or die(mysqli_error());
		while($fetch = mysqli_fetch_array($query)){
	?>
                <div class="col-lg-12 col-md-7 col-sm-8">
                    <div class="single-services text-center mt-30 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <div class="services-icon">
                            <img class="shape" src="assets/images/services-shape.svg" alt="shape">
                            <img class="shape-1" src="assets/images/services-shape-2.svg" alt="shape">
                            <i class="lni-check-box"></i>
                        </div>
                        <div class="services-content mt-30">
                            <h4 class="services-title"><a href="#"><?php echo substr($fetch['job_title'], 0, 100)?></a></h4>
                            <!--<p class="text">Given by the Department of Labor and Employment Regional Office No.3</p>-->
                            <!--<a class="more" href="#">2012</a>-->
                            <!-- <i class="fa-regular fa-book-open-cover"></i> -->
                        </div>
                    </div> <!-- single services -->
                </div>
                
                <?php } ?>
                
<?php
	}
?>                