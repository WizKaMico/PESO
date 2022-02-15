<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $mysqli = new mysqli("localhost","root","") or die("Error: ".$mysqli->error);
    $mysqli->select_db("peso_db") or die("Error: ".$mysqli->error);
?>