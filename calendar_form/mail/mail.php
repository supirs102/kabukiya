<?php ini_set('display_errors', 0); ?>
<?php header("Content-Type:text/html;charset=utf-8"); ?>
<?php
require_once('../admin/config.php');//設定ファイルインクルード（config.phpへの相対パス）※設置箇所が変わる場合は要変更
##-----------------------------------------------------------------------------------------------------------------##
#
#  PHPメールプログラム
#　改造や改変は自己責任で行ってください。
#
#  今のところ特に問題点はありませんが、不具合等がありましたら下記までご連絡ください。
#  MailAddress: info@php-factory.net
#  name: K.Numata
#  HP: http://www.php-factory.net/
#
##-----------------------------------------------------------------------------------------------------------------##

//----------------------------------------------------------------------
//  関数実行、変数初期化
//----------------------------------------------------------------------
//ご予約日時連結のための再セット
if(isset($_POST["reserv"])){
	$reserv = formPostToConnect($timeArray);
}
$encode = "UTF-8";//このファイルの文字コード定義（変更不可）

if($encode == 'SJIS') $_POST = sjisReplace($_POST,$encode);//Shift-JISの場合に誤変換文字の置換実行
$funcRefererCheck = refererCheck($Referer_check,$Referer_check_domain);//リファラチェック実行

//変数初期化
$sendmail = 0;
$empty_flag = 0;
$post_mail = '';
$errm ='';
$header ='';

if($requireCheck == 1) {
	$requireResArray = requireCheck($require);//必須チェック実行し返り値を受け取る
	$errm = $requireResArray['errm'];
	$empty_flag = $requireResArray['empty_flag'];
}
//メールアドレスチェック
if(empty($errm)){
	foreach($_POST as $key=>$val) {
		if($val == "confirm_submit") $sendmail = 1;
		if($key == $Email) $post_mail = calf_h($val);
		if($key == $Email && $mail_check == 1 && !empty($val)){
			if(!checkMail($val)){
				$errm .= "<p class=\"error_messe\">【".$key."】はメールアドレスの形式が正しくありません。</p>\n";
				$empty_flag = 1;
			}
		}
	}
}
if(($confirmDsp == 0 || $sendmail == 1) && $empty_flag != 1){

	//差出人に届くメールをセット
	if($remail == 1) {
		$userBody = mailToUser($_POST,$dsp_name,$remail_text,$mailFooterDsp,$mailSignature,$encode);
		$reheader = userHeader($refrom_name,$to,$encode);
		$re_subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($re_subject,"JIS",$encode))."?=";
	}
	//管理者宛に届くメールをセット
	$adminBody = mailToAdmin($_POST,$subject,$mailFooterDsp,$mailSignature,$encode,$confirmDsp);
	$header = adminHeader($userMail,$post_mail,$BccMail,$to);
	$subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($subject,"JIS",$encode))."?=";

	//予約可能数カウントを使用する場合
	if($reservCount == 1){
		//予約データカウント用に日時を保存する（第三引数はデバイスごとのトプページURL）
		mailToReservCountReg($reservFileDir,$reservCountNum,$site_top);
	}
	//echo mb_convert_encoding($adminBody,$encode,"JIS");
	mail($to,$subject,$adminBody,$header);
	if($remail == 1 && !empty($post_mail)) mail($post_mail,$re_subject,$userBody,$reheader);

}
else if($confirmDsp == 1){

/*　▼▼▼送信確認画面のレイアウト※編集可　オリジナルのデザインも適用可能▼▼▼　*/
?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-language" content="ja">
	<meta name="description" content="歌舞伎屋は、エキゾチックな文化に惹かれる方のためのレトロモダンな旅館です。">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<title>ごよやく&nbsp;|&nbsp;歌舞伎屋</title>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../../css/style.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>
	<link href="../../malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
	<script src="../../malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../../js/main.js"></script>
	<link rel="icon" type="image/vnd.microsoft.icon" href="#">
	<style type="text/css">
	p.error_messe{
		margin:5px 0;
		color:red;
	}
	</style>
	</head>
	<body>
	<div id="wrapper">
	<header id="linkul06">
		<img class="bgheader bg01" src="../../images/goyoyakutexture.png">
		<img class="bgheader bg02" src="../../images/goannnaitexture.png">
		<img class="bgheader bg03" src="../../images/ofurotexture.png">
		<img class="bgheader bg04" src="../../images/oshokujitexture.png">
		<img class="bgheader bg05" src="../../images/oheyatexture.png">
		<img class="bgheader bg06" src="../../images/kabukiyatexture.png">
		<h1>
			<img class="titleheader title01" src="../../images/goyoyaku_logo.png">
			<img class="titleheader title02" src="../../images/goannai_logo.png">
			<img class="titleheader title03" src="../../images/ofuro_logo.png">
			<img class="titleheader title04" src="../../images/osyokuji_logo.png">
			<img class="titleheader title05" src="../../images/oheya_logo.png">
			<img class="titleheader title06" src="../../images/top_logo.png">
		</h1>
		<div id="headernav">
			<nav>
				<ul>
					<li><a class="goyoyakulink nolink" href="../../reservation.php"><span class="kana">GOYOYAKU</span><br><span>ごよやく</span></a></li>
					<li><a class="goannailink" href="../../guide.php"><span class="kana">GOANNAI</span><br><span>ごあんない</span></a></li>
					<li><a class="ofurolink" href="../../bath.php"><span class="kana">OFURO</span><br><span>おふろ</span></a></li>
					<li><a class="oshokujilink" href="../../meal.php"><span class="kana">OSHOKUJI</span><br><span>おしょくじ</span></a></li>
					<li><a class="oheyalink" href="../../room.php"><span class="kana">OHEYA</span><br><span>おへや</span></a></li>
					<li><a class="kabukiyalink" href="../../index.php"><span class="kana">KABUKIYA</span><br><span>かぶきや</span></a></li>
				</ul>
			</nav>
		</div><!-- /heaernav -->
	</header><!-- /header -->
	<div class="main" id="reservemain">
	<h2><span class="kana">GOYOYAKU</span><br><span>ごよやく</span></h2>
	<img id="reservetitle1" src="../../images/goannai_top.png">
	<div id="reserveabout">
		<p>一羽のホオジロが、<br>
		水波の部屋のテラスに<br>
		降り立つのが見える<br>
		池の浅瀬ではセグロセキレイが<br>
		水浴びをしていた</p>
		<p>星のや軽井沢に足を<br>
		踏み入れるとすぐに、豊かな<br>
		生態系に恵まれている<br>
		場所であることに気づく</p>
	</div><!-- /reserveabout -->


<!-- ▲ Headerやその他コンテンツなど　※自由に編集可 ▲-->

<!-- ▼************ 送信内容表示部　※編集は自己責任で ************ ▼-->
<div id="formWrap" class="formsize">
<?php if($empty_flag == 1){ ?>
<div align="center">
<h4>入力にエラーがあります。</h4>
<?php echo $errm; ?><br /><br /><input type="button" value=" 前画面に戻る " onClick="history.back()">
</div>
<?php }else{ ?>
<h3>確認画面</h3>
<p align="center">以下の内容で間違いがなければ、「送信する」ボタンを押してください。</p>
<form action="<?php echo calf_h($_SERVER['SCRIPT_NAME']); ?>" method="POST">
<table class="formTable">
<?php echo confirmOutput($_POST);//入力内容を表示?>
</table>
<p align="center"><input type="hidden" name="mail_set" value="confirm_submit">

<input type="hidden" name="confirm_reserv[date]" value="<?php echo (isset($reserv["date"])) ? calf_h($reserv["date"]) : '';?>">
<input type="hidden" name="confirm_reserv[time]" value="<?php echo (isset($reserv["time"])) ? calf_h($reserv["time"]) : '';?>">
<input type="hidden" name="httpReferer" value="<?php echo calf_h(@$_SERVER['HTTP_REFERER']);?>">
<input type="submit" value="　送信する　">
<input type="button" value="前画面に戻る" onClick="history.back()"></p>
</form>
<?php calf_copyright();}//削除禁止 ?>
</div><!-- /formWrap -->
<!-- ▲ *********** 送信内容確認部　※編集は自己責任で ************ ▲-->

<!-- ▼ Footerその他コンテンツなど　※編集可 ▼-->
	</div><!-- /reservationmain -->
	<div class="bgmain">
		<img class="bg11" src="../../images/goyoyaku_top.png">
		<img class="bg12" src="../../images/goannai_top.png">
		<img class="bg13" src="../../images/ofuro_top.png">
		<img class="bg14" src="../../images/osyokuji.png">
		<img class="bg15" src="../../images/goemon_top.jpg">
		<img class="bg16" src="../../images/top_face.png">
	</div><!-- /bgmain -->
	<footer>
		<div id="footerdata">
			<span class="kana">かぶきや</span><br>
			<span>歌舞伎屋</span>
			<p id="footerjp">104-0061&emsp;東京都中央区銀座１丁目23-45</p>
			<p>Ginza&emsp;1-23-45,&emsp;Chuo-ku,&emsp;Tokyo,&emsp;Japan</p>
		</div><!-- /footerdata -->
		<div id="footerimg"><img id="footerlogo" src="../../images/icon.png" width="69" height="92"></div>
		<div id="footernav">
			<nav>
				<ul>
					<li><a href="https://www.instagram.com/">いんすたぐらむ</a></li>
					<li><a href="mailto:sample@sample.com">おといあわせ</a></li>
					<li><a href="https://goo.gl/maps/z6YffEgEyQJ2">ちず</a></li>
				</ul>
			</nav>
		</div><!-- /footernav -->
	</footer><!-- /footer -->
	</div><!-- /wrapper -->
	<div id="filter"></div><!-- /filter -->
	</body>
	</html>
<?php
/* ▲▲▲送信確認画面のレイアウト　※オリジナルのデザインも適用可能▲▲▲　*/
}

if(($jumpPage == 0 && $sendmail == 1) || ($jumpPage == 0 && ($confirmDsp == 0 && $sendmail == 0))) {

/* ▼▼▼送信完了画面のレイアウト　編集可 ※送信完了後に指定のページに移動しない場合のみ表示▼▼▼　*/
?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-language" content="ja">
	<meta name="description" content="歌舞伎屋は、エキゾチックな文化に惹かれる方のためのレトロモダンな旅館です。">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<title>ごよやく&nbsp;|&nbsp;歌舞伎屋</title>
	<link href="../style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../../css/style.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>
	<link href="../../malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
	<script src="../../malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../../js/main.js"></script>
	<link rel="icon" type="image/vnd.microsoft.icon" href="#">
	<style type="text/css">
	p.error_messe{
		margin:5px 0;
		color:red;
	}
	</style>
	</head>
	<body>
	<div id="wrapper">
	<header id="linkul06">
		<img class="bgheader bg01" src="../../images/goyoyakutexture.png">
		<img class="bgheader bg02" src="../../images/goannnaitexture.png">
		<img class="bgheader bg03" src="../../images/ofurotexture.png">
		<img class="bgheader bg04" src="../../images/oshokujitexture.png">
		<img class="bgheader bg05" src="../../images/oheyatexture.png">
		<img class="bgheader bg06" src="../../images/kabukiyatexture.png">
		<h1>
			<img class="titleheader title01" src="../../images/goyoyaku_logo.png">
			<img class="titleheader title02" src="../../images/goannai_logo.png">
			<img class="titleheader title03" src="../../images/ofuro_nami.jpg">
			<img class="titleheader title04" src="../../images/syokuji_top.jpg">
			<img class="titleheader title05" src="../../images/oheya_logo.png">
			<img class="titleheader title06" src="../../images/top_logo.png">
		</h1>
		<div id="headernav">
			<nav>
				<ul>
					<li><a class="goyoyakulink nolink" href="../../reservation.php"><span class="kana">GOYOYAKU</span><br><span>ごよやく</span></a></li>
					<li><a class="goannailink" href="../../guide.php"><span class="kana">GOANNAI</span><br><span>ごあんない</span></a></li>
					<li><a class="ofurolink" href="../../bath.php"><span class="kana">OFURO</span><br><span>おふろ</span></a></li>
					<li><a class="oshokujilink" href="../../meal.php"><span class="kana">OSHOKUJI</span><br><span>おしょくじ</span></a></li>
					<li><a class="oheyalink" href="../../room.php"><span class="kana">OHEYA</span><br><span>おへや</span></a></li>
					<li><a class="kabukiyalink" href="../../index.php"><span class="kana">KABUKIYA</span><br><span>かぶきや</span></a></li>
				</ul>
			</nav>
		</div><!-- /heaernav -->
	</header><!-- /header -->
	<div class="main" id="reservemain">
	<h2><span class="kana">GOYOYAKU</span><br><span>ごよやく</span></h2>
	<img id="reservetitle1" src="../../images/goannai_top.png">
	<div id="reserveabout">
		<p>一羽のホオジロが、<br>
		水波の部屋のテラスに<br>
		降り立つのが見える<br>
		池の浅瀬ではセグロセキレイが<br>
		水浴びをしていた</p>
		<p>星のや軽井沢に足を<br>
		踏み入れるとすぐに、豊かな<br>
		生態系に恵まれている<br>
		場所であることに気づく</p>
	</div><!-- /reserveabout -->
<div class="kakunin" align="center">
<?php if($empty_flag == 1){ ?>
<h4>入力にエラーがあります。</h4>
<div style="color:red"><?php echo $errm; ?></div>
<br /><br /><input type="button" value=" 前画面に戻る " onClick="history.back()">
</div>
</body>
</html>
<?php }else{ ?>
<h4>予約を受け付けました。</h4><br>
<a href="<?php echo $site_top ;?>">トップページへ戻る&raquo;</a>
</div>
<?php calf_copyright();//削除禁止 ?>
<!--  CV率を計測する場合ここにAnalyticsコードを貼り付け -->
	</div><!-- /reservationmain -->
	<div class="bgmain">
		<img class="bg11" src="../../images/goyoyaku_top.png">
		<img class="bg12" src="../../images/goannai_top.png">
		<img class="bg13" src="../../images/ofuro_nami.jpg">
		<img class="bg14" src="../../images/osyokuji_top.jpg">
		<img class="bg15" src="../../images/goemon_top.jpg">
		<img class="bg16" src="../../images/top_face.png">
	</div><!-- /bgmain -->
	<footer>
		<div id="footerdata">
			<span class="kana">かぶきや</span><br>
			<span>歌舞伎屋</span>
			<p id="footerjp">104-0061&emsp;東京都中央区銀座１丁目23-45</p>
			<p>Ginza&emsp;1-23-45,&emsp;Chuo-ku,&emsp;Tokyo,&emsp;Japan</p>
		</div><!-- /footerdata -->
		<div id="footerimg"><img id="footerlogo" src="../../images/icon.png" width="69" height="92"></div>
		<div id="footernav">
			<nav>
				<ul>
					<li><a href="https://www.instagram.com/">いんすたぐらむ</a></li>
					<li><a href="mailto:sample@sample.com">おといあわせ</a></li>
					<li><a href="https://goo.gl/maps/z6YffEgEyQJ2">ちず</a></li>
				</ul>
			</nav>
		</div><!-- /footernav -->
	</footer><!-- /footer -->
	</div><!-- /wrapper -->
	<div id="filter"></div><!-- /filter -->
	</body>
	</html>
<?php
/* ▲▲▲送信完了画面のレイアウト 編集可 ※送信完了後に指定のページに移動しない場合のみ表示▲▲▲　*/
  }
}
//確認画面無しの場合の表示、指定のページに移動する設定の場合、エラーチェックで問題が無ければ指定ページヘリダイレクト
else if(($jumpPage == 1 && $sendmail == 1) || $confirmDsp == 0) {
	if($empty_flag == 1){ ?>
<div align="center"><h4>入力にエラーがあります。</h4><div style="color:red"><?php echo $errm; ?></div><br /><br /><input type="button" value=" 前画面に戻る " onClick="history.back()"></div>
<?php
	}else{ header("Location: ".$thanksPage); }
}
?>
