<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST)){
    session_start();
    require('../conn.php');
    
    $A_Id = $_POST['id'];
    $AnnouncementTitle = $mysqli->real_escape_string(trim($_POST['e_announcementtitle']));
    $AnnouncementDesc = $_POST['e_announcementdesc'];
    
    
    //$checkid1 = $mysqli->query("SELECT * FROM employer_announcement WHERE announcement_title = '$AnnouncementTitle'");
    

    if(empty($AnnouncementTitle)||empty($AnnouncementDesc)){
        header("Location:../../pages/employer/post-announcement.php?error=emptyfields");
        exit();
    }
          
    $query ="
            UPDATE employer_announcement
            SET
                announcement_title = '$AnnouncementTitle',
                announcement_description = '$AnnouncementDesc'
            WHERE id = '$A_Id' 
            ";

    if(!$result = $mysqli->query($query)) {
        exit($mysqli->error);
    }
        header("Location:../../pages/employer/post-announcement.php?update");
        exit();       
}
?>