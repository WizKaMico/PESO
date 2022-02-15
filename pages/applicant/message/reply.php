<?php
session_start();
require_once("../../../php-func/conn.php");
	if(isset($_SESSION['user']) and isset($_GET['user'])) {
		if (isset($_POST['text'])){
			if ($_POST['text']!='') {
				$Sender = $_SESSION['uid'];
				$Recipient = $_GET['user'];
				$Message = $mysqli->real_escape_string($_POST['text']);
				$Date = date("Y-m-d h:i:s a");
				
				$query = "INSERT INTO message (sender_id, recipient_id, message, date) VALUES ('$Sender','$Recipient','$Message','$Date')";
					
					if(!$result = $mysqli->query($query)){
                		exit($mysqli->error);
            		}
				if ($result){
?>
					<div class="col-lg-12 d-flex">
            			<div class="col-lg-6 bg-danger text-white rounded d-flex flex-row flex-grow-1 recipient-message"><?php echo $Message; ?></div>
          			</div>
<?php
				}
			}else{
				/*echo 'Please Write Something First';*/
                header("Location:index.php?error=emptymessage");
			}
		}else{
			/*echo'Cannot send your message';*/
            header("Location:index.php?error=errormessage");
		}
	}else{
		/*echo'Please login or select a user to send a message';*/
         /*header("Location:logout.php");*/
	}
?>