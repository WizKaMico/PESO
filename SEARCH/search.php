<?php
	if(ISSET($_POST['search'])){
		$keyword = $_POST['keyword'];
?>
<div>
	<h2>Result</h2>
	<hr style="border-top:2px dotted #ccc;"/>
	<?php
		require 'conn.php';
		$query = mysqli_query($conn, "SELECT * FROM `employer_vacancy_profile` WHERE `job_title` LIKE '%$keyword%' OR `job_location` LIKE '%$keyword%'") or die(mysqli_error());
		while($fetch = mysqli_fetch_array($query)){
	?>
	<div style="word-wrap:break-word;">
	
		<p><?php echo substr($fetch['job_title'], 0, 100)?>...</p>
	</div>
	<hr style="border-bottom:1px solid #ccc;"/>
	<?php
		}
	?>
</div>
<?php
	}
?>