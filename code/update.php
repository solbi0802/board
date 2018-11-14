<?php
include "db_info.php";

$id =  mysqli_real_escape_string($conn, htmlspecialchars($_GET['id']));
$result = mysqli_query($conn, "SELECT pwd FROM $board WHERE id = $id");
$row = mysqli_fetch_array($result);
$pwd =  mysqli_real_escape_string($conn, htmlspecialchars($_POST['pwd']));
$writer =  mysqli_real_escape_string($conn, htmlspecialchars($_POST['writer']));
$title =  mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
$content =  mysqli_real_escape_string($conn, htmlspecialchars($_POST['content']));

if ($pwd == $row['pwd']) {
  $query = "UPDATE $board SET writer = '$writer',title= '$title', content= '$content'
  WHERE id = $id";
  $result = mysqli_query($conn, $query);
  echo "<script> alert('게시물이 수정되었습니다.'); </script>";
} else {
  echo ("<script>alert('비밀번호가 틀립니다.');
  history.go(-1);
  </script>");
  exit;
}
  mysqli_close($conn);
  echo ("<meta http-equiv='Refresh' content='3; URL=read.php?id=$_GET[id]'>");
  ?>
