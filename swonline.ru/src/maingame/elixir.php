<?
max_parametr($level,$race,$con,$wis);
$cur_time=time();
$t[1] = "";
$t[0] = "�";
$t_el[1] = "��";
$t_el[0] = "��";
$t_sa[1] = "��";
$t_sa[0] = "���";
$t_emu[1] = "���";
$t_emu[0] = "��";
$dont_delete = true;
$t_la[1] = "";
$t_la[0] = "��";

$t_en[1] = "��";
$t_en[0] = "��";

print "<script>";
if ($obj_name == "��������")
{
	
	$ran = round($player_max_hp * 0.10) + rand(0,round($player_max_hp * 0.03));
	$newhp = $chp + $ran;
	$time = date("H:i");
	$text = "[<b>$player_name</b>, ����� <font class=dmg>+$ran</font>]&nbsp;<b>$player_name </b>�����$t[$sex] ������� ��������.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	
	if ($newhp > $player_max_hp)
		$newhp = $player_max_hp;
	print "$jsptext top.sh($newhp,$player_max_hp);top.drbal($btime,$btime);";
	if ($newhp <> $chp)
	{
		$chp_percent = $player_max_hp / $newhp*100;
		$SQL="update sw_users SET chp=$newhp,chp_percent=$chp_percent where id = $player_id";
		SQL_do($SQL);
	}
	
}
else if ($obj_name == "����� ������")
{
	
	$ran = round($player_max_hp * 0.11) + rand(0,round($player_max_hp * 0.03));
	$newhp = $chp + $ran;
	$time = date("H:i");
	$text = "[<b>$player_name</b>, ����� <font class=dmg>+$ran</font>]&nbsp;<b>$player_name </b>�����$t[$sex] ����� ������.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	
	if ($newhp > $player_max_hp)
		$newhp = $player_max_hp;
	print "$jsptext top.sh($newhp,$player_max_hp);top.drbal($btime,$btime);";
	if ($newhp <> $chp)
	{
		$chp_percent = $player_max_hp / $newhp*100;
		$SQL="update sw_users SET chp=$newhp,chp_percent=$chp_percent where id = $player_id";
		SQL_do($SQL);
	}
	
}

else if ($obj_name == "��������������")
{
	$ran = round($player_max_hp * 0.16) + rand(0,round($player_max_hp * 0.04));
	$newhp = $chp + $ran;
	$time = date("H:i");
	$text = "[<b>$player_name</b>, ����� <font class=dmg>+$ran</font>]&nbsp;<b>$player_name </b>�����$t[$sex] ������� ��������������.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	
	if ($newhp > $player_max_hp)	
		$newhp = $player_max_hp;
	print "$jsptext top.sh($newhp,$player_max_hp);top.drbal($btime,$btime);";
	if ($newhp <> $chp)
	{
		$chp_percent = $player_max_hp / $newhp*100;
		$SQL="update sw_users SET chp=$newhp,chp_percent=$chp_percent where id = $player_id";
		SQL_do($SQL);
	}
	
}
else if ($obj_name == "�������")
{
	$ran = round($player_max_mana * 0.1) + rand(0,round($player_max_mana * 0.05));
	$newmana = $cmana + $ran;
	$time = date("H:i");
	$text = "[<b>$player_name</b>, ������� <font class=mana>+$ran</font>]&nbsp;<b>$player_name </b>�����$t[$sex] ������� �������.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	
	if ($newmana > $player_max_mana)
		$newmana = $player_max_mana;
	print "$jsptext top.sm($newmana,$player_max_mana);top.drbal($btime,$btime);";
	if ($newmana <> $cmana)
	{
		$SQL="update sw_users SET cmana=$newmana where id = $player_id";
		SQL_do($SQL);
	}
	
}
else if ($obj_name == "��������")
{
	$time = date("H:i");
	$text = "[<b>$player_name</b>]&nbsp;<b>$player_name </b>�����$t[$sex] ������� ��������.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); top.delaflict(22);";
	$SQL="update sw_users SET aff_paralize=0 where id = $player_id";
	SQL_do($SQL);
	$player['effect'] = "ref";
	
}
else if ($obj_name == "��������")
{
	$time = date("H:i");
	
	$text = "[<b>$player_name</b>]&nbsp;<b>$player_name </b>�����������".$t[$sex]." �������� � ������� <font color=red>`$obj_inf`</font>.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext";
	$player['effect'] = "ref";
	$online_time = time()-60;
	$SQL="update sw_users SET mytext=CONCAT(mytext,'top.shake(1);') where online > $online_time and npc=0";
	SQL_do($SQL);
	
}
else if ($obj_name == "������������")
{
	$ran = round($player_max_mana * 0.20) + rand(0,round($player_max_mana * 0.08));
	$newmana = $cmana + $ran;
	$time = date("H:i");
	$text = "[<b>$player_name</b>, ������� <font class=mana>+$ran</font>]&nbsp;<b>$player_name </b>�����$t[$sex] ������� ������������.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	
	if ($newmana > $player_max_mana)
		$newmana = $player_max_mana;
	print "$jsptext top.sm($newmana,$player_max_mana);top.drbal($btime,$btime);";
	if ($newmana <> $cmana)
	{
		$SQL="update sw_users SET cmana=$newmana where id = $player_id";
		SQL_do($SQL);
	}
	
}
else if ($obj_name == "��������")
{
	$time = date("H:i");
	$text = "[<b>$player_name</b>]&nbsp;<b>$player_name </b>�����$t[$sex] ������� ��������.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); top.delaflict(1);";
	$SQL="update sw_users SET aff_afraid=0 where id = $player_id";
	SQL_do($SQL);
	$player['effect'] = "ref";
}
else if ($obj_name == "����� ������")
{
	$time = date("H:i");
	$text = "[<b>$player_name</b>]&nbsp;<b>$player_name </b>�����$t[$sex] ������� ������ ������.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); top.aflict(2,6); top.aflict(2,15); top.delaflict(10);";
	$SQL="update sw_users SET aff_cantsee=0,aff_see=$cur_time+10*12,aff_see_all=$cur_time+8*12 where id = $player_id";
	SQL_do($SQL);
	$player['effect'] = "ref";
}
else if ($obj_name == "��������")
{
	$time = date("H:i");
	$text = "[<b>$player_name</b>]&nbsp;<b>$player_name </b>�����$t[$sex] ������� ��������.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); top.aflict(2,13);";
	$SQL="update sw_users SET aff_speed=($cur_time+7*12) where id = $player_id";
	SQL_do($SQL);
	
	$player['effect'] = "ref";
}
else if ($obj_name == "������� ���")
{
	$time = date("H:i");
	$text = "[<b>$player_name</b>]&nbsp;<b>$player_name </b>�����$t[$sex] ������� ������ ���.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); top.delaflict(19);";
	$SQL="update sw_users SET aff_dream=0 where id = $player_id";
	SQL_do($SQL);
	$player['effect'] = "ref";
}
else if ($obj_name == "���")
{
	$time = date("H:i");
	$ta[1] = "[<b>$player_name</b>]&nbsp;<b>$player_name </b>�����$t[$sex] ��������� ���.";
	$ta[2] = "[<b>$player_name</b>]&nbsp;<b>$player_name </b>�����$t[$sex] ��� � �������$t[$sex].";
	$ta[3] = "[<b>$player_name</b>]&nbsp;����� ������� ��������� ��� <b>$player_name </b> ����$t[$sex] �� ���� ����������.";
	$ta[4] = "[<b>$player_name</b>]&nbsp;<b>$player_name </b> �������� � ����$t[$sex] ��������� ���� ���-�� ��� ���.";
	$r  =rand(1,4);
	$text = $ta[$r];
	
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); ";
	
}
else if ($obj_name == "����������")
{
	$time = date("H:i");
	$ta[1] = "[<b>$player_name</b>]&nbsp;<b>$player_name </b>�����$t[$sex] ������� ����������� � �������$t[$sex].";
	$ta[2] = "[<b>$player_name</b>]&nbsp;<b>$player_name </b>�����$t[$sex] ����������� � ������$t[$sex], �� ����� ���������$t[$sex] �� ����� ��� �����! .";
	$ta[3] = "[<b>$player_name</b>]&nbsp;����� �������� ������ ����������� <b>$player_name </b> ����$t[$sex] ����� ���� �������� � ������� �� �� ����� � ����� �����!.";
	$ta[4] = "[<b>$player_name</b>]&nbsp;<b>$player_name </b> �������� � ����$t[$sex] ��������� ���� ���-�� ��� ���.";
	$ta[5] = "[<b>$player_name</b>]&nbsp;<b>$player_name </b> ����������� ����$t[$sex] ��-��������� ���� ����������.";
	$ta[6] = "[<b>$player_name</b>]&nbsp;�� ����� ����� <b>$player_name </b> ������$t[$sex] ���������� � �����$t[$sex] ����������� ��� �������.";
	$ta[7] = "[<b>$player_name</b>]&nbsp;<b>$player_name </b> �����$t[$sex] ���������� � ������$t[$sex]: � ���� ��*��*����� ������....";
	$r  =rand(1,7);
	$text = $ta[$r];
	$player['drunk'] = 1;
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); ";
}
else if ($obj_name == "���������� ���")
{
	$time = date("H:i");
	$text = "[<b>$player_name</b>]&nbsp;<b>$player_name </b>�����$t[$sex] ������� ���������� ���.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); top.delaflict(2);";
	$SQL="update sw_users SET aff_cut=0,aff_bleed_time=0 where id = $player_id";
	SQL_do($SQL);
	$player['effect'] = "ref";
}
else if ($obj_name == "���� ������" || $obj_name == "������ ������" || $obj_name == "������ ����" || $obj_name == "������ ����" || $obj_name == "���������� ��������")
{
	$time = date("H:i");
	$ta[1] = "[<b>$player_name</b>]&nbsp;����� �������� `$obj_name` $player_name �����$t[$sex] ����� � ������";
	$ta[2] = "[<b>$player_name</b>]&nbsp;������������, $player_name, ��������� �������� ���$t_el[$sex] �� ��������";
	$ta[3] = "[<b>$player_name</b>]&nbsp;����� �������� `$obj_name`, $player_name ����$t[$sex] ���������� ���� ������ �� ����������";
	$ta[4] = "[<b>$player_name</b>]&nbsp;����� `$obj_name`, $player_name ����$t[$sex] ��������� �������";
	$ta[5] = "[<b>$player_name</b>]&nbsp;$player_name., �������$t_sa[$sex] �� ������ � ������ ���������$t[$sex] `� ������ ����������� �������!`";
	$ta[6] = "[<b>$player_name</b>]&nbsp;$player_name, ������$t[$sex] ������� ��������, ������� ����� $t_emu[$sex] �����";
	$ta[7] = "[<b>$player_name</b>]&nbsp;$player_name. �� ������� `���-����-����������`, ���������$t_sa[$sex] �� ����� ���������";
	$ta[8] = "[<b>$player_name</b>]&nbsp;����� �������� `$obj_name`, $player_name, ���������$t[$sex] �� ������ ����������������";
	$ta[9] = "[<b>$player_name</b>]&nbsp;����� �������� `$obj_name`, $player_name �����$t[$sex] ������ � ����$t[$sex] ������� ����������, ��� ��$t[$sex] �����";
	$ta[10] = "[<b>$player_name</b>]&nbsp;����� `$obj_name`, $player_name ���������$t[$sex]: `����� �� ����!`";
	$ta[11] = "[<b>$player_name</b>]&nbsp;����� `$obj_name`, $player_name ����$t[$sex] � ��������� ������������� ����������";
	$ta[12] = "[<b>$player_name</b>]&nbsp;����� �������� `$obj_name`, $player_name �����$t_sa[$sex] � ����������� �����������";
	$ta[13] = "[<b>$player_name</b>]&nbsp;$player_name ����$t[$sex] �������� ����������";
	$ta[14] = "[<b>$player_name</b>]&nbsp;$player_name �������� ���������� �������� �����";	
	$r =rand(1, 14);
	$text = $ta[$r];
	$player['drunk'] = 1;
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); ";
}
else if ($obj_name == "��������� ����������")
{
	$time = date("H:i");
	$ta[1] = "[<b>$player_name</b>]&nbsp;����� ����������� $player_name ����$t[$sex] �������� � ����������� �����������";
	$ta[2] = "[<b>$player_name</b>]&nbsp;����� �������� �����������, $player_name ����$t[$sex] ������� `������!!!`";
	$ta[3] = "[<b>$player_name</b>]&nbsp;$player_name ����� �������� ������ ����������� �������$t_sa[$sex] ������� �� ����� ����� � ������";
	$ta[4] = "[<b>$player_name</b>]&nbsp;����� �����������, $player_name �������$t_sa[$sex] ������������� ������ �� ��������� �����";
	$ta[5] = "[<b>$player_name</b>]&nbsp;$player_name �����$t[$sex] ����������, � ���������$t[$sex]: `�� �������� �������!`";
	$ta[6] = "[<b>$player_name</b>]&nbsp;$player_name �����$t[$sex] ����������, � ����$t[$sex] ������ �� ������� �� ������ �������";
	$ta[7] = "[<b>$player_name</b>]&nbsp;����� �������� ����������� $player_name ����$t[$sex] ���������� ������� �������";
	$ta[8] = "[<b>$player_name</b>]&nbsp;$player_name �����$t[$sex] ����������� � ����������$t_sa[$sex] ������ ����� �������";
	$r =rand(1, 8);
	$text = $ta[$r];
	$player['drunk'] = 1;
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); ";
}
else if ($obj_name == "��������")
{
	$ta[1] = "[<b>$player_name</b>]&nbsp;����� ��������, $player_name ���������$t[$sex]: `����� - ����������, ������� - �������!`";
	$ta[2] = "[<b>$player_name</b>]&nbsp;��������� ��������, $player_name �����$t[$sex] ����� � �����.";
	$ta[3] = "[<b>$player_name</b>]&nbsp;$player_name �����$t[$sex] ����� ��������, �������$t_sa[$sex] ��� ���� � �����$t[$sex] �� �������.";
	$ta[4] = "[<b>$player_name</b>]&nbsp;$player_name ������$t[$sex] ����� �������� � ������������$t[$sex] ���� �� ���� ������� ���.";
	$ta[5] = "[<b>$player_name</b>]&nbsp;����� �������� ������ �������� $player_name �����$t[$sex] ������������ ���� � �����.";
	$ta[6] = "[<b>$player_name</b>]&nbsp;����� �������� ������ �������� $player_name, �������, �����$t[$sex] ������ �����������.";
	$ta[7] = "[<b>$player_name</b>]&nbsp;����� ��������, $player_name ��������$t[$sex]: `����� ������ � ������ ���������� ���������``";
	$ta[8] = "[<b>$player_name</b>]&nbsp;��������� ����� ��������, $player_name �����$t[$sex] �������� �� �������� ���������.";
	$ta[9] = "[<b>$player_name</b>]&nbsp;��������� ��������, $player_name �����$t[$sex] ������� �����.";
	$ta[10] = "[<b>$player_name</b>]&nbsp;����� �������� ������ ��������, ������ ������ �������� ���� ��������� $player_name �� ������ � ������.";
	$r =rand(1, 10);
	$text = $ta[$r];
	$player['drunk'] = 1;
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); ";	
}
else if ($obj_name == "������� ���")
{
	$ta[1] = "[<b>$player_name</b>]&nbsp;��������� �������� ���, $player_name �����$t[$sex] �������.";
	$ta[2] = "[<b>$player_name</b>]&nbsp;$player_name ����� � �������� � �� ����� ���������� ������� ���.";	
	$ta[3] = "[<b>$player_name</b>]&nbsp;����� ������� ������ �������� ��� $player_name ��������$t[$sex] �� �����.";
	$ta[4] = "[<b>$player_name</b>]&nbsp;����� �������� �������� ���, $player_name �����$t[$sex] ��������� �� �����.";
	$ta[5] = "[<b>$player_name</b>]&nbsp;������ ����� �������� ���, $player_name ������������ ������������$t[$sex]: `�� ���, ��� � ����!``";
	$ta[6] = "[<b>$player_name</b>]&nbsp;����� ������� ������ �������� ���, $player_name �������� ������$t[$sex]: `������-�-��� � ���-�-�-���`";
	$ta[7] = "[<b>$player_name</b>]&nbsp;����� ����� �������� ���, $player_name �����$t[$sex] �������� ����������.";
	$ta[8] = "[<b>$player_name</b>]&nbsp;��������� �������� ���, $player_name ������$t[$sex] � ������� � �������� ������.";
	$ta[9] = "[<b>$player_name</b>]&nbsp;����� �������� ������� �������� ���, $player_name ����������$t_sa[$sex] � ����$t[$sex] �������.";
	$ta[10] = "[<b>$player_name</b>]&nbsp;����� �������� ������ �������� ���, ������ ������ �������� ���� ��������� $player_name �������� � ������.";	
	$r =rand(1, 10);
	$text = $ta[$r];
	$player['drunk'] = 1;
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); ";	
}


else if ($obj_name == "������������ ���" || $obj_name == "������� ���" || $obj_name == "����������� ���")
{
	$time = date("H:i");
	$ta[1] = "[<b>$player_name</b>]&nbsp;$player_name �����$t[$sex] ���";
	$ta[2] = "[<b>$player_name</b>]&nbsp;$player_name ��������� � ��������";
	$ta[3] = "[<b>$player_name</b>]&nbsp;$player_name �������������� ��������� ������ �����";	
	$r =rand(1, 3);
	$text = $ta[$r];
	$player['drunk'] = 1;
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); ";
}
else if ($obj_name == "�������")
{
	$time = date("H:i");

	$ta[1] = "[<b>$player_name</b>]&nbsp;� ������� star ��� ���� �����!";
	$ta[2] = "[<b>$player_name</b>]&nbsp;� ������������! �� �� � ����?";
	$ta[3] = "[<b>$player_name</b>]&nbsp;��� ������ ����� ��������!";
	$ta[4] = "[<b>$player_name</b>]&nbsp;� ������ ��� � ����� ���-�� ��������...";
	$ta[5] = "[<b>$player_name</b>]&nbsp;��� ����� ����, ��� ���� ����...";
	$ta[6] = "[<b>$player_name</b>]&nbsp;� ��� ������$t[$sex] � ������ ��� �����...";
	$ta[7] = "[<b>$player_name</b>]&nbsp;������ - �� ���������, - ������ �� ��������...";
	$r =rand(1, 7);
	$text = $ta[$r];
	$player['drunk'] = 1;
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); ";
}
else if ($obj_name == "������� ���!")
{
	$time = date("H:i");

	$ta[1] = "[<b>$player_name</b>]&nbsp;��������, � �� ��� ��� ��� �����?";
	$ta[2] = "[<b>$player_name</b>]&nbsp;����$t_la[$sex] � ������, ����� � �����������";
	$ta[3] = "[<b>$player_name</b>]&nbsp;�� �� �����. ��, � ���������, ������ ������.";
	$ta[4] = "[<b>$player_name</b>]&nbsp;...� - ���� ��� ���������� � �����!...";
	$ta[5] = "[<b>$player_name</b>]&nbsp;��, �� �� ��� ��� ����� ���������...";
	$ta[6] = "[<b>$player_name</b>]&nbsp;���� ���� �����, ���� ������ ����?!";
	$ta[7] = "[<b>$player_name</b>]&nbsp;��� ���� ������?.. ������� �� ���!";
	$r =rand(1, 7);
	$text = $ta[$r];
	$player['drunk'] = 1;
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); ";
}
else if ($obj_name == "����������� ����")
{
	$time = date("H:i");

	$ta[1] = "[<b>$player_name</b>]&nbsp;��� ����� �� ���� ��� ����������";
	$ta[2] = "[<b>$player_name</b>]&nbsp;������� �� �� ������, �� ����� ���� �� �����";
	$ta[3] = "[<b>$player_name</b>]&nbsp;��� ����� ����� ������������ ��������";
	$ta[4] = "[<b>$player_name</b>]&nbsp;��� ������. �������, ��� ��������.";
	$ta[5] = "[<b>$player_name</b>]&nbsp;������ ����. �������. ������ ����� �������.";
	$ta[6] = "[<b>$player_name</b>]&nbsp;�� �� ������� � ����� �� ����� ���.";
	$ta[7] = "[<b>$player_name</b>]&nbsp;� �� ��������$t_en[$sex]. �� ����� � �����...";
	$r =rand(1, 7);
	$text = $ta[$r];
	$player['drunk'] = 1;
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime); ";
}
else if ($obj_name == "�����")
{
	$time = date("H:i");
	$text = "[<b>$player_name</b>]&nbsp;<b>$player_name </b> ��� �����.";
	$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
	print "$jsptext top.drbal($btime,$btime);";
	$player['effect'] = "ref";
	$dont_delete = false;
}
else if ($obj_name == "������")
{
  
	$time = date("H:i");
	$o_id = -1;
	$SQL="select sw_obj.id, sw_obj.num from sw_obj INNER JOIN sw_stuff on sw_stuff.id=sw_obj.obj WHERE sw_stuff.id=1222 and sw_obj.owner=$player_id and sw_obj.room=0";
	$row_num=SQL_query_num($SQL);
	while ($row_num){
		$o_id=$row_num[0];
		$o_num=$row_num[1];
		$row_num=SQL_next_num();
	}
	if ($result)
	mysql_free_result($result);
	if ($o_id > 0)
	{
	     $o_num--;
		if ($o_num >= 1)
			$SQL="update sw_obj SET num=$o_num where id=$o_id";
		else
			$SQL="delete from sw_obj where id=$o_id";
		SQL_do($SQL);
	
		$ran = -1 - round($player_max_hp * 0.01) + rand(0,round($player_max_hp * 0.01));
		
		$ran2 = 1 + round($player_max_mana * 0.01) + rand(0,round($player_max_mana * 0.01));
		$newmana = $cmana + $ran2;
	
		if ($newmana > $player_max_mana)
			$newmana = $player_max_mana;
		
		
		$ta[1] = "[<b>$player_name</b>, ����� <font class=dmg>$ran</font>, ������� <font class=mana>+$ran2</font>]&nbsp;<b>$player_name </b>�������$t[$sex] ������ � �������.";
		$r  =rand(1,1);
		$text = $ta[$r];
		$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
		
	
		$newhp = $chp + $ran;
	
		if ($newhp > $player_max_hp)
			$newhp = $player_max_hp;
		print "$jsptext top.invobj($o_id,$o_num);top.sm($newmana,$player_max_mana); top.sh($newhp,$player_max_hp); top.drbal($btime,$btime);";
		
		if ($newhp <> $chp)
		{
			$chp_percent = $player_max_hp / $newhp*100;
			$SQL="update sw_users SET chp=$newhp,chp_percent=$chp_percent, cmana=$newmana where id = $player_id";
			SQL_do($SQL);
		}
		
		
		$player['effect'] = "ref";
	}
	else
	{
	    $ta[1] = "[<b>$player_name</b>]&nbsp;<b>$player_name </b>�������� �������� ������ ������.";
		$r  =rand(1,1);
		$text = $ta[$r];
		$jsptext = "top.add(\"$time\",\"\",\"$text\",5,\"\");";
		print "$jsptext top.drbal($btime,$btime);";
		$player['effect'] = "ref";
	}
	$dont_delete = false;
}


if ($dont_delete)
{
	$obj_num--;
	if ($obj_num >= 1)
		$SQL="update sw_obj SET num=$obj_num where id=$id";
	else
		$SQL="delete from sw_obj where id=$id";
		SQL_do($SQL);
	print "top.invobj($id,$obj_num);";
}
print "</script>";
if ($obj_name != "��������")
	$SQL="update sw_users SET mytext=CONCAT(mytext,'$jsptext') where online > $online_time and room=$player_room and id <> $player_id and npc=0";
else
	$SQL="update sw_users SET mytext=CONCAT(mytext,'$jsptext') where online > $online_time and id <> $player_id and npc=0";
SQL_do($SQL);
$player['drinkbalance'] = $cur_time;
?>
