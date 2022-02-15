<?php 
include ('../../../php-func/conn.php'); 
if(isset($_SESSION['user'])){
?>
 <div class="card shadow">
  <div class="card-body">
    <!--<div class="col-lg-12 new-message-btn">
      <a class="btn btn-primary btn-block text-white" data-toggle="modal" data-target="#NewMessageModal">New Message</a>
    </div>-->
    <div class="col-lg-12">
      <div class="card recipient-card">
        <div class="card-body">
          <?php
              $query = "
              SELECT DISTINCT 
                message.recipient_id, 
                message.sender_id, 
                users.lname, 
                users.fname, 
                users.mname, 
                users.u_id,
				client_imgprofiles.img_name, 
				client_imgprofiles.img_status				
              FROM message 
              LEFT JOIN users
              ON users.u_id = message.sender_id
			  RIGHT JOIN client_imgprofiles
			  ON users.u_id = client_imgprofiles.client_id
              WHERE sender_id = '".$_SESSION['uid']."' 
              OR recipient_id = '".$_SESSION['uid']."' 
              ORDER BY date DESC
              ";

              if(!$result = $mysqli->query($query)){
                exit($mysqli->error);
                }

                $AddUser = array();
                $counter = 0;

                if ($result->num_rows > 0){
                  while ($row = $result->fetch_assoc()){
                    $Sender = $row['sender_id'];
                    $Recipient = $row['recipient_id'];
                    $SenderLName = $row['lname'];
                    $SenderFName = $row['fname'];
                    //$SenderMName = $row['mname'];
                    /*$RecipientName = "".$SenderLName.", ".$SenderFName." ";*/
                    $SenderName = "".$SenderLName.", ".$SenderFName." ";
					$imgname = $row['img_name'];
					$imguser = $row['img_status'];
					
                    if ($_SESSION['uid'] == $Sender) {
                      if (in_array($Recipient, $AddUser)) {
                        # NO CODE HERE....
                      }else{
          ?>
                        <!--<a href="?user=<?php echo $Recipient; ?>">
                        <div class="card card-user" style="border-color: #ff0000;">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-lg-2">
                                <img src="../../../images/coordinator_profiles/default.png" width="50" height="50" alt="user.png">
                              </div>
                              <div class="col-lg-10">
                                <div><?php echo $SenderName; ?></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>-->
          <?php
                      $Adduser = array($counter => $Recipient);
                      $counter ++;
                      }
                    }elseif ($_SESSION['uid'] == $Recipient) {
                     if (in_array($Sender, $AddUser)) {
                       # NO CODE HERE....
                     } else {
          ?>
                        <a href="?user=<?php echo $Sender; ?>">
                        <div class="card card-user" style="border-color: #0000ff;">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-lg-4">
                                <?php
                                        if($imguser == 0){
                                             echo '<img src="../../../images/client_profiles/default.png" class="img-thumbnail" width="50" height="50" alt="200x200">';
                                         }elseif($imguser == 1){
                                             echo '<img src="../../../images/client_profiles/'.$imgname.'" class="img-thumbnail" width="50" height="50" alt="200x200">';
                                         }
                                    ?>
                              </div>
                              <div class="col-lg-8">
                                <div><?php echo $SenderName; ?></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </a>
          <?php
                     
                      $Adduser = array($counter => $Sender);
                      $counter ++;
                     }
                     
                    }
                  }
                } else {
          ?>
                    <div class="card user-recipients">
                      <div class="card-body">
                        <div class="text-center">NO USER</div>
                      </div>
                    </div>
          <?php
                }    
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
}else{
    $query = "
              SELECT 
                message.recipient_id, 
                message.sender_id, 
                users.u_id 
              FROM message 
              LEFT JOIN users
              ON users.u_id = message.recipient_id
              WHERE sender_id = '".$_SESSION['uid']."' 
              ORDER BY date DESC
              ";

              if(!$result = $mysqli->query($query)){
                exit($mysqli->error);
                }

                
                  while ($row = $result->fetch_assoc());
                    $Recipient = $row['recipient_id'];

    header("Location:inbox.php?user=$Recipient");
                    
} 
?>