<?php

$game_skill_type_dmg[12] = 1;
$game_skill_num[12] = 1;
$game_skill_afflict_percent[12][1] = 3;
$game_skill_afflict[12][1] = ",aff_cut={$cur_time}+3*12";
$game_skill_afflict_text[12][1] = "[<b>{$target_name}</b>] <font class=italic><b>{$player_name}</b> �����{$sex_la} �������� ���� {$sopernika4}.</font>";
$game_skill_name[12][1] = "���� �������";
$game_skill_dmg[12][1] = $blunt_dmg * 1.1;
$game_skill_textnum[12][1] = 3;
$game_skill_text[12][1][1] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>silno ������{$sex_a} ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_text[12][1][2] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>���������{$las} � silno ������{$sex_a}  ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_text[12][1][3] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>������{$sex_a} silniy ���� ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_block[12][1] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} ���� ������� {$po_mestu[$kickto]}, �� {$target_name} ��������{$sex2_a} <b>����</b>.";
$game_skill_miss[12][1] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} ���� ������� {$po_mestu[$kickto]}, �� {$target_name} <b>�������{$las2} </b> �� �����.";
$game_skill_dmgtype[12][1] = 1;
$game_skill_canblock[12][1] = 1;
$game_skill_wepon[12][1] = 3;
$game_skill_canmiss[12][1] = 1;
$game_skill_bad[12][1] = 1;
$game_skill_same_room[12][1] = 1;
$game_skill_type[12][1] = 1;
$game_skill_percent[12][1] = 0;
$game_skill_name[12][2] = "������� ����";
$game_skill_afflict_percent[12][2] = 8;
$game_skill_afflict[12][2] = ",aff_cut={$cur_time}+5*12";
$game_skill_afflict_text[12][2] = "[<b>{$target_name}</b>] <font class=italic><b>{$player_name}</b> �����{$sex_a} �������� ���� {$sopernika4}.</font>";
$game_skill_dmg[12][2] = $blunt_dmg * 1.7;
$game_skill_mana[12][2] = 7;
$game_skill_textnum[12][2] = 2;
$game_skill_text[12][2][1] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>����{$sex_a} silniy <font class=atype>������� </font> ���� ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_text[12][2][2] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>���������{$las} � ����{$sex_a} silniy <font class=atype>������� </font> ���� ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_block[12][2] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} <font class=atype>������� </font> ���� ������� {$po_mestu[$kickto]}, �� {$target_name} ��������{$sex2_a} <b>����</b>.";
$game_skill_miss[12][2] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} <font class=atype>������� </font> ���� ������� {$po_mestu[$kickto]}, �� {$target_name} <b>�������{$las2} </b> �� �����.";
$game_skill_dmgtype[12][2] = 1;
$game_skill_canblock[12][2] = 1;
$game_skill_wepon[12][2] = 3;
$game_skill_canmiss[12][2] = 1;
$game_skill_bad[12][2] = 1;
$game_skill_same_room[12][2] = 1;
$game_skill_type[12][2] = 1;
$game_skill_percent[12][2] = 0;
$game_skill_name[12][3] = "�����";
$game_skill_afflict_percent[12][3] = 12;
$game_skill_afflict[12][3] = ",aff_cut={$cur_time}+5*12";
$game_skill_afflict_text[12][3] = "[<b>{$target_name}</b>] <font class=italic><b>{$player_name}</b> �����{$sex_a} �������� ���� {$sopernika4}.</font>";
$game_skill_dmg[12][3] = $blunt_dmg * 1.5;
$game_skill_count[12][3] = 1;
$game_skill_mana[12][3] = 15;
$game_skill_textnum[12][3] = 2;
if ( $num == 3 )
{
    $kickto = 2;
}
$game_skill_text[12][3][1] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>�����{$sex_a} <font class=atype>��� </font> silnih ����� ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_text[12][3][2] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>���������{$las} � �����{$sex_a} <font class=atype>��� </font>silnih ����� ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_block[12][3] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} <font class=atype>��� ����� </font> ������� {$po_mestu[$kickto]}, �� {$target_name} ��������{$sex2_a} <b>����</b>.";
$game_skill_miss[12][3] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} <font class=atype>��� ����� </font> ������� {$po_mestu[$kickto]}, �� {$target_name} <b>�������{$las2} </b>.";
$game_skill_dmgtype[12][3] = 1;
$game_skill_canblock[12][3] = 1;
$game_skill_wepon[12][3] = 3;
$game_skill_canmiss[12][3] = 1;
$game_skill_bad[12][3] = 1;
$game_skill_same_room[12][3] = 1;
$game_skill_type[12][3] = 1;
$game_skill_percent[12][3] = 0;
$game_skill_name[12][4] = "�����������";
$game_skill_afflict_text[12][4] = "[<b>{$target_name}</b>] <font class=italic><b>{$player_name}</b> �����{$sex_a} �������� ���� {$sopernika4}.</font>";
$game_skill_mana[12][4] = 25;
$r = rand( 1, 3 );
if ( $num == 4 )
{
    $kickto = 1;
}
if ( $r == 1 )
{
    $game_skill_afflict_percent[12][4] = 50;
    $game_skill_dmg[12][4] = $blunt_dmg * 3.5;
    $game_skill_afflict[12][4] = ",aff_cut={$cur_time}+10*12";
    $game_skill_textnum[12][4] = 2;
    $game_skill_text[12][4][1] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>�����{$sex_a} isilniy ���� ������� � <font class=atype>������� ��� </font> {$sopernika2}.";
    $game_skill_text[12][4][2] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>����{$sex_a} ����� � ����� � � ������� silno ������{$sex_a} ������� � <font class=atype>������� ��� </font> {$sopernika2}.";
}
else
{
    $game_skill_dmg[12][4] = $blunt_dmg * 2.2;
    $game_skill_textnum[12][4] = 1;
    $game_skill_text[12][4][1] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>�����{$sex_a} ������� ������� � <font class=atype>������� ��� </font> {$sopernika2}, �� � ��������� ������ <b>{$target_name}</b> ����{$sex2_la} �������� ����.";
}
$game_skill_block[12][4] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} ���� ������� � <font class=atype>������� ��� </font>, �� {$target_name} ��������{$sex2_a} <b>����</b>.";
$game_skill_miss[12][4] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} ���� ������� � <font class=atype>������� ��� </font>, �� {$target_name} <b>�������{$las2} </b> �� �����.";
$game_skill_dmgtype[12][4] = 1;
$game_skill_canblock[12][4] = 1;
$game_skill_wepon[12][4] = 3;
$game_skill_canmiss[12][4] = 1;
$game_skill_bad[12][4] = 1;
$game_skill_same_room[12][4] = 1;
$game_skill_type[12][4] = 1;
$game_skill_percent[12][4] = 0;
?>
