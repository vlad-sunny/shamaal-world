<table width=100%><tr><Td></td></tr></table>
<table width=98% align=center cellpadding=4 cellspacing=1 bgcolor="95A7AA"><tr><td bgcolor=F2F6F6>
<table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small><b>� ������� ������: </b></td>
	<form action="main.php" method="post">
	<input type="hidden" name="load" value="<?print $load;?>">
	<td>&nbsp;&nbsp;
		<select name=packet_id>
			<?
			$err = "";
			$pn[$packet_id] = 'Selected';
			print "
			<option value=0 $pn[0]>- �������� ����� -</option>
			<option value=1 $pn[1]>������. ������� �����</option>
			<option value=2 $pn[2]>��������� ����� ������</option>
			<option value=3 $pn[3]>��������� ����� �����</option>
			<option value=4 $pn[4]>����� ������</option>
			<option value=5 $pn[5]>������������</option>";
			
			?>
		</select>
	</td>
	<td>
		&nbsp;&nbsp;
		<input type="submit" value="������">
	</td>
	</form>
</tr>
</table>
<?
if ($packet_id == 1)
{
	$no = 1;
	if ((isset($play_name)))
	{
		$pack_id = 0;
		$play_name =  str_replace(";","",$play_name);
		$play_name =  str_replace("/","",$play_name);
		$play_name =  str_replace("'","",$play_name);
		$SQL="SELECT id,name,pack,level from sw_users where upper(up_name)=upper('$play_name')";
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
		if ($pack_id > 0)
		{
			if ($pack_pack & 1)
				print "<br><table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small><b><font color=red>����� � ����� ��������� ��� ������ � �� ����� ���� ���� ��������.<b></font></tr></table>";
			else
			{
				//�������� �������
				$inv_desc  = "Shamaal World Premium 1 Main";
				$inv_descrus  = "������� ��������������� �������� ������.";
				$out_summ  = "10";          //����� ������� 9.89
				$shp_item = $pack_id;                // ����� ������
				$shp_typ = 1;                // ��� ������
				$shp_param1 = 1;                // ��� ������
				$shp_param2 = 1;                // ��� ������
				$shp_param3 = 1;                // ��� ������
				print "<br><table cellpadding=0 cellspacing=0 width=100%  class=small><Tr  class=small><td class=small><b>�������� ������:</b></td><td  class=small> $pack_name</td></tr><tr><Td  class=small><b>������� �����:</b></td><td  class=small> $pack_level ��.</td></tr><tr><td class=small><b>���� ������:</b></td><td  class=small> <font color=red>$out_summ$</font></td></tr><tr><td class=small><b>�������� �������:&nbsp;</b></td><td  class=small>$inv_descrus</td></tr><tr><td colspan=2 align=center><br>";
				include("p.php");
				print "</td></tr></table>";
				$no = 0;
			}
		}
		else
			$err = "<br><table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small><font color=red>�������� � ����� ������ �� ������.</font></tr></table>";
		
	}
	print " ";
	if ($no == 1) {
		print "$err <br><table cellpadding=0 cellspacing=0 width=100%><form action='main.php' method='post'><input type=hidden name=load value=$load><input type=hidden name=packet_id value=$packet_id><Tr><td class=small><b>� ��� ���������:&nbsp;&nbsp;</b></td><td><input type=text name=play_name size=12></td><td>&nbsp;&nbsp;<input type='submit' value='��� ����� ���������' style='width:160'></td></tr></form></table>";
		}
}
else if ($packet_id == 2)
{
	$no = 1;
	if ((isset($play_name)))
	{
		$pack_id = 0;
		$play_name =  str_replace(";","",$play_name);
		$play_name =  str_replace("/","",$play_name);
		$play_name =  str_replace("'","",$play_name);
		$SQL="SELECT id,name,pack,level from sw_users where upper(up_name)=upper('$play_name')";
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
		if ($pack_id > 0)
		{
			if ($pack_pack & 2)
				print "<br><table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small><b><font color=red>����� � ����� ��������� ��� ������ � �� ����� ���� ���� ��������.<b></font></tr></table>";
			else
			{
				//�������� �������
				$inv_desc  = "Shamaal World Premium 2 House";
				$inv_descrus  = "������� ���������� ������ ������.";
				$out_summ  = "25";          //����� ������� 9.89
				$shp_item = $pack_id;                // ����� ������
				$shp_typ = 2;                // ��� ������
				$shp_param1 = 1;                // ��� ������
				$shp_param2 = 1;                // ��� ������
				$shp_param3 = 1;                // ��� ������
				print "<br><table cellpadding=0 cellspacing=0 width=100%  class=small><Tr  class=small><td class=small><b>�������� ������:</b></td><td  class=small> $pack_name</td></tr><tr><Td  class=small><b>������� �����:</b></td><td  class=small> $pack_level ��.</td></tr><tr><td class=small><b>���� ������:</b></td><td  class=small> <font color=red>$out_summ$</font></td></tr><tr><td class=small><b>�������� �������:&nbsp;</b></td><td  class=small>$inv_descrus</td></tr><tr><td colspan=2 align=center><br>";
				include("p.php");
				print "</td></tr></table>";
				$no = 0;
			}
		}
		else
			$err = "<br><table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small><font color=red>�������� � ����� ������ �� ������.</font></tr></table>";
		
	}
	if ($no == 1)
	{
		print "$err<br>
		<table cellpadding=0 cellspacing=0 width=100%>
		<form action='main.php' method='post'>
		<input type=hidden name=load value=$load>
		<input type=hidden name=packet_id value=$packet_id>
			<Tr>
				<td class=small><b>� ��� ���������:&nbsp;&nbsp;</b></td><td><input type=text name=play_name size=12></td><td>&nbsp;&nbsp;<input type='submit' value='��� ����� ���������' style='width:160'>		
				</td>
			</tr>
		</form>
		</table>";
	}
}
else if ($packet_id == 3)
{
	$no = 1;
	if ((isset($play_name)))
	{
		$pack_id = 0;
		$play_name =  str_replace(";","",$play_name);
		$play_name =  str_replace("/","",$play_name);
		$play_name =  str_replace("'","",$play_name);
		$SQL="SELECT sw_users.id,sw_users.name,sw_clan.pack,sw_users.level,sw_clan.litle from sw_users INNER JOIN sw_clan on sw_clan.id=sw_users.clan where upper(sw_users.up_name)=upper('$play_name')";
		$row_num=SQL_query_num($SQL);
		while ($row_num){
			$pack_id = $row_num[0];
			$pack_name = $row_num[1];
			$pack_pack = $row_num[2];
			$pack_level = $row_num[3];
			$pack_litle = $row_num[4];
			$row_num=SQL_next_num();
		}
		if ($result)
		mysql_free_result($result);
		if ($pack_id > 0)
		{
			if ($pack_pack == 1)
				print "<br><table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small><b><font color=red>����� � ����� ��������� ��� ������ � �� ����� ���� ���� ��������.<b></font></tr></table>";
			else
			{
				//�������� �������
				$inv_desc  = "Shamaal World Premium 3 Clan house";
				$inv_descrus  = "������� ���������� ������ ����� [$pack_litle].";
				$out_summ  = "40";          //����� ������� 9.89
				$shp_item = $pack_id;                // ����� ������
				$shp_typ = 3;                // ��� ������
				$shp_param1 = 1;                // ��� ������
				$shp_param2 = 1;                // ��� ������
				$shp_param3 = 1;                // ��� ������
				print "<br><table cellpadding=0 cellspacing=0 width=100%  class=small><Tr  class=small><td class=small><b>�������� ������:</b></td><td  class=small> $pack_name [$pack_litle]</td></tr><tr><Td  class=small><b>������� �����:</b></td><td  class=small> $pack_level ��.</td></tr><tr><td class=small><b>���� ������:</b></td><td  class=small> <font color=red>$out_summ$</font></td></tr><tr><td class=small><b>�������� �������:&nbsp;</b></td><td  class=small>$inv_descrus</td></tr><tr><td colspan=2 align=center><br>";
				include("p.php");
				print "</td></tr></table>";
				$no = 0;
			}
		}
		else
			$err = "<br><table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small><font color=red>� ��������� � ����� ������ ��� �����.</font></tr></table>";
		
	}
	if ($no == 1)
	{
		print "$err<br>
		<table cellpadding=0 cellspacing=0 width=100%>
		<form action='main.php' method='post'>
		<input type=hidden name=load value=$load>
		<input type=hidden name=packet_id value=$packet_id>
			<Tr>
				<td class=small><b>� ��� ���������:&nbsp;&nbsp;</b></td><td><input type=text name=play_name size=12></td><td>&nbsp;&nbsp;<input type='submit' value='��� ����� ���������' style='width:160'>		
				</td>
			</tr>
		</form>
		</table>";
	}
}
else if ($packet_id == 4)
{
	$no = 1;
	if ((isset($play_name)))
	{
	  	$play_name =  str_replace(";","",$play_name);
		$play_name =  str_replace("/","",$play_name);
		$play_name =  str_replace("'","",$play_name);
		$pack_id = 0;
		$SQL="SELECT id,name,pack,level from sw_users where upper(up_name)=upper('$play_name')";
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
		if ($pack_id > 0)
		{
				//�������� �������
				$skill_down = (integer) $skill_down;
				$skill_down = round($skill_down+1-1);
				if ($skill_down > 0)
				{
					$p = $skill_down * 0.6;
					$inv_desc  = "Shamaal World Premium 4 Skill Down";
					$inv_descrus  = "������� ������ $skill_down ������ �� $p$.";
					$out_summ  = "$p";          //����� ������� 9.89
					$shp_item = $pack_id;                // ����� ������
					$shp_typ = 4;                // ��� ������
					$shp_param1 = $skill_down;                // ��� ������
					$shp_param2 = 1;                // ��� ������
					$shp_param3 = 1;                // ��� ������
					print "<br><table cellpadding=0 cellspacing=0 width=100%  class=small><Tr  class=small><td class=small><b>�������� ������:</b></td><td  class=small> $pack_name</td></tr><tr><Td  class=small><b>������� �����:</b></td><td  class=small> $pack_level ��.</td></tr><tr><td class=small><b>���� ������:</b></td><td  class=small> <font color=red>$out_summ$</font></td></tr><tr><td class=small><b>�������� �������:&nbsp;</b></td><td  class=small>$inv_descrus</td></tr><tr><td colspan=2 align=center><br>";
					include("p.php");
					print "</td></tr></table>";
					$no = 0;
				}
				else
					$err = "<br><table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small><font color=red>������ � ���������� �����.</font></tr></table>";
			
		}
		else
			$err = "<br><table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small><font color=red>�������� � ����� ������ �� ������.</font></tr></table>";
		
	}
	if ($no == 1)
	{
		print "$err<br>
		<table cellpadding=0 cellspacing=0 width=100%>
		<form action='main.php' method='post'>
		<input type=hidden name=load value=$load>
		<input type=hidden name=packet_id value=$packet_id>
			<Tr>
				<td class=small colspan=3><b>� ���������� ������������ ������:&nbsp;&nbsp;</b><input type=text size=5 maxlength=5 name=skill_down></td>
			</tr>
			<Tr>
				<td class=small><b>� ��� ���������:&nbsp;&nbsp;</b></td><td><input type=text name=play_name size=12></td><td>&nbsp;&nbsp;<input type='submit' value='��� ����� ���������' style='width:160'>		
				</td>
			</tr>
			
		</form>
		</table>";
	}
}
else if ($packet_id == 5)
{
	$no = 1;
	if ((isset($play_name)))
	{
		$pack_id = 0;
		$play_name =  str_replace(";","",$play_name);
		$play_name =  str_replace("/","",$play_name);
		$play_name =  str_replace("'","",$play_name);
		$pay_pass =  str_replace(";","",$pay_pass);
		$pay_pass =  str_replace("/","",$pay_pass);
		$pay_pass =  str_replace("'","",$pay_pass);
		$decodepwd = md5("#".$pay_pass);
		$SQL="SELECT id,name,pack,level,race from sw_users where upper(up_name)=upper('$play_name') and decodepwd='$decodepwd' and npc=0";
		$row_num=SQL_query_num($SQL);
		while ($row_num){
			$pack_id = $row_num[0];
			$pack_name = $row_num[1];
			$pack_pack = $row_num[2];
			$pack_level = $row_num[3];
			$pack_race = $row_num[4];
			$row_num=SQL_next_num();
		}
		if ($result)
		mysql_free_result($result);
		if ($pack_id > 0)
		{
			$pay_class = (integer) $pay_class;
			$pay_class = round($pay_class+1-1);
			if (($pay_class == 1) || ($pay_class == 2) || ($pay_class == 3) || ($pay_class == 4) || ($pay_class == 5))
			{
				if ($pack_pack & 4)
					print "<br><table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small><b><font color=red>����� � ����� ��������� ��� ������ � �� ����� ���� ���� ��������.<b></font></tr></table>";
				else
				{
					//�������� �������
					$inv_desc  = "Shamaal World Premium 5 Reincornation";
					$inv_descrus  = "������� ������������.";
					$out_summ  = "20";          //����� ������� 9.89
					$shp_item = $pack_id;                // ����� ������
					$shp_typ = 5;                // ��� ������
					$shp_param1 = $pay_class;                // ��� ������
					$shp_param2 = 1;                // ��� ������
					$shp_param3 = 1;                // ��� ������
					print "<br><table cellpadding=0 cellspacing=0 width=100%  class=small><Tr  class=small><td class=small><b>�������� ������:</b></td><td  class=small> $pack_name</td></tr><tr><Td  class=small><b>������� �����:</b></td><td  class=small> $pack_level ��.</td></tr><tr><td class=small><b>���� ������:</b></td><td  class=small> <font color=red>$out_summ$</font></td></tr><tr><td class=small><b>����� ���� ���������:&nbsp;</b></td><td  class=small>$race_name[$pay_class]</td></tr><tr><td class=small><b>�������� �������:&nbsp;</b></td><td  class=small>$inv_descrus</td></tr><tr><td colspan=2 align=center><br>";
					include("p.php");
					print "</td></tr></table>";
					$no = 0;
				}
			}
			else
				$err = "<br><table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small><font color=red>����� ������ �� �����.</font></tr></table>";
		}
		else
			$err = "<br><table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small><font color=red>�������� � ����� ������ � ������� �� ������.</font></tr></table>";
		
	}
	if ($no == 1)
	{
		print "$err<br>
		<table cellpadding=0 cellspacing=0 width=100%>
		<form action='main.php' method='post'>
		<input type=hidden name=load value=$load>
		<input type=hidden name=packet_id value=$packet_id>
				<Tr>
					<td class=small colspan=3><table cellpadding=0 cellspacing=0 width=100%><Tr><td class=small width=180><b>� ����� ���� ���������:&nbsp;&nbsp;</b></td><td><select name=pay_class><option value=1>�������</option><option value=2>����</option><option value=3>����</option><option value=4>���</option><option value=5>������</option></select></td></tr></table></td>
				</tr>
				<Tr>
					<td class=small><b>� ��� ���������:&nbsp;&nbsp;</b></td><td><input type=text name=play_name size=12></td><td rowspan=2>&nbsp;&nbsp;<input type='submit' value='��� ����� ���������' style='width:160'>		
				</td>
				<Tr>
					<td class=small><b>� ������:&nbsp;&nbsp;</b></td><td><input type=password name=pay_pass size=12></td><td>&nbsp;&nbsp;	
					</td>
				</tr>
		</form>
		</table>";
	}
}
?>
</td></tr></table>