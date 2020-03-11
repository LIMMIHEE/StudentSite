<meta charset="utf-8">
<?PHP
   $conn=new mysqli('localhost', 'root', '"db');
   if($conn->connect_error) {
       print $conn->connect_error;
   }
   else {
       print "dmdkdkdkdk";
   }

   $bID = $_POST['bID'];
   $bPassword = $_POST['bPassword'];
   $bTitle = $_POST['bTitle'];
   $bContent = $_POST['bContent'];

   $date = date('Y-m-d H:i:s');
   $sql = 'insert into board_free(b_no, b_title, b_content, b_date, b_hit, b_id, b_password) values(null, "' . $bTitle . '", "' . $bContent . '", "' .$date . '", 0, "' . $bID . '", "' . $bPassword . '")'; 
//, password("' . $bPassword . '"))';

   $result = $db->query($sql);

   if($result) { //query가 정상실행 되었다면,
         $msg = "정상적으로 글이 등록되었습니다.";
         $bNo = $db->insert_id;
         $replaceURL = 'view.php?bno=' . $bNo;
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