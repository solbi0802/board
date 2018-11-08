<?php
include "db_info.php";
// 한 페이지에 보여지는 게시물 수
$page_size = 10;

// 페이지 수
$page_list_size = 10;

$no = $_GET[no];
if (!$no || $no < 0)
  $no = 0;

$query = "SELECT * FROM $board ORDER BY thread LIMIT $no, $page_size";
$result = mysqli_query($conn, $query);

// 총 게시물 수
$result_count = mysqli_query($conn, "SELECT count(*) FROM $board");
$result_row = mysqli_fetch_row($result_count);
$total_row = $result_row[0];

// 총 페이지 계산
if ($total_row <= 0)
  $total_row = 0;
$total_page = floor(($total_row - 1) / $page_size);

// 현재 페이지 계산
$current_page = floor($no / $page_size);
?>

<html>
<head>
<title>답변형 게시판</title>
<style>
</style>
</head>
<body topmargin=0 leftmargin=0 text=#464646>
<center>
<BR>
<!-- 게시물 리스트를 보이기 위한 테이블 -->
<table width=800 border=0 cellpadding=2 cellspacing=1 bgcolor=#4787c6>
<!-- 리스트 타이틀 부분 -->
<tr height=40 bgcolor=#4787c6>
    <td width=40 align=center>
        <font color=white>번호</font>
    </td>
    <td width=400 align=center>
        <font color=white>제 목</font>
    </td>
    <td width=80 align=center>
        <font color=white>작성자</font>
    </td>
    <td width=100 align=center>
        <font color=white>작성일</font>
    </td>
    <td width=60 align=center>
        <font color=white>조회수</font>
    </td>
</tr>
<!-- 리스트 타이틀 끝 -->
<!-- 리스트 부분 시작 -->
<?php
  while($row=mysqli_fetch_array($result)) {
?>
<!-- 행 시작 -->
<tr>
    <!-- 번호 -->
    <td height=20 bgcolor=white align=center>
      <a href="read.php?id=<?=$row[id]?>&no=<?=$no?>">
        <?=$row[id]?></a>
    </td>
    <!-- 번호 끝 -->
    <!-- 제목 -->
    <td height=20 bgcolor=white>&nbsp;
        <?php
        if ($row[depth] >0)
            echo "<img height=1 width=" . $row[depth]*7 . ">└";
        ?>
        <a href="read.php?id=<?=$row[id]?>&no=<?=$no?>">
        <?=strip_tags($row[title]);?></a>
    </td>
    <!-- 제목 끝 -->
    <!-- 작성자 -->
    <td align=center height=20 bgcolor=white>
        <font color=black>
          <?=$row[writer]?></a>
        </font>
    </td>
    <!-- 작성자 끝 -->
    <!-- 날짜 -->
    <td align=center height=20 bgcolor=white>
      <font color=black>
        <?=$row[wdate]?>
      </font>
    </td>
    <!-- 날짜 끝 -->
    <!-- 조회수 -->
    <td align=center height=20 bgcolor=white>
      <font color=black><?=$row[views]?></font>
    </td>
<!-- 조회수 끝 -->
</tr>
<!-- 행 끝 -->
<?php
  }
  // 데이터베이스 연결 해제
  mysqli_close($conn);
?>
</table>
<table border=0>
<tr>
    <td width=600 height=20 align=center rowspan=4>
    <font color=gray>
    &nbsp;
<?php

?>
</font>
</td>
</tr>
</table>
<a href=write.php>글쓰기</a>
</center>
</body>
</html>
