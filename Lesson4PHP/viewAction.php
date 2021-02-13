<?php
require_once "DBconnection.php";
session_start();

$data=$_POST;
$isUser=false;
foreach ($data as $id){
    $user=R::load('users',$id);
    if($user->status=='unblock'){
        $user->status='block';
        if($user->id==$_SESSION['id']){
            $isUser=true;
        }
    }else{
        $user->status='unblock';
    }
    R::store($user);
}
if($isUser){
    header('Location: http://localhost/dashboard/Lesson4PHP/autorization.php');
}else {
    header('Location: http://localhost/dashboard/Lesson4PHP/view.php');
}
