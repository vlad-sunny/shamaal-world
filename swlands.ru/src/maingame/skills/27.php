<?php
// Лук
$game_skill_type_dmg[27] = 1;

$game_skill_afflict_percent[27][1] = 10;
$game_skill_afflict[27][1] = ",aff_bleed_power=10,aff_bleed_time={$cur_time}+3*12";
$game_skill_afflict_text[27][1]= "[<b>$target_name</b>] <font class=italic><b>$target_name</b> истекает кровью.</font>";
$game_skill_num[27] = 1;
$game_skill_count[27][1] = 0;
$game_skill_name[27][1] = "Стрелы";
$game_skill_mana[27][1] = 0;
$game_skill_dmg[27][1] = $bow_dmg * 0.85;
$game_skill_textnum[27][1] = 2;
$game_skill_text[27][1][1] = "[<b>{$target_name}</b>, жизни <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b> оттянул{$sex_a} тетиву и выпустил{$sex_a} наносящую silniy урон стрелу {$v_mesto[$kickto]} {$sopernika2}.[DMG_FROM]";
$game_skill_text[27][1][2] = "[<b>{$target_name}</b>, жизни <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b> натянул{$sex_a} тетиву лука и выпустил{$sex_a} наносящую silniy урон стрелу {$v_mesto[$kickto]} {$sopernika2}.[DMG_FROM]";
$game_skill_block[27][1] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>выпустил{$sex_a} стрелу в {$sopernika5}, но {$target_name} смог{$sex2_la} <b>поймать</b> её.[DMG_FROM]";
$game_skill_miss[27][1] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>выпустил{$sex_a} стрелу в {$sopernika5}, но {$target_name} смог{$sex2_la} <b>увернуться</b>.[DMG_FROM]";
$game_skill_dmgtype[27][1] = 1;
$game_skill_canblock[27][1] = 1;
$game_skill_wepon[27][1] = 11;
$game_skill_canmiss[27][1] = 1;
$game_skill_bad[27][1] = 1;
$game_skill_same_room[27][1] = 1;
$game_skill_bow[27][1] = 1;
$game_skill_type[27][1] = 1;
$game_skill_percent[27][1] = 0;

$game_skill_count[27][2] = 0;
$game_skill_mana[27][2] = 10;
$game_skill_afflict_percent[27][2] = 15;
$game_skill_afflict[27][2] = ",aff_bleed_power=10,aff_bleed_time={$cur_time}+3*12";
$game_skill_afflict_text[27][2]= "[<b>$target_name</b>] <font class=italic><b>$target_name</b> истекает кровью.</font>";
$game_skill_name[27][2] = "Подготовленный выстрел";
$game_skill_dmg[27][2] = $bow_dmg * 1.25;
$game_skill_textnum[27][2] = 2;
$game_skill_text[27][2][1] = "[<b>{$target_name}</b>, жизни <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b> подготовил{$las} и выпустил{$sex_a} наносящую silniy урон стрелу {$v_mesto[$kickto]} {$sopernika2}.[DMG_FROM]";
$game_skill_text[27][2][2] = "[<b>{$target_name}</b>, жизни <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b> приготовил{$las} и выпустил{$sex_a} наносящую silniy урон стрелу {$v_mesto[$kickto]} {$sopernika2}.[DMG_FROM]";
$game_skill_block[27][2] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>выпустил{$sex_a} стрелу в {$sopernika5}, но {$target_name} смог{$sex2_la} <b>поймать</b> её.[DMG_FROM]";
$game_skill_miss[27][2] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>выпустил{$sex_a} стрелу в {$sopernika5}, но {$target_name} смог{$sex2_la} <b>увернуться</b>.[DMG_FROM]";
$game_skill_dmgtype[27][2] = 1;
$game_skill_canblock[27][2] = 1;
$game_skill_wepon[27][2] = 11;
$game_skill_canmiss[27][2] = 1;
$game_skill_bad[27][2] = 1;
$game_skill_same_room[27][2] = 1;
$game_skill_bow[27][2] = 1;
$game_skill_type[27][2] = 1;
$game_skill_percent[27][2] = 0;

$game_skill_count[27][3] = 1;
$game_skill_mana[27][3] = 22;
$game_skill_afflict_percent[27][3] = 15;
$game_skill_afflict[27][3] = ",aff_bleed_power=20,aff_bleed_time={$cur_time}+3*12";
$game_skill_afflict_text[27][3]= "[<b>$target_name</b>] <font class=italic><b>$target_name</b> истекает кровью.</font>";
$game_skill_name[27][3] = "2 Стрелы";
$game_skill_dmg[27][3] = $bow_dmg * 0.85;
$game_skill_textnum[27][3] = 2;
$game_skill_text[27][3][1] = "[<b>{$target_name}</b>, жизни <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b> оттянул{$sex_a} тетиву и выпустил{$sex_a} две наносящие silniy урон стрелы {$v_mesto[$kickto]} {$sopernika2}.[DMG_FROM]";
$game_skill_text[27][3][2] = "[<b>{$target_name}</b>, жизни <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b> натянул{$sex_a} тетиву лука и выпустил{$sex_a} две наносящие silniy урон стрелы {$v_mesto[$kickto]} {$sopernika2}.[DMG_FROM]";
$game_skill_block[27][3] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>выпустил{$sex_a} две стрелы в {$sopernika5}, но {$target_name} смог{$sex2_la} <b>поймать</b> их.[DMG_FROM]";
$game_skill_miss[27][3] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>выпустил{$sex_a} две стрелы в {$sopernika5}, но {$target_name} смог{$sex2_la} <b>увернуться</b>.[DMG_FROM]";
$game_skill_dmgtype[27][3] = 1;
$game_skill_canblock[27][3] = 1;
$game_skill_wepon[27][3] = 11;
$game_skill_canmiss[27][3] = 1;
$game_skill_bad[27][3] = 1;
$game_skill_same_room[27][3] = 1;
$game_skill_bow[27][3] = 1;
$game_skill_type[27][3] = 1;
$game_skill_percent[27][3] = 0;

$game_skill_count[27][4] = 0;
$game_skill_name[27][4] = "Снайперский выстрел";
$game_skill_afflict_percent[27][4] = 40;
$game_skill_afflict[27][4] = ",aff_bleed_power=20,aff_bleed_time={$cur_time}+3*12";
$game_skill_afflict_text[27][4]= "[<b>$target_name</b>] <font class=italic><b>$target_name</b> истекает кровью.</font>";
$game_skill_dmg[27][4] = $bow_dmg * 2.6;
$game_skill_mana[27][4] = 35;
$game_skill_textnum[27][4] = 2;
$game_skill_text[27][4][1] = "[<b>{$target_name}</b>, жизни <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b> оттянул{$sex_a} тетиву и произвел{$sex_a} silniy снайперский выстрел {$v_mesto[$kickto]} {$sopernika2}.[DMG_FROM]";
$game_skill_text[27][4][2] = "[<b>{$target_name}</b>, жизни <font class=dmg><DMG></font>]&nbsp;<b>{$player_name} </b> натянул{$sex_a} тетиву лука и произвел{$sex_a} silniy снайперский выстрел {$v_mesto[$kickto]} {$sopernika2}.[DMG_FROM]";
$game_skill_block[27][4] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>выпустил{$sex_a} стрелу в {$sopernika5}, но {$target_name} смог{$sex2_la} <b>поймать</b> её.[DMG_FROM]";
$game_skill_miss[27][4] = "[<b>{$target_name}</b>]&nbsp;<b>{$player_name} </b>выпустил{$sex_a} стрелу в {$sopernika5}, но {$target_name} смог{$sex2_la} <b>увернуться</b>.[DMG_FROM]";
$game_skill_dmgtype[27][4] = 1;
$game_skill_canblock[27][4] = 1;
$game_skill_wepon[27][4] = 11;
$game_skill_canmiss[27][4] = 1;
$game_skill_bad[27][4] = 1;
$game_skill_same_room[27][4] = 1;
$game_skill_bow[27][4] = 1;
$game_skill_type[27][4] = 1;
$game_skill_percent[27][4] = 0;

if ( $pl_emune[$target_id] & 1 )
{
    $game_skill_afflict_percent[$skill_id][$num] = 0;
    $game_skill_afflict[$skill_id][$num] = "";
}
?>
