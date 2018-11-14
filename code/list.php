<?php
include "db_info.php";

// 한 페이지에 보여지는 게시물 수
$page_size = 10;
// 페이지 수
$page_list_size = 10;

$no = isset($_GET['no']) ? mysqli_real_escape_string($conn, $_GET['no']) : 0;
$search_word = isset($_GET['search_word']) ? mysqli_real_escape_string($conn, $_GET['search_word']) : '';
$field = isset($_GET['field']) ? mysqli_real_escape_string($conn, $_GET['field']) : '';

if ($search_word) {
    $search = " where $field like '%" . $search_word . "%' ";
} else {
  $search = "";
}

$query = "SELECT * FROM $board".$search." ORDER BY thread DESC LIMIT $no, $page_size";
$result =  mysqli_query($conn, $query);

// 총 게시물 수
$result_count = mysqli_query($conn, "SELECT count(*) FROM $board ".$search);
$result_row = mysqli_fetch_row($result_count);
$total_row = $result_row[0];

// 총 페이지 계산
if ($total_row <= 0) {
    $total_row = 0;
}

$total_page = floor(($total_row - 1) / $page_size);

// 현재 페이지 계산
$current_page = floor($no / $page_size);
?>

<html>
<head>
<title>답변형 게시판</title>
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
      <a href=read.php?id=<?=$row['id']?>&no=<?=$no?>&field=<?=$field?>&search_word=<?=$search_word?>>
        <?=$row['id']?></a>
    </td>
    <!-- 번호 끝 -->
    <!-- 제목 -->
    <td height=20 bgcolor=white>&nbsp;
        <?php
        if ($row['depth'] >0)
            echo "<img height=1 width=" . $row['depth']*7 . ">└";
        ?>
        <a href=read.php?id=<?=$row['id']?>&no=<?=$no?>&field=<?=$field?>&search_word=<?=$search_word?>>
        <?=strip_tags($row['title']);?></a>
    </td>
    <!-- 제목 끝 -->
    <!-- 작성자 -->
    <td align=center height=20 bgcolor=white>
        <font color=black>
          <?=$row['writer']?></a>
        </font>
    </td>
    <!-- 작성자 끝 -->
    <!-- 날짜 -->
    <td align=center height=20 bgcolor=white>
      <font color=black>
        <?=$row['wdate']?>
      </font>
    </td>
    <!-- 날짜 끝 -->
    <!-- 조회수 -->
    <td align=center height=20 bgcolor=white>
      <font color=black><?=$row['views']?></font>
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
// 페이징 처리
$start_page = (int)($current_page / $page_list_size) * $page_list_size;
$end_page = $start_page + $page_list_size - 1;

if ($total_page < $end_page) $end_page = $total_page;

if ($start_page >= $page_list_size) {
$prev_list = ($start_page - 1)* $page_size;
echo "<a href=\"?no=$prev_list&field=$field&search_word=$search_word\">◀</a>\n";
}

for ($i=$start_page;$i <= $end_page;$i++) {
  $page=$page_size*$i;
  $page_num = $i+1;

  if ($no != $page){ //현재 페이지가 아닐 경우만 링크를 표시
    echo "<a href=\"?no=$page&field=$field&search_word=$search_word\">";
  }

  echo " $page_num ";

  if ($no!=$page){
    echo "</a>";
  }
}

if($total_page > $end_page) {
$next_list = ($end_page + 1)* $page_size;
echo "<a href=?no=$next_list&field=$field&search_word=$search_word>▶</a><p>";
}
?>
</font>
</td>
</tr>
</table>
<br>
<a href=write.php>글쓰기</a>
<br>
<form name= search action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<select name=field>
<option value=title>제 목</option>
<option value=content>내 용</option>
<option value=writer>작 성 자</option>
</select><input type=text name=search_word size=30><input type=submit value="검색">
</center>
</body>
</html>
