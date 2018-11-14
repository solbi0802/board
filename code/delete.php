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
    input[type=submit], input[type=reset], input[type=button]{
      background-color: #4787c6;
      width: 80px;
      height: 30px;
      border: 3px;
      color: white;
      border: 1px;
      border-radius: 3px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
    }
  </style>
  <body topmargin=30 leftmargin=0 text=#464646>
  <center>
  <!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
  <form action=delete_process.php?id=<?=htmlspecialchars($_GET['id'])?> method=post>
  <table width=430 border=0 cellpadding=2 cellspacing=1
  bgcolor=#bfc4cc>
  <tr>
  <td height=20 align=center bgcolor=#4787c6>
  <font color=white><B>비 밀 번 호 확 인</B></font>
  </td>
  </tr>
  <tr>
  <td align=center >
  <font color=white><B>비밀번호 : </b>
  <input type=password name=pwd size=10>
  <input type=submit value="확 인">
  <input type=button value="취 소" onclick="history.back(-1)">
  </td>
  </tr>
  </table>
</body>
</html>
