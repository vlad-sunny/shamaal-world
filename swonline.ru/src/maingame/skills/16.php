<?
// �������� �����������
$game_skill_type_dmg[16]= 1;
$game_skill_num[16] = 1;
$game_skill_afflict_percent[16][1]= 10;
$game_skill_afflict[16][1]= ",aff_ground=".($cur_time+4*12);
$game_skill_afflict_text[16][1]= "[<b>$target_name</b>] <font class=italic><b>$player_name </b> ����$sex_a $sopernika5 � ���.</font>";
$game_skill_name[16][1]= "���� �������";
$game_skill_dmg[16][1]= $blunt_dmg*0.95;
$game_skill_textnum[16][1]= 3;
$game_skill_text[16][1][1] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>silno ������$sex_a ������� $po_mestu[$kickto] $sopernika2.";
$game_skill_text[16][1][2] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>���������$las � silno ������$sex_a ������� $po_mestu[$kickto] $sopernika2.";
$game_skill_text[16][1][3] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>������$sex_a silniy ���� ������� $po_mestu[$kickto] $sopernika2.";
$game_skill_block[16][1] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>�������$sex_a ���� ������� $po_mestu[$kickto], �� $target_name ��������$sex2_a <b>����</b>.";
$game_skill_miss[16][1] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>�������$sex_a ���� ������� $po_mestu[$kickto], �� $target_name <b>�������$las2 </b> �� �����.";
$game_skill_dmgtype[16][1]= 1;
$game_skill_canblock[16][1]= 1;
$game_skill_wepon[16][1]= 6;
$game_skill_canmiss[16][1]= 1;
$game_skill_bad[16][1]= 1;
$game_skill_same_room[16][1]= 1;
$game_skill_type[16][1]= 1;
$game_skill_percent[16][1]= 0;

$game_skill_name[16][2]= "���� �����";
$game_skill_afflict_percent[16][2]= 13;
$game_skill_afflict[16][2]= ",aff_ground=".($cur_time+4*12);
$game_skill_afflict_text[16][2]= "[<b>$target_name</b>] <font class=italic><b>$player_name  </b> ����$sex_a $sopernika5 � ���.</font>";
$game_skill_dmg[16][2]= $blunt_dmg*1.40;
$game_skill_mana[16][2]= 8;
$game_skill_textnum[16][2]= 2;
$game_skill_text[16][2][1] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>silno ������$sex_a <font class=atype>����� </font> $po_mestu[$kickto] $sopernika2.";
$game_skill_text[16][2][2] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>���������$las � silno ������$sex_a <font class=atype>����� </font> $po_mestu[$kickto] $sopernika2.";
$game_skill_text[16][2][3] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>������$sex_a silniy ���� <font class=atype>����� </font> $po_mestu[$kickto] $sopernika2.";
$game_skill_block[16][2] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>�������$sex_a ���� <font class=atype>����� </font> $po_mestu[$kickto], �� $target_name ��������$sex2_a <b>����</b>.";
$game_skill_miss[16][2] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>�������$sex_a ���� <font class=atype>����� </font> $po_mestu[$kickto], �� $target_name <b>�������$las2 </b> �� �����.";
$game_skill_dmgtype[16][2] = 1;
$game_skill_canblock[16][2]= 1;
$game_skill_wepon[16][2]= 6;
$game_skill_canmiss[16][2]= 1;
$game_skill_bad[16][2]= 1;
$game_skill_same_room[16][2]= 1;
$game_skill_type[16][2]= 1;
$game_skill_percent[16][2]= 0;

$game_skill_name[16][3]= "����������";
$game_skill_afflict_percent[16][3]= 20;
$game_skill_afflict[16][3]= ",aff_ground=".($cur_time+4*12);
$game_skill_afflict_text[16][3]= "[<b>$target_name</b>] <font class=italic><b>$player_name  </b> ����$sex_a $sopernika5 � ���.</font>";
$game_skill_dmg[16][3]= $blunt_dmg*0.95;
$game_skill_count[16][3]= rand(0,2);
$game_skill_mana[16][3]= 16;
$game_skill_textnum[16][3]= 2;
$game_skill_text[16][3][1] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>�����$sex_a <font class=atype>���������� </font> silnih ������ $po_mestu[$kickto] $sopernika2.";
$game_skill_text[16][3][2] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>������$sex_a <font class=atype>���������� </font>silnih ������ $po_mestu[$kickto] $sopernika2.";
$game_skill_block[16][3] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>�������$sex_a <font class=atype>���������� </font> ������ $po_mestu[$kickto], �� $target_name ��������$sex2_a <b>����</b>.";
$game_skill_miss[16][3] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b>�������$sex_a <font class=atype>���������� </font> ������ $po_mestu[$kickto], �� $target_name <b>�������$las2 </b> �� ������.";
$game_skill_dmgtype[16][3] = 1;
$game_skill_canblock[16][3]= 1;
$game_skill_wepon[16][3]= 6;
$game_skill_canmiss[16][3]= 1;
$game_skill_bad[16][3]= 1;
$game_skill_same_room[16][3]= 1;
$game_skill_type[16][3]= 1;
$game_skill_percent[16][3]= 0;


$game_skill_name[16][4] = "���� �����";
$game_skill_mana[16][4]= 30;
$game_skill_dmg[16][4]= $blunt_dmg*2.6;
$game_skill_textnum[16][4]= 1;

if ($pl_aff_ground[$target_id] > $cur_time)
{
	$game_skill_text[16][4][1] = "[<b>$target_name</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>$player_name </b>������$sex_a ��������� � �� ���� ���� ������$sex_a $ee �� �����.";
}
else
{
	$game_skill_dmg[16][4]= 1;
	$game_skill_text[16][4][1] = "[<b>$target_name</b>]&nbsp;<b>$player_name </b> �� ����$sex_a ������� ��������� ��� �����.";
}
$game_skill_dmgtype[16][4] = 1;
$game_skill_canblock[16][4]= 0;
$game_skill_wepon[16][4]= 6;
$game_skill_canmiss[16][4]= 0;
$game_skill_bad[16][4]= 1;
$game_skill_same_room[16][4]= 1;
$game_skill_type[16][4]= 1;
$game_skill_percent[16][4]= 0;
?>