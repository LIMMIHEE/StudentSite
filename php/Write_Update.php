<?php
   header("Content-Type:text/html; charset=UTF-8");
   session_start();
   $id = $_SESSION['userid'];

   $conn = new mysqli("localhost","root","apmsetup","hebe");
   mysqli_query($conn,'SET NAMES utf8');
   if($conn->connect_error) {
       print $conn->connect_error;
   }
   // else {
   //       print "DB";
   // }

   if(!isset($_GET["location"])) {
      echo "Invalid value input";
      exit();
   }
   
   $db_location = $_GET["location"];

   print $db_location;
   if($db_location == "gather_post") {
      $web_location = "Gather.html";
   } else if($db_location == "sell_post") {
      $web_location = "Sell.html";
   } else if($db_location == findlt_post) {
      $web_location = "FindIt.html";
   } else {
      $web_location = "Curious.html";
   }
   // if(strcmp($db_location, "gather_post")) {
   //    print "모야요";
   //    $web_location = "Gather.html";
   // } else if(strcmp($db_location, "sell_post")) {
   //    print "팔아요";
   //    $web_location = "Sell.html";
   // } else if(strcmp($db_location, "findlt_post")) {
   //    print "찾아요";
   //    $web_location = "Findlt.html";
   // } else {
   //    print "궁금해요";
   //    $web_location = "Curious.html";
   // }

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

      if(file_exists($_FILES['profile'])) {
         print "file";
         // $imagecheck = array('jpg', 'jpeg', 'gif', 'png', 'bmp');
         $imgpath = pathinfo($_FILES['profile']['name']);

         $file_name = $_FILES['profile']['name'];                // 업로드한 파일명
         $file_tmp_name = $_FILES['profile']['tmp_name'];   // 임시 디렉토리에 저장된 파일명
         $file_size = $_FILES['profile']['size'];                 // 업로드한 파일의 크기
         $mimeType = $_FILES['profile']['type'];                 // 업로드한 파일의 MIME Type

         // 첨부 파일이 저장될 서버 디렉토리 지정
         $save_dir = '../uploadFile/';

         // 업로드 파일 확장자 검사
         // if(in_array($mimeType, $imagecheck)) {
         //       echo("<script> alert('업로드를 할 수 없는 파일형식입니다.'); </script>");  
         //       echo("<script>location.href='../Write.html';</script>");
		   //       exit;
         // } 

         // 파일명 변경
   	   $real_name = $file_name;     // 원래 파일명(업로드 하기 전 실제 파일명) 
	      $arr = explode(".", $real_name);	 // 원래 파일의 확장자명을 가져와서 그대로 적용 $file_exe	
   	   $file_exe = $mimeType;
         $arr1 = $arr[0];	
         $arr2 = $arr[1];	
         $arr3 = $arr[2];
         $arr4 = $arr[3];	
         if($arr4) {
            $file_exe = $arr4;
         } else if($arr3 && !$arr4) { 
            $file_exe = $arr3;					
         } else if($arr2 && !$arr3) {
            $file_exe = $arr2;					
         }
      
   	   $file_time = time(); 
      	$file_Name = "file_".$file_time.".".$file_exe;	 // 실제 업로드 될 파일명 생성
      	$change_file_name = $file_Name;			 // 변경된 파일명을 변수에 지정 
      	$real_name = addslashes($real_name);		// 업로드 되는 원래 파일명(업로드 하기 전 실제 파일명) 
      	$real_size = $file_size;                         // 업로드 되는 파일 크기

         //파일을 저장할 디렉토리 및 파일명 전체 경로
         $dest_url = $save_dir . $change_file_name;

         //파일을 지정한 디렉토리에 업로드
         if(!move_uploaded_file($file_tmp_name, $dest_url))  {
            die("파일을 지정한 디렉토리에 업로드하는데 실패했습니다.");
         }
      }
      else {
         print "else";
      }

      $sql2 = "insert into " . $db_location . "(id, carteory, title, content, date, tag, change_file_name, real_name, real_size) values 
      ('$id', '$Carteory', '$Title', '$Content', '$date', '$Tag', '$change_file_name', '$real_name', '$real_size')"; 

      $result = mysqli_query($conn, $sql2);

      if($result) { //query가 정상실행 되었다면,
         echo("<script> alert('정상적으로 글이 등록되었습니다.'); location.href='../$web_location';</script>");
      }
      else {
         echo("<script> alert('글을 등록하지 못했습니다.'); location.href='../Write.html?location=$db_location';</script>");
      }
   }
   else {
      print "else";
   }
?>