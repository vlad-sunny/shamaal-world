<?
// �������� �����
$game_skill_type_dmg[13]= 1;
$game_skill_num[13] = 1;
$game_skill_afflict_percent[13][1]= 5;

$game_skill_afflict[13][1]= ",aff_bleed_power=10,aff_bleed_time=$cur_time+5*12";
$game_skill_afflict_text[13][1]= "[<b>$target_name</b>] <font class=italic><b>$target_name</b> �������� ������.</font>";
$game_skill_name[13][1]= "���� �����";
$game_skill_dmg[13][1]= $blunt_dmg*0.9;
$game_skill_textnum[13][1]= 3;
$game_skill_text[13][1][1] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>silno ������$sex_a ����� $po_mestu[$kickto] $sopernika2.";
$game_skill_text[13][1][2] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>������$sex_a ��� � silno ������$sex_a �� $po_mestu[$kickto] $sopernika2.";
$game_skill_text[13][1][3] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>������$sex_a silniy ���� ����� $po_mestu[$kickto] $sopernika2.";
$game_skill_block[13][1] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>�������$sex_a ���� ����� $po_mestu[$kickto], �� $target_name ��������$sex2_a <b>����</b>.";
$game_skill_miss[13][1] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>�������$sex_a ���� ����� $po_mestu[$kickto], �� $target_name <b>�������$las2 </b> �� �����.";
$game_skill_dmgtype[13][1]= 1;
$game_skill_canblock[13][1]= 1;
$game_skill_wepon[13][1]= 1;
$game_skill_canmiss[13][1]= 1;
$game_skill_bad[13][1]= 1;
$game_skill_same_room[13][1]= 1;
$game_skill_type[13][1]= 1;
$game_skill_percent[13][1]= 0;

$game_skill_name[13][2]= "������� ����";
$game_skill_afflict_percent[13][2]= 12;
$game_skill_afflict[13][2]= ",aff_bleed_power=20,aff_bleed_time=$cur_time+5*12";
$game_skill_afflict_text[13][2]= "[<b>$target_name</b>] <font class=italic><b>$target_name</b> �������� ������.</font>";
$game_skill_dmg[13][2]= $blunt_dmg*1.30;
$game_skill_mana[13][2]= 6;
$game_skill_textnum[13][2]= 2;
$game_skill_text[13][2][1] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>����$sex_a silniy <font class=atype>�������  </font> ���� ����� $po_mestu[$kickto] $sopernika2.";
$game_skill_text[13][2][2] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>�$ushol � �������, � �����$sex_la silniy <font class=atype>������� </font> ���� ����� $po_mestu[$kickto] $sopernika2.";
$game_skill_block[13][2] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>�������$sex_a <font class=atype>������� </font> ���� ����� $po_mestu[$kickto], �� $target_name ��������$sex2_a <b>����</b>.";
$game_skill_miss[13][2] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>�������$sex_a <font class=atype>������� </font> ���� ����� $po_mestu[$kickto], �� $target_name <b>�������$las2 </b> �� �����.";
$game_skill_dmgtype[13][2] = 1;
$game_skill_canblock[13][2]= 1;
$game_skill_wepon[13][2]= 1;
$game_skill_canmiss[13][2]= 1;
$game_skill_bad[13][2]= 1;
$game_skill_same_room[13][2]= 1;
$game_skill_type[13][2]= 1;
$game_skill_percent[13][2]= 0;

$game_skill_name[13][3]= "����� �����";
$game_skill_afflict_percent[13][3]= 15;
$game_skill_afflict[13][3]= ",aff_bleed_power=25,aff_bleed_time=$cur_time+5*12";
$game_skill_afflict_text[13][3]= "[<b>$target_name</b>] <font class=italic><b>$target_name</b> �������� ������.</font>";
$game_skill_dmg[13][3]= $blunt_dmg*0.9;
$game_skill_count[13][3]= rand(0,2);
$game_skill_mana[13][3]= 14;
$game_skill_textnum[13][3]= 2;
$game_skill_text[13][3][1] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>�����$sex_la <font class=atype>��������� </font> silnih ������ ����� $po_mestu[$kickto] $sopernika2.";
$game_skill_text[13][3][2] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>������$sex_a  silnuju <font class=atype>����� </font>����� $po_mestu[$kickto] $sopernika2.";
$game_skill_block[13][3] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>��������$sex_a <font class=atype>����� </font> ����� $po_mestu[$kickto], �� $target_name ��������$sex2_a <b>����</b>.";
$game_skill_miss[13][3] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>��������$sex_a <font class=atype>����� </font> ����� $po_mestu[$kickto], �� $target_name <b>�������$las2 </b> �� ������.";
$game_skill_dmgtype[13][3] = 1;
$game_skill_canblock[13][3]= 1;
$game_skill_wepon[13][3]= 1;
$game_skill_canmiss[13][3]= 1;
$game_skill_bad[13][3]= 1;
$game_skill_same_room[13][3]= 1;
$game_skill_type[13][3]= 1;
$game_skill_percent[13][3]= 0;


$game_skill_name[13][4] = "����������";
$game_skill_afflict_percent[13][4]= 18;
$game_skill_afflict[13][4]= ",aff_bleed_power=25,aff_bleed_time=$cur_time+5*12";
$game_skill_afflict_text[13][4]= "[<b>$target_name</b>] <font class=italic><b>$target_name</b> �������� ������.</font>";
$game_skill_count[13][4]= rand(1,2);
$game_skill_mana[13][4]= 25;
$game_skill_dmg[13][4]= $blunt_dmg*0.9;
$game_skill_textnum[13][4]= 2;
$game_skill_text[13][4][1] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>��������� �����$sex_a <font class=atype>������������</font> isilnuju ����� ����� $v_mesto[$kickto] $sopernika2.";
$game_skill_text[13][4][2] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>���$ushol �����, � ����� �������� isilnuju <font class=atype>�����</font> ����� $v_mesto[$kickto] $sopernika2.";
$game_skill_block[13][4] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>��������$sex_a <font class=atype>����� </font> ����� $po_mestu[$kickto], �� $target_name ��������$sex2_a <b>����</b>.";
$game_skill_miss[13][4] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>��������$sex_a <font class=atype>����� </font> ����� $po_mestu[$kickto], �� $target_name <b>�������$las2 </b> �� ������.";
$game_skill_dmgtype[13][4] = 1;
$game_skill_canblock[13][4]= 1;
$game_skill_wepon[13][4]= 1;
$game_skill_canmiss[13][4]= 1;
$game_skill_bad[13][4]= 1;
$game_skill_same_room[13][4]= 1;
$game_skill_type[13][4]= 1;
$game_skill_percent[13][4]= 0;

if ($pl_emune[$target_id] & 1)
{
	$game_skill_afflict_percent[$skill_id][$num] = 0;
	$game_skill_afflict[$skill_id][$num] = '';
}
?>