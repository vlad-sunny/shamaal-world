<?
session_start();
header('Content-type: text/html; charset=win-1251');
if ( !session_is_registered("player")) {exit();}
$player_id = $player['id'];
$player_name = $player['name'];
$player_opt= $player['opt'];
$player_sex = $player['sex'];
$player_pass = $player['password'];
$block = $player['block'];
$onl = $player['online'];
$drnk = $player['drunk'];
$ban_chat = $player['ban_chat'];
$cur_time=time();
$player['afk'] = $cur_time;

echo '<html>
<head>
<meta content="text/html; charset=windows-1251" http-equiv="Content-Type">
</head>
';

if ($onl < $cur_time - 60)
	print "<script>alert('����� � �������� ��������.');</script>";
$tellto = 1;
Function checkletter($text)
{
	Global $drnk, $player;
	$k = 0;
	$newtext = '';
	For ($i=0;$i<=strlen($text);$i++)
	{
		$r = rand(1,40);
		if ( ($text[$i] == '-') || ($text[$i] == ' ') || ($text[$i] == '?') || ($text[$i] == chr(60)) )
			$k = 0;
		else
			$k++;

		if ( ($drnk == 0) || ($r <  38) || ($text[$i] == " "))
		{
			if (($drnk == 0) || ($r < 36))
				$newtext = $newtext.$text[$i];
			else
				$newtext = $newtext.strtoupper($text[$i]);
		}
		else
			if ($i > 7)
				$newtext .= "<font color=CC0000>?</font>";
			else
				$newtext = $newtext.$text[$i];

		if ($k > 30)
		{
			$newtext = $newtext.' ';
			$k = 0;
		}


		//print $drnk . "|";
		if ($drnk == 1)
		{

			if ($r ==  2)
				$newtext .= "<font color=CC0000>*��*</font>";


			$r = rand(1,250);
			if ($r == 5)
			{
				$time = date("H:i");
				$text2 = "&nbsp;�� ����� ����� ��������.";
				$jsptext = "top.add(\"$time\",\"\",\"$text2\",5,\"\");";
				$player['drunk'] = 0;
				print "<script>$jsptext</script>";
			}

		}
	}
	return $newtext;
}
Function emote($text)
{
	global $online_time,$player_id,$player_name,$result;
	$SQL="select room from sw_users where id=$player_id";
	$row_num=SQL_query_num($SQL);
	while ($row_num){
		$room=$row_num[0];
		$row_num=SQL_next_num();
	}
	if ($result)
	mysql_free_result($result);
	$text = htmlspecialchars("$text", ENT_QUOTES);
	$text = checkletter($text);
	$time = date("H:i");
	$text = "parent.add(\"$time\",\"$player_name\",\"** $text ** \",6,\"\");";
	print "<script>top.reset();$text</script>";
	$SQL="update sw_users SET mytext=CONCAT(mytext,'$text') where online > $online_time and id <> $player_id and room=$room  and npc=0";
	SQL_do($SQL);
}
Function prtext($text)
{

	global $addn,$online_time,$player_id,$player_name,$result;
	$SQL="select room from sw_users where id=$player_id";
	$row_num=SQL_query_num($SQL);
	while ($row_num){
		$room=$row_num[0];
		$row_num=SQL_next_num();
	}
	if ($result)
	mysql_free_result($result);
	$text = checkletter($text);
	$time = date("H:i");
	$text = "parent.add(\"$time\",\"$player_name\",\"* $text *\",8,\"\");";
	print "<script>top.reset();$text</script>";
	$SQL="update sw_users SET mytext=CONCAT(mytext,'$text') where online > $online_time and id <> $player_id and room=$room  and npc=0";
	SQL_do($SQL);

}

Function locprint($text)
{
	global $addn,$online_time,$player_id,$player_name,$result;
	$SQL="select room from sw_users where id=$player_id";
	$row_num=SQL_query_num($SQL);
	while ($row_num){
		$room=$row_num[0];
		$row_num=SQL_next_num();
	}
	if ($result)
	mysql_free_result($result);
	$text = htmlspecialchars("$text", ENT_QUOTES);
	if ($text == "������ !")
		$text = "<font color=red>������ !</font>";
	$text = checkletter($text);
	$time = date("H:i");
	$text = "parent.add(\"$time\",\"$player_name\",\"$text \",1,\"\",\"$addn\");";
	print "<script>top.reset();$text</script>";
	$SQL="update sw_users SET mytext=CONCAT(mytext,'$text') where online > $online_time and id <> $player_id and room=$room  and npc=0";
	SQL_do($SQL);
}
Function cityprint($text)
{
	global $addn,$online_time,$player_id,$player_name,$result;
	$SQL="select sw_users.city,sw_city.name from sw_city inner join sw_users on sw_city.id=sw_users.city where sw_users.id=$player_id";
	$row_num=SQL_query_num($SQL);
	while ($row_num){
		$city_id=$row_num[0];
		$city_name=$row_num[1];
		$row_num=SQL_next_num();
	}
	if ($result)
		mysql_free_result($result);
	if ($city_name == '')
		$city_id = 0;
	$text = htmlspecialchars("$text", ENT_QUOTES);
	$text = checkletter($text);
	$time = date("H:i");
	$text = "parent.add(\"$time\",\"$player_name\",\"$text \",2,\"$city_name\",\"$addn\");";
	$m = "";
	print "<script>top.reset();$text</script>";
	if ($city_id == 1)
		$m = "OR (admin>0 AND admin<5 AND id <> $player_id )";
	$SQL="update sw_users SET mytext=CONCAT(mytext,'$text') where city=$city_id and online > $online_time and id <> $player_id and npc=0 $m";
	SQL_do($SQL);

}
Function magpring($text)
{
	global $online_time,$player_id,$player_name,$player_opt,$result;
	if ($player_opt & 8 )
	{
		$SQL="select sw_users.city,sw_city.name from sw_city inner join sw_users on sw_city.id=sw_users.city where sw_users.id=$player_id";
		$row_num=SQL_query_num($SQL);
		while ($row_num){
			$c_id=$row_num[0];
			$city_name=$row_num[1];
			$row_num=SQL_next_num();
		}
		if ($result)
			mysql_free_result($result);
		if ($city_name == "")
			$city_name = "��� ������";
		$text = htmlspecialchars("$text", ENT_QUOTES);
		$text = checkletter($text);
		$time = date("H:i");
		$text = "parent.add(\"$time\",\"$player_name\",\"$text \",13,\"����� => $city_name\");";
		//print "<script>alert('�������� ����� ��������.');</script>";
		print "<script>top.reset();$text</script>";
		$SQL="update sw_users SET mytext=CONCAT(mytext,'$text') where online > $online_time and id <> $player_id and npc=0 and options & 8";
		SQL_do($SQL);
	}
	else
		print "<script>alert('�������� ����� ����� ����� ����� � ���� ����.')</script>";;

}

Function clanprint($text)
{
	global $addn,$online_time,$player_id,$player_name,$result;
	$SQL="select clan from sw_users where id=$player_id";
	$row_num=SQL_query_num($SQL);
	while ($row_num){
		$city_id=$row_num[0];
		$row_num=SQL_next_num();
	}
	if ($result)
		mysql_free_result($result);
	if ($city_id > 0)
	{
		$text = htmlspecialchars("$text", ENT_QUOTES);
		$text = checkletter($text);
		$time = date("H:i");
		$text = "parent.add(\"$time\",\"$player_name\",\"$text \",7,\"����\",\"$addn\");";
		print "<script>top.reset();$text</script>";
		$SQL="update sw_users SET mytext=CONCAT(mytext,'$text') where online > $online_time and id <> $player_id and clan=$city_id  and npc=0";
		SQL_do($SQL);
	}

}
Function merprint($text)
{
	global $online_time,$player_id,$player_name,$result;
	$SQL="select city_rank,opt3,sw_position.city from sw_users left join sw_position on sw_users.city_rank=sw_position.id where sw_users.id=$player_id";
	$row_num=SQL_query_num($SQL);
	while ($row_num){
		$city_rank=$row_num[0];
		$opt3=$row_num[1];
		$s3=$row_num[2];
		if ($s3 == 0)
			$opt3 = 0;
		$row_num=SQL_next_num();
	}
	if ($result)
		mysql_free_result($result);

	if (($city_rank == 1) || ($opt3 == 1))
	{
		$text = htmlspecialchars("$text", ENT_QUOTES);
		$text = checkletter($text);
		$time = date("H:i");
		$text = "parent.add(\"$time\",\"$player_name\",\"$text \",9,\"���������� �������\");";
		print "<script>top.reset();$text</script>";
		$pt = '';
		$SQL="select id from sw_position where city=1 and opt3=1";
		$row_num=SQL_query_num($SQL);
		while ($row_num){
			$cid=$row_num[0];
			$pt .= "or city_rank=$cid";
			$row_num=SQL_next_num();
		}
		if ($result)
			mysql_free_result($result);
		$SQL="update sw_users SET mytext=CONCAT(mytext,'$text') where online > $online_time and id <> $player_id and (city_rank=1 $pt)";
		SQL_do($SQL);
	}
}
Function mygodprint($text,$who)
{
	global $online_time,$player_id,$player_name,$result;
	$SQL="select admin from sw_users where id=$player_id";
	$row_num=SQL_query_num($SQL);
	while ($row_num){
		$admin=$row_num[0];
		$row_num=SQL_next_num();
	}
	if ($result)
		mysql_free_result($result);
	if ($admin== 1)
	{
		$SQL="select id,name from sw_users where upper(up_name)=upper('$who')";
		$row_num=SQL_query_num($SQL);
		while ($row_num){
			$id=$row_num[0];
			$name=$row_num[1];
			$row_num=SQL_next_num();
		}
		if ($result)
			mysql_free_result($result);
		if ($name <> "")
		{
			$text = checkletter($text);
			$time = date("H:i");
			$text2 = $text;
			$text = "parent.add(\"$time\",\"\",\"$text\",11,\"$who �� ����\");";
			print "<script>top.reset();$text</script>";
			$text = "parent.add(\"$time\",\"\",\"$text2\",11,\"��� �� ����\");";
			if ($id <> $player_id)
			{
				$SQL="update sw_users SET mytext=CONCAT(mytext,'$text') where online  > $online_time and id = $id  and npc=0";
				SQL_do($SQL);
			}
		}
	}
}
Function godprint($text)
{
	global $online_time,$player_id,$player_name;

	$text = htmlspecialchars("$text", ENT_QUOTES);
	$text = checkletter($text);
	$time = date("H:i:s");
	$mtext = "parent.add(\"$time\",\"$player_name\",\"$text \",10,\"���\");";
	print "<script>top.reset();$mtext</script>";
	$text = "parent.add(\"$time\",\"$player_name\",\"$text \",12,\"����\");";
	$SQL="update sw_users SET mytext=CONCAT(mytext,'$text') where online > $online_time and admin=1";
	SQL_do($SQL);
}
Function partyprint($text)
{
	global $addn,$online_time,$player_id,$player_name,$result;
	$SQL="select party from sw_users where id=$player_id";
	$row_num=SQL_query_num($SQL);
	while ($row_num){
		$party_id=$row_num[0];
		$row_num=SQL_next_num();
	}
	if ($result)
		mysql_free_result($result);
	if ($party_id > 0)
	{
		$text = htmlspecialchars("$text", ENT_QUOTES);
		$text = checkletter($text);
		$time = date("H:i");
		$text = "parent.add(\"$time\",\"$player_name\",\"$text \",3,\"������\",\"$addn\");";
		print "<script>top.reset();$text</script>";
		if ($party_id > 0)
		{
			$SQL="update sw_users SET mytext=CONCAT(mytext,'$text') where online > $online_time and id <> $player_id and party=$party_id  and npc=0";
			SQL_do($SQL);
		}
	}

}
Function privateprint($text,$who)
{
	global $online_time,$player_id,$player_name,$result;
	//$who = strtoupper($who);
	$SQL="select id,name from sw_users where  upper(up_name)=upper('$who')";
	$row_num=SQL_query_num($SQL);
	while ($row_num){
		$id=$row_num[0];
		$name=$row_num[1];
		$row_num=SQL_next_num();
	}
	if ($result)
		mysql_free_result($result);
	if ($name <> "")
	{
		$text = htmlspecialchars("$text", ENT_QUOTES);
		$text = checkletter($text);
		$time = date("H:i");
		$text = "parent.add(\"$time\",\"$player_name\",\"$text\",4,\"$name\");";
		print "<script>top.reset();$text</script>";

		if ($id <> $player_id)
		{
			$SQL="update sw_users SET mytext=CONCAT(mytext,'$text') where online  > $online_time and id = $id  and npc=0";
			SQL_do($SQL);

		}
	}

}
function noChat()
{
	$text = "<b>�� ���� �������, ���������.</b>";
	$time = date("H:i");
	$text = "<script>parent.add(\"$time\",\"$player_name\",\"** $text ** \",6,\"\");top.reset();</script>";
	print "$text";
}

$cur_time = time();
$online_time = $cur_time-40;
include('../mysqlconfig.php');
$found = 0;
$SQL="select ban from sw_users where id=$player_id";
$row_num=SQL_query_num($SQL);
while ($row_num){
  	$found = 1;
	$ban=$row_num[0];
	$row_num=SQL_next_num();
}
if ($result)
	mysql_free_result($result);
if ($found == 0 || $ban > $cur_time)
	exit();


if ($load == 'block')
{
	$kick_place[1] = '������';
	$kick_place[2] = '����';
	$kick_place[3] = '����';
	$kick_place[4] = '����';
	if ( ($kick_place[$id] <> "") && ($block <> $id) )
	{
		$player['block'] = $id;
		$SQL="update sw_users SET block=$id where id=$player_id";
		SQL_do($SQL);
		$time = date("H:i");
		print "<script>top.setblock($block,$id);top.add('$time','','* ����� ����� �����: <b>$kick_place[$id] </b> *',6,'');</script>";
	}
}
else
if ((isset($ebar)) && ($ebar > ''))
	if (strlen($ebar) < 251)
	{
		$ebar = str_replace("'","`",$ebar);
		$ebar = str_replace('"',"`",$ebar);
		$func = substr($ebar, 0,1);
		if ($func == '/')
		{
			if (strpos($ebar, chr(160)) >-1)
			{
				$sym = chr(160);
			}
			else
				$sym = " ";
			$comm = substr($ebar, 0, strpos($ebar, $sym));
			$param[0] = substr($ebar, strpos($ebar, $sym) + 1, strlen($ebar)-strpos($ebar, $sym));
		}
		if (($comm == "/�����") || (strtoupper($comm) == "/CITY"))
		{
			$ebar = $param[0];
			$tellto = 2;
		}
		/*if (($ebar == "/������") || ($ebar == "!"))
		{
			$SQL="select city,room,target from sw_users where id=$player_id";
			$row_num=SQL_query_num($SQL);
			while ($row_num){
				$city_id=$row_num[0];
				$player_room=$row_num[1];
				$target=$row_num[2];
				$row_num=SQL_next_num();
			}
			if ($result)
				mysql_free_result($result);
			if ($city_id != 0)
			{
			$itid = 0;
			$SQL="select id from sw_users where madecity=$city_id and npc=1 and lastcity<$cur_time-120 limit 0,1";
			$row_num=SQL_query_num($SQL);
			while ($row_num){
				$itid=$row_num[0];
				$row_num=SQL_next_num();
			}
			if ($result)
				mysql_free_result($result);

			if ($itid > 0)
			{
				$it_city = -1;
				$it_npc = -1;
				$SQL="select city,npc,room from sw_users where id=$target and online>$online_time";
				$row_num=SQL_query_num($SQL);
				while ($row_num){
					$it_city=$row_num[0];
					$it_npc=$row_num[1];
					$it_room=$row_num[2];
					$row_num=SQL_next_num();
				}
				if ($result)
					mysql_free_result($result);

				if ( ($it_city >= 0) && ($it_city <> $city_id) && ($it_npc == 0) && ($it_room == $player_room))
				{
					$its_city = 0;
					$SQL="select city from sw_location inner join sw_map on sw_map.location=sw_location.id where sw_map.id=$player_room";
					$row_num=SQL_query_num($SQL);
					while ($row_num){
						$its_city=$row_num[0];
						$row_num=SQL_next_num();
					}
					if ($result)
						mysql_free_result($result);
					if ($its_city == $city_id)
					{
						$ebar = "������ !";
						$tellto = 1;
						$SQL="update sw_users set lastcity=$cur_time,room=$player_room,target=$target where id=$itid and madecity=$city_id and npc=1";
//						print "$SQL";
						SQL_do($SQL);
					}
					else
					{
						$ebar = '';
						$time = date("H:i");
						$text = "��� ���� ����� ������� ������ ���������� ���������� �������� ������.";
						$text = "parent.add(\"$time\",\"$player_name\",\"$text\",6,\"$name\");";
						print "<script>$text</script>";
					}
				}
				else
				{
					$ebar = '';
					$time = date("H:i");
					$text = "����� � ������� �� ������� ������ ������.";
					$text = "parent.add(\"$time\",\"$player_name\",\"$text\",6,\"$name\");";
					print "<script>$text</script>";
				}
			}
			else
				{
					$ebar = '';
					$time = date("H:i");
					if ($city_id > 0)
						$text = "��� ��������� ������ ������ ������ ������ � �� ����� ��� ������.";
					else
						$text = "�� �� ������ �������� ������, ��� ��� �� �������� �� � ����� �� �������.";
					$text = "parent.add(\"$time\",\"$player_name\",\"$text\",6,\"$name\");";
					print "<script>$text</script>";
				}
			}
		}*/
		if (($comm == "/������") || (strtoupper($comm) == "/PARTY"))
		{
			$ebar = $param[0];
			$tellto = 3;
		}
		if (($comm == "/����") || (strtoupper($comm) == "/CLAN"))
		{
			$ebar = $param[0];
			$tellto = 4;
		}
		if (($comm == "/������") || (strtoupper($comm) == "/PRIVATE"))
		{
			$ebar = $param[0];
			$comm = substr($ebar, 0, strpos($ebar, " "));
			$param[0] = substr($ebar, strpos($ebar, " ") + 1, strlen($ebar)-strpos($ebar, " "));
			$ebar = $param[0];
			$tellto = 5;
		}
		if (strtoupper($ebar) == "/CUR")
		{

			$ebar = "";
			$tellto = 0;
			$time = date("H:i");
			$SQL="select sw_map.name,sw_map.id from sw_map inner join sw_users on sw_users.room=sw_map.id where sw_users.id=$player_id";
			$row_num=SQL_query_num($SQL);
			while ($row_num){
				$n_name=$row_num[0];
				$n_id=$row_num[1];
				$row_num=SQL_next_num();
			}
			if ($result)
				mysql_free_result($result);
			$text = "<b>�������:</b> $n_name. <b>�����:</b> $n_id";
			$text = "parent.add(\"$time\",\"\",\"$text\",7,\"������\");";
			print "<script>top.reset();$text</script>";
		}

		if (strtoupper($comm) == "/TELEPORT")
		{

			$tellto = 0;
			$time = date("H:i");
			$ebar = $param[0];
			$a = strpos($ebar, " ");
			$param[1] = substr($ebar, strpos($ebar, " ") + 1, strlen($ebar)-strpos($ebar, " "));
			if ($a > 0)
				$param[1] = substr($ebar, strpos($ebar, " ") + 1, strlen($ebar)-strpos($ebar, " "));
			$param[0] = (integer) $param[0];
			$param[0] = round($param[0]);
			$ebar = "";
			if ($param[0] > 0)
			{
				if ($a > 0)
					$where = "upper(up_name)=upper('$param[1]');";
				else
					$where = "sw_users.id=$player_id";
				$player_id = (integer) $player_id;
				$n_admin = -1;
				$SQL="select admin from sw_users where id=$player_id and decodepwd='$player_pass'";
				$row_num=SQL_query_num($SQL);
				while ($row_num){
					$n_admin=$row_num[0];
					$row_num=SQL_next_num();
				}
				if ($result)
					mysql_free_result($result);


				$SQL="select sw_map.name,sw_map.id from sw_map right join sw_users on sw_users.room=sw_map.id where $where";
				$row_num=SQL_query_num($SQL);
				while ($row_num){
					$n_name=$row_num[0];
					$n_id=$row_num[1];

					$row_num=SQL_next_num();
				}
				if ($result)
					mysql_free_result($result);
				//print "$n_admin";
				if (($n_admin == 1) || ($n_admin == 4))
 				{

					if ($a > 0)
						$text = "<b>�������� � ������� �����: </b>$param[0] ($param[1])";
					else
						$text = "<b>�������� � ������� �����: </b>$param[0]";
					$SQL="update sw_users set admin_text=CONCAT(admin_text,'$time [$player_name]: $text<br>') where id=$player_id";
					SQL_do($SQL);


					$text = "parent.add(\"$time\",\"\",\"$text\",7,\"������\");";
					print "<script>top.reset();$text</script>";
					$SQL="update sw_users set room=$param[0] where $where";
					SQL_do($SQL);
				}
			}
		}
		if (strtoupper($comm) == "/TESTBOT")
		{

			$tellto = 0;
			$time = date("H:i");
			$ebar = $param[0];
			$a = strpos($ebar, " ");
			$param[1] = substr($ebar, strpos($ebar, " ") + 1, strlen($ebar)-strpos($ebar, " "));

			$ebar = "";
			if ($param[0]  != "")
			{
				$param[0] = mysql_real_escape_string($param[0]);
				$where = "upper(up_name)=upper('$param[0]');";

				$player_id = (integer) $player_id;
				$n_admin = -1;
				$SQL="select admin from sw_users where id=$player_id and decodepwd='$player_pass'";
				$row_num=SQL_query_num($SQL);
				while ($row_num){
					$n_admin=$row_num[0];
					$row_num=SQL_next_num();
				}
				if ($result)
					mysql_free_result($result);

				if (($n_admin == 1) || ($n_admin == 4))
 				{
					$SQL="select id, level from sw_users where $where";
					$row_num=SQL_query_num($SQL);
					while ($row_num){
						$n_id=$row_num[0];
						$n_level=$row_num[1];
						$row_num=SQL_next_num();
					}
					if ($result)
						mysql_free_result($result);

					if(isset($n_id))
					{
						$text = "<b>�������� �� ��� ������������:</b> $param[0] .";

						$SQL="update sw_users set admin_text=CONCAT(admin_text,'$time [$player_name]: $text<br>') where id=$n_id";
						SQL_do($SQL);
						if($n_level<=9)
						{
							$SQL="update sw_users set test_bot=room, room=5181 where id=$n_id";
							SQL_do($SQL);
						}
						else
						{
							$SQL="update sw_users set test_bot=room, room=5180 where id=$n_id";
							SQL_do($SQL);
						}
					}
					else
						$text = "<b>������������ �� ������.</b>";


					$text = "parent.add(\"$time\",\"\",\"$text\",7,\"������\");";
					print "<script>top.reset();$text</script>";

				}
			}
		}
		if (strtoupper($comm) == "/TELEPORTTO")
		{

			$tellto = 0;
			$time = date("H:i");
			$ebar = $param[0];
			$a = strpos($ebar, " ");
			$param[1] = substr($ebar, strpos($ebar, " ") + 1, strlen($ebar)-strpos($ebar, " "));

			$ebar = "";
			if ($param[0]  != "")
			{
				$param[0] = mysql_real_escape_string($param[0]);
				$where = "upper(up_name)=upper('$param[0]');";

				$player_id = (integer) $player_id;
				$n_admin = -1;
				$SQL="select admin from sw_users where id=$player_id and decodepwd='$player_pass'";
				$row_num=SQL_query_num($SQL);
				while ($row_num){
					$n_admin=$row_num[0];
					$row_num=SQL_next_num();
				}
				if ($result)
					mysql_free_result($result);

				//print "$n_admin";
				if (($n_admin == 1) || ($n_admin == 4))
 				{

					$SQL="select sw_map.name,sw_map.id from sw_map right join sw_users on sw_users.room=sw_map.id where $where";
					$row_num=SQL_query_num($SQL);
					while ($row_num){
						$n_name=$row_num[0];
						$n_id=$row_num[1];

						$row_num=SQL_next_num();
					}
					if ($result)
						mysql_free_result($result);


					if(isset($n_id))
					{
						$text = "<b>�������� � ������������:</b> $param[0] <b>, � ������� </b>$n_name<b> �����:  </b>($n_id)";

						$SQL="update sw_users set admin_text=CONCAT(admin_text,'$time [$player_name]: $text<br>') where id=$player_id";
						SQL_do($SQL);
						$SQL="update sw_users set room=$n_id where id=$player_id";
						SQL_do($SQL);
					}
					else
						$text = "<b>������������ �� ������.</b>";


					$text = "parent.add(\"$time\",\"\",\"$text\",7,\"������\");";
					print "<script>top.reset();$text</script>";

				}
			}
		}
		if ($comm == "/������")
		{
			$ebar = $param[0];
			$comm = substr($ebar, 0, strpos($ebar, " "));
			$param[0] = substr($ebar, strpos($ebar, " ") + 1, strlen($ebar)-strpos($ebar, " "));
			$ebar = $param[0];
			$tellto = 8;
		}
		if ($comm == "/���")
		{
			$ebar = $param[0];
			$tellto = 7;
		}
		if (($ebar == "/�����") || ($ebar == "/�����")|| ($ebar == "/time")|| ($ebar == "/Time"))
		{
			$timename[11]= "�������"; $timename[12]= "�������";
			$timename[13]= "����";$timename[14]= "����";$timename[15]= "����";$timename[16]= "����";
			$timename[17]= "�����"; $timename[18]= "�����";
			$timename[19]= "�����"; $timename[20]= "�����";
			$timename[21]= "�������"; $timename[22]= "�������";
			$timename[23]= "�������"; $timename[0]= "�������";
			$timename[1]= "����"; $timename[2]= "����";
			$timename[3]= "����� ������� ���"; $timename[4]= "����� ������� ���";
			$timename[5]= "������"; $timename[6]= "������";
			$timename[7]= "������ ����"; $timename[8]= "������ ����";
			$timename[9]= "����"; $timename[10]= "����";
			$ebar = "";
			$time = date("H:i");
			$file = fopen("weather.dat","r");
			$H = fgets($file,10);
			$H = str_replace(chr(10),"",$H);
			$H = str_replace(chr(13),"",$H);
			$id = fgets($file,10);
			fclose($file);
			$SQL="select smalltext from sw_weather where id=$id";
			$row_num=SQL_query_num($SQL);
			while ($row_num){
				$text=$row_num[0];
				$row_num=SQL_next_num();
			}
			if ($result)
				mysql_free_result($result);
			$text = "<b>* $timename[$H]. $text * </b>";
			$text = "parent.add(\"$time\",\"\",\"$text\",6,\"\");";
			print "<script>top.reset();$text</script>";
		}
		if (($comm == "/����������") || ($comm == "/����������"))
		{
			$ebar = $param[0];
			$tellto = 6;
		}
		if ($comm == "/�����")
		{
			$ebar = $param[0];
			$tellto = 9;
		}
		if ($ebar == "/croom")
		{
			$admin = -1;
			include('broom1.php');
			$ebar = '';
		}

		$param[0] = substr($ebar, strpos($ebar, " ") + 1, strlen($ebar)-strpos($ebar, " "));

		$pos1 = strpos(" ".$ebar,"/*");
		$pos2 = strpos(" ".$ebar,"*/");

		if (($pos1 > 0) && ($pos1 < $pos2))
		{

			$emote = substr($ebar, $pos1+1, $pos2 - $pos1-2);
			$ebar = str_replace("/*$emote*/","",$ebar);
			$emote = htmlspecialchars($emote, ENT_QUOTES);
			$addn = "$emote";
		}
		else
			$addn = "";

		if (strpos(" ".$ebar, "/me") > 0)
		{
			$tellto = 10;
			$ebar = str_replace("/me",$player_name,$ebar);
		}

		if ($ebar <> "")
		{
			if ($tellto == 1)
			{
				if ( ($ebar == "=)") || ($ebar == ":)") || ($ebar == "-)"))
				{
					if ($player_sex == 1)
						emote("$player_name ���������.");
					else
						emote("$player_name ����������.");
				}
				else if ( ($ebar == "=(") || ($ebar == ":(") || ($ebar == "-("))
				{
					if ($player_sex == 1)
						emote("$player_name �������� ����������.");
					else
						emote("$player_name �������� ����������.");
				}
				else if ( ($ebar == ":D") || ($ebar == ":d"))
				{
					if ($player_sex == 1)
						emote("$player_name �������� ���������.");
					else
						emote("$player_name �������� ���������.");
				}
				else if ( ($ebar == ":P") || ($ebar == ":p"))
				{
					if ($player_sex == 1)
						emote("$player_name ������� ����.");
					else
						emote("$player_name �������� ����.");
				}
				else if ( ($ebar == ":o") || ($ebar == ":0") || ($ebar == ":O") || ($ebar == ":�")|| ($ebar == ":�"))
						emote("$player_name �������� ������� �� ����������.");
				else if ( ($ebar == "��") || ( $ebar == "���") || ($ebar == "���")|| ( $ebar == "���") || ($ebar == "���")|| ($ebar == "��") )
						emote("$player_name ������������� ������ �������.");
				else if ( ( $ebar == "���") || ($ebar == "���") || ($ebar == "���"))
						emote("$player_name ������������ ������ �������.");
				else if ( ( $ebar == "������") || ($ebar == "������") )
						emote("$player_name ������������� ����� �����.");
				else
					locprint($ebar);
			}
			if(($tellto == 2 || $tellto == 3 || $tellto == 4 || $tellto == 6 || $tellto == 7 || $tellto == 9 || $tellto == 8) &&$ban_chat > time())
			{
				noChat();
			}
			else
			{
				if ($tellto == 2)
					cityprint($ebar);
				if ($tellto == 3)
					partyprint($ebar);
				if ($tellto == 4)
					clanprint($ebar);
				if ($tellto == 6)
					merprint($ebar);
				if ($tellto == 7)
					godprint($ebar);
				if ($tellto == 9)
					magpring($ebar);
				if ($tellto == 8)
					if (($comm <> "") && ($ebar <> ""))
						mygodprint($ebar,$comm);
			}

			if ($tellto == 5)
				if (($comm <> "") && ($ebar <> ""))
					privateprint($ebar,$comm);
			if ($tellto == 10)
				emote($ebar);
		}
	}
		print "</html>";
SQL_disconnect();
?>