<html>
<head>
	<meta name="keywords" content="������ ����, online game, ��� ����, RPG game, �������, MMPROG, �����, �����, Character, MUD, ���">
	<META name="description" content="������ ��� ���� ���������� � ��������, Online rpg game, MUD, ���">
	<title>Shamaal World</title>
</head>
<LINK REL=STYLESHEET TYPE="TEXT/CSS" HREF="site.css" TITLE="STYLE">
<?
include('mysqlconfig.php');
$shp_item = (integer) $shp_item;
$SQL="SELECT id,name,pack,level from sw_users where id=$shp_item";
$row_num=SQL_query_num($SQL);
while ($row_num){
	$pack_id = $row_num[0];
	$pack_name = $row_num[1];
	$pack_pack = $row_num[2];
	$pack_level = $row_num[3];
	$row_num=SQL_next_num();
}
if ($result)
mysql_free_result($result);
if ($shp_typ == 1)
	print "<table><Tr><td>����� ������ ��� ��������� $pack_name.</td></tr></table>";
if ($shp_typ == 2)
	print "<table><Tr><td>����� ������ ��� ��������� $pack_name.</td></tr></table>";
if ($shp_typ == 3)
	print "<table><Tr><td>����� ������ ��� ����� ��������� $pack_name.</td></tr></table>";
if ($shp_typ == 4)
	print "<table><Tr><td>����� ������. �� ������ �������� ����� � ������ ���� ���� '������'</td></tr></table>";
if ($shp_typ == 5)
	print "<table><Tr><td>����� ������. ���� ��������� $pack_name ��������, � �������������� ��������.</td></tr></table>";
print "<table><Tr><td>�� ������ �������������� �� ���� ���� ����� 6 ������.</td></tr></table>";
SQL_disconnect();
?>
<script>
ChatTimer = setTimeout("document.location = 'main.php?load=4';",6000);
</script>
</html>