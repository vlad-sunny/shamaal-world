<?


	$time = time();
	$cities = Array
	(
		0 => "��� ������",
		1 => "��������",
		2 => "������",
		3 => "�����",
		4 => "�������",
		5 => "������",
		6 => "������",
		13 => "������",
		14 => "�����"
	);

	$SQL="select count(*) as num from sw_users where npc=0 and online > $time-60 and city <> 7";
	$row=SQL_query($SQL);
	while ($row){
		$count = "{$row{num}}";
		$row=SQL_next();
	}
	if ($result)
	mysql_free_result($result);
	$file = fopen("play/online.dat","r");
	$max_online = fgets($file,100);
	fclose($file);


?>
<table><tr><td>������� �� �������: </td><td><?print $count;?></td></tr>
<tr><td>�����������:</td><td> <?print $max_online;?></td></tr>
</table>
<br>
<?
	if (!isset($page))
	$page = 0;
	$p = "";
	for ($i=0;$i<$count;$i=$i+20)
	{
		$e = $i + 19;
		if ($e > $count)
			$e = $count;
		if ($i == $page)
			$p .= "|<b>$i-$e</b>|";
		else
			$p .= "|<a href=index.php?page=$i&load=$load class=menu>$i-$e</a>|";
	}
	if ($p <> "")
		print "<div align=center>$p</div><br>";
	print "<table cellspacing=1 cellpadding=2 width=98% bgcolor=95A7AA align=center><tr bgcolor=DEE6DF><td width=33%  align=center><b>���</b></td><td  width=33% align=center><b>����</b></td><td  align=center><b>�������</b></td><td  align=center><b>�����</b></td></tr>";


	$SQL="select name,race,level, city from sw_users where npc=0 and online > $time-60 and city <> 7 order by name limit $page,20";
	$row=SQL_query($SQL);
	while ($row){
		$name = "{$row{name}}";
		$race = "{$row{race}}";
		$level = "{$row{level}}";
		$city = "{$row{city}}";
		print "<tr bgcolor=F7F7F7><td width=33%  align=center><a href=fullinfo.php?name=$name target=_blank>$name</a></td><td  width=33% align=center>$race_name[$race]</td><td  align=center>$level</td><td  align=center>$cities[$city]</td></tr>";
		$row=SQL_next();
	}
	if ($result)
	mysql_free_result($result);
	print "</table>";
?>