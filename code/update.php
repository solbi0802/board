<?php
include "db_info.php";
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT pwd FROM $board WHERE id = $id");
$row = mysqli_fetch_array($result);
$pwd = $_POST['pwd'];
$writer = $_POST['writer'];
$title = $_POST['title'];
$content = $_POST['content'];

if ($_POST['pwd'] == $row['pwd']) {
  $query = "UPDATE $board SET writer = '$writer',title= '$title', content= '$content'
  WHERE id = $id";
  $result = mysqli_query($conn, $query);
} else {
  echo ("<script>alert('비밀번호가 틀립니다.');
  history.go(-1);
  </script>");
  exit;
}
  mysqli_close($conn);
  echo ("<meta http-equiv='Refresh' content='3; URL=read.php?id=$_GET[id]'>");
  ?>
<center>
<script> alert("수정이 완료되었습니다."); </script>
