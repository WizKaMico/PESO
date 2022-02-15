<?php
error_reporting(E_ALL ^ E_DEPRECATED);
if(count($_POST)>0){
session_start();
include("../conn.php"); 
    
    $Username = $mysqli->real_escape_string(trim($_POST["username"]));
    $Password = $mysqli->real_escape_string(trim($_POST["password1"]));
    $Status = 'Activated';
    $query = "
              SELECT * 
              FROM users 
              WHERE username='$Username' 
              AND password = '$Password'
              AND user_activation = '$Status'
             ";
        
        if(!$result = $mysqli->query($query)){
            exit($mysqli->error);
            }
    
    $row  = $result->fetch_array();

    if(is_array($row)) {
        $_SESSION["access"] = $row['user_status'];
        $_SESSION["activation"] = $row['user_activation'];
        $_SESSION["user"] = $row['username'];
        $_SESSION["pass"] = $row['password'];
        $_SESSION["uid"] = $row['id'];    
    }else{
        header("Location: ../../pages/login/employerlogin.php?error=invalidaccess");
    }
}

if(isset($_SESSION["access"])) {

    if($_SESSION["access"]=="Admin") {
        header("Location:../../pages/admin/index.php");
    }
    else if($_SESSION["access"]=="Co-Admin") {
        header("Location:../pages/admin/index.php");
    }
    else if($_SESSION["access"]=="Employer") {
        header("Location:../../pages/employer/index.php");
    }
    else if($_SESSION["access"]=="Applicant") {
        header("Location:../../pages/employer/erroraccess.php");
    }
}
?>
