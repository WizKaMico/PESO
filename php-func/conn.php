<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $mysqli = new mysqli("sql217.main-hosting.eu","u729926683_pesodb","@Light101213") or die("Error: ".$mysqli->error);
    $mysqli->select_db("u729926683_pesodb") or die("Error: ".$mysqli->error);
?>