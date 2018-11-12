<?php
include "db_info.php";
$query = "SELECT * FROM $board WHERE id = $_GET[id]";
$parent_result = mysqli_query($conn, $query);
$parent_row = mysqli_fetch_array($parent_result);
$parent_title = "└".$parent_row[title];
$parent_content = "\n>".str_replace("\n", "\n>", $parent_row[content]);
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
<form action=reply_process.php method=post>
<input type=hidden name=parent_depth value=<?=$parent_row[depth]?>>
<input type=hidden name=parent_thread value=<?=$parent_row[thread]?>>
<table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#4787c6>
<tr>
  <td height=20 align=center bgcolor=#4787c6>
    <font color=white><B>답변 쓰기</B></font>
  </td>
</tr>
<tr>
  <td bgcolor=white>&nbsp;
  <table>
    <tr>
      <td width=60 align=left >작성자</td>
      <td align=left >
          <input type=text name=writer size=20 maxlength=10>
      </td>
    </tr>
    <tr>
      <td width=70 align=left >비밀번호</td>
      <td align=left >
          <input type=password name=pwd size=8 maxlength=8>
      </td>
    </tr>
    <tr></tr>
    <tr>
      <td width=60 align=left>제 목</td>
      <td align=left>
          <input type=text name=title size=60 maxlength=35 value="<?=$parent_title?>">
      </td>
    </tr>
    <tr>
      <td width=60 align=left >내용</td>
      <td align=left >
          <textarea name=content cols=65 rows=15><?=$parent_content?></textarea>
      </td>
    </tr>
    <tr>
      <td colspan=10 align=center>
          <input type=submit value="글쓰기">
          &nbsp;&nbsp;
          <input type=reset value="초기화">
          &nbsp;&nbsp;
          <input type=button value="뒤로" onclick="history.back(-1)">
      </td>
    </tr>
  </table>
  </td>
</tr>
</table>
</center>
</body>
</html>
