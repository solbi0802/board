<html>
<head>
<title>답변형 게시판</title>
<style>
</style>
</head>
<body topmargin=0 leftmargin=0 text=#464646>
<center>
<BR>
<!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
<form action=delete_process.php?id=<?=$_GET[id]?> method=post>
<table width=300 border=0 cellpadding=2 cellspacing=1
bgcolor=#4787c6>
<tr>
<td height=20 align=center bgcolor=#4787c6>
<font color=white><B>비 밀 번 호 확 인</B></font>
</td>
</tr>
<tr>
<td align=center >
<font color=white><B>비밀번호 : </b>
<INPUT type=password name=pwd size=8>
<INPUT type=submit value="확 인">
<INPUT type=button value="취 소" onclick="history.back(-1)">
</td>
</tr>
</table>
