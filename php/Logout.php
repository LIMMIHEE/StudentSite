<?php
    header("Content-Type:text/html; charset=UTF-8");
    session_start();
    $id = $_SESSION['userid'];
    $conn = new mysqli("localhost","HeBe","hebeqlalfqjsgh","hebe");
    mysqli_query($conn,'SET NAMES utf8');

    $sql ="select User_Log from MemberJoin where User_Id='$id'";
    $result = mysqli_query($conn, $sql);
    $member = mysqli_fetch_array($result);

    if($member['User_Log']==1) {
        echo "1";
    }else{
        echo "2";
    }
   
?>

