<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(isset($_POST)){
    session_start();
    include('../conn.php');
    
    $AnnouncementTitle = $mysqli->real_escape_string(trim($_POST['AnnouncementTitle']));
    $AnnouncementDesc = $_POST['AnnouncementDesc'];
    $PostStatus = 'Posted';
    $PostArchive = 'DeArchived';
    
    date_default_timezone_set('Asia/Manila');
    $PostDatestamp = " ".date('Y/m/d')." ";
    $PostTimestamp = " ".date('h:i:s a')." ";
    
    $checkid1 = $mysqli->query("SELECT * FROM announcement WHERE title_announcement = '$AnnouncementTitle'");
    $list = $checkid1->fetch_array();

    if(empty($AnnouncementTitle)||empty($AnnouncementDesc)){
        header("Location:../../pages/admin/post-announcement.php?error=emptyfields");
        exit();
    }
    
    if($checkid1->num_rows!=0){			
        header("Location:../../pages/admin/post-announcement.php?error=InvalidAnnouncementTitle");
        exit();
    }
    else{
        $query = "INSERT INTO announcement (title_announcement, description, date_posted, time_posted, post_status, post_archive) VALUES ('$AnnouncementTitle', '$AnnouncementDesc', '$PostDatestamp', '$PostTimestamp', '$PostStatus', '$PostArchive')";
        
        if(!$result = $mysqli->query($query)){
            exit($mysqli->error);
            }

        header("Location:../../pages/admin/post-announcement.php?add");
        exit();
    }
}
?>