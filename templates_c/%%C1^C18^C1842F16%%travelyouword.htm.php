<?php /* Smarty version 2.6.10, created on 2009-12-14 12:31:50
         compiled from travelyouword.htm */ ?>
<?php $_from = $this->_tpl_vars['sql_hotelword']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelword']):
?>
<div id="xspace-itemreply">
  <dl id="xspace-comment17">
    <dt> <img src="image/water/none.gif"class="xspace-signavatar xspace-imgstyle" /> <a href="javascript:;" class="xspace-quote" onClick="fshowwindows('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=travelword&type=postyou&id=<?php echo $this->_tpl_vars['hotelword']['word_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelword']['word_id']; ?>
&Keyword=<?php echo $this->_tpl_vars['hotelword']['word_tid']; ?>
',1,'�ظ�����');">�ظ�</a> <a href="javascript:;" onClick="_confirm_msg_show('ȷ��ɾ������', 'Userloginon(\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=travelword&type=delyou&id=<?php echo $this->_tpl_vars['hotelword']['word_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelword']['word_id']; ?>
&Keyword=<?php echo $this->_tpl_vars['hotelword']['word_tid']; ?>
\',\'\',\'getNews(\\\'showthreadword\\\',\\\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=showyouword&id=<?php echo $this->_tpl_vars['hotelword']['word_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelword']['word_tid']; ?>
\\\');\',\'getNews(\\\'showthreadword\\\',\\\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=showyouword&id=<?php echo $this->_tpl_vars['hotelword']['word_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelword']['word_tid']; ?>
\\\');\');', '', '');" class="xspace-del">ɾ��</a> <?php echo $this->_tpl_vars['hotelword']['word_username']; ?>
 <span class="xspace-smalltxt">������<?php echo $this->_tpl_vars['hotelword']['word_date']; ?>
&nbsp;&nbsp; IP: <?php echo $this->_tpl_vars['hotelword']['word_ip']; ?>
</span> </dt>
    <dd><?php echo $this->_tpl_vars['hotelword']['word_content'];  if ($this->_tpl_vars['hotelword']['word_post'] != ''): ?>
      <div class="xspace-guestbookreply">
        <p><?php echo $this->_tpl_vars['hotelword']['word_redate']; ?>
</p>
        <?php echo $this->_tpl_vars['hotelword']['word_post']; ?>
</div>
      <?php endif; ?></dd>
  </dl>
</div>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['fpageup']): ?>
<div class="left_links" style="width:100%"><?php echo $this->_tpl_vars['fpageup']; ?>
</div>
<?php endif; ?>