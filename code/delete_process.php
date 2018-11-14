<?php
include "db_info.php";

$id = mysqli_real_escape_string($conn, htmlspecialchars($_GET['id']));
$query = "SELECT pwd FROM $board WHERE id= $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

$pwd = $_POST['pwd'];
$hash = $row['pwd'];
// 비밀번호 복호화
if (password_verify($pwd, $hash)) {
  $query = "DELETE FROM $board WHERE id= $id";
  $result = mysqli_query($conn, $query);
  echo "<script>alert('해당 게시물이 삭제 되었습니다.');</script>";
} else {
  echo ("<script>alert('비밀번호가 틀립니다.');
  history.go(-1);
  </script>");
  exit;
  }
?>
<center>
<meta http-equiv='Refresh' content='3; URL=list.php'>
