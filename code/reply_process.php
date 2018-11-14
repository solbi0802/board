<?php
include "db_info.php";
$parent_thread = mysqli_real_escape_string($conn, $_POST['parent_thread']);

$prev_thread = mysqli_real_escape_string($conn, ceil($parent_thread/1000)*1000 - 1000);
$query = "UPDATE $board SET thread = thread -1
          WHERE thread >$prev_thread and thread <$parent_thread
          ORDER BY thread";

$update = mysqli_query($conn, $query);
$pwd = mysqli_real_escape_string($conn, htmlspecialchars($_POST['pwd']));
$writer = mysqli_real_escape_string($conn, htmlspecialchars($_POST['writer']));
$title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
$content = mysqli_real_escape_string($conn, $_POST['content']);
$parent_depth = mysqli_real_escape_string($conn, htmlspecialchars($_POST['parent_depth']));

$query = "INSERT INTO $board (thread, depth, writer, pwd,
                             title,views, wdate, content)
          VALUES(($parent_thread-1),($parent_depth+1),
          '$writer', '$pwd','$title',0, NOW(),'$content')";

$result= mysqli_query($conn, $query);
mysqli_close($conn);
echo ("<meta http-equiv='Refresh' content='3; URL=list.php'>");
?>
<center>
<script> alert("답글 쓰기가 완료되었습니다."); </script>
