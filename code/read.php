<?php
include "db_info.php";

$no = isset($_GET['no']);
$id = mysqli_real_escape_string($conn, htmlspecialchars($_GET['id']));

// 조회수 증가
$query = "UPDATE $board SET views = views+1 WHERE id=$id";
$result = mysqli_query($conn, $query);

$query = "SELECT * FROM $board WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>답변형 게시판</title>
  </head>
  <style>
    table {
      font-family : 굴림;
      font-size : 12pt;
    }
  </style>
  <body topmargin=0 leftmargin=0 text=#0000>
  <center>
  <BR>
    <table width=800 border=0 cellpadding=2 cellspacing=1 bgcolor=#4787c6>
    <tr>
        <td height=30 colspan=4 align=center bgcolor=#4787c6>
            <font color=white><B><?=strip_tags(htmlspecialchars($row['title']));?>
            </B></font>
        </td>
    </tr>
    <tr>
        <td width=80 height=40 align=center bgcolor=#EEEEEE>작성자</td>
        <td width=240 bgcolor=white><?=$row['writer']?></td>
        <td width=100 height=40 align=center bgcolor=#EEEEEE>
            날&nbsp;&nbsp;&nbsp;짜</td><td width=240 bgcolor=white>
            <?=$row['wdate']?></td>
            <td width=60 height=40 align=center bgcolor=#EEEEEE>조회수</td>
            <td width=250 bgcolor=white><?=$row['views']?></td>
    </tr>
    <tr>
        <td bgcolor=white height=40 colspan=6 style="word-break:break-all;">
            <font color=black>
            <pre><?=strip_tags(htmlspecialchars($row['content']));?></pre>
            </font>
        </td>
    </tr>
    <!-- 기타 버튼 들 -->
    <tr>
        <td colspan=4 bgcolor=#4787c6>
        <table width=100%>
        <tr>
            <td width=280 align=left height=30>
                <a href=list.php?no=<?=$no?>><font color=white>
                [목록보기]</font></a>
                <a href=reply.php?id=<?=$id?>><font color=white>
                [답글달기]</font></a>
                <a href=write.php><font color=white>
                [글쓰기]</font></a>
                <a href=edit.php?id=<?=$id?>><font color=white>
                [수정]</font></a>
                <a href=delete.php?id=<?=$id?>><font color=white>
                [삭제]</font></a>
            </td>
        </tr>
        </table>
        </td>
    </tr>
    </table>
<?
  } // end While
  mysqli_close($conn);
?>
</center>
</body>
</html>
