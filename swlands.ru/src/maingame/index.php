<?session_start();

// toggle this to change the setting
define('DEBUG', false); 
// you want all errors to be triggered
error_reporting(E_ALL); 

if(DEBUG == true)
{
    // you're developing, so you want all errors to be shown
    ini_set("display_errors", true);
    // logging is usually overkill during dev
    ini_set('log_errors', true); 
}
else
{
    // you don't want to display errors on a prod environment
    ini_set("display_errors", false); 
    // you definitely wanna log any occurring
    ini_set('log_errors', false);
}

header('Content-type: text/html; charset=utf-8');
if (!isset($player['style'])) {
	print "
	<html>
<head>
<meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">
</head>
	<title>Shamaal World</title><b>Сессия потеряна.</b><br><br>
Эта ошибка может возникнуть при:<br>
1) Открытии игры из нестандартных окон браузера (Например: при открытии Internet Explorer не через стандартное окно браузера. Для решения проблемы попробуйте зайти через стандартное окно браузера.)<br>
2) Отсутствии связи с сервером в связи с его недавней перезагрузкой.<br></html>";
	exit();
}
$style = $player['style'];
$player_name = $player['name'];

$style = (integer) $style;
echo '<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.cookie.js"></script>
<link rel="stylesheet" type="text/css" href="/maingame/shake/csshake.min.css">
</head>
';
//include("frame0.php");
echo "<title>Shamaal World Lands: New History</title>\r\n";
echo "<script>
\r\nplayer_id = ".$player['id'].";
\r\nplayer_name = '";
print $player_name;
echo "';\r\nvar\tignor= new Array();\r\nignor[0] = '1';\r\n</script>\r\n";
echo "<script src=\"main.js?131\" charset=utf-8></script>\r\n<frameset rows=\"349,24,*,1\" cols=\"*,248\" FRAMESPACING=0  frameborder=0 framespacing=0>\r\n    <frame name=\"mtop\" src=\"top0.php\" id=\"mtop\" frameborder=\"0\" scrolling=\"No\" noresize marginwidth=\"0\" marginheight=\"0\">\r\n    <frame name=\"info\" src=\"info0.php\" marginwidth=\"0\" marginheight=\"0\" scrolling=No frameborder=\"0\">\r\n    <frame name=\"mbar\" src=\"bar0.php\" frameborder=\"0\" scrolling=\"No\"";
echo " noresize marginwidth=\"0\" marginheight=\"0\">\r\n    <frame name=\"look\" src=\"look0.php\" marginwidth=\"0\" marginheight=\"0\" scrolling=No frameborder=\"0\">\r\n    <frame name=\"talk\" src=\"talk0.php\" marginwidth=\"0\" marginheight=\"0\" scrolling=auto frameborder=\"0\">\r\n    <frame name=\"users\" src=\"users0.php\" marginwidth=\"0\" marginheight=\"0\" scrolling=\"auto\" frameborder=\"0\">\r\n\t<frame name=\"ref\" src=\"ref.php\" marginwid";
echo "th=\"0\" marginheight=\"0\" scrolling=No frameborder=\"0\">\r\n\t<frameset  cols=\"33%,33%,*\" FRAMESPACING=0>\r\n\t\t<frame name=\"menu\" src=\"menu.php\" marginwidth=\"0\" marginheight=\"0\" scrolling=No frameborder=\"0\">\r\n\t\t<frame name=\"enter\" src=\"enter.php\" marginwidth=\"0\" marginheight=\"0\" scrolling=No frameborder=\"0\">\r\n\t\t<frame name=\"emap\" src=\"map.php\" marginwidth=\"0\" marginheight=\"0\" scrolling=No frameborder=\"0\">\r\n\t</";
echo "frameset>\r\n</frameset>\r\n";


echo '</html>';
?>
