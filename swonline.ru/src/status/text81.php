<div align=center><b>��� 50 �� ������ � �����</b></div><br>
<?php
//print "<div align=center><b>�������� ����������</b></div>";



$ct[0] = "��� ������";
$ct[1] = "��������";
$ct[2] = "������";
$ct[3] = "�����";
$ct[4] = "�������";
$ct[5] = "������";
$ct[6] = "������";
$i = 0;
print "<table cellspacing=1 cellpadding=2 width=98% bgcolor=95A7AA align=center><tr bgcolor=DEE6DF><td width=10>#</td><td width=33%  align=center><b>���</b></td><td  width=33% align=center><b>�����</b></td><td  align=center><b>�������</b></td><td align=center><b>������</b></td></tr>";

$SQL="select name,city,level,bank_gold from sw_users where bank_gold and city <> 7 order by bank_gold DESC limit 0,100";
$row_num=SQL_query_num($SQL);
while ($row_num){
	$i++;
	$name = $row_num[0];
	$city = $row_num[1];
	$level = $row_num[2];
	$bank_gold = $row_num[3];
	print "<tr bgcolor=F7F7F7><td>$i</td><td width=33%  align=center><a href=fullinfo.php?name=$name target=_blank>$name</a></td><td  width=33% align=center>$ct[$city]</td><td  align=center>$level</td><td align=center>$bank_gold</td></tr>";
	$row_num=SQL_next_num();
}
if ($result)
mysql_free_result($result);
print "</table>";
?>