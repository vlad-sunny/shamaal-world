<div align=center><b>��� 20 �����</b></div><br>
<?
//print "<div align=center><b>�������� ����������</b></div>";


$time = time();
$ct[0] = "��� ������";
$ct[1] = "��������";
$ct[2] = "������";
$ct[3] = "�����";
$ct[4] = "�������";
$ct[5] = "������";
$ct[6] = "������";
$ct[14] = "�����";
$i = 0;
print "<table cellspacing=1 cellpadding=2 width=98% bgcolor=95A7AA align=center><tr bgcolor=DEE6DF><td width=10>#</td><td width=33%  align=center><b>���</b></td><td  width=33% align=center><b>�����</b></td><td  align=center><b>�������</b></td><td align=center><b>�������</b></td></tr>";
$SQL="select count(*) num, name,city,level from sw_kills inner join sw_users on sw_kills.owner=sw_users.id where sw_users.city <> 7 AND sw_kills.who_npc = 0 and admin = 0 group by owner order by num desc limit 0,20";
$row_num=SQL_query_num($SQL);
while ($row_num){
	$i++;
	$nm = $row_num[0];
	$name = $row_num[1];
	$city = $row_num[2];
	$level = $row_num[3];
	print "<tr bgcolor=F7F7F7><td>$i</td><td width=33%  align=center><a href=fullinfo.php?name=$name target=_blank>$name</a></td><td  width=33% align=center>$ct[$city]</td><td  align=center>$level</td><td align=center>$nm</td></tr>";
	$row_num=SQL_next_num();
}
if ($result)
mysql_free_result($result);
print "</table>";
?>