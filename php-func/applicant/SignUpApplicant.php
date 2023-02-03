<?php
error_reporting(E_ALL ^ E_DEPRECATED);



if(isset($_POST['signup-submit'])){
    session_start();
    include('../conn.php');
    
    $Email = $mysqli->real_escape_string(trim($_POST['email']));
    $UserName = $mysqli->real_escape_string(trim($_POST['username']));
    $Password1 = $mysqli->real_escape_string(trim($_POST['password1']));
    $Password2 = $mysqli->real_escape_string(trim($_POST['password2']));
    $UserStatus1 = "Applicant";
    $UserStatus2 = "Activated";
    $UserStatus3 = "DeArchived";
    $access = "2";
    
    $fpassword=md5($Password1);
    
    $from = "devpayment@devcommerce.store";
    $to = $Email;
    $subject = "WELCOME TO PESO MALOLOS | APPLICANT | ". $UserName;
    $message = "";
    $headers = "From:" . $from;
    if(mail($to,$subject,$message, $headers)) {
   
    } else {
      
    }
    
    date_default_timezone_set('Asia/Manila');
    $RegisterTimestamp = " ".date('h:i:s a')." at ".date('Y/m/d')." ";
    
    $checkid1 = $mysqli->query("SELECT * FROM users WHERE username='$UserName'");
    $list = $checkid1->fetch_array();
     if(empty($UserName)||empty($Password1)||empty($Password2)||empty($Email)){
        header("Location:../../pages/signup/applicantsignup.php?error=emptyfields&username=".$UserName."&email=".$Email);
        exit();
    }
    elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
         header("Location:../../pages/signup/applicantsignup.php?error=invalidEmail");
        exit();
    }
    elseif($Password1 !== $Password2){
        header("Location:../../pages/signup/applicantsignup.php?error=checkpassword");
        exit();
    }
    
    if($checkid1->num_rows!=0){			
        header("Location:../../pages/signup/applicantsignup.php?error=invalidUsername1");
        exit();
    }
    else{
        $query1 = "INSERT INTO users (username, password, user_status, user_activation, user_archived, date_registered) VALUES ('$UserName', '$Password1','$UserStatus1', '$UserStatus2', '$UserStatus3', '$RegisterTimestamp')";
        
        if($mysqli->query($query1)){
            $u_id = $mysqli->insert_id;
            $add_uid1 = "INSERT INTO applicant_profile (uid, email) VALUES ('$u_id','$Email')";
            $add_uid2 = "INSERT INTO applicant_employment_profile (aid) VALUES ('$u_id')";
            $add_uid3 = "INSERT INTO applicant_education_profile (aid) VALUES ('$u_id')";
            $add_uid4 = "INSERT INTO applicant_preference_profile (aid) VALUES ('$u_id')";
            $add_uid5 = "INSERT INTO user (username, password, uname, access) VALUES ('$UserName','$fpassword', '$Email', '$access')";
                if (!$result = $mysqli->query($add_uid1)) {
                    exit($mysqli->error);
                }
                if (!$result = $mysqli->query($add_uid2)) {
                    exit($mysqli->error);
                }
                if (!$result = $mysqli->query($add_uid3)) {
                    exit($mysqli->error);
                }
                if (!$result = $mysqli->query($add_uid4)) {
                    exit($mysqli->error);
                }
                if (!$result = $mysqli->query($add_uid5)) {
                    exit($mysqli->error);
                }
        }elseif(!$result = $mysqli->query($query1)) {
                    exit($mysqli->error);
                }
        
        $query2="SELECT * FROM users WHERE id = '$u_id'";
        
        if(!$result = $mysqli->query($query2)){
            exit($mysqli->error);
            }
        $row  = $result->fetch_array();

        if(is_array($row)) {
            $_SESSION["access"] = $row['user_status'];
            $_SESSION["activation"] = $row['user_activation'];
            $_SESSION["archived"] = $row['user_archived'];
            $_SESSION["user"] = $row['username'];
            $_SESSION["pass"] = $row['password'];
            $_SESSION["uid"] = $row['id'];    
        }
        
        if(isset($_SESSION["access"])) {
            if($_SESSION["access"]=="Applicant") {
                header("Location:../../pages/signup/applicantsignupprofile.php");
                exit();
            }
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    }
    
    

    
}
?>