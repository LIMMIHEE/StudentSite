<?php
    header("Content-Type:text/html; charset=UTF-8");
    session_start();
    $conn = new mysqli("localhost","HeBe","hebeqlalfqjsgh","hebe");
    mysqli_query($conn,'SET NAMES utf8');

    $id = $_SESSION['userid'];
    $sql ="UPDATE MemberJoin set User_Log=0 where User_Id='$id'";
    $res = $conn->query($sql);
    

    
?>