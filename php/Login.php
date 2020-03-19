<?php
    session_start();
    header("Content-Type:text/html; charset=UTF-8");
    $conn = new mysqli("localhost","HeBe","hebeqlalfqjsgh","hebe");
    mysqli_query($conn,'SET NAMES utf8');

    $id= $_GET['User_Id'];
    $Password= $_GET['Password'];
    

    if($id==""||  $Password=="" ){
        echo '<script>alert("아이디나 패스워드를 입력하세요"); location.href="../Login.html";</script> ';
    }else{
         
        $sql = "select * from MemberJoin where User_Id='$id'";
        $result = mysqli_query($conn, $sql);
        $member = mysqli_fetch_array($result);
        $hash_pw = $member ['Password'];

        //$result = $sql->fetch_array();

        if($Password==$hash_pw){
            $_SESSION['userid'] = $member['User_id'];
            $_SESSION['userpw'] = $member['Password'];
            
            echo "<script>alert('로그인되었습니다.'); location.href='../index.html';</script>";
           $Login=true;
           $sql ="UPDATE MemberJoin set User_Log=1 where User_Id='$id'";
           $res = $conn->query($sql);
        }else{
            echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); location.href='../Login.html';</script>";
            
        }
    }


?>