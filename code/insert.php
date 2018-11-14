<?php
include "db_info.php";

//thread 값 구하기
$thread = "SELECT max(thread) FROM $board";
$max_thread_result = mysqli_query($conn, $thread);
$max_thread_fetch = mysqli_fetch_row($max_thread_result);
$max_thread = ceil($max_thread_fetch[0]/1000)*1000+1000;

// 폼에 입력된 값
$writer = mysqli_real_escape_string($conn, $_POST['writer']);
$pwd    = mysqli_real_escape_string($conn, $_POST['pwd']);
$title  = mysqli_real_escape_string($conn, $_POST['title']);
$content = mysqli_real_escape_string($conn, $_POST['content']);

// 데이터 삽입
$query = "INSERT INTO $board (thread, depth, writer, pwd, title, views, wdate, content )
          VALUES($max_thread, 0, '$writer', '$pwd',
          '$title', 0, NOW(), '$content')";

$result = mysqli_query($conn, $query);

// 데이터베이스 연결 해제
mysqli_close($conn);
?>
<script type="text/javascript"> alert("글쓰기 완료되었습니다."); </script>
<meta http-equiv='refresh' content="1; URL=list.php"/>
