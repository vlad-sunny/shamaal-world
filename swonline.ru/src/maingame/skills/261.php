<?php

$game_skill_type_dmg[26] = 1;
$game_skill_name[26][1] = "������������";
$game_skill_dmg[26][1] = $wis_dmg * 0.92;
$game_skill_mana[26][1] = 35;
$game_skill_textnum[26][1] = 1;
$game_skill_text[26][1][1] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b> ��������{$sex_a} ����� Voodoo ������ �������.";
$game_skill_dmgtype[26][1] = 7;
$game_skill_canblock[26][1] = 0;
$game_skill_wepon[26][1] = 7;
$game_skill_canmiss[26][1] = 0;
$game_skill_bad[26][1] = 1;
if ( $pl_npc[$target_id] == 0 )
{
    $game_skill_same_room[26][1] = 0;
}
else
{
    $game_skill_same_room[26][1] = 1;
}
$game_skill_type[26][1] = 7;
$game_skill_percent[26][1] = 0;
$game_skill_name[26][2] = "���������";
$game_skill_mana[26][2] = 40;
$game_skill_afflict_percent[26][2] = 100;
$game_skill_afflict[26][2] = ",aff_curses={$cur_time}+5*12";
$game_skill_afflict_text[26][2] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b> ������� ��� ������ Voodoo.";
if ( $pl_emune[$target_id] & 4 && $num == 2 )
{
    $game_skill_afflict_percent[$skill_id][$num] = 100;
    $game_skill_afflict[$skill_id][$num] = " ";
    $game_skill_afflict_text[26][2] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�� ����{$sex_la} ��������� ��������.";
}
$game_skill_miss[26][2] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�� ����{$sex_la} ��������� ��������.";
$game_skill_dmg[26][2] = 1;
$game_skill_textnum[26][2] = 0;
$game_skill_dmgtype[26][2] = 7;
$game_skill_canblock[26][2] = 0;
$game_skill_wepon[26][2] = 7;
$game_skill_canmiss[26][2] = 0;
$game_skill_bad[26][2] = 1;
$game_skill_same_room[26][2] = 0;
$game_skill_type[26][2] = 7;
$game_skill_percent[26][2] = 0;
$game_skill_name[26][3] = "������������";
$game_skill_dmg[26][3] = $wis_dmg * 1.35;
$game_skill_count[26][3] = 1;
$game_skill_mana[26][3] = 70;
$game_skill_textnum[26][3] = 1;
$game_skill_text[26][3][1] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b> ��������{$sex_a} ����� Voodoo ������ �����.";
$game_skill_dmgtype[26][3] = 7;
$game_skill_canblock[26][3] = 0;
$game_skill_wepon[26][3] = 7;
$game_skill_canmiss[26][3] = 0;
$game_skill_bad[26][3] = 1;
if ( $pl_npc[$target_id] == 0 )
{
    $game_skill_same_room[26][3] = 0;
}
else
{
    $game_skill_same_room[26][3] = 1;
}
$game_skill_type[26][3] = 7;
$game_skill_percent[26][3] = 0;
$game_skill_name[26][4] = "�������";
$game_skill_mana[26][4] = 60;
$game_skill_afflict_percent[26][4] = 100;
$game_skill_afflict[26][4] = ",aff_paralize={$cur_time}+6*12";
$game_skill_afflict_text[26][4] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b><font class=atype>����������� </font> {$sopernika5}.";
$game_skill_dmg[26][4] = 1;
$game_skill_textnum[26][4] = 0;
$game_skill_dmgtype[26][4] = 1;
$game_skill_canblock[26][4] = 0;
$game_skill_wepon[26][4] = 7;
$game_skill_canmiss[26][4] = 0;
$game_skill_bad[26][4] = 1;
$game_skill_same_room[26][4] = 0;
$game_skill_type[26][4] = 1;
$game_skill_percent[26][4] = 0;
?>
