<?php

$game_skill_type_dmg[25] = 1;
if ( $num == 1 )
{
    if ( $pl_no_pvp[$player_id] == 0 && $pl_no_pvp[$target_id] == 0 )
    {
        $SQL = "select name from sw_map where id={$pl_room[$target_id]}";
        $row = SQL_query( $SQL );
        while ( $row )
        {
            $room_name = "{$row[name]}";
            $row = SQL_next( );
        }
        if ( $result )
        {
            mysql_free_result( $result );
        }
        if ( $room_name == "" || $pl_npc[$target_id] == 1 )
        {
            $room_name = "����� �� ����������";
        }
        $tn = $target_name;
        $target_id = $player_id;
        $target_name = $player_name;
    }
    else
    {
        $room_name = "�������� ��� ������ ����";
        $tn = $target_name;
        $target_id = $player_id;
        $target_name = $player_name;
    }
}
$game_skill_name[25][1] = "��������������";
$game_skill_mana[25][1] = 10;
$game_skill_afflict_percent[25][1] = 100;
$game_skill_afflict[25][1] = " ";
if ( $num == 1 )
{
    if ( $tn != "" )
    {
        $t = "[<b>{$target_name}</b>]&nbsp;{$tn} ���������  \xE2 ������� : <b>{$room_name}</b>.";
    }
    else
    {
        $t = "[<b>{$target_name}</b>]&nbsp;{$tn} ��������������� ���������� �� �������.";
    }
    $t = "top.add(\"{$time}\",\"\",\"{$t}\",5,\"\");";
    print "{$t}";
}
$game_skill_dmg[25][1] = 1;
$game_skill_textnum[25][1] = 0;
$game_skill_dmgtype[25][1] = 6;
$game_skill_canblock[25][1] = 0;
$game_skill_wepon[25][1] = 0;
$game_skill_canmiss[25][1] = 0;
$game_skill_bad[25][1] = 0;
$game_skill_same_room[25][1] = 0;
$game_skill_type[25][1] = 1;
$game_skill_percent[25][1] = 0;
$game_skill_name[25][2] = "���� ��";
$game_skill_dmg[25][2] = $wis_dmg * 0.9;
$game_skill_mana[25][2] = 40;
$game_skill_textnum[25][2] = 1;
$game_skill_text[25][2][1] = "[<b>{$target_name}</b>, ����� <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b>�����{$sex_la} <font class=atype>�������������� </font>���� {$po_mestu[$kickto]} {$sopernika2}.";
$game_skill_block[25][2] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} <font class=atype>�������������� </font>���� {$po_mestu[$kickto]}, �� {$target_name} ��������{$sex2_a} <b>����</b>.";
$game_skill_miss[25][2] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�������{$sex_a} <font class=atype>�������������� </font> ���� {$po_mestu[$kickto]}, �� {$target_name} <b>�������{$las2} </b>.";
$game_skill_dmgtype[25][2] = 6;
$game_skill_canblock[25][2] = 1;
$game_skill_wepon[25][2] = 0;
$game_skill_canmiss[25][2] = 0;
$game_skill_bad[25][2] = 1;
if ( $pl_npc[$target_id] == 0 )
{
    $game_skill_same_room[25][2] = 0;
}
else
{
    $game_skill_same_room[25][2] = 1;
}
$game_skill_type[25][2] = 1;
$game_skill_percent[25][2] = 0;
$game_skill_name[25][3] = "�������";
$game_skill_mana[25][3] = 40;
$game_skill_afflict_percent[25][3] = 100;
$game_skill_afflict[25][3] = ",aff_paralize={$cur_time}+3*12";
$game_skill_afflict_text[25][3] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b><font class=atype>����������� </font> {$sopernika5}.";
$game_skill_dmg[25][3] = 1;
$game_skill_textnum[25][3] = 0;
$game_skill_dmgtype[25][3] = 1;
$game_skill_canblock[25][3] = 0;
$game_skill_wepon[25][3] = 0;
$game_skill_canmiss[25][3] = 0;
$game_skill_bad[25][3] = 1;
$game_skill_same_room[25][3] = 1;
$game_skill_type[25][3] = 1;
$game_skill_percent[25][3] = 0;
$game_skill_name[25][4] = "����";
$game_skill_mana[25][4] = 50;
$game_skill_afflict_percent[25][4] = 100;
$game_skill_afflict[25][4] = ",aff_bleed_power=20,aff_bleed_time={$cur_time}+3*12";
$game_skill_afflict_text[25][4] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>��������{$sex_a} ������� �������������� ����� �� {$sopernika5}.";
if ( $pl_emune[$target_id] & 4 && $num == 4 )
{
    $game_skill_afflict_percent[$skill_id][$num] = 100;
    $game_skill_afflict[$skill_id][$num] = " ";
    $game_skill_afflict_text[25][4] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>�� ����{$sex_la} ��������� ����� �� {$sopernika5}.";
}
$game_skill_dmg[25][4] = 1;
$game_skill_textnum[25][4] = 0;
$game_skill_dmgtype[25][4] = 1;
$game_skill_canblock[25][4] = 0;
$game_skill_wepon[25][4] = 0;
$game_skill_canmiss[25][4] = 0;
$game_skill_bad[25][4] = 1;
$game_skill_same_room[25][4] = 0;
$game_skill_type[25][4] = 1;
$game_skill_percent[25][4] = 0;
$r = $pl_room[$target_id];
$npc = $pl_npc[$target_id];
$old = $target_name;
if ( $num == 5 )
{
    if ( $pl_npc[$target_id] == 1 )
    {
        $do_teleport = 4;
    }
    else if ( $pl_city[$player_id] == 9 && $pl_city[$target_id] != 9 || $pl_city[$player_id] != 9 && $pl_city[$target_id] == 9 )
    {
        if ( $pl_npc[$player_id] == 0 && $pl_npc[$target_id] == 0 )
        {
            $do_teleport = 5;
        }
    }
    else if ( 1337 <= $pl_room[$target_id] && $pl_room[$target_id] <= 1544 )
    {
        $do_teleport = 5;
    }
    else if ( 1337 <= $pl_room[$player_id] && $pl_room[$player_id] <= 1544 )
    {
        $do_teleport = 5;
    }
    else if ( inIsland( $player_id ) || inIsland( $target_id ) )
    {
        $do_teleport = 5;
    }
    else if ( $pl_no_pvp[$player_id] != 2 && $pl_no_pvp[$target_id] == 2 || $pl_no_pvp[$player_id] == 2 && $pl_no_pvp[$target_id] != 2 )
    {
        $do_teleport = 1;
    }
    else if ( $pl_no_pvp[$player_id] == 1 || $pl_no_pvp[$target_id] == 1 )
    {
        $do_teleport = 2;
    }
    else if ( 10 <= $pl_level[$player_id] && $pl_level[$target_id] < 10 || $pl_level[$player_id] < 10 && 10 <= $pl_level[$target_id] )
    {
        $do_teleport = 3;
    }
    else
    {
        $target_name = $player_name;
        $target_id = $player_id;
    }
}
$game_skill_name[25][5] = "��������";
$game_skill_mana[25][5] = 90;
$game_skill_afflict_percent[25][5] = 100;
if ( $r != "" )
{
    $game_skill_afflict[25][5] = ",room={$r}";
}
$game_skill_afflict_text[25][5] = "[<b>{$old}</b>]&nbsp;<b>{$player_name} </b>��������������{$las} \xE2 ���� �������.";
$game_skill_dmg[25][5] = 1;
$game_skill_textnum[25][5] = 0;
$game_skill_dmgtype[25][5] = 1;
$game_skill_canblock[25][5] = 0;
$game_skill_wepon[25][5] = 0;
$game_skill_canmiss[25][5] = 0;
$game_skill_bad[25][5] = 0;
if ( $npc == 0 )
{
    $game_skill_same_room[25][5] = 0;
}
else
{
    $game_skill_same_room[25][5] = 1;
}
$game_skill_type[25][5] = 1;
$game_skill_percent[25][5] = 0;
?>
