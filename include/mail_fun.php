<?php
/**
 * 邮件发送功能
 * 作者trexwb
 * 2006.06.07
 */
class mail
{
	var $mailTo = ""; // 收件人
	var $mailCC = ""; // 抄送
	var $mailBCC = ""; // 秘密抄送
	var $mailFrom = ""; // 发件人
	var $mailSubject = ""; // 主题
	var $mailText = ""; // 文本格式的信件主体
	var $mailHTML = ""; // html格式的信件主体
	var $mailAttachments = ""; // 附件

	var $loc_host = "oi77";         //发信计算机名，可随意
	var	$smtp_acc = "trexwb"; //Smtp认证的用户名，类似fuweng@im286.com，或者fuweng
	var	$smtp_pass="09175201029";       //Smtp认证的密码，一般等同pop3密码
	var	$smtp_host="smtp.163.net";   //SMTP服务器地址，类似 smtp.tom.com
	var	$from="trexwb@163.net";     //发信人Email地址，你的发信信箱地址
	var	$headers = "Content-Type: text/plain; charset=\"gb2312\"\r\nContent-Transfer-Encoding: base64";
	var	$lb="\r\n";             //linebreak

	function setTo($inAddress){
		//--用explode()函数根据”,”对邮件地址进行分割
		$addressArray = explode( ",",$inAddress);
		//--通过循环对邮件地址的合法性进行检查
		for($i=0;$i<count($addressArray);$i++){ if($this->checkEmail($addressArray[$i])==false) return false; }
		//--所有合法的email地址存入数组中
		$this->mailTo = implode($addressArray, ",");
		return true;
	}
	/**************************************************
	函数 setCC($inAddress) 设置抄送人邮件地址
	参数 $inAddress 为包涵一个或多个邮件地址的字串,email地址变量,
	使用逗号来分割多个邮件地址 默认返回值为true
	**************************************************************/
	function setCC($inAddress){
		//--用explode()函数根据”,”对邮件地址进行分割
		$addressArray = explode( ",",$inAddress);
		//--通过循环对邮件地址的合法性进行检查
		for($i=0;$i<count($addressArray);$i++){ if($this->checkEmail($addressArray[$i])==false) return false; }
		//--所有合法的email地址存入数组中
		$this->mailCC = implode($addressArray, ",");
		return true;
	}
	/***************************************************
	函数setBCC($inAddress) 设置秘密抄送地址 参数 $inAddress 为包涵一个或多
	个邮件地址的字串,email地址变量,使用逗号来分割多个邮件地址 默认返回值为
	true
	******************************************/
	function setBCC($inAddress){
		//--用explode()函数根据”,”对邮件地址进行分割
		$addressArray = explode( ",",$inAddress);
		//--通过循环对邮件地址的合法性进行检查
		for($i=0;$i<count($addressArray);$i++)
		{ if($this->checkEmail($addressArray[$i])==false)
		return false;
		}
		//--所有合法的email地址存入数组中
		$this->mailBCC = implode($addressArray, ",");
		return true;
	}
	/*****************************************************************
	函数setFrom($inAddress):设置发件人地址 参数 $inAddress 为包涵邮件
	地址的字串默认返回值为true
	***************************************/
	function setFrom($inAddress){
		if($this->checkEmail($inAddress)){
			$this->mailFrom = $inAddress;
			return true;
		} return false;
	}
	/**********************
	函数 setSubject($inSubject) 用于设置邮件主题参数$inSubject为字串,
	默认返回的是true
	*******************************************/
	function setSubject($inSubject){
		if(strlen(trim($inSubject)) > 0){
			$this->mailSubject = ereg_replace( "n", "",$inSubject);
			return true; }
			return false;
	}
	/****************************************************
	函数setText($inText) 设置文本格式的邮件主体参数 $inText 为文本内容默
	认返回值为true
	****************************************/
	function setText($inText){
		if(strlen(trim($inText)) > 0){
			$this->mailText = $inText;
			return true; }
			return false;
	}
	/**********************************
	函数setHTML($inHTML) 设置html格式的邮件主体参数$inHTML为html格式,
	默认返回值为true
	************************************/
	function setHTML($inHTML){
		if(strlen(trim($inHTML)) > 0){
			$this->mailHTML = $inHTML;
			return true;
		}
		return false;
	}
	/**********************
	函数 setAttachments($inAttachments) 设置邮件的附件 参数$inAttachments
	为一个包涵目录的字串,也可以包涵多个文件用逗号进行分割 默认返回值为true
	*******************************************/
	function setAttachments($inAttachments){
		if(strlen(trim($inAttachments)) > 0){
			$this->mailAttachments = $inAttachments;
			return true;
		}
		return false;
	}
	/*********************************
	函数 checkEmail($inAddress) :这个函数我们前面已经调用过了,主要就是
	用于检查email地址的合法性
	*****************************************/
	function checkEmail($inAddress){
		return (ereg( "^[^@ ]+@([a-zA-Z0-9-]+.)+([a-zA-Z0-9-]{2}|net|com|gov|mil|org|edu|int)$",$inAddress));
	}
	/*************************************************
	函数loadTemplate($inFileLocation,$inHash,$inFormat) 读取临时文件并且
	替换无用的信息参数$inFileLocation用于定位文件的目录
	$inHash 由于存储临时的值 $inFormat 由于放置邮件主体
	***********************************************************/
	function loadTemplate($inFileLocation,$inHash,$inFormat){
		/* 比如邮件内有如下内容: Dear ~!UserName~,
		Your address is ~!UserAddress~ */
		//--其中”~!”为起始标志”~”为结束标志
		$templateDelim = "~";
		$templateNameStart = "!";
		//--找出这些地方并把他们替换掉
		$templateLineOut = ""; //--打开临时文件
		if($templateFile = fopen($inFileLocation, "r")){
			while(!feof($templateFile)){
				$templateLine = fgets($templateFile,1000);
				$templateLineArray = explode($templateDelim,$templateLine);
				for( $i=0; $i<count($templateLineArray);$i++){
					//--寻找起始位置
					if(strcspn($templateLineArray[$i],$templateNameStart)==0){
						//--替换相应的值
						$hashName = substr($templateLineArray[$i],1);
						//--替换相应的值
						$templateLineArray[$i] = ereg_replace($hashName,(string)$inHash[$hashName],$hashName);
					}
				}
				//--输出字符数组并叠加
				$templateLineOut .= implode($templateLineArray, "");
			} //--关闭文件fclose($templateFile);
			//--设置主体格式(文本或html)
			if( strtoupper($inFormat)== "TEXT" )
			return($this->setText($templateLineOut));
			else if( strtoupper($inFormat)== "HTML" )
			return($this->setHTML($templateLineOut));
		} return false;
	}
	/*****************************************
	函数 getRandomBoundary($offset) 返回一个随机的边界值
	参数 $offset 为整数 – 用于多管道的调用 返回一个md5()编码的字串
	****************************************/
	function getRandomBoundary($offset = 0){
		//--随机数生成
		srand(time()+$offset);
		//--返回 md5 编码的32位 字符长度的字串
		return ( "----".(md5(rand())));
	}
	/********************************************
	函数: getContentType($inFileName)用于判断附件的类型
	**********************************************/
	function getContentType($inFileName){
		//--去除路径
		$inFileName = basename($inFileName);
		//--去除没有扩展名的文件
		if(strrchr($inFileName, ".") == false){
			return "application/octet-stream";
		}
		//--提区扩展名并进行判断
		$extension = strrchr($inFileName, ".");
		switch($extension){
			case ".gif": return "image/gif";
			case ".gz": return "application/x-gzip";
			case ".htm": return "text/html";
			case ".html": return "text/html";
			case ".jpg": return "image/jpeg";
			case ".tar": return "application/x-tar";
			case ".txt": return "text/plain";
			case ".zip": return "application/zip";
			default: return "application/octet-stream";
		}
		return "application/octet-stream";
	}
	/**********************************************
	函数formatTextHeader把文本内容加上text的文件头
	*****************************************************/
	function formatTextHeader(){
		$outTextHeader = "";
		$outTextHeader .= "Content-Type: text/plain;charset=us-asciin";
		$outTextHeader .= "Content-Transfer-Encoding: 7bitnn";
		$outTextHeader .= $this->mailText. "n";
		return $outTextHeader;
	} /************************************************
	函数formatHTMLHeader()把邮件主体内容加上html的文件头
	******************************************/
	function formatHTMLHeader(){
		$outHTMLHeader = "";
		$outHTMLHeader .= "Content-Type: text/html;charset=us-asciin";
		$outHTMLHeader .= "Content-Transfer-Encoding: 7bitnn";
		$outHTMLHeader .= $this->mailHTML. "n";
		return $outHTMLHeader;
	}
	/**********************************
	函数 formatAttachmentHeader($inFileLocation) 把邮件中的附件标识出来
	********************************/
	function formatAttachmentHeader($inFileLocation){
		$outAttachmentHeader = "";
		//--用上面的函数getContentType($inFileLocation)得出附件类型
		$contentType = $this->getContentType($inFileLocation);
		//--如果附件是文本型则用标准的7位编码
		if(ereg( "text",$contentType)){
			$outAttachmentHeader .= "Content-Type: ".$contentType. ";n";
			$outAttachmentHeader .= ' name="'.basename($inFileLocation). '"'. "n";
			$outAttachmentHeader .= "Content-Transfer-Encoding: 7bitn";
			$outAttachmentHeader .= "Content-Disposition: attachment;n";
			$outAttachmentHeader .= ' filename="'.basename($inFileLocation). '"'. "nn";
			$textFile = fopen($inFileLocation, "r");
			while(!feof($textFile)){
				$outAttachmentHeader .= fgets($textFile,1000);
			}
			//--关闭文件 fclose($textFile);
			$outAttachmentHeader .= "n";
		}
		//--非文本格式则用64位进行编码
		else{
			$outAttachmentHeader .= "Content-Type: ".$contentType. ";n";
			$outAttachmentHeader .= ' name="'.basename($inFileLocation). '"'. "n";
			$outAttachmentHeader .= "Content-Transfer-Encoding: base64n";
			$outAttachmentHeader .= "Content-Disposition: attachment;n";
			$outAttachmentHeader .= ' filename="'.basename($inFileLocation). '"'. "nn";
			//--调用外部命令uuencode进行编码
			exec( "uuencode -m $inFileLocation nothing_out",$returnArray);
			for ($i = 1; $i<(count($returnArray)); $i++){
				$outAttachmentHeader .= $returnArray[$i]. "n";
			}
		} return $outAttachmentHeader;
	}
	/******************************
	函数 send()用于发送邮件，发送成功返回值为true
	************************************/
	function send(){
		//--设置邮件头为空
		$mailHeader = "";
		//--添加抄送人
		if($this->mailCC != "")
		$mailHeader .= "CC: ".$this->mailCC. "n";
		//--添加秘密抄送人
		if($this->mailBCC != "")
		$mailHeader .= "BCC: ".$this->mailBCC. "n";
		//--添加发件人
		if($this->mailFrom != "")
		$mailHeader .= "FROM: ".$this->mailFrom. "n";

		$this->loc_host = "oi77";         //发信计算机名，可随意
		$this->smtp_acc = "trexwb"; //Smtp认证的用户名，类似fuweng@im286.com，或者fuweng
		$this->smtp_pass="09175201029";       //Smtp认证的密码，一般等同pop3密码
		$this->smtp_host="smtp.163.com";   //SMTP服务器地址，类似 smtp.tom.com
		$this->from="trexwb@163.com";     //发信人Email地址，你的发信信箱地址
		$this->headers = "Content-Type: text/plain; charset=\"gb2312\"\r\nContent-Transfer-Encoding: base64";
		$this->lb="\r\n";             //linebreak
		$this->send_mail($this->mailTo,$this->mailSubject, $mailHeader);
		//---------------------------邮件格式------------------------------
		//--文本格式
		if($this->mailText != "" && $this->mailHTML == "" && $this->mailAttachments == ""){
			//return mail($this->mailTo,$this->mailSubject,$this->mailText,$mailHeader);
			if(!mail($this->mailTo,$this->mailSubject,$this->mailText,$mailHeader))
			return $this->send_mail($this->mailTo,$this->mailSubject, $mailHeader);
		}
		//--html或text格式
		else if($this->mailText != "" && $this->mailHTML != "" && $this->mailAttachments == ""){
			$bodyBoundary = $this->getRandomBoundary();
			$textHeader = $this->formatTextHeader();
			$htmlHeader = $this->formatHTMLHeader();
			//--设置 MIME-版本
			$mailHeader .= "MIME-Version: 1.0n";
			$mailHeader .= "Content-Type: multipart/alternative;n";
			$mailHeader .= ' boundary="'.$bodyBoundary. '"';
			$mailHeader .= "nnn";
			//--添加邮件主体和边界
			$mailHeader .= "--".$bodyBoundary. "n";
			$mailHeader .= $textHeader;
			$mailHeader .= "--".$bodyBoundary. "n";
			//--添加html标签
			$mailHeader .= $htmlHeader;
			$mailHeader .= "n--".$bodyBoundary. "--";
			//--发送邮件
			//return mail($this->mailTo,$this->mailSubject, "",$mailHeader);
			if(!mail($this->mailTo,$this->mailSubject, "",$mailHeader))
			return $this->send_mail($this->mailTo,$this->mailSubject, $mailHeader);
		}
		//--文本加html加附件
		else if($this->mailText != "" && $this->mailHTML != "" && $this->mailAttachments != ""){
			$attachmentBoundary = $this->getRandomBoundary();
			$mailHeader .= "Content-Type: multipart/mixed;n";
			$mailHeader .= ' boundary="'.$attachmentBoundary. '"'. "nn";
			$mailHeader .= "This is a multi-part message in MIME format.n";
			$mailHeader .= "--".$attachmentBoundary. "n";
			$bodyBoundary = $this->getRandomBoundary(1);
			$textHeader = $this->formatTextHeader();
			$htmlHeader = $this->formatHTMLHeader();
			$mailHeader .= "MIME-Version: 1.0n";
			$mailHeader .= "Content-Type: multipart/alternative;n";
			$mailHeader .= ' boundary="'.$bodyBoundary. '"';
			$mailHeader .= "nnn";
			$mailHeader .= "--".$bodyBoundary. "n";
			$mailHeader .= $textHeader;
			$mailHeader .= "--".$bodyBoundary. "n";
			$mailHeader .= $htmlHeader;
			$mailHeader .= "n--".$bodyBoundary. "--";
			//--获取附件值
			$attachmentArray = explode( ",",$this->mailAttachments);
			//--根据附件的个数进行循环
			for($i=0;$i<count($attachmentArray);$i++){
				//--分割 $mailHeader .= "n--".$attachmentBoundary. "n";
				//--附件信息
				$mailHeader .= $this->formatAttachmentHeader($attachmentArray[$i]);
			}
			$mailHeader .= "--".$attachmentBoundary. "--";
			//return mail($this->mailTo,$this->mailSubject, "",$mailHeader);
			if(!mail($this->mailTo,$this->mailSubject, "",$mailHeader))
			return $this->send_mail($this->mailTo,$this->mailSubject, "",$mailHeader);
		}
		return false;
	}
	function send_mail($to, $subject = 'No subject', $body)
	{
		$hdr = explode($this->lb,$this->headers);   //解析后的hdr
		if($body) {$bdy = preg_replace("/^\./","..",explode($this->lb,$body));}//解析后的Body

		$smtp = array(
		//1、EHLO，期待返回220或者250
		array("EHLO ".$this->loc_host.$this->lb,"220,250","HELO error: "),
		//2、发送Auth Login，期待返回334
		array("AUTH LOGIN".$this->lb,"334","AUTH error:"),
		//3、发送经过Base64编码的用户名，期待返回334
		array(base64_encode($this->smtp_acc).$this->lb,"334","AUTHENTIFICATION error : "),
		//4、发送经过Base64编码的密码，期待返回235
		array(base64_encode($this->smtp_pass).$this->lb,"235","AUTHENTIFICATION error : "));
		//5、发送Mail From，期待返回250
		$smtp[] = array("MAIL FROM: <".$this->from.">".$this->lb,"250","MAIL FROM error: ");
		//6、发送Rcpt To。期待返回250
		$smtp[] = array("RCPT TO: <".$to.">".$this->lb,"250","RCPT TO error: ");
		//7、发送DATA，期待返回354
		$smtp[] = array("DATA".$this->lb,"354","DATA error: ");
		//8.0、发送From
		$smtp[] = array("From: ".$this->from.$this->lb,"","");
		//8.2、发送To
		$smtp[] = array("To: ".$to.$this->lb,"","");
		//8.1、发送标题
		$smtp[] = array("Subject: ".$subject.$this->lb,"","");
		//8.3、发送其他Header内容
		foreach($hdr as $h) {$smtp[] = array($h.$this->lb,"","");}
		//8.4、发送一个空行，结束Header发送
		$smtp[] = array($this->lb,"","");
		//8.5、发送信件主体
		if($bdy) {foreach($bdy as $b) {$smtp[] = array(base64_encode($b.$this->lb).$this->lb,"","");}}
		//9、发送“.”表示信件结束，期待返回250
		$smtp[] = array(".".$this->lb,"250","DATA(end)error: ");
		//10、发送Quit，退出，期待返回221
		$smtp[] = array("QUIT".$this->lb,"221","QUIT error: ");

		//打开smtp服务器端口
		$fp = fsockopen($this->smtp_host, 25);
		if (!$fp) echo "Error: Cannot conect to ".$this->smtp_host;
		while($result = fgets($fp, 1024)){if(substr($result,3,1) == " ") { break; }}

		$result_str="";
		//发送smtp数组中的命令/数据
		foreach($smtp as $req){
			//发送信息
			fputs($fp, $req[0]);
			//如果需要接收服务器返回信息，则
			if($req[1]){
				//接收信息
				while($result = fgets($fp, 1024)){
					if(substr($result,3,1) == " ") { break; }
				};
				if (!strstr($req[1],substr($result,0,3))){
					$result_str.=$req[2].$result;
				}
			}
		}
		//关闭连接
		fclose($fp);
		return $result_str;
	}
}
/*
$mail->setTo("a@a.com"); //收件人
$mail->setCC（"b@b.com,c@c.com"）; //抄送
$mail->setCC（"d@b.com,e@c.com"）; //秘密抄送
$mail->setFrom(“f@f.com”);//发件人
$mail->setSubject(“主题”) ; //主题
$mail->setText(“文本格式”) ;//发送文本格式也可以是变量
$mail->setHTML(“html格式”) ;//发送html格式也可以是变量
$mail->setAttachments(“c:a.jpg”) ;//添加附件,需表明路径
$mail->send(); //发送邮件
*/
?>