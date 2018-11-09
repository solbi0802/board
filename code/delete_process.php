<?php
include "db_info.php";
$id = $_GET['id'];
$query = "SELECT pwd FROM $board WHERE id= $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

if ($_POST[pwd] == $row[pwd]) {
  $query = "DELETE FROM $board WHERE id= $id";
  $result = mysqli_query($conn, $query);
} else {
  echo ("<script>alert('비밀번호가 틀립니다.');
  history.go(-1);
  </script>");
  exit;
}
?>
<center>
<meta http-equiv='Refresh' content='3; URL=list.php'>
<script> alert("삭제 되었습니다."); </script>
