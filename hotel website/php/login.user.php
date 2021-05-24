<?php

require_once 'config.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sqlFetch = "SELECT username,password FROM users";
$result = mysqli_query($connection,$sqlFetch) or die(mysqli_error($connection));

if(mysqli_num_rows($result)>0){
 while($row = mysqli_fetch_assoc($result)){
     $dbusername = $row['username'];
     $dbpassword = $row['password'];

     if($username == $dbusername && $password == $dbpassword){
        header('location: home.html');
     }else{
         echo 'User does not exist or incorrect user details';
     }
 }
}