<?
//print "<div align=center><b>����������� �������.</b></div><br>";
$rt = 1;


if ((!isset($optnum)) || ($optnum == 0))
{
	if ($rt == 1)
	{
	If (Isset($register))
	{
		$race = (integer) $race;
		$sex = (integer) $sex;
		$race=round($race+1-1);
		$error = -1;
		$SQL="select upper('$mlogin'),upper('$name')";
		$row_num=SQL_query_num($SQL);
		while ($row_num){
			$u_login=$row_num[0];
			$u_name=$row_num[1];
			$row_num=SQL_next_num();
		}
		if ($result)
		mysql_free_result($result);
		if ((!isset($name)) || ($name == "") || (strpos("_$name", " ") <> '')|| (strpos("_$name", "&nbsp;") <> '') || (strpos("_$name", chr(60)) <> '') || (strlen($name) < 3) || (strlen($name) > 12))
		{
			print "<font color=FF0000>Error 100, ��� ����� �� �������, ��� ������ 3 �������� ��� ������ 12 ��� �������� �������.</font><br>";
			$error = 1;
		}
		if ((!isset($mlogin)) || ($mlogin == "") || (strpos("_$mlogin", " ") <> '')|| (strpos("_$mlogin", "&nbsp;") <> '') || (strpos("_$mlogin", chr(60)) <> '') || (strlen($mlogin) < 4) || (strlen($mlogin) > 12))
		{
			print "<font color=FF0000>Error 100, ����� �� �����, ��� ������ 4 �������� ��� ������ 12.</font><br>";
			$error = 1;
		}
		if ($u_login == $u_name)
		{
			print "<font color=FF0000>Error 100, ����� � ��� ��������� �� ������ ���������.</font><br>";
			$error = 1;
		}
		if ((!isset($rule)) || ($rule <> 1))
		{
			print "<font color=FF0000>Error 100, �� �� ����������� � ���������.</font><br>";
			$error = 1;
		}

		if ((!isset($password)) || ($password == "") || (strpos($password, " ") <> '') || (strlen($password) < 4) || (strlen($password) > 15))
		{
			print "<font color=FF0000>Error 101, ������ ����� �� ������, ��� ������ 5 �������� ��� ������ 15.</font><br>";
			$error = 1;
		}

		if ((!isset($email)) || ($email == "") || (strpos($email, " ") <> '') || (strlen($email) < 4) || (strlen($email) > 40))
		{
			print "<font color=FF0000>Error 102, E-Mail ����� �� ������, ��� ������ 4 �������� ��� ������ 40.</font><br>";
			$error = 1;
		}
		if ((!isset($sex)) || ($sex<0)|| ($sex>1))
		{
			print "<font color=FF0000>Error 103 , �������� � ��� ��� :).</font><br>";
			$error = 1;
		}
		if ((!isset($race)))
		{
			print "<font color=FF0000>Error 104 , ����� ���� �� ����������.</font><br>";
			$error = 1;
		}
		if (($race < 1) || ($race > 5))
		{

			print "<font color=FF0000>Error 104 , ����� ���� �� ����������.</font><br>";
			$error = 1;
		}


		if ($repassword != $password)
		{
			print "<font color=FF0000>Error 105 , ������ �� ���������.</font><br>";
			$error=1;
		}

		if ((preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/",$name)))
		{
	        echo "<font color=FF0000>Error 106, ���������� ������������ �������� � ���� ���<br></font>";
			$error=1;
		}
		if ((preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/",$mlogin)))
		{
	        echo "<font color=FF0000>Error 106, ���������� ������������ �������� � ���� �����<br></font>";
			$error=1;
		}
		if ((preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/",$password)))
		{
	        echo "<font color=FF0000>Error 106, ���������� ������������ �������� � ���� ������<br></font>";
			$error=1;
		}
		if (((preg_match("/[^(\w)|(\@)|(\.)|(\-)]/",$mail))))
		{
	        echo "<font color=FF0000>Error 107, ���������� ������������ �������� � ���� E-Mail<br></font>";
			$error=1;
		}
		if (CheckLan($name)==0)
		{
	        echo "<font color=FF0000>Error 108, ����������� ������������ ��� ������ ���������� �����, ��� ������ �������..<br></font>";
			$error=1;
		}
		
		if($captcha != $_SESSION['kg_key'])
		{
			echo "<font color=FF0000>Error 109, ��������� ��� �� ������������� ���� �� ��������.<br></font>";
			$error=1;
		}

		If ($error == 1)
			$register = 2;
		else
		{
			//$sname = strtoupper($name);
			$num_users = 1;
			$SQL="select count(*) as num from sw_users where up_name=upper('$name')";
			$row_num=SQL_query_num($SQL);
			while ($row_num){
				$num_users=$row_num[0];
				$row_num=SQL_next_num();
			}
			if ($result)
			mysql_free_result($result);
			$SQL="select count(*) as num from sw_users where up_login=upper('$mlogin')";
			$row_num=SQL_query_num($SQL);
			while ($row_num){
				$num_logins=$row_num[0];
				$row_num=SQL_next_num();
			}
			if ($result)
			mysql_free_result($result);
			If (($num_users == 0) && ($num_logins == 0))
			{
				$today = date("d.m.y");
				$IP = GetIP();
				//$reg_info = "Date = $today  IP = $IP";
				//�� ��� e-mail ��� ������ ��� �����������.
				print "����� ��� ������� ������.";
				$cur_time = time();
				$decodepwd = md5("#".$password);
				$SQL="INSERT INTO sw_users (up_login,avtorizate,name, up_name, decodepwd, mail,sex,race,reg_ip,reg_date,mytext,reg_time) VALUES (upper('$mlogin'),1,'$name', upper('$name'),'$decodepwd', '$email', $sex,$race,'$IP',NOW(),' ',$cur_time)";
				SQL_do($SQL);
				/*$SQL="select id from sw_users where up_name='$sname'";
				$row=SQL_query($SQL);
				while ($row){
					$id = "{$row{id}}";
					$row=SQL_next();
				}
				if ($result)
				mysql_free_result($result);
				mail($email,"��� ����������� � ���� Shamaal World.","������� �� ������: <a href=http://www.coliseum.pizza.ee/main.php?load=2&do=aut&id=$id>http://www.coliseum.pizza.ee/main.php?load=2&do=aut&id=$id</a>");*/
			}
			else
			{
				$register = 2;
				if ($num_logins <> 0)
					echo "<font color=FF0000>Error 108, ������������ � ����� ������� ��� ���� � ����<br></font>";
				else
					echo "<font color=FF0000>Error 108, ������������ � ����� ������ ��� ���� � ����<br></font>";
			}
		}
	}
}
	If (!Isset($register) || ($register == 2))
	{
	?>

	<form action="index.php" method="post">
	<input type="hidden" name="load" value=<?print $load;?>>
	<input type="hidden" name="register" value="1">
					<div align = "center"><font face="Comic Sans MS" size = 4>����������� ������ ������������</font><br></div><br>

	<table width=95% align=center>
	<tr>
		<td>����� (12 ��������): </td>
		<td><input type="text" CLASS=B name="mlogin" value=<? print "$mlogin";?>></td>
	</tr>
	<tr>
		<td colspan="2"><em><font size="1" class=ssmall color=red>��� ����� ��� ����� � Shamaal World, ������� �� ������ ��������� � ����� ������ � ����.</font></em><br>
		<br>
		</td>
	</tr>
	<tr>
		<td>��� ����� (12 ��������): </td>
		<td><input type="text" CLASS=B name="name" value=<? print "$name";?>></td>
	</tr>
	<tr>
		<td colspan="2"><em><font size="1" class=ssmall>����������� ������������ ��� ������ ���������� �����, ��� ������ �������.</font></em>
		<br>
		<em><font size="1" class=ssmall color=red>��� ��������� ������ ��������������� �������� ���� � �� ������ ��������� � ��������� ��������� ��� �� ������ ������������ ���������, � ��������� ������ �� ����� ������������ ��� ����������� ��������������. ���������� � ���������� ������ � �������� <a href=rule.php target=_blank>���� ����� 5)</a>.</font></em><br><br><a href=genname.php target=_blank><b>� ��������� ���</b></a><br>

		<br>
		</td>
	</tr>


	<tr>
		<td>������ (15 ��������): </td>
		<td><input type="password" CLASS=B name="password" value=<? print "$password";?>></td>
	</tr>
	<tr>
		<td>��������� ������ (15 ��������): </td>
		<td><input type="password" CLASS=B name="repassword" value=<? print "$repassword";?>></td>
	</tr>
	<tr>
		<td colspan="2"><em><font size="1" class=ssmall>����������� ������������ ���������� � ������� �������. ��� ������� 5 ��������.</font></em><br>
		<br>
		</td>
	</tr>
	<tr>
		<td>E-mail (40 ��������): </td>
		<td><input type="text" name="email" CLASS=B value=<? print "$email";?>></td>
	</tr>
	<tr>
		<td colspan="2"><em><font size="1" class=ssmall color=red>�� ��� E-mail ����� ���������� ������, ���� �� ��� ��������.</font></em><br><br>
	</td>
	</tr>
			<tr>
		<td>������� ��� �� �������� : 	</td>
		<td>
			<img id="random" src="reg/random.php" /> 		
		<a href="javascript:void(document.getElementById('random').src = 'reg/random.php?r='+new Date().getTime())">
				<img src="maingame/pic/refresh.png">
		</a>
		</td>
	</tr>
	<tr>
		<td></td>
		<td><input type="text" name="captcha" CLASS=B value=""></td>
	</tr>
	<tr>
		<td colspan="2">��� ������ �����<br>
		<?
		If (isset($sex) && ($sex == 1))
			print "&nbsp;&nbsp;������� <input type='radio' name='sex' value='1' checked class=bgarea><br>";
		else
			if (!isset($sex))
				print "&nbsp;&nbsp;������� <input type='radio' name='sex' value='1' checked  class=bgarea><br>";
			else
				print "&nbsp;&nbsp;������� <input type='radio' name='sex' value='1'  class=bgarea><br>";

		If (isset($sex) && ($sex == 0))
			print "&nbsp;&nbsp;������� <input type='radio' name='sex' value='0' checked class=bgarea><br>";
		else
			print "&nbsp;&nbsp;������� <input type='radio' name='sex' value='0' class=bgarea><br>";

		?>
		<br>
		</td>
	</tr>
	<tr>
		<td colspan="2">�������� ���� �����<br>
			<table width=95% align=right>
			<tr>
				<td>
				 <? If (isset($race) && ($race == 1))
						print "<input type='radio' name='race' value='1' checked class=bgarea>";
					else
						if (!isset($race))
							print "<input type='radio' name='race' value='1' checked class=bgarea>";
						else
						print "<input type='radio' name='race' value='1' class=bgarea>";


				?>
				<b>����</b> - �� ����� ����������� � �����������.<br>
				<i><font  class=small>* ������� ����� �����</font></i>
				<table align=right width=35%><tr><td><i><font class=ssmall>
				����: 10 <br>
				�����������: 10 <br>
				��: 10 <br>
				��������: 10 <br>
				������������: 10
				</font></i><br>
				</td></tr></table>
				</td>
			</tr>
			<tr>
				<td>
				<? If (isset($race) && ($race == 2))
						print "<input type='radio' name='race' value='2' checked class=bgarea>";
					else
						print "<input type='radio' name='race' value='2' class=bgarea>";


				?> <b>�����</b> - ���� �����, �� ����� ����� ����� ������������. ��� ����������� � ���� � ������������ ���� �����, �� ��� ����� �������� ��� �����, ��� � ����. ���������� ����� ���� ����� ����.<br>
				<i><font class=small>* �������������� ����.</font></i><br>

				<i><font   class=small>* �������� ������� ������� ���� �� ������.</font></i><br>

				<i><font   class=small>* ����� ������ � ���������.</font></i><br>
				<table align=right width=35%><tr><td><i><font size="1"  class=small>
				����: 8 <br>
				�����������: 12 <br>
				��: 11 <br>
				��������: 11 <br>
				������������: 8
				</font></i><br>
				</td></tr></table>

				</td>
			</tr>
			<tr>
				<td>			<? If (isset($race) && ($race == 4))
						print "<input type='radio' name='race' value='3' checked class=bgarea>";
					else
						print "<input type='radio' name='race' value='3' class=bgarea>";


				?> <b>�����</b> - ��� ���������� ��������, ��������� ����� �������������. ����� ����� ������� ���� � �������� ������������, �� ������ �������. ����� ����� ������������, ��� ����, �� ����������� ������ �� � ���� ������� ����������������� �����.
				<br>
				<i><font   class=small>* ������ �� �����.</font></i><br>
				<i><font   class=small>* ��������� ����� �����.</font></i><br>
				<i><font   class=small>* ������� �������������� ������.</font></i><br>
				<table align=right width=35%><tr><td><i><font size="1"  class=small>
				����: 10 <br>
				�����������: 8 <br>
				��: 10 <br>
				��������: 11 <br>
				������������: 11
				</font></i><br>
				</td></tr></table>
				</td>
			</tr>
			<tr>
				<td>			<? If (isset($race) && ($race == 8))
						print "<input type='radio' name='race' value='4' checked class=bgarea>";
					else
						print "<input type='radio' name='race' value='4' class=bgarea>";


				?> <b>����</b> - ��������� ����������� ��������. �� ������ ���� ������ ���������. ����� ������ ������������������� � ���������. � ������� ������� � ������������. ���� ���������� �������� �����, �� ���� ���������� ������� �� ���� �����.
				<br>
				<i><font   class=small>* ��������� ����� �����.</font></i><br>
				<i><font   class=small>* �������������� �����.</font></i><br>
				<i><font  class=small>* ����������� ������������.</font></i><br>
				<table align=right width=35%><tr><td><i><font size="1"  class=small>
				����: 12 <br>
				�����������: 11 <br>
				��: 8 <br>
				��������: 7 <br>
				������������: 12
				</font></i><br>
				</td></tr></table>
				</td>
			</tr>
			<tr>
				<td>			<? If (isset($race) && ($race == 16))
						print "<input type='radio' name='race' value='5' checked class=bgarea>";
					else
						print "<input type='radio' name='race' value='5' class=bgarea>";


				?> <b>������</b> - �������� ����� � ����������� �������� � ������� �����. ������ ����� ����� ������ �������� �������. ������� ������� ����������� ������ ��������������� ��������.

				<br>
				<i><font   class=small>* ������� �������������� ������.</font></i><br>
				<i><font   class=small>* ��������� ������������� �����.</font></i><br>

				<table align=right width=35%><tr><td><i><font size="1"  class=small>
				����: 13 <br>
				�����������: 8 <br>
				��: 8 <br>
				��������: 8 <br>
				������������: 13
				</font></i><br>
				</td></tr></table>
				</td>
			</tr>
			<tr><td>
			<input type="checkbox" name="rule" value="1"> �������� � �������� � <a href=rule.php target=_blank>���������</a>.
			</td></tr>
			</table>


		</td>
	</tr>


	</table>

	<div align="center"><input type="submit" value="������� �����" ></div><br>
	<br>
	</form>
	<?
	}

//<input type="submit" value="������� �����">

}
?>