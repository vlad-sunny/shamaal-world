<?
session_start();
header('Content-type: text/html; charset=win-1251');

?>
<html>
<head>
	<meta name="keywords" content="������ ����, online game, ��� ����, RPG game, �������, MMPROG, �����, �����, Character, MUD, ���">
	<META name="description" content="������ ��� ���� ���������� � ��������, Online rpg game, MUD, ���">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"> 
	<title>Shamaal World</title>
</head>
<LINK REL=STYLESHEET TYPE="TEXT/CSS" HREF="site.css" TITLE="STYLE">
<?
//print "<table width=100% height=500><tr><td><div align=center>�������� ������.<br><a href=http://forum.swonline.ru/forum/viewtopic.php?t=7286>�����</a></div></td></tr></table>";
//exit();
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
	global $_SERVER;
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



include('mysqlconfig.php');
include("maingame/racecfg.php");
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
$ip = GetIP();
for ($i = 1;$i <= 4;$i++)
{
	$a = strpos("|_$ip ","_$block_ip[$i]");
	if ($a == 1)
	{
		print "<table align=center height=500 width=80%><tr><td align=center>���� �������� �������������.</td></tr></table>";
		exit();
	}
}
?>

<body>
<table cellpadding=0 cellspacing=0 width=780 height=113 align="center" >
<tr>
	<td background="maingame/pic/stop.gif" width=160></td>
	<td align=center>
		<table cellpadding=0 cellspacing=1 bgcolor=768E92 width="468" height=60>
		<tr>
			<td bgcolor=F2F6F6 align=center>
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
			<td width=140 style="vertical-align:top">
				<table cellspacing=1 cellpadding=2 bgcolor=92A7AB height=200 width=126 align=right>
						<?
						if (!isset($load))
						$load = 1;
						if (!isset($subload))
						$subload = 1;
						
						$load = (integer) $load;
						$subload = (integer) $subload;
						$link = array();
						$link2 = array();						
						$link[1] = "�������";
						$link[2] = "�����������";
						$link[4] = "������ �������";
						$link_url[5] = "http://shamaal.3dn.ru/ ";
						$link[5] = "�����";
						$link[6] = "����������";
						$link_menu[2] = 3;
						$link_menutext[2][1] = "�����������";
						$link_menutext[2][2] = "������ ������?";
						$link_menutext[2][3] = "�������� ������";
						$link_menu[6] = 4;
						$link_menutext[6][1] = "������ �������";
						$link_menutext[6][2] = "��� �����";
						$link_menutext[6][3] = "��� �������";
						$link_menutext[6][4] = "��� ������";
						
						
						$link[8] = "����������";
						$link_menu[8] = 4;
						$link_menutext[8][1] = "����������";
						$link_menutext[8][2] = "FAQ";
						$link_menutext_url[8][3] = "/rule.php";
						$link_menutext[8][3] = "�������";
						$link_menutext[8][4] = "������������";
						
						$link2[1] = "news";
						$link2[2] = "reg";
						$link2[4] = "donate";
						$link2[5] = "forum";
						$link2[6] = "status";
						
						$link2[8] = "help";
						for ( $i=1;$i<=8;$i++ )
						{
							if ($link[$i] <> "")
							{
								if ($i <> $load)
								{
									if ($link_url[$i] == '')
										print "<tr><td bgcolor=E7EEE5 valign=top height=15 onmouseover='this.bgColor=\"#FFFFCC\"' onmouseout='this.bgColor=\"#E7EEE5\"' style='cursor:hand'>&nbsp;<a href=main.php?load=$i class=menus>� $link[$i]</a></td></tr>";
									else
										print "<tr><td bgcolor=E7EEE5 valign=top height=15 onmouseover='this.bgColor=\"#FFFFCC\"' onmouseout='this.bgColor=\"#E7EEE5\"' style='cursor:hand'>&nbsp;<a href='$link_url[$i]' class=menus target=_blank>� $link[$i]</a></td></tr>";
								}
								else
								{
									print "<tr><td bgcolor=F5F8F0 valign=top height=15 onmouseover='this.bgColor=\"#FFFFCC\"' onmouseout='this.bgColor=\"#F5F8F0\"' style='cursor:hand'>&nbsp;<a href=main.php?load=$i class=menus>� $link[$i]</a></td></tr>";
									for ($k = 1;$k<=$link_menu[$i];$k++)
									{
										$a =  $link_menutext[$i][$k];
										if ($k == $subload)
											print "<tr><td bgcolor=ECF0ED valign=top height=15 onmouseover='this.bgColor=\"#FFFFCC\"' onmouseout='this.bgColor=\"#ECF0ED\"' style='cursor:hand' align=right><table cellpadding=0 cellspacing=0 width=88%><tr><td><a href=main.php?load=$i&subload=$k class=menusmall>$a</a></td></tr></table></td></tr>";
										else
											{
												$p = $link_menutext_url[$i][$k];
												if ($link_menutext_url[$i][$k] == '')
													print "<tr><td bgcolor=CDD6CE valign=top height=15 onmouseover='this.bgColor=\"#FFFFCC\"' onmouseout='this.bgColor=\"#CDD6CE\"' style='cursor:hand' align=right><table cellpadding=0 cellspacing=0 width=88%><tr><td><a href=main.php?load=$i&subload=$k class=menusmall>$a</a></td></tr></table></td></tr>";
												else
													print "<tr><td bgcolor=CDD6CE valign=top height=15 onmouseover='this.bgColor=\"#FFFFCC\"' onmouseout='this.bgColor=\"#CDD6CE\"' style='cursor:hand' align=right><table cellpadding=0 cellspacing=0 width=88%><tr><td><a href=$p class=menusmall target=_blank>$a</a></td></tr></table></td></tr>";
											}
									}
									
								}
							}
						}
							
						?>
						
						
						<tr>
						    <td bgcolor=DEE6DF valign=middle align=center height=120>
							<br>
							<table width=98% bgcolor=A5B2B5 cellpadding=1 cellspacing=1>
								<tr>
									<td bgcolor=E6E8DE class=t><font class=small>����� ���������</font></td>
								</tr>
								<tr>
									<td align=center bgcolor=EFF3E6>
										<table cellpadding=1 cellspacing=0><form action="fullinfo.php" method="post" target="_blank"><tr><td class=small>���:</td><td><input type="text" name="name" size=8></td><td><input type="submit" value="�" style="width:20"></td></tr></form></table>
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
			<td valign=top>
				&nbsp;
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
					<td bgcolor=DEE6DF class="t"><?
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
					<td><?
					if ($link_menutext[$load][$subload] == '')
						include("$link2[$load]/text.php");
					else
						include("$link2[$load]/text$subload.php");
					?>
					</td>
				</tr>
				</table>

			</td>
			<td width=160 bgcolor="E7EEE5" valign=top>
				<table width=98% bgcolor=A5B2B5 cellpadding=1 cellspacing=1>
					<tr>
						<td bgcolor=E6E8DE class=t>���� � ����</td>
						
					</tr>
				</table>
				<? 

				if ((isset($tlogin)) && ($server == 1))
				{


					$SQL="select clan,clan_rank from sw_users where upper(up_login)=upper('$tlogin') and npc=0";
					$row_num=SQL_query_num($SQL);
					while ($row_num){
						$cl=$row_num[0];
						$clr=$row_num[1];
						$row_num=SQL_next_num();
					}
					if ($result)
					mysql_free_result($result);
					if (($cl > 0))
						$server = 0;
				}
//print "select clan,clan_rank from sw_users where upper(up_login)=upper('$tlogin') and npc=0";

				if ($server == 1)
				{

					//if ((isset($tlogin)) && (isset($tpassword)))
					//	include("http://195.131.2.53/text.php?tlogin=$tlogin&tpassword=$tpassword&load=$load&PHPSESSID=$PHPSESSID&pid=$ip");
					//else
					//	include("http://195.131.2.53/text.php?load=$load&pid=$ip");
				}
				else
					include("play/text.php");
				
				?>
				<table width=98% bgcolor=A5B2B5 cellpadding=1 cellspacing=1>
					<tr>
						<td bgcolor=E6E8DE class=t>�����������</td>
					</tr>
				</table>
				<?include('vote.php');?>
				<table width=98% bgcolor=A5B2B5 cellpadding=1 cellspacing=1>
					<tr>
						<td bgcolor=E6E8DE class=t>����������</td>
						<?include('stats.php');?>
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
					<table width="100%" cellpadding=0 cellspacing=0><Tr><td class=t2>��������� ������ ������� <a href=http://www.mtrx.ru target=_blank><b>www.mtrx.ru</b></a>
					</td><td align=right class=t2>Copyright � 2003-04 by Shamaal World</td></tr></table>
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>






</body>
</html>
<?	
SQL_disconnect();?>