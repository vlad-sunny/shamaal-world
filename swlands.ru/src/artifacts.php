<html>
	<body>
		<table border="1">
			<tr>
				<td>Id предмета</td><td>Тип предмета</td><td>Надпись</td><td>Имя владельца</td><td>Одет на персонаже</td>
			</tr>
			<? getArtifacts(); ?>
		</table>
	</body>
</html>

<?



function getArtifacts() 
{
	require "mysqlconfig.php";

	$SQL = "SELECT sw_obj.id, sw_obj.obj, sw_stuff.id, sw_obj.inf, sw_users.name, sw_obj.active FROM sw_obj JOIN sw_users ON sw_obj.owner = sw_users.id LEFT JOIN sw_stuff ON sw_stuff.id = sw_obj.obj WHERE sw_obj.inf != '' AND sw_obj.max_cond != 0";
	$row_num = SQL_query_num($SQL);
	
	while ($row_num)
	{
		echo '<tr>', '<td>', $row_num[0], '</td>', '<td>', $row_num[1], $row_num[2] == NULL ? ' (удалён)' : '' , '</td>', '<td>', $row_num[3], '</td>', '<td>', $row_num[4], '</td>', '<td>', $row_num[5] == 1 ? "Да" : "Нет", '</td>', '</tr>';
		
		$row_num=SQL_next_num();
	}
	
	if ($result) {
		mysql_free_result($result);
	}
	
	SQL_disconnect();
}

?>

