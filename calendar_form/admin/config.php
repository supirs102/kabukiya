<?php //error_reporting(E_ALL | E_STRICT);//デバッグ
//PHP5.1.0以上の場合のみタイムゾーンを定義（日本以外の場合には適宜設定ください）
if(version_compare(PHP_VERSION, '5.1.0', '>=')) date_default_timezone_set('Asia/Tokyo');
//関数インクルード
require_once(dirname(__FILE__).'/function.php');
$userid = array();$password = array();
###############################################################################################
##
#  PHP予約・応募フォーム連動 営業日カレンダー【CalendarForm01】ver1.0.3 (2016.08.05アップデート)
#  ※（アップデート情報）メールフォームプログラムの機能「項目連結」をこちらにも実装。日毎の一括変更可
#
#  営業日カレンダーと予約フォームが連動したPHPプログラムです。
#　任意のページに設置し、予約フォーム連動カレンダーとして運用できます。
#  改造や改変は自己責任で行ってください。
#
#  不具合等がありましたら下記までご連絡ください。
#  MailAddress: info@php-factory.net
#  name: K.Numata
#  HP: http://www.php-factory.net/
#
#　■□ 設定時の注意点 □■　
#　1，値（=の後）は数字以外の文字列（一部を除く）はダブルクオーテーション「"」、または「'」で囲んでいます。
#　2，これをを外したり削除しないでください。後ろのセミコロン「;」も削除しないください。
#　3，またドルマーク（$）が付いている文字列は絶対に変更しないでください。
#　4，数字で設定しているものは必ず「半角数字」。※シングルクォーテーション（'）では囲まない。
#　5，メールフォームではname属性の値に半角スペースは使用できません。
#　これらを間違えるとプログラムが正常に動作しませんので注意下さい。
##
###############################################################################################



//---------------------------　必須設定　必ず設定してください　-----------------------


//管理画面ログイン用ユーザーID、パスワード（半角英数字と記号のみ）※必ず変更してください

$userid[]   = 'admin';   // ユーザーID
$password[] = '1397';   // パスワード


//----------------------------------------------------------------------
// 　メール設定
//----------------------------------------------------------------------


//サイトのトップページのURL　※デフォルトでは送信完了後に「トップページへ戻る」ボタンが表示されますので
$site_top = "http://school.frontier-pc.com/fh501/028/kabukiya/index.php";

//スマホサイトのトップページのURL（スマホでも当システムを使用する場合のみ）
$sp_site_top = "http://www.php-factory.net/sp/";

//ガラケーサイトのトップページのURL（ガラケーでも当システムを使用する場合のみ）
$mb_site_top = "http://www.php-factory.net/i/";


// 管理者メールアドレス ※メールを受け取るメールアドレス(複数指定する場合は「,」で区切ってください 例 $to = "aa@aa.aa,bb@bb.bb";)
$to = "xxxxx@xxxxxx.xxx";

//フォームのメールアドレス入力箇所のname属性の値（<input name="○○"　の○○部分）※変更した場合のみ変更下さい
$Email = "メールアドレス";

/*------------------------------------------------------------------------------------------------
以下スパム防止のための設定　
※有効にするにはこのファイルとフォームページが同一ドメイン内にある必要があります
------------------------------------------------------------------------------------------------*/

//スパム防止のためのリファラチェック（フォームページが同一ドメインであるかどうかのチェック）(する=1, しない=0)
$Referer_check = 0;

//リファラチェックを「する」場合のドメイン ※以下例を参考に設置するサイトのドメインを指定して下さい。
$Referer_check_domain = "php-factory.net";

//GoogleAPIからの祝日の自動取得を行うか（0=しない、1=する）※要GoogleAPIキー
//無効化し、手動で祝日用のデータファイルをアップする方法もあります。データファイルは当サイトで配布しています。（ただ、年1回の更新が必要になります）
$autoHoliDay = 0;

// 祝日自動取得用にGoogleで取得したAPIキーを記述して下さい。例「AIzayaguWCFVDSpEGXQxAvI-oXBIcT6XJ1ck」 （あくまで例です。こんな形式という意味です。これをそのまま使用できません）
// https://code.google.com/apis/console/ にて「Calendar API」を有効にし、
//左メニュー「認証情報」の「公開 API へのアクセス」→「キーを作成」→「サーバーキー」で取得できます。（当サイトにも説明ページがあります）
// 自動取得を行わない場合には、空のままにし、↑の「GoogleAPIからの祝日の自動取得を行うかどうか」もOFFとして下さい。
$apiKey = '';

//---------------------------　必須設定　ここまで　------------------------------------



//---------------------- オプション設定　以下は必要に応じて設定してください ------------------------


//----------------------------------------------------------------------
// 予約関連の設定
//----------------------------------------------------------------------

//予約可能数カウントを使用する（0=しない、1=する）
//実際に予約が受け付けられたかどうかは判断できません。あくまでも予約メールの送信完了時に自動的にカウントが1減ります。
//予約キャンセルなどの場合には管理画面で「現在の予約可能数」を変更して下さい。
//上限を指定せず手動で「予約可」、「予約終了」を選択する場合には「0」として下さい（予約可能数は無効（無制限）になります）
$reservCount = 1;

//予約可能数カウントを使用する場合のデフォルト予約可能数（1～数値で指定下さい）
//いつでも管理画面で数値の変更は可能です。
//例「5」と設定した場合、予約が5件になった時点で自動で予約ボタンが非表示となり受付終了となります。
$reservCountNum = 1;

//プルダウンの文言（1番目（左側）は管理画面のプルダウン、2番目（右側）は管理画面及び表示側の受付終了時に表示される文言）※文言変更のみ可。増減は不可
$pulldownListArray = array("受付中","受付終了");//左側は現在受付している系の文言、右側は受付終了した系の文言を指定下さい

//カレンダー上の「予約する」ボタンのテキスト（必要に応じて「応募する」など適した文言に設定可能です）
$reservText = '予約する';

//当日の○日後から予約可ボタンを表示する（翌日以降から予約可にしたい場合にご利用下さい）※0にすれば無効化
$setDspDate = 0;//半角数字のみ

//カレンダーで選択された日付のフォーム、確認画面、送信メール内で表示する文言
$selectDateText = 'ご選択日時';

//フォーム画面、送信メールに選択された日付に曜日を表示する（0=しない、1=する）
$weekDsp = 1;


//----------------------------------------------------------------------
// カレンダー関連の設定
//----------------------------------------------------------------------

//本日の背景色を変更する（0=しない、1=する）
//※デフォルトでは黄色の背景色になります。CSSで変更可能です。（休業日が設定された場合はそちらの色が優先）
$todayFlag = 0;

//上記で「する」場合の背景色(カラーコードのみ可)　※ガラケーのbgcolorでも使用するので6桁で指定ください。
$todayFlagBg = '#FFFF99';

//カレンダーで当月から何ヶ月前、何ヶ月後まで表示するか（ユーザ閲覧ページ用）※今月のみ表示したい場合は「0」を指定
$dispMonth = 3;

//ユーザ閲覧側ページで当月の前月以降を表示する（0=しない、1=する）※管理画面では常に表示されます
$flagHiddenPrev = 0;


//休業日の背景色(カラーコードのみ可)　※ガラケーのbgcolorでも使用するので6桁で指定ください。
$holidayBg = '#FFDDDD';

/*

その他htmlソースを見ると分かりますが、タグや各セル、各曜日にはそれぞれclassを振っていますので、
style.cssのCSSを変更して自由にデザイン下さい
class="youbi_0"が日曜日でそのまま曜日ごとに連番が振られclass="youbi_6"が土曜日となっています。
カレンダーのタグや「日」、「月」などのテキストを変更したい場合は以下該当箇所にて直接変更可能です
※管理画面用と閲覧者用があります

*/


//管理画面にすべてのプルダウンを一括で「受付中」、「未選択」にするボタンを表示する（0=しない、1=する）
//※項目が多い場合で一括設定時に便利かもしれません（現状の残り予約数は変更されません）
$selectAllChange = 1;



//----------------------------------------------------------------------
// 　カレンダーマニアック設定（必要に応じて設定してください） (START)
//----------------------------------------------------------------------

//定休日の背景色(カラーコードのみ可)　※デフォルトは休業日と同じ　※ガラケーのbgcolorでも使用するので6桁で指定ください。
//定休日と休業日で背景色を変えたい場合は指定して下さい（隔週では指定できません）
//たとえば毎週月曜日が定休日で、その他に月に何日か休業日があるような場合に最適です
$closedBg = '#FFDDDD';

//定休日と休業日の背景色が違う場合に追加表示する「色 定休日」テキスト。（html部、テキスト部は変更可）
//表示処理は自動で行われますのでページをブラウザで直接確認してみて下さい。
//※直接index.phpを書き換えてオリジナルのテキストでももちろんOKです。
//携帯（ガラケー）版はi.phpに直接記述しています。
$closedTextOrigin = '<span class="closedCube" style="background:'.$closedBg.'"></span>定休日　';


//曜日の配列（英語表記に変更などが可能です。順番は変更不可）
$weekArray = array('日','月','火','水','木','金','土');

//カレンダーを表形式（テーブル）、または縦長のリスト形式で表示（0=表形式、1=リスト形式）PCのみ
//※デフォルトは表形式（テーブル）
$dspCalender = 1;


//以下スマホ、ガラケーのみ

//ページ上部の「年月」部分の背景色　※ガラケーのbgcolorでも使用するので6桁で指定ください。
$headerBgColor = '#666666';

//ページ上部の「年月」部分の文字色　※ガラケーのbgcolorでも使用するので6桁で指定ください。
$headerColor = '#ffffff';




//----------------------------------------------------------------------
// 　メール関連設定 (START)
//----------------------------------------------------------------------

//PC、スマホ、ガラケーとも共通の設定になります。
//PC、スマホ、ガラケーともフォームの項目は出来る限り同じにすることをオススメします
//※デバイスごとに違っても構いませんが、その場合以下必須入力項目をONにしている場合には必須入力項目設定に注意下さい。（全デバイスで有効になるため）
//なにかしらを変更したら都度テスト送信を行うことを強くオススメします


// 管理者宛のメールで差出人を送信者のメールアドレスにする(する=1, しない=0)
// する場合は、メール入力欄のname属性の値を「$Email」で指定した値にしてください。
//メーラーなどで返信する場合に便利なので「する」がおすすめです。
$userMail = 1;

// Bccで送るメールアドレス(複数指定する場合は「,」で区切ってください 例 $BccMail = "aa@aa.aa,bb@bb.bb";)
$BccMail = "";

// 管理者宛に送信されるメールのタイトル（件名）
$subject = "ホームページのお問い合わせ";

// 送信確認画面の表示(する=1, しない=0)
$confirmDsp = 1;

// 送信完了後に自動的に指定のページ(サンクスページなど)に移動する(する=1, しない=0)
// CV率を解析したい場合などはサンクスページを別途用意し、URLをこの下の項目で指定してください。
// 0にすると、デフォルトの送信完了画面が表示されます。
$jumpPage = 0;

// 送信完了後に表示するページURL（上記で1を設定した場合のみ）※httpから始まるURLで指定ください。
//PC
$thanksPage = "http://xxx.xxxxxxxxx/thanks.html";
//スマホ
$thanksPageSP = "http://xxx.xxxxxxxxx/thanks.html";
//ガラケー
$thanksPageMB = "http://xxx.xxxxxxxxx/thanks.html";

// 必須入力項目を設定する(する=1, しない=0)
$requireCheck = 1;

/* 必須入力項目(入力フォームで指定したname属性の値を指定してください。（上記で1を設定した場合のみ）
値はシングルクォーテーションで囲み、複数の場合はカンマで区切ってください。フォーム側と順番を合わせると良いです
チェックボックス、または項目連結などname属性の後ろに[]が付いたものを必須にしたい場合は[と]は付けないで下さい
※要するに「name="○○[]"」、または「name="○○[][]"」の場合には必ず後ろの[]を取った「○○」だけを指定して下さい。
*/
$require = array('お名前','メールアドレス');


//----------------------------------------------------------------------
//  自動返信メール設定(START)
//----------------------------------------------------------------------

// 差出人に送信内容確認メール（自動返信メール）を送る(送る=1, 送らない=0)
// 送る場合は、フォーム側のメール入力欄のname属性の値が上記「$Email」で指定した値と同じである必要があります
$remail = 0;

//自動返信メールの送信者欄に表示される名前　※あなたの名前や会社名など（もし自動返信メールの送信者名が文字化けする場合ここは空にしてください）
$refrom_name = "";

// 差出人に送信確認メールを送る場合のメールのタイトル（上記で1を設定した場合のみ）
$re_subject = "送信ありがとうございました";

//フォーム側の「名前」箇所のname属性の値　※自動返信メールの「○○様」の表示で使用します。
//指定しない、または存在しない場合は、○○様と表示されないだけです。あえて無効にしてもOK
$dsp_name = 'お名前';

//自動返信メールの冒頭の文言 ※日本語部分のみ変更可
$remail_text = <<< TEXT

お問い合わせありがとうございました。
早急にご返信致しますので今しばらくお待ちください。

送信内容は以下になります。

TEXT;


//自動返信メールに署名（フッター）を表示(する=1, しない=0)※管理者宛にも表示されます。
$mailFooterDsp = 0;

//上記で「1」を選択時に表示する署名（フッター）（FOOTER～FOOTER;の間に記述してください）
$mailSignature = <<< FOOTER

──────────────────────
株式会社○○○○　佐藤太郎
〒150-XXXX 東京都○○区○○ 　○○ビル○F　
TEL：03- XXXX - XXXX 　FAX：03- XXXX - XXXX
携帯：090- XXXX - XXXX 　
E-mail:xxxx@xxxx.com
URL: http://www.php-factory.net/
──────────────────────

FOOTER;

//----------------------------------------------------------------------
//  自動返信メール設定(END)
//----------------------------------------------------------------------

//メールアドレスの形式チェックを行うかどうか。(する=1, しない=0)
//※デフォルトは「する」。セキュリティ的にも特に理由がなければ変更しないで下さい。
$mail_check = 1;



//----------------------------------------------------------------------
// 　メール関連設定 (END)
//----------------------------------------------------------------------


//------------------------------- オプション設定ここまで ---------------------------------------------



//----------------------------------------------------------------------
// 　変数定義,初期化(START)　※基本的に変更不可
//----------------------------------------------------------------------

//予約時間リストデータパス
$timeListFilePath =  dirname(__FILE__).'/../data/time_list.dat';

//予約時間リストを取得
$timeArray = file($timeListFilePath);

//登録データが無い場合には空の配列をセットしcount($timeArray)=1とする
if(count($timeArray) < 1){
	$timeArray[0] = "";
}

//プルダウンの数を時間の設定数に合わせる
$pulldownCount = count($timeArray);

//予約カウント用ディレクトリパス
$reservFileDir = dirname(__FILE__).'/../data/reserv';

//コメント保存用ファイルパス（変更不可）
$commentFilePath = dirname(__FILE__).'/../data/comment_set.dat';

for($i = 0;$i < $pulldownCount;$i++){
	//プルダウンリスト選択データ保存用ファイルパス（変更不可）
	$pulldownFilePath[$i] = dirname(__FILE__).'/../data/pulldown_set_'.$i.'.dat';
	if(!file_exists($pulldownFilePath[$i])){

		$fp = @fopen($pulldownFilePath[$i], "a+b") or die("必要なファイルが生成できませんでした。dataディレクトリのパーミッションを777等書き込み可能なものに変更下さい。");
		fclose($fp);
	}

	//プルダウンリスト
	//このリストが管理画面の各日ごとのプルダウンに反映され、表示側にも選択したテキストが表示されます。
	//$getSscheList[$i] = file($pulldownListFilePath[$i]);
	$getSscheList[$i] = $pulldownListArray;//設定ファイルの配列からセットする

	//キーの振り直し
	foreach($getSscheList[$i] as $getSscheListKey => $getSscheListVal){

		$getSscheListKey++;
		$scheList[$i][$getSscheListKey] = rtrim($getSscheListVal);

	}

	if(!is_writable($pulldownFilePath[$i])){
		exit($pulldownFilePath[$i]."　のパーミッションが正しくありません！666等書き込み可能なものに");
	}
}
//定休日データファイルのパス（変更不可）
$filePath = dirname(__FILE__).'/../data/holiday_set.dat';

//祝日データファイルのパス（変更不可）
$holidayFilePath = dirname(__FILE__).'/../data/'.date('Y').'_holiday.dat';

//休業日データのパス（変更不可）
$closedFilePath = dirname(__FILE__).'/../data/closed.dat';

//データ保存先ディレクトリ（変更不可）
$dataDir = dirname(__FILE__).'/../data';

//パラメータを取得
$ym = date("Y-m");
if(isset($_GET['ym'])){
	$ym = $_GET['ym'];
}
//タイムスタンプを取得
$timeStamp = strtotime($ym ."-01");
if($timeStamp === false){
	$timeStamp = time();
}

//祝日データの保存とファイル生成（年が明けたら自動生成）
if($autoHoliDay == 1 && !file_exists($holidayFilePath) && is_writable($dataDir)){
	$messe = @buildHoliDay($holidayFilePath);
}

//定休日と休業日の背景色が違う場合に追加表示するテキストをセット
$closedText = '';
if($holidayBg != $closedBg){
	$closedText = $closedTextOrigin;
}

$cfilePath = dirname(__FILE__).'/copy.inc';

//パーミッションチェック用メッセージ
$perm_check01= " が書き込みできません。<br>パーミッションを書き込み可能なもの（「666」等<br>またはサーバのマニュアルなどを参照）に変更し、パーミッションチェックしてみてください。<br /><a href=\"?check=permission\">[変更したのでパーミッションチェックしてみる⇒]</a>";

$perm_check02= "<div align='center'>データ保存先ディレクトリのパーミッションが正しくありません。<br /><strong>data</strong>ディレクトリに書き込み可能なパーミッション（777等またはサーバのマニュアルなどを参照）を設定してください。<br /><a href=\"?check=permission\">[変更したのでパーミッションチェックしてみる⇒]</a></div>";

$perm_check03= "パーミッションはOKです！早速登録を行なってみてください。<a href=\"?\">これを非表示にする</a>";

$warningMesse = '<center>著作権表記がありません。削除するには著作権表記削除料金（\2,000）のお支払いが必要です。<br />削除ご希望の際は下記アドレスまでご連絡をお願いします。<br />info@php-factory.net</center>';
$warningMesse02 = '<center>システムに許可されていない変更が行われたか重大な問題が発生しました。<br />必要な箇所以外は特に変更していない場合でこのメーッセージが表示された場合には下記アドレスまでご連絡をお願いします。<br /><a href="mailto:info@php-factory.net?subject=カレンダーフォーム重大な問題発生の件">info@php-factory.net</a></center>';

//カレンダーで当月から何ヶ月後まで表示するか（管理画面用）※今月のみ表示したい場合は「0」を指定（過去は1ヶ月前のみ） PHP5.3.9以降でPOSTがMAX1000（デフォルト）に設定されたため無効化 2014/8/25
$adminDispMonth = 1;

//----------------------------------------------------------------------
// 　変数定義,初期化 (END)
//----------------------------------------------------------------------
if(isset($_GET)) $_GET = calf_sanitize($_GET);//NULLバイト除去//
if(isset($_POST)) $_POST = calf_sanitize($_POST);//NULLバイト除去//
if(isset($_COOKIE)) $_COOKIE = calf_sanitize($_COOKIE);//NULLバイト除去//
require_once($cfilePath);//無断削除禁止（改変を行うと一部または全機能が停止もしくはランダムで不具合が発生します）
?>
