<?php

require_once 'config.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = md5( $_POST['password']);
$password2 = md5( $_POST['password2']);



if($password == $password2){
    $sqlFetch="SELECT * FROM jarregtb WHERE username='$username'  Limit 1";
    $result=mysqli_query($connection,$sqlfetch);

    if(mysqli_num_rows($result)>0){
        echo 'user already exist';
    }else{
          $sqlInsert="INSERT INTO jarregtb (username,email,password) values('$username','$email','$password')";
          $success=mysqli_query($connection,$sqlInsert)or die(mysqli_error($connection));

        if($success){
               header('location:home.html');
      }else{
    echo 'error';
     }

    }

}else{
        echo 'password did not match';
    }

 
