<?php
$host="localhost";
$user="root";
$pass ="";
$port="";
$DataBase="calendar";


$connexion = mysqli_connect($host,$user,$pass,$DataBase);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>