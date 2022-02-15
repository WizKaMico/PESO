<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST)){
    session_start();
    require('../conn.php');
    
    $A_Id = $_POST['id'];
    $AnnouncementTitle = $mysqli->real_escape_string(trim($_POST['AnnouncementTitle']));
    $AnnouncementDesc = $_POST['AnnouncementDesc'];
    
    
    $checkid1 = $mysqli->query("SELECT * FROM announcement WHERE title_announcement = '$AnnouncementTitle'");
    

    if(empty($AnnouncementTitle)||empty($AnnouncementDesc)){
        header("Location:../../pages/admin/manage-announcement.php?error=emptyfields");
        exit();
    }
          
    $query ="
            UPDATE announcement
            SET
                title_announcement = '$AnnouncementTitle',
                description = '$AnnouncementDesc'
            WHERE id = '$A_Id' 
            ";

    if(!$result = $mysqli->query($query)) {
        exit($mysqli->error);
    }
        header("Location:../../pages/admin/manage-announcement.php?update");
        exit();       
}
?>