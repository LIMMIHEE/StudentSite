<?php

    header("Content-Type:text/html; charset=UTF-8");
    $conn = new mysqli("localhost","root","apmsetup","hebe");
    mysqli_query($conn,'SET NAMES utf8');

    $id= $_GET['User_Id'];
    $email= $_GET['email'];
    $Password= $_GET['Password'];

    $sql="insert into memberjoin(User_id,email,Password) values 
    ('$id','$email','$Password')";

    $res = $conn->query($sql);

?>
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<script>location.href='../Login.html';</script>