<?php
include "db_info.php";

//thread 값 구하기
$thread = "SELECT max(thread) FROM $board";
$max_thread_result = mysqli_query($conn, $thread);
$max_thread_fetch = mysqli_fetch_row($max_thread_result);
$max_thread = ceil($max_thread_fetch[0]/1000)*1000+1000;

// 폼에 입력된 값
$writer = mysqli_real_escape_string($conn, htmlspecialchars($_POST['writer']));
$pwd    = mysqli_real_escape_string($conn, htmlspecialchars($_POST['pwd']));
$title  = mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
$content = mysqli_real_escape_string($conn, htmlspecialchars($_POST['content']));

// 비밀번호 암호화 처리
$hash = password_hash($pwd, PASSWORD_DEFAULT);

// 데이터 삽입
$query = "INSERT INTO $board (thread, depth, writer, pwd, title, views, wdate, content )
          VALUES($max_thread, 0, '$writer', '$hash',
          '$title', 0, NOW(), '$content')";

$result = mysqli_query($conn, $query);
if($result == 1) {
  echo "<script>alert('게시물이 등록되었습니다.'); </script>";
} else {
  echo "<script>alert('게시물 등록을 실패했습니다.'); </script>";
  }

// 데이터베이스 연결 해제
mysqli_close($conn);
?>
<meta http-equiv='refresh' content="1; URL=list.php"/>
