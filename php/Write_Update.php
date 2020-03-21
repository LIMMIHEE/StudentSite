<meta charset="utf-8">
<?PHP
   $conn=new mysqli('localhost', 'root', 'apmsetup', 'hebe');
   if($conn->connect_error) {
       print $conn->connect_error;
   }

   $User = "'select User_Id from memberjoin where User_Log=1";
   $Carteory = $_Post['Carteory'];
   $Title = $_POST['Title'];
   $Content = $_POST['Content'];
   $date = date('Y-m-d H:i:s');
   $Tag = $_POST['Tag'];
   
   $sql = "insert into Curious_Post(id, title, content, date, tag) values ('$User', '$Title', '$Content', '$date', '$Tag')"; 

   $result = $db->query($sql);

   if($result) { //query가 정상실행 되었다면,
         $msg = "정상적으로 글이 등록되었습니다.";
         //$bNo = $db->insert_id;
         //$replaceURL = 'view.php?bno=' . $bNo;
   }
   else {
         $msg = "글을 등록하지 못했습니다.";
?>
   <script>
       alert("<?php print $msg?>");
   </script>
<?php
      }
?>
<script>
       alert("<?php echo $msg?>");
       location.replace("<?php echo $replaceURL?>");
</script>