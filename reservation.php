<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="content-language" content="ja">
<meta name="description" content="歌舞伎屋は、エキゾチックな文化に惹かれる方のためのレトロモダンな旅館です。">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<title>ごよやく&nbsp;|&nbsp;歌舞伎屋</title>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link href="calendar_form/style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/main.js"></script>
<link href="malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script src="malihu-custom-scrollbar-plugin-master/jquery.mCustomScrollbar.concat.min.js"></script>
<link rel="icon" type="image/vnd.microsoft.icon" href="#">
</head>
<body>
<div id="wrapper">
<header id="linkul06">
	<img class="bgheader bg01" src="images/goyoyakutexture.png">
	<img class="bgheader bg02" src="images/goannnaitexture.png">
	<img class="bgheader bg03" src="images/ofurotexture.png">
	<img class="bgheader bg04" src="images/oshokujitexture.png">
	<img class="bgheader bg05" src="images/oheyatexture.png">
	<img class="bgheader bg06" src="images/kabukiyatexture.png">
	<h1>
		<img class="titleheader title01" src="images/goyoyaku_logo.png">
		<img class="titleheader title02" src="images/goannai_logo.png">
		<img class="titleheader title03" src="images/ofuro_nami.jpg">
		<img class="titleheader title04" src="images/osyokuji_logo.png">
		<img class="titleheader title05" src="images/oheya_logo.png">
		<img class="titleheader title06" src="images/top_logo.png">
	</h1>
	<div id="headernav">
		<nav>
			<ul>
				<li><a class="goyoyakulink nolink" href="reservation.php"><span class="kana">GOYOYAKU</span><br><span>ごよやく</span></a></li>
				<li><a class="goannailink" href="guide.php"><span class="kana">GOANNAI</span><br><span>ごあんない</span></a></li>
				<li><a class="ofurolink" href="bath.php"><span class="kana">OFURO</span><br><span>おふろ</span></a></li>
				<li><a class="oshokujilink" href="meal.php"><span class="kana">OSHOKUJI</span><br><span>おしょくじ</span></a></li>
				<li><a class="oheyalink" href="room.php"><span class="kana">OHEYA</span><br><span>おへや</span></a></li>
				<li><a class="kabukiyalink" href="index.php"><span class="kana">KABUKIYA</span><br><span>かぶきや</span></a></li>
			</ul>
		</nav>
	</div><!-- /heaernav -->
</header><!-- /header -->
<div class="main" id="reservemain">
	<h2><span class="kana">GOYOYAKU</span><br><span>ごよやく</span></h2>
	<img id="reservetitle1" src="images/goyoyaku_top.png">
	<div id="reserveabout">
	<p>月も朧に白魚の篝も<br>
		霞む春の空<br>
	冷てえ風もほろ酔いに<br>
	心持ちよくうかうかと<br>
	浮かれ烏のただ一羽</p>
	<p>ねぐらへ帰える川端で<br>
	竿の雫が濡れ手に<br>
	泡思いがけなく<br>
	手に入る百両</p>
	</div><!-- /reserveabout -->
	<div id="reservesystem" class="calendarsize">
		<?php require_once('calendar_form/admin/config.php'); ?>
		<?php if(!isset($_POST["reservSubmit"]) && empty($_GET['mode'])){ ?>
		<p class="holidayText"><?php if($closedText) echo $closedText; ?><span class="holidayCube" style="background:<?php echo $holidayBg ;?>"></span>休業日</p>
		<?php if(!$copyright) exit($warningMesse); else{ echo scheduleCalenderPc($ym,$timeStamp,$copyright); ?>
		<p class="holidayText"><?php if($closedText) echo $closedText; ?><span class="holidayCube" style="background:<?php echo $holidayBg ;?>"></span>休業日</p>
		<?php Uqa4h78r();} ?>
		<?php }else{ ?>
		<?php
		$date = (isset($_GET["date"])) ? calf_h($_GET["date"]) : exit('日付が選択されていません。戻って選択しなおして下さい<br /><a href="javascript:history.back()">戻る&raquo;<a>');
		$time = (isset($_GET["time"])) ? calf_h($_GET["time"]) : '';
		$dateArray = explode("-",$date);
		$dspDate = $dateArray[0]."年".$dateArray[1]."月".$dateArray[2]."日";
		$dspDate .= ($weekDsp == 1) ? '（'.$weekArray[date('w',strtotime($date))].'）' : '';
		$dspDate .= " ".$timeArray[$time];
		?>

		<div id="formWrap">
		<p><input type="button" value="前画面に戻る" onClick="history.back()" class="submit-button"></p>
			<h3>予約フォーム</h3>
			<p>下記フォームに必要事項を入力後、確認ボタンを押してください。</p>
		<form action="calendar_form/mail/mail.php" method="post">
		<table class="formTable">
			<tr>
				<th><?php echo $selectDateText;?></th>
				<td>
			<?php echo $dspDate;?> <input type="hidden" name="reserv[date]" value="<?php echo $date;?>" /><input type="hidden" name="reserv[time]" value="<?php echo $time;?>">
				</td>
			</tr>
			<tr>
				<th>お名前</th>
				<td><input size="20" type="text" name="お名前">※必須</td>
			</tr>
			<tr>
				<th>電話番号（半角）</th>
				<td><input size="30" type="text" name="電話番号"></td>
			</tr>
			<tr>
				<th>メールアドレス（半角）</th>
				<td><input size="30" type="text" name="メールアドレス">※必須</td>
			</tr>
			<tr>
				<th>住所</th>
				<td><input size="30" type="text" name="住所"></td>
			</tr>
			<tr>
				<th>性別</th>
				<td><input type="radio" name="性別" value="男">&emsp;男&emsp;
					<input type="radio" name="性別" value="女">&emsp;女&emsp;
				</td>
			</tr>
			<tr>
				<th>お問い合わせ内容</th>
				<td><textarea name="お問い合わせ内容" cols="50" rows="5"></textarea></td>
			</tr>
		</table>
		<p align="center">
			<input type="submit" value="&emsp;&emsp;確認&emsp;&emsp;">
			<input type="reset" value="リセット">
		</p>
		</form>
		</div>
		<?php Uqa4h78r();} ?>
	</div><!-- /reservesystem -->
</div><!-- /reservationmain -->
<div class="bgmain">
	<img class="bg11" src="images/goyoyaku_top.png">
	<img class="bg12" src="images/goannai_top.png">
	<img class="bg13" src="images/ofuro_top.png">
	<img class="bg14" src="images/osyokuji_top.jpg">
	<img class="bg15" src="images/goemon_top.jpg">
	<img class="bg16" src="images/top_face.png">
</div><!-- /bgmain -->
<footer>
	<div id="footerdata">
		<span class="kana">かぶきや</span><br>
		<span>歌舞伎屋</span>
		<p id="footerjp">104-0061&emsp;東京都中央区銀座１丁目23-45</p>
		<p>Ginza&emsp;1-23-45,&emsp;Chuo-ku,&emsp;Tokyo,&emsp;Japan</p>
	</div><!-- /footerdata -->
	<div id="footerimg"><img id="footerlogo" src="images/icon.png" width="69" height="92"></div>
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