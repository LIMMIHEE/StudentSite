
<?php
   header("Content-Type:text/html; charset=UTF-8");
   $conn = new mysqli("localhost","HeBe","hebeqlalfqjsgh","hebe");
   mysqli_query($conn,'SET NAMES utf8');
    $sql ="select User_Log from MemberJoin where User_Log='1'";
    if($sql==1){
        echo "<script>alert('되냐?.'); </script>";
        echo "<script>document.getElementById('Login_Logout').innerText='로그아웃';</script>";
        echo "<script>document.getElementById('Login_Logout').onclick=Logout();</script>";
    }

    function  Logout(){
        session_start();
        session_destroy();
    }
?>
<meta http-equiv="refresh" content="0;url=../index.html" />