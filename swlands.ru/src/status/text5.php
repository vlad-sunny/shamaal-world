<div align=center><b>Топ 10 бойцов на арене</b></div><br>
<?
//print "<div align=center><b>Временно недоступен</b></div>";


$time = time();
$ct[0] = "Без города";
$ct[1] = "Академия";
$ct[2] = "Шамаал";
$ct[3] = "Хроно";
$ct[4] = "Иллюзив";
$ct[5] = "Эндлер";
$ct[6] = "Шелтер";
$ct[14] = "Морок";
$i = 0;
print "<table cellspacing=1 cellpadding=2 width=98% bgcolor=95A7AA align=center><tr bgcolor=DEE6DF><td width=10>#</td><td width=33%  align=center><b>Имя</b></td><td  width=33% align=center><b>Город</b></td><td  align=center><b>Уровень</b></td><td align=center><b>Очки</b></td></tr>";

$SQL="select name,city,level, rating from sw_users where rating <>100 and city <> 7 and npc = 0 and (admin = 0 or admin > 6) order by rating DESC limit 0,30";
$row_num=SQL_query_num($SQL);
while ($row_num){
	$i++;
	$name = $row_num[0];
	$city = $row_num[1];
	$level = $row_num[2];
	$rating = $row_num[3];
	print "<tr bgcolor=F7F7F7><td>$i</td><td width=33%  align=center><a href=fullinfo.php?name=$name target=_blank>$name</a></td><td  width=33% align=center>$ct[$city]</td><td  align=center>$level</td><td align=center>$rating</td></tr>";
	$row_num=SQL_next_num();
}
if ($result)
mysql_free_result($result);
print "</table>";
?>
