<?php

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

session_start();
header('Content-type: text/html; charset=utf-8');
include('mysqlconfig.php');
include("maingame/racecfg.php");
?>

<html>
<head>
	<meta name="keywords" content="Онлайн игра, online game, РПГ игра, RPG game, Браузер, MMPROG, Герой, Кланы, Character, MUD, Муд, Shamaal, World, Шамаал">
	<META name="description" content="Shamaal world (Мир Шамаал) - бесплатная браузерная ролевая онлайн игра в стиле фэнтези, квесты, войны, экономика, свободное перемещение по локациям, огромный мир ждёт тебя.">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Shamaal World Lands: New History. Онлайн игра Shamaal world: бесплатная браузерная онлайн игра, онлайн игры бесплатно.</title>
</head>
<LINK REL=STYLESHEET TYPE="TEXT/CSS" HREF="site.css" TITLE="STYLE">
<LINK REL=STYLESHEET TYPE="TEXT/CSS" HREF="/snow/style.css" TITLE="STYLE">
<?

function currentLoad()
{
	if(isset($_GET['load']))
	{
		$load = $_GET['load'];
	}
	else if($_POST['load'])
	{
		$load = $_POST['load'];
	}
	else
	{
		$load=1;
	}
	return $load;
}
function currentSubLoad()
{
	if(isset($_GET['subload']))
	{
		$subload = $_GET['subload'];
	}
	else if($_POST['subload'])
	{
		$subload = $_POST['subload'];
	}
	else
	{
		$subload=1;
	}
	return $subload;
}

function CheckLan($text)
{
	$rus = 0;
	$eng = 0;
	$num = 0;
	for ($i = 0; $i < strlen($text);$i++)
	{
	 	$char = substr($text, $i, 1);

		if (ord($char) > 0x7A)
			$rus = 1;
		else if ((ord($char) >= 0x41 && ord($char) <= 0x5A) ||
  				 (ord($char) >= 0x61 && ord($char) <= 0x7A))
			$eng = 1;
		if (($char >= '0' ) && ($char <= '9' ))
			$num = 1;

		if ($rus == 1 && $eng == 1)
			return 0;
		if ($num == 1)
			return 0;
	}

	return 1;
}
Function max_parametr($level,$race)
{
	global $player_max_hp,$player_max_mana,$race_con,$race_wis,$con,$wis;
	$player_max_hp =  round((6+($con+$race_con[$race])/2)*7)+round((($con+$race_con[$race])/2-1)*$level*2.5)+$level*8;
	$player_max_mana =  ($wis+$race_wis[$race])*8+round(($wis+$wis+$race_wis[$race])*$level/2);
}
function GetIP()
{
	//global $_SERVER;
	$iphost1=$_SERVER['HTTP_X_FORWARDED_FOR'];
	$iphost2=$_SERVER['REMOTE_ADDR'];
	$iphost="$iphost2;$iphost1;";
	return $iphost;
}

$blocked = false;
$agent_data = $_SERVER['HTTP_USER_AGENT'];
if(preg_match('/JoeDog/i',$agent_data))
	$blocked = true;
if ($blocked)
{
	$plip = GetIP();
	$file = fopen("log.dat","a+");
	$time = date("n-d H:i:s");

	fputs($file,"$time main |$name| |$player_id|".$plip. "|Cookie user:".$_COOKIE["lastuser"]."|".$agent_data." Blocked: true");
	fputs($file,"\n");
	fclose($file);
	exit();
}




$file = fopen("maingame/cur_online.dat","r");
$all_online = fgets($file,15);
$all_online = str_replace(chr(10),"",$all_online);
$all_online = str_replace(chr(13),"",$all_online);
$akadem_online = fgets($file,15);
$akadem_online = str_replace(chr(10),"",$akadem_online);
$akadem_online = str_replace(chr(13),"",$akadem_online);
fclose($file);

$block_ip[1] = "213.179.232.";
$block_ip[2] = "213.179.232.81";
$block_ip[3] = "213.179.232.54";
$block_ip[4] = "212.46.244.26";
$block_ip[5] = '195.154.241.150';
$block_ip[6] = '195.154.241.15';
$block_ip[7] = '37.204.63.240';
$block_ip[8] = '85.21.105.197';

$ip = GetIP();
for ($i = 1;$i <= count($block_ip);$i++)
{
	$a = strpos("|_$ip ","_$block_ip[$i]");
	if ($a == 1)
	{
		print "<table align=center height=500 width=80%><tr><td align=center>Yor ip range is blocked. In case you have questions about this please visit our forum - forum.swlands.ru.</td></tr></table>";
		exit();
	}
}
?>


<body>

<table cellpadding=0 cellspacing=0 width=780 height=113 align="center" >

<tr>

	<td background="maingame/pic/stop.gif" width=160><a href='/' style="display:block;width:100%;height:100%;"></a></td>

	<td align=center>

		<table cellpadding=0 cellspacing=1 bgcolor=92A7AB width="468" height=60>

		<tr>

			<td bgcolor=F2F6F6  align=center>
				Наш сервер создан для ценителей мира Шамаал. Дополнительные пакеты доступны игрокам <u><b>бесплатно</b></u>.
			</td>

		</tr>

		</table>



	</td>

</tr>

</table>

<table cellpadding=0 cellspacing=0 width=780 height=400 align="center">

<tr>

	<td valign=top width=170>

		<table cellpadding=0 cellspacing=0 width=100%>

		<tr>
			<td colspan=2 height="13" align="right"><img src="maingame/pic/stop3.gif" border="0" alt=""></td>
		</tr>

		<tr>
			<td width=140>
				<table cellspacing=1 cellpadding=2 bgcolor=92A7AB height=200 width=126 align=right>

						<?php
						$load = currentLoad();
						$subload = currentSubLoad();

						$load = (integer) $load;
						$subload = (integer) $subload;
						$link = array();
						$link2 = array();
						$link[1] = "Новости";
						$link[2] = "Регистрация";
						$link[4] = "Доп. пакеты";
						$link_url[5] = 'http://vk.com/club95575688';
						$link_url[3] = "http://forum.swlands.ru";
						$link[3] = "Форум";
						$link[5] = "Группа vkontakte";
						$link[6] = "Статистика";
						$link_menu[2] = 3;
						$link_menutext[2][1] = "Регистрация";
						$link_menutext[2][2] = "Забыли пароль?";
						$link_menutext[2][3] = "Поменять пароль";
						$link_menu[6] = 7;
						$link_menutext[6][1] = "Статус сервера";
						$link_menutext[6][2] = "Топ убийц";
						$link_menutext[6][3] = "Топ городов";
						$link_menutext[6][4] = "Топ кланов";
						$link_menutext[6][5] = "Топ бойцов";
						$link_menutext[6][6] = "Топ уровней";
						$link_menutext[6][7] = "Активные жители";
//                        $link_menutext[6][71] = "Топ золото";
//						$link_menutext[6][81] = "Топ банк";

						$link[8] = "Библиотека";
						$link_menu[8] = 5;
						$link_menutext[8][1] = "Содержание";
						$link_menutext[8][2] = "FAQ";
						$link_menutext_url[8][3] = "/rule.php";
						$link_menutext[8][3] = "Правила";
						$link_menutext[8][4] = "Энциклопедия";
						$link_menutext_url[8][5] = "/rch/";
						$link_menutext[8][5] = "Обзор игры";

						$link[9] = "Контакты";
												
						$link2[1] = "news";
						$link2[2] = "reg";
						$link2[4] = "donate";
						$link2[5] = "forum";
						$link2[6] = "status";
						$link2[9] = "contacts";

						$link2[8] = "help";
						for ( $i=1;$i<=8;$i++ )
						{
							if ($link[$i] <> "")
							{
								if ($i <> $load)
								{
									if ($link_url[$i] == '')
										print "<tr><td bgcolor=E7EEE5 valign=top height=15 onmouseover='this.bgColor=\"#FFFFCC\"' onmouseout='this.bgColor=\"#E7EEE5\"' style='cursor:hand'>&nbsp;<a href=index.php?load=$i class=menus>» $link[$i]</a></td></tr>";
									else
										print "<tr><td bgcolor=E7EEE5 valign=top height=15 onmouseover='this.bgColor=\"#FFFFCC\"' onmouseout='this.bgColor=\"#E7EEE5\"' style='cursor:hand'>&nbsp;<a href='$link_url[$i]' class=menus target=_blank>» $link[$i]</a></td></tr>";
								}
								else
								{
									print "<tr><td bgcolor=F5F8F0 valign=top height=15 onmouseover='this.bgColor=\"#FFFFCC\"' onmouseout='this.bgColor=\"#F5F8F0\"' style='cursor:hand'>&nbsp;<a href=index.php?load=$i class=menus>» $link[$i]</a></td></tr>";
									for ($k = 1;$k<=$link_menu[$i];$k++)
									{
										$a =  $link_menutext[$i][$k];
										if ($k == $subload)
											print "<tr><td bgcolor=ECF0ED valign=top height=15 onmouseover='this.bgColor=\"#FFFFCC\"' onmouseout='this.bgColor=\"#ECF0ED\"' style='cursor:hand' align=right><table cellpadding=0 cellspacing=0 width=88%><tr><td><a href=index.php?load=$i&subload=$k class=menusmall>$a</a></td></tr></table></td></tr>";
										else
											{
												$p = $link_menutext_url[$i][$k];
												if ($link_menutext_url[$i][$k] == '')
													print "<tr><td bgcolor=CDD6CE valign=top height=15 onmouseover='this.bgColor=\"#FFFFCC\"' onmouseout='this.bgColor=\"#CDD6CE\"' style='cursor:hand' align=right><table cellpadding=0 cellspacing=0 width=88%><tr><td><a href=index.php?load=$i&subload=$k class=menusmall>$a</a></td></tr></table></td></tr>";
												else
													print "<tr><td bgcolor=CDD6CE valign=top height=15 onmouseover='this.bgColor=\"#FFFFCC\"' onmouseout='this.bgColor=\"#CDD6CE\"' style='cursor:hand' align=right><table cellpadding=0 cellspacing=0 width=88%><tr><td><a href=$p class=menusmall target=_blank>$a</a></td></tr></table></td></tr>";
											}
									}

								}
							}
						}

						?>

						<tr>

						    <td bgcolor=DEE6DF valign=top align=center height=120>

							<br>

							<table width=98% bgcolor=A5B2B5 cellpadding=1 cellspacing=1>

								<tr>
									<td bgcolor=E6E8DE class=t><font class=small>Поиск персонажа</font></td>
								</tr>

								<tr>
									<td align=center bgcolor=EFF3E6>
										<table cellpadding=1 cellspacing=0>
											<form action="fullinfo.php" method="post" target="_blank">
												<tr>
													<td class=small>Имя:</td>
												</tr>
												<tr>
													<td><input type="text" name="name" size=8></td>
													<td><input type="submit" value="»" style="width:20"></td>
												</tr>
											</form>
										</table>

									</td>

								</tr>

							</table>

							</td>

						</tr>





						</table>





			</td>

			<td valign=top>

				<img src="maingame/pic/stop2.gif" border="0" alt="">

			</td>

		</tr>

		</table>

		<table cellpadding=0 cellspacing=0 width=158 align=right>

		<tr>

			<td width=126 background="maingame/pic/ssword.gif" height="47">



			</td>

			<td valign=top>&nbsp;



			</td>

		</tr>

		<tr>

			<td valign=top align=center>

						</td>

		</tr>

		</table>



	</td>


<td valign=top>

		<table cellpadding=5 cellspacing=1 bgcolor=95A7AA width=100% height=100%>
		<tr>
			<td bgcolor=F2F6F6 valign=top>
				<table cellspacing=1 bgcolor="95A7AA" width=98% align=center>
				<tr>
					<td bgcolor=DEE6DF class="t">
						<?php
							$a = $link_menutext[$load][$subload];
							if ($link_menutext[$load][$subload] == '')
								print $link[$load];
							else
								print $link[$load]." > ".$a;
						?>
					</td>
				</tr>
				</table>
				<br>
				<table cellspacing=1 width=98% align=center>
					<tr>
						<td>
							<?php
								if ($link_menutext[$load][$subload] == '')
									include("$link2[$load]/text.php");
								else
									include("$link2[$load]/text$subload.php");
							?>
						</td>
					</tr>
				</table></td>

			<td width=160 bgcolor="E7EEE5" valign=top>

				<table width=98% bgcolor=A5B2B5 cellpadding=1 cellspacing=1>

					<tr>
						<td bgcolor=E6E8DE class=t>Вход в игру</td>
					</tr>

				</table>
				<?php include("play/text.php"); ?>

				<table width=98% bgcolor=A5B2B5 cellpadding=1 cellspacing=1>
					<tr>
						<td bgcolor=E6E8DE class=t>Голосование</td>
					</tr>
				</table>
				<?php include('vote.php'); ?>
				<table width=98% bgcolor=A5B2B5 cellpadding=1 cellspacing=1>
					<tr>
						<td bgcolor=E6E8DE class=t>Статистика</td>
						<?php include('stats.php'); ?>
					</tr>
				</table>


			</td>

		</tr>



		</table>



	</td>



</tr>

</table>

<table><tr><td></td></tr></table>

<table width=780 align=center cellpadding=0 cellspacing=0>

<tr>

	<td>&nbsp;</td>

	<td width=610 >

		<table width=610 cellpadding=2 cellspacing=1 bgcolor="95A7AA">

			<tr>

				<td bgcolor="E7EEE5" align=right class="t2">

					<table width="100%" cellpadding=0 cellspacing=0><Tr>
					<td class=t2></td>
					<td align=right class=t2><a target="blank" href="http://shamaal-world.ru">Copyright &copy; 2003-<? print date("Y"); ?> by Shamaal World</a></td>
					</tr></table>

				</td>

			</tr>

		</table>

	</td>

</tr>

</table>
</body>
</html>

