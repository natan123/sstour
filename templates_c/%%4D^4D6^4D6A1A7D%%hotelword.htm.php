<?php /* Smarty version 2.6.10, created on 2009-12-13 09:15:24
         compiled from hotelword.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip', 'hotelword.htm', 71, false),array('modifier', 'strip_tags', 'hotelword.htm', 71, false),)), $this); ?>
<HTML>
<HEAD>
<Base href="<?php echo $this->_tpl_vars['boardurl']; ?>
">
<TITLE><?php echo $this->_tpl_vars['config']['title']; ?>
_<?php echo $this->_tpl_vars['configwebname']; ?>
</TITLE>
<meta name=robots content='index,follow'>
<Meta http-equiv="Widow-target" Content="_top">
<meta name=keywords content='<?php echo $this->_tpl_vars['config']['keywords']; ?>
'>
<meta name=description content='<?php echo $this->_tpl_vars['config']['description']; ?>
'>
<META http-equiv=Content-Type content="text/html; charset=<?php echo $this->_tpl_vars['charset']; ?>
">
<LINK href="<?php echo $this->_tpl_vars['boardurl']; ?>
lang/style.css" type=text/css rel=stylesheet>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['boardurl']; ?>
image/lvyou/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['boardurl']; ?>
image/lvyou/space.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['boardurl']; ?>
image/lvyou/hotel.css" />

<script>var hostpath = '<?php echo $this->_tpl_vars['boardurl']; ?>
';</script>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/ajax.js'></SCRIPT>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/js.js'></SCRIPT>
<script>
var myimages=new Array();
function preloadimages()
{
	for (i=0;i<preloadimages.arguments.length;i++)
	{
		myimages[i]=new Image();
		myimages[i].src=preloadimages.arguments[i];
	}
}
preloadimages("<?php echo $this->_tpl_vars['boardurl']; ?>
image/face/dialogClose0.gif","<?php echo $this->_tpl_vars['boardurl']; ?>
image/face/dialogCloseF.gif","<?php echo $this->_tpl_vars['boardurl']; ?>
image/msg/closed.gif");
</script>
</HEAD>
<body>
<div id="wrap">
  <div id="header">
    <div id="spacename">
      <div id="xspace-spacename"> <strong><?php echo $this->_tpl_vars['sql_hotel']['hot_subject']; ?>
</strong>
        <p> <a href="javascript:;" class="xspace-copyurl" onClick="javascript:setCopy('<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
');" title="复制地址">copy</a> <a href="<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
" title="加入收藏" class="xspace-add2fav" onClick="javascript:addBookmark('<?php echo $this->_tpl_vars['sql_hotel']['hot_subject']; ?>
','<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
');return false;">Bookmark</a>
        <div class="start">
          <ul>
            <li><a id=start1 class=seldea title="一星级"> </a></li>
            <li><a id=start2 title="二星级"> </a></li>
            <li><a id=start3 title="三星级"> </a></li>
            <li><a id=start4 title="四星级"> </a></li>
            <li><a id=start5 title="五星级"> </a></li>
            <li><a id=start6 title="超五星级"> </a></li>
          </ul>
          <script>rateHover(<?php echo $this->_tpl_vars['sql_hotel']['hot_start']; ?>
,6,'start')</script>
        </div>
        </p>
      </div>
    </div>
    <div id="menu">
      <ul id="xspace-menu">
        <li class="xspace-active"><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
"><?php echo $this->_tpl_vars['configwebname']; ?>
</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
">首页</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelarticle&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
">资讯</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelyou&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
 ">游记</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelroom&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
">房间</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelphoto&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
">相册</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelword&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
">留言</a></li>
      </ul>
    </div>
  </div>
  <div id="content" class="xspace-layout1">
    <div id="mainarea" class="mainarea-side">
      <div id="xspace-guide"> 您的位置: <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
"><?php echo $this->_tpl_vars['configwebname']; ?>
</a> &raquo; <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
"><?php echo $this->_tpl_vars['sql_hotel']['hot_subject']; ?>
</a> &raquo; <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelword&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
">留言</a></div>
      <div id="show">
	    <?php $_from = $this->_tpl_vars['sql_hotelword']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelword']):
?>
        <div id="xspace-itemreply">
          <dl id="xspace-comment17">
            <dt> <img src="image/water/none.gif"class="xspace-signavatar xspace-imgstyle" /> <a href="javascript:;" class="xspace-quote" onClick="fshowwindows('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=hotelword&type=post&id=<?php echo $this->_tpl_vars['hotelword']['word_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelword']['word_id']; ?>
',1,'回复留言');">回复</a> <a href="javascript:;" onClick="_confirm_msg_show('确定删除留言', 'Userloginon(\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=hotelword&type=del&id=<?php echo $this->_tpl_vars['hotelword']['word_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelword']['word_id']; ?>
\',\'\',\'\',\'\');', '', '');" class="xspace-del">删除</a> <?php echo $this->_tpl_vars['hotelword']['word_username']; ?>
 <span class="xspace-smalltxt">留言于<?php echo $this->_tpl_vars['hotelword']['word_date']; ?>
&nbsp;&nbsp; IP: <?php echo $this->_tpl_vars['hotelword']['word_ip']; ?>
</span> </dt>
            <dd><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['hotelword']['word_content'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp));  if ($this->_tpl_vars['hotelword']['word_post'] != ''): ?><div class="xspace-guestbookreply"><p><?php echo $this->_tpl_vars['hotelword']['word_redate']; ?>
</p><?php echo $this->_tpl_vars['hotelword']['word_post']; ?>
</div><?php endif; ?></dd>
          </dl>
        </div>
		<?php endforeach; endif; unset($_from); ?>
		<?php if ($this->_tpl_vars['fpageup']): ?><div class="left_links" style="width:100%"><?php echo $this->_tpl_vars['fpageup']; ?>
</div><?php endif; ?>
        <div id="xspace-itemform">
		<fieldset>
          <form id="commentform" name="commentform" method="post">            
            <legend>给 <?php echo $this->_tpl_vars['sql_hotel']['hot_subject']; ?>
 留言</legend>
            <p>
              <label for="xspace-commentmsg">内容</label>
              <textarea name="message" style="width:280px;height:8em;vertical-align:text-top;" id="message"></textarea>
            </p>
            <p>
              <label for="xspace-nickname">昵称</label>
              <input type="text" size="20" id="nickname" name="nickname" value="<?php echo $this->_tpl_vars['uname']; ?>
" /></p>
            <p class="xspace-seccodeline">
              <label for="xspace-seccode">验证</label>
			  <input type='text' maxLength=4 tabIndex=14 name='gdcode' style="ime-mode:disabled" size=10>
              <label for="xspace-seccode"><iframe id=gdcodeiframe src="<?php echo $this->_tpl_vars['boardurl']; ?>
update.php?action=authimg" width="50" height="20" marginheight="0" marginwidth="0" scrolling="no"></iframe></label>
            </p>
            <p><input type="hidden" name="hid" value="<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
" />
			  <input type=button tabIndex=15 name=submit id=submit value='发表留言' onClick="saveUserlogin('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=word&option=hotelword','commentform','','');">
            </p>            
          </form>
		  </fieldset>
        </div>
      </div>
    </div>
    <div id="sideleft" class="sidearea">
      <div class="xspace-sideblock">
        <div id="xspace-avatar"></div>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">用户菜单</h3>
        <ul id="xspace-action">
          <script src="<?php echo $this->_tpl_vars['boardurl']; ?>
spaces.php?action=showhotel&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
"></script>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">标题搜索</h3>
        <div style="padding:10px 10px 10px 10px">
          <input type="text" id="searchkey" name="searchkey" style="height:24px;" value="" /><input type="button"  style="background-image:url(image/admin/search_go.gif);height:24px;width:24px;cursor:hand;" onClick="fScreening('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
&Keyword='+escape($('searchkey').value))" name="submit" id="submit" value="" />
		</div>
        <p id=showhottage></p>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">推荐房间</h3>
        <ul class="xspace-list" id=showhotroom>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">推荐图片</h3>
        <ul class="xspace-list" id=showhotphoto>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">酒店介绍</h3>
        <p id=showhotinfo></p>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">酒店交通</h3>
        <p id=showhottraffic></p>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">数据统计</h3>
        <ul class="xspace-list" id=showhotlist>
        </ul>
      </div>
    </div>
  </div>
</div>
<script>
getNews('xspace-avatar','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhotlogo&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
getNews('showhottage','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhottage&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
getNews('showhotroom','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhotroom&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
getNews('showhotphoto','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhotphoto&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
getNews('showhotinfo','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhotinfo&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
getNews('showhottraffic','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhottraffic&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
getNews('showhotlist','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhotlist&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
</script>
<div id="xspace-footer">
  <p id="xspace-footer-ad"><?php echo $this->_tpl_vars['cache_config']['hack_adfoot']; ?>
</p>
  <p id="xspace-copyright"><?php echo $this->_tpl_vars['POPlv']; ?>
 执行时间：<?php echo $this->_tpl_vars['rentime']; ?>
</p>
</div>
<div id=showtage></div>
<iframe frameborder="0" height="0" width="0" scrolling="no" id=iframeupdate name=iframeupdate></iframe>
<div id=showwindow></div>
</body>
</HTML>