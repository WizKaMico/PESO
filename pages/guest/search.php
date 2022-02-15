<?php
include("../../php-func/conn.php");
if (isset($_POST['search'])) {
	$search = $_POST['search'];
	
	$query=$mysqli->query("SELECT * FROM tblfiles where title like '%$search%' OR department like '%$search%' ") or die($mysqli->error);

	if(mysqli_num_rows($query)==0){
		echo '<div class="panel panel-default" style="width:250px;  background-color:lightgray; position: absolute; z-index: 1; border-radius: 0px 0px 20px 20px; padding: 10px 0px 0px 10px;">';
		?>
		<span style="margin-left:13px;">No results found</span>
		<?php
		'</div>';
	}
	else{
		echo '<div class="panel panel-default" style="width:250px; background-color:lightgray; position: absolute; z-index: 1; border-radius: 0px 0px 20px 20px; padding: 10px 0px 10px 0px;">';
		while ($row = mysqli_fetch_array($query)) {
		?>
			<a href="post.php?id=<?php echo $row['file_id']; ?>" style="text-decoration:none; color:black; margin-left:13px; padding: : 10px; text-align: justify;"><?php echo $row['title']; ?></a>
			<br>	
		<?php
		}
		'</div>';
	}
}
 
?>