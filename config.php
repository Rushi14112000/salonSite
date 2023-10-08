<?php
  $serverName = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'salonSite';

  $conn = mysqli_connect($serverName,$username,$password,$database);

  if(!$conn){
    die("Failed to connect ".mysqli_connect_error());
  }
?>