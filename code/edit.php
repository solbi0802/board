<html>
<head>
<title>답변형 게시판</title>
<style>
</style>
</head>
<body topmargin=0 leftmargin=0 text=#464646>
<center>
<BR>
<form action=update.php?id=<?=$_GET['id']?> method=post>
<table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#4787c6>
<tr>
    <td height=20 align=center bgcolor=#4787c6>
        <font color=white><B>글 수 정</B></font>
    </td>
</tr>
<?php
  include "db_info.php";
  $id = $_GET['id'];
  $result = mysqli_query($conn, "SELECT * FROM $board WHERE id= $id");
  $row = mysqli_fetch_array($result);
?>
<tr>
    <td bgcolor=white>&nbsp;
<table>
<tr>
    <td width=60 align=left >작성자</td>
    <td align=left >
        <INPUT type=text name=writer size=20 maxlength=10 value=<?=$row['writer']?>>
    </td>
</tr>
<tr></tr>
<tr>
    <td width=70 align=left >비밀번호</td>
    <td align=left >
        <INPUT type=password name=pwd size=8 maxlength=8>
    </td>
</tr>
<tr></tr>
<tr>
    <td width=60 align=left >제 목</td>
    <td align=left >
        <INPUT type=text name=title size=60 maxlength=35 value=<?=$row['title']?>>
    </td>
</tr>
<tr></tr>
<tr>
    <td width=60 align=left >내용</td>
    <td align=left >
        <textarea name=content cols=65 rows=15><?=$row['content']?></textarea>
    </td>
</tr>
<tr>
    <td colspan=10 align=center>
        <INPUT type=submit value="글쓰기">
        &nbsp;&nbsp;
        <INPUT type=reset value="초기화">
        &nbsp;&nbsp;
        <INPUT type=button value="뒤로" onclick="location.href='list.php'">
    </td>
</tr>
</TABLE>
</td>
</tr>
<!-- 입력 부분 끝 -->
</table>
</form>
</center>
</body>
</html>
