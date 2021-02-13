<?php
require_once "DBconnection.php";

$data=$_POST;



if(R::count('users',"login=  ? OR email = ?",array($data['login'],$data['email']>0))){
    echo "Have user!";
} else {
    $user = R::dispense('users');
    $user->login = $data['login'];
    $user->email = $data['email'];
    $user->password = md5($data['password']);
    $user->registrasionData=date('l jS \of F Y h:i:s A');
    $user->lastEnter=null;
    $user->status="unblock";
    R::store($user);
    header('Location: http://localhost/dashboard/Lesson4PHP/autorization.php');

}