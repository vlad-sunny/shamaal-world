<div align="center"><b>����������</b></div>
<br>

<div align="justify" class=small>
���������� �� ����� ������� ������� �����������. �������� ���������� �����, �������� ��������, ������ ��������� � �������� ����������.
</div><br>
<table width=95% align=center bgcolor=A5B2B5 cellspacing=1>
<tr bgcolor=E7EBDE><td width=20 align=center  class=small><b>����������</b></td><td class=small><b>��������</b></td></tr>

<?php
$SQL="select acName,acDesc,acDisplayPicture from achievement";
$row_num=SQL_query_num($SQL);
while ($row_num){
	$acName = $row_num[0];
	$acDesc = $row_num[1];
	$acDisplayPicture = $row_num[2];
	print "<tr bgcolor=F0F8F0><td width=20 align=center class=small><img src=maingame/pic/achievement/unknownA.gif></td>
	<td class=small width=120>
		<table>
			<tr><td><b>$acName</b></td></tr>
			<tr><td>$acDesc</td></tr>
		</table>
	</td>
</tr>";
	$row_num=SQL_next_num();
}
if ($result)
mysql_free_result($result);
?>

</table>
<br>
<table width=95% align=center cellspacing=1 cellpadding=3>
<tr><td width=30></td><td><b><div align="center"><a href=index.php?load=8>�����</div></b><br></td></tr>
</table>
<br>
