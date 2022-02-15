<?php
include ('../../../php-func/conn.php'); 
if(isset($_SESSION['user'])){
error_reporting(0);
?>
<div class="card shadow" id="conversation-card">
    <div class="card-body">
        <?php
          if (isset($_GET['error'])) {
            if($_GET['error'] == 'emptymessage'){
                    echo '
                    <div class="form-group">
                        <div class="btn btn-danger btn-block">Please Write Something First!</div>
                    </div>
                    ';
                }elseif($_GET['error'] == 'errormessage'){
                    echo '
                    <div class="form-group">
                        <div class="btn btn-danger btn-block">Your Message Cannot Send!. Please Try Again. </div>
                    </div>
                    ';
                }
          }
        ?>
        <div class="card username-card">
            <div class="card-body">
                <?php
                if(isset($_GET['user'])){
                   $query = '
                    SELECT 
                        message.sender_id,
                        message.recipient_id,
                        users.lname, 
                        users.fname, 
                        users.mname, 
                        users.u_id 
                    FROM message 
                    LEFT JOIN users 
                    ON users.u_id = message.sender_id 
                    WHERE sender_id = "'.$_GET['user'].'"
                    ';

                    if(!$result = $mysqli->query($query)){
                        exit($mysqli->error);
                    }
                    
                        while ($row = $result->fetch_assoc()){
                            $Sender = $row['recipient_id'];
                            $SenderLName = $row['lname'];
                            $SenderFName = $row['fname'];
                            $SenderMName = $row['mname'];
                            $SenderName = "".$SenderLName.", ".$SenderFName." ";
                        }   
                    
                    ?>
                <div class="card-text">
                    <div><?php echo $SenderName;?></div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="card conversation-card" id="conversation-container">
            <div class="card-body">
                <div class="row">
                    <?php
          if (isset($_GET['user'])) {
            $_GET['user'] = $_GET['user'];
          } else {
            $query = '
            SELECT 
                message.sender_id, 
                message.recipient_id, 
                users.lname, 
                users.fname, 
                users.mname, 
                users.u_id 
            FROM message 
            LEFT JOIN users 
            ON users.u_id = message.sender_id 
            WHERE (sender_id = "'.$_SESSION['uid'].'") 
            OR (recipient_id = "'.$_SESSION['uid'].'") 
            ORDER BY date DESC 
            LIMIT 1
            ';

            if(!$result = $mysqli->query($query)){
                exit($mysqli->error);
            }

            if ($result->num_rows > 0){
              while ($row = $result->fetch_assoc()){
                $Sender = $row['sender_id'];
                $Receipient = $row['recipient_id'];
                $SenderLName = $row['lname'];
                $SenderFName = $row['fname'];
                //$SenderMName = $row['mname'];
                $RecipientName = "".$SenderLName.", ".$SenderFName." ";
                $SenderName = "".$SenderLName.", ".$SenderFName." ";

                if ($_SESSION['uid'] == $Sender) {
                  $_GET['user'] = $Receipient;
                } else {
                  $_GET['user'] = $Sender;
                }
                
              }
            } else {
          ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">NO MESSAGE</div>
                            </div>
                        </div>
                    </div>

                    <?php
            }
          }
    
            
          $query = '
          SELECT * 
          FROM message 
          WHERE (sender_id = "'.$_SESSION['uid'].'" 
          AND recipient_id = "'.$_GET['user'].'") 
          OR (sender_id = "'.$_GET['user'].'" 
          AND recipient_id = "'.$_SESSION['uid'].'")
          ';

            if(!$result = $mysqli->query($query)){
                exit($mysqli->error);
            }

            while ($row = $result->fetch_assoc()){
              $Sender = $row['sender_id'];
              $Receipient = $row['recipient_id'];
              $Message = $row['message'];

              if ($Sender == $_SESSION['uid']) {
          ?>
                    <div class="col-lg-6 d-flex flex-row-reverse">
                    </div>
                    <div class="col-lg-6 d-flex flex-row-reverse">
                        <div class="bg-danger text-white rounded d-flex flex-row-reverse m-1 p-1 sender-message"><?php echo $Message; ?></div>
                    </div>
                    <?php
              } else {
          ?>
                    <div class="col-lg-6 d-flex">
                        <div class="bg-primary text-white rounded d-flex flex-row m-1 p-1 recipient-message"><?php echo $Message; ?></div>
                    </div>
                    <div class="col-lg-6 d-flex">
                    </div>
                    <?php
              }
            }
          ?>
                </div>
            </div>
        </div>
        <div class="card reply-text">
            <div class="card-body">
                <form method="POST" id="message-form-reply">
                    <div class="row">
                        <div class="col-lg-11 col-md-10 col-sm-8">
                            <textarea class="form-control p-1 m-1" id="message-reply" placeholder="Write your message"></textarea>
                        </div>
                        <div class="col-lg-1 col-md-2 col-sm-4">
                            <button type="submit" class="btn btn-primary btn-block mt-2 mb-2"><i class="fas fa-paper-plane" style="font-size: 20px;"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
}else{
    header("Location: inbox.php");
} ?>
<script src="../js/jquery-3.5.1.min.js"></script>
<script>
    $("document").ready(function(event) {
        $('#conversation-card').on('submit', '#message-form-reply', function() {
            var message_reply = $("#message-reply").val();
            $.post('reply.php?user=<?php echo $_GET['user'];?>', {
                    text: message_reply,
                },
                function(data, status) {
                    $("#message-reply").val("");
                    document.getElementById("conversation-container").innerHTML += data;
                }
            );
        });

        //USING KEYCODE 13 "ENTER KEY" 
        $('#conversation-card').keypress(function(e) {
            if (e.keyCode == 13 && !e.shiftKey) {
                $("#message-form-reply").submit();
            }
        });
    });
</script>