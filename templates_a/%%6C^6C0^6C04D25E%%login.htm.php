<?php /* Smarty version 2.6.10, created on 2010-01-07 17:48:22
         compiled from login.htm */ ?>
<HTML>
<HEAD>
<Base href="<?php echo $this->_tpl_vars['boardurl']; ?>
">
<TITLE><?php echo $this->_tpl_vars['config']['title']; ?>
 - <?php echo $this->_tpl_vars['configwebname']; ?>
</TITLE>
<meta name=robots content='index,follow'>
<Meta http-equiv="Widow-target" Content="_top">
<meta name=keywords content='<?php echo $this->_tpl_vars['config']['keywords']; ?>
'>
<meta name=description content='<?php echo $this->_tpl_vars['config']['description']; ?>
'>
<META http-equiv=Content-Type content="text/html; charset=<?php echo $this->_tpl_vars['charset']; ?>
">
<LINK href="lang/admin.css" type=text/css rel=stylesheet>
<script>var hostpath = '<?php echo $this->_tpl_vars['boardurl']; ?>
';</script>
<SCRIPT language=JavaScript src='lang/ajax.js'></SCRIPT>
<SCRIPT language=JavaScript src='lang/js.js'></SCRIPT>
</head>
<body class=head_2 topmargin=5 leftmargin=5>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form method="post" name="login">
  <table width=50% cellpadding=1 cellspacing=1 align=center class=i_table>
    <tr>
      <td valign=middle align=center class=b><br>
        <br>
        <b>请输入您的管理员用户名和密码</b> <br>
        <br>
        <table width=350 align=center cellspacing=1 cellpadding=0 class=i_table>
          <tr>
            <td><table width=100%  cellspacing=0 cellpadding=3>
                <tr bgcolor='#ffffff'>
                  <td valign=middle width=40% align=right> 请输入管理员ID </td>
                  <td valign=middle><input type=text size=20 name="admin_name" onKeyDown="if(event.keyCode==13) Userloginon('admin.php?action=login&option=login','login','document.getElementById(\'admin_pwd\').value=\'\';gdcodeiframe.location.reload();document.getElementById(\'lg_num\').value=\'\';','');">
                  </td>
                </tr>
                <tr bgcolor='#ffffff'>
                  <td valign=middle width=40% align=right> 请输入管理员密码 </td>
                  <td valign=middle><input type=password size=20 name="admin_pwd" onKeyDown="if(event.keyCode==13) Userloginon('admin.php?action=login&option=login','login','document.getElementById(\'admin_pwd\').value=\'\';gdcodeiframe.location.reload();document.getElementById(\'lg_num\').value=\'\';','');">
                  </td>
                </tr>
                <tr bgcolor='#ffffff'>
                  <td valign=middle width=40% align=right> 请输入右边的认证码 </td>
                  <td valign=middle><input name="lg_num" type='text' size="8" maxlength="4" onKeyDown="if(event.keyCode==13) Userloginon('admin.php?action=login&option=login','login','document.getElementById(\'admin_pwd\').value=\'\';gdcodeiframe.location.reload();document.getElementById(\'lg_num\').value=\'\';','');"> <iframe id=gdcodeiframe src=update.php?action=authimg width="50" height="20" marginheight="0" marginwidth="0" scrolling="no"></iframe> </td>
                </tr>
              </table></td>
          </tr>
        </table>
        <br>
        <input type="button" name="Submit" value="登 录" onClick="Userloginon('admin.php?action=login&option=login','login','document.getElementById(\'admin_pwd\').value=\'\';gdcodeiframe.location.reload();document.getElementById(\'lg_num\').value=\'\';','');">
        <script language="JavaScript">document.login.admin_name.focus();</script>
        <br><br><?php echo $this->_tpl_vars['POPlv']; ?>
<br><br>
      </td>
    </tr>
  </table>
</form>
<div id="showwindow"></div>
</body>
</html>