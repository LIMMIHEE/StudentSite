<?php
   header("Content-Type:text/html; charset=UTF-8");
   session_start();
   $id = $_SESSION['userid'];

   $conn=new mysqli('localhost', 'root', 'apmsetup', 'hebe');
   mysqli_query($conn,'SET NAMES utf8');
   if($conn->connect_error) {
       print $conn->connect_error;
   }
   else {
         print "DB";
   }

   // 권한(로그인되있는 사람)
   $sql ="select User_Log from memberjoin where User_id='$id'";
   $result = mysqli_query($conn, $sql);
   $member = mysqli_fetch_array($result);

   if($member['User_Log']==1) {
      print "if";
      $Carteory = $_POST['Carteory'];
      $Title = $_POST['title'];
      $Content = $_POST['content'];
      $date = date('Y-m-d H:i:s');
      $Tag = $_POST['tag'];

      $sql2 = "insert into curious_post(id, carteory, title, content, date, tag) values ('$id', '$Carteory', '$Title', '$Content', '$date', '$Tag')"; 

      $result = mysqli_query($conn, $sql2);

      if($result) { //query가 정상실행 되었다면,
         $msg = "정상적으로 글이 등록되었습니다.";
      }
      else {
         $msg = "글을 등록하지 못했습니다.";
      }
   }
   else {
         print "else";
   }
?>
<script type="text/javascript">alert($msg);</script>
<script>location.href='../Login.html';</script>