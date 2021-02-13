<?php
require_once "DBconnection.php";
session_start();
$data=$_POST;

if(R::count('users',"email =  ? and password = ? and status= ?",array($data['email'],md5($data['password']),'unblock'))>0){
    $_SESSION['email']=$data['email'];
    $_SESSION['password']=md5($data['password']);
    header('Location: http://localhost/dashboard/Lesson4PHP/view.php');
} else {
    echo "No user!";
}