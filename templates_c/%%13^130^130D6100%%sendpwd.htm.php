<?php /* Smarty version 2.6.10, created on 2010-07-23 14:25:24
         compiled from sendpwd.htm */ ?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="title_blue"> 找回密码</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="td_login2"><table border="0" cellspacing="3" cellpadding="0" align="center">
      <form method="post" name="loginin" id="loginin">
        <tr>
          <td class="txt_blue">用户名：
            <input type="text" tabIndex=10 maxLength=20 name="username" class="username" style="width:120" /></td>
        </tr>
        <tr>
          <td class="txt_blue">邮　箱：
		  <input type="text" tabIndex=11 maxlength="20" name="usermail" class="usermail" style="width:120" /></td>
        </tr>
        <tr>
          <td align="center" class="txt_blue">
		    <input type="hidden" name="update" value="update" />
		    <input tabIndex=12 style="background:url(image/edit/smb_btn_bg.gif);width:62;height:22; border:0;cursor: hand;" type="button" name="submit" value="确认" onclick="Userloginon('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=sendpwd','loginin','fshowwindows(\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=sendpwd\',1,\'找回密码\');','');" /></td>
        </tr>
      </form>
    </table></td>
  </tr>
</table>