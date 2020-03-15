<?php

    header("Content-Type:text/html; charset=UTF-8");
    $conn = new mysqli("localhost","HeBe","hebeqlalfqjsgh","hebe");
    mysqli_query($conn,'SET NAMES utf8');

    $id= $_POST['User_LoginId'];
    $Password= $_POST['LoginPassword'];
    if($id=="" ||  $Password==""){
        echo '<script>alert("아이디나 패스워드를 입력하세요"); location.href="../Login.html";</script> ';
    }else{
         
        $sql = "select * from MemberJoin where User_Id='$id'";
        $member = $sql->fetch_array();
        $hash_pw = $member['LoginPassword'];

        if(password_verify($Password,$hash_pw )){
            $_SESSION['userid'] = $member['User_LoginId'];
            $_SESSION['userpw'] = $member['LoginPassword'];

            echo "<script>alert('로그인되었습니다.'); location.href='../index.html';</script>";
        }else{
            "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); location.href='../Login.html';</script>";
        }
    }


?>