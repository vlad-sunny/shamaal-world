<?php

$game_skill_type_dmg[11] = 1;
$game_skill_num[11] = 1;
$game_skill_name[11][1] = "���� �������";
$game_skill_afflict_percent[11][1] = 8;
$game_skill_afflict[11][1] = ",aff_afraid={$cur_time}+3*12";
$game_skill_afflict_text[11][1] = "[<b>{$target_name}</b>] <font class=italic><b>{$target_name}</b> ��������� ���������{$sex2_a} �� {$mysopernika}.</font>";
$game_skill_dmg[11][1] = $blunt_dmg * 1.4;
$game_skill_textnum[11][1] = 3;
$game_skill_text[11][1][1] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>silno ������{$sex_a} ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_text[11][1][2] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>���������{$las} � silno ������{$sex_a}  ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_text[11][1][3] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>������{$sex_a} silniy ���� ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_block[11][1] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} ���� ������� {$po_mestu[$kickto]}, �� {$target_name} ��������{$sex2_a} <b>����</b>.";
$game_skill_miss[11][1] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} ���� ������� {$po_mestu[$kickto]}, �� {$target_name} <b>�������{$las2} </b> �� �����.";
$game_skill_dmgtype[11][1] = 1;
$game_skill_canblock[11][1] = 1;
$game_skill_wepon[11][1] = 2;
$game_skill_canmiss[11][1] = 1;
$game_skill_bad[11][1] = 1;
$game_skill_same_room[11][1] = 1;
$game_skill_type[11][1] = 1;
$game_skill_percent[11][1] = 0;
$game_skill_name[11][2] = "������� ����";
$game_skill_dmg[11][2] = $blunt_dmg * 1.8;
$game_skill_afflict_percent[11][2] = 12;
$game_skill_afflict[11][2] = ",aff_afraid={$cur_time}+4*12";
$game_skill_afflict_text[11][2] = "[<b>{$target_name}</b>] <font class=italic><b>{$target_name}</b> ��������� ���������{$sex2_a} �� {$mysopernika}.</font>";
$game_skill_mana[11][2] = 5;
$game_skill_textnum[11][2] = 2;
$game_skill_text[11][2][1] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>����{$sex_a} silniy <font class=atype>������� </font> ���� ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_text[11][2][2] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>���������{$las} � ����{$sex_a} silniy <font class=atype>������� </font> ���� ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_block[11][2] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} <font class=atype>������� </font> ���� ������� {$po_mestu[$kickto]}, �� {$target_name} ��������{$sex2_a} <b>����</b>.";
$game_skill_miss[11][2] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} <font class=atype>������� </font> ���� ������� {$po_mestu[$kickto]}, �� {$target_name} <b>�������{$las2} </b> �� �����.";
$game_skill_dmgtype[11][2] = 1;
$game_skill_canblock[11][2] = 1;
$game_skill_wepon[11][2] = 2;
$game_skill_canmiss[11][2] = 1;
$game_skill_bad[11][2] = 1;
$game_skill_same_room[11][2] = 1;
$game_skill_type[11][2] = 1;
$game_skill_percent[11][2] = 0;
$game_skill_name[11][3] = "�������������� ����";
$game_skill_mana[11][3] = 12;
$r = rand( 1, 100 );
if ( $r <= 70 )
{
    $game_skill_dmg[11][3] = $blunt_dmg * 2.7;
    $game_skill_afflict_percent[11][3] = 15;
    $game_skill_afflict[11][3] = ",aff_afraid={$cur_time}+5*12";
    $game_skill_afflict_text[11][3] = "[<b>{$target_name}</b>] <font class=italic> <b>{$target_name}</b> ��������� ���������{$sex2_a} �� {$mysopernika}.</font>";
    $game_skill_textnum[11][3] = 2;
    $game_skill_text[11][3][1] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>����{$sex_a} silniy <font class=atype>�������������� </font> ���� ������� {$po_mestu[$kickto]} {$sopernika2}.";
    $game_skill_text[11][3][2] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>���������{$las} � ����{$sex_a} silniy <font class=atype>�������������� </font> ���� ������� {$po_mestu[$kickto]} {$sopernika2}.";
}
else
{
    $game_skill_dmg[11][3] = 1;
    $game_skill_textnum[11][3] = 1;
    $game_skill_text[11][3][1] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�� ����{$sex_la} ������� <font class=atype>�������������� </font> ����.";
}
$game_skill_block[11][3] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} <font class=atype>�������������� </font> ���� ������� {$po_mestu[$kickto]}, �� {$target_name} ��������{$sex2_a} <b>����</b>.";
$game_skill_miss[11][3] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} <font class=atype>�������������� </font> ���� ������� {$po_mestu[$kickto]}, �� {$target_name} <b>�������{$las2} </b> �� �����.";
$game_skill_dmgtype[11][3] = 1;
$game_skill_canblock[11][3] = 1;
$game_skill_wepon[11][3] = 2;
$game_skill_canmiss[11][3] = 1;
$game_skill_bad[11][3] = 1;
$game_skill_same_room[11][3] = 1;
$game_skill_type[11][3] = 1;
$game_skill_percent[11][3] = 0;
$game_skill_name[11][4] = "������� ����";
$game_skill_dmg[11][4] = $blunt_dmg * 3.2;
$game_skill_afflict_percent[11][4] = 20;
$game_skill_afflict[11][4] = ",aff_afraid={$cur_time}+6*12";
$game_skill_afflict_text[11][4] = "[<b>{$target_name}</b>] <font class=italic> <b>{$target_name}</b> ��������� ���������{$sex2_a} �� {$mysopernika}.</font>";
$game_skill_mana[11][4] = 22;
$game_skill_textnum[11][4] = 2;
$game_skill_text[11][4][1] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>����{$sex_a} <font class=atype>������� </font> isilniy  ���� ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_text[11][4][2] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>���������{$las} � ����{$sex_a} <font class=atype>������� </font> isilniy ���� ������� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_block[11][4] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} <font class=atype>������� </font> ���� ������� {$po_mestu[$kickto]}, �� {$target_name} ��������{$sex2_a} <b>����</b>.";
$game_skill_miss[11][4] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} <font class=atype>������� </font> ���� ������� {$po_mestu[$kickto]}, �� {$target_name} <b>�������{$las2} </b> �� �����.";
$game_skill_dmgtype[11][4] = 1;
$game_skill_canblock[11][4] = 1;
$game_skill_wepon[11][4] = 2;
$game_skill_canmiss[11][4] = 1;
$game_skill_bad[11][4] = 1;
$game_skill_same_room[11][4] = 1;
$game_skill_type[11][4] = 1;
$game_skill_percent[11][4] = 0;
if ( $pl_emune[$target_id] & 32 )
{
    $game_skill_afflict_percent[$skill_id][$num] = 0;
    $game_skill_afflict[$skill_id][$num] = "";
}
?>
