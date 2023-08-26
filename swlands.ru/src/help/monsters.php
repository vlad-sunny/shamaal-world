<!--<table cellpadding=8>
    <TR>
        <TD>
            <table cellpadding=10 cellspacing=1 class=blue width=700 height=600>
                <TR>
                    <TD bgcolor="EBF1F7" valign=top>
                        <table cellspacing=1 class=blue cellpadding=5 width=100%><tr><TD bgcolor=B9C9D9 width=99% height=25><b class=textbigred>» <?/*print $name;*/?></b> :: <b class=textbiggreen>Монстр</b> :: <font class=textbiggreen><?/*print $level;*/?> уровень</font> </td></tr></table>
                        <br>
                        <table cellpadding=0 cellspacing=0 width=100%>
                            <tr>
                                <Td colspan=2>
                                    <table class=blue cellpadding=3 cellspacing=1  height=20 width=100%>
                                        <tr bgcolor=F6FAFF>
                                            <form action=''>
                                                <td>
                                                    <table width=100%><Tr><Td width=140><b>» Поиск персонажа:&nbsp;</b></td><td width=100><input type="text" name="name" value="<?/*print $name;*/?>" size=14></td><td><input type="submit" value="Поиск"></td><td align=right><?/*print $adm;*/?></td></tr></table>
                                                </td>
                                            </form>
                                        </tr>
                                    </table>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td height=100% valign=top>
                                    <table class=blue cellpadding=5 cellspacing=1  height=100% width=335>
                                        <tr>
                                            <td bgcolor=F6FAFF align=center>
                                                <?/*
                                                if ($pic <> '')
                                                    print "<img src=maingame/pic/npc/$pic>";
                                                else
                                                    print "<img src=maingame/pic/npc/no.gif>";
                                                */?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td height=100% valign=top>
                                    <table class=blue cellpadding=5 cellspacing=1  height=100%  width=335>
                                        <tr>
                                            <td bgcolor=F6FAFF valign=top height=100%>
                                                <?/* print "<table width=98% cellpadding=1 cellspacing=1 align=center><tr><tr><td colspan=2 align=center height=20 valign=top>:: <b>Общая информация</b> ::</td></tr><td class=info1>Имя:</td><td class=info2>$name</td></tr><tr><td class=info1>Уровень:</td><td class=info2>$level</td></tr><tr><td class=info1>Пол:</td><td class=info2>$sex</td></tr><tr><td colspan=2 height=$width></td></tr><tr><td colspan=2 align=center height=20>:: <b>Способности</b> ::</td></tr>";

                                                if (($ntyp <> 0) && ($game_skill_name[$ntyp][$ntyp_num]))
                                                {
                                                    $a = $game_skill_name[$ntyp][$ntyp_num];
                                                    print "<tr><td class=info1>Первичное умение:</td><td class=info2>$a</td></tr>";
                                                }
                                                else
                                                    print "<tr><td class=info1>Первичное умение:</td><td class=usernormal>Отсутствует</td></tr>";
                                                if (($ntyp2 <> 0) && ($game_skill_name[$ntyp2][$ntyp2_num]))
                                                {
                                                    $a = $game_skill_name[$ntyp2][$ntyp2_num];
                                                    print "<tr><td class=info1>Вторичное умение:</td><td class=info2>$a</td></tr>";
                                                }
                                                else
                                                    print "<tr><td class=info1>Вторичное умение:</td><td class=usernormal>Отсутствует</td></tr>";
                                                if (($ntyp3 <> 0) && ($game_skill_name[$ntyp3][$ntyp3_num]))
                                                {
                                                    $a = $game_skill_name[$ntyp3][$ntyp3_num];
                                                    print "<tr><td class=info1>Защитное умение:</td><td class=info2>$a</td></tr>";
                                                }
                                                else
                                                    print "<tr><td class=info1>Защитное умение:</td><td class=usernormal>Отсутствует</td></tr>";
                                                if (($nheal <> 0) && ($game_skill_name[21][$nheal]))
                                                {
                                                    $a = $game_skill_name[21][$nheal];
                                                    print "<tr><td class=info1>Лечение:</td><td class=info2>$a</td></tr>";
                                                }
                                                else
                                                    print "<tr><td class=info1>Лечение:</td><td class=usernormal>Отсутствует</td></tr>";
                                                print "<tr><td colspan=2 align=center height=20>:: <b>Защитные характеристики</b> ::</td></tr>";
                                                $zas = '';

                                                $d1 = abs($def1);
                                                if ($d1 > 60)
                                                    $d1text = 'отличной';
                                                else if ($d1 > 35)
                                                    $d1text = 'очень хорошей';
                                                else if ($d1 > 20)
                                                    $d1text = 'хорошей';
                                                else if ($d1 > 10)
                                                    $d1text = 'средней';
                                                else
                                                    $d1text = 'небольшой';
                                                $d2 = abs($def2);
                                                if ($d2 > 60)
                                                    $d2text = 'отличной';
                                                else if ($d2 > 35)
                                                    $d2text = 'очень хорошей';
                                                else if ($d2 > 20)
                                                    $d2text = 'хорошей';
                                                else if ($d2 > 10)
                                                    $d2text = 'средней';
                                                else
                                                    $d2text = 'небольшой';

                                                $em = "";
                                                if ($emune & 1)
                                                    $em .= " Кровотечение ";
                                                if ($emune & 2)
                                                    $em .= " Ожоги ";
                                                if ($emune & 4)
                                                    $em .= " Проклятие ";
                                                if ($emune & 8)
                                                    $em .= " Слепота ";
                                                if ($emune & 16)
                                                    $em .= " Видение ";
                                                if ($emune & 32)
                                                    $em .= " Страх ";
                                                if ($def1 > 0)
                                                    $zas .= "<tr><td colspan=2 height=20><div align=justify>$name обладает <b>$d1text</b> дополнительной защитой от физических ударов.</div></td></tr>";
                                                else if ($def1 < 0)
                                                    $zas .= "<tr><td colspan=2 height=20><div align=justify>$name подвержен физическим ударам.</div></td></tr>";

                                                if ($def2 > 0)
                                                    $zas .= "<tr><td colspan=2 height=20><div align=justify>$name обладает <b>$d2text</b> дополнительной защитой от магического урона.</div></td></tr>";
                                                else if ($def2 < 0)
                                                    $zas .= "<tr><td colspan=2 height=20><div align=justify>$name подвержен магическому урону.</div></td></tr>";
                                                if ($zas <> '')
                                                    print $zas;
                                                else
                                                    print "<tr><td colspan=2 height=20 align=center>Дополнительная защита отсутствует</td></tr>";
                                                if ($em <> '')
                                                    print "<tr><td colspan=2 height=20><b>Иммунитеты:</b> $em</td></tr>";

                                                print "<tr><td colspan=2 height=40 align=center></td></tr>";
                                                //<td class=info1>Место проживания:</td><td class=info2>$city_name</td></tr><tr><td class=info1>Боевой рейтинг:</td><td class=info2>$rating</td></tr><tr><td class=info1>Позиция в рейтинге:</td><td class=info2>$rat</td></tr><tr><td class=info1>Позиция по активности:</td><td class=info2>$exp_max</td></tr><tr><td class=info1>Время жизни:</td><td class=info2>$day дней $hour часов и $minute минут</td></tr><tr><td class=info1>Город:</td><td class=info2>$cname</td></tr>$cit_name
                                                print "</table>"; */?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
    </tr>
    </td>
</table>-->

<div align="center" style="margin-bottom: 15px;"><b>Монстрология</b></div>

<?php

    class Monster
    {
        public $name;
        public $level;
        public $pic;
        public $hp;
        public $resp_time;
        public $def_p;
        public $def_m;
        public $bad;
        public $drop;
        public $drop_names;
        public $location;

        public function is_duplicate(Monster $monster) {
            return $this->name == $monster->name &&
            $this->level == $monster->level &&
            $this->resp_time == $monster->resp_time &&
            $this->bad == $monster->bad;
        }

        public function get_formatted_drop() {

            $result = '';

            foreach ($this->drop as $drop_id => $drop_chance) {
                if ($drop_chance < 5) {
                    $drop_chance = "очень редко";
                }
                else if ($drop_chance < 10) {
                    $drop_chance = "редко";
                }
                else if ($drop_chance < 20) {
                    $drop_chance = "периодически";
                }
                else if ($drop_chance < 50) {
                    $drop_chance = "часто";
                }
                else if ($drop_chance == 100) {
                    $drop_chance = "всегда";
                }
                else {
                    $drop_chance = "очень часто";
                }

                $result .= '<div style="text-align: center;">'.$this->drop_names[$drop_id].' - '.$drop_chance.'</div>';
            }

            return $result;
        }

    }

    function get_string_time_from_seconds($seconds) {

        $time_minutes = 0;
        $time_hours = 0;
        $time_days = 0;

        $time_seconds = $seconds % 60;
        $seconds = floor($seconds / 60);

        if ($seconds > 0) {
            $time_minutes = $seconds % 60;
            $seconds = floor($seconds / 60);

            if ($seconds > 0) {
                $time_hours = $seconds % 24;
                $time_days = floor($seconds / 24);
            }
        }

        $time = '';

        if ($time_days > 0) {
            $val = $time_days;//intval(substr($time_days, -1));
            if ($val == 1) {
                $time .= $time_days.' день ';
            }
            else if ($val < 5 && $val > 0) {
                $time .= $time_days.' дня ';
            }
            else {
                $time .= $time_days.' дней ';
            }
        }

        if ($time_hours > 0) {
            $val = $time_hours;//intval(substr($time_hours, -1));
            if ($val == 1) {
                $time .= $time_hours.' час ';
            }
            else if ($val < 5 && $val > 0) {
                $time .= $time_hours.' часа ';
            }
            else {
                $time .= $time_hours.' часов ';
            }
        }

        if ($time_minutes > 0) {
            $val = $time_minutes;//intval(substr($time_minutes, -1));
            if ($val == 1) {
                $time .= $time_minutes.' минута ';
            }
            else if ($val < 5 && $val > 0) {
                $time .= $time_minutes.' минуты ';
            }
            else {
                $time .= $time_minutes.' минут ';
            }
        }

        if ($time_seconds > 0 || $time == '') {
            $val = $time_seconds;//intval(substr($time_seconds, -1));
            if ($val == 1) {
                $time .= $time_seconds.' секунда ';
            }
            else if ($val < 5 && $val > 0) {
                $time .= $time_seconds.' секунды ';
            }
            else {
                $time .= $time_seconds.' секунд ';
            }
        }

        return $time;
    }

    function get_string_defence_from_value($defence) {
        if ($defence < 0) {
            return 'уязвим(а) к этому типу урона';
        }

        if ($defence > 60) {
            return 'отличная';
        }
        else if ($defence > 35) {
            return 'очень хорошая';
        }
        else if ($defence > 20) {
            return 'хорошая';
        }
        else if ($defence > 10) {
            return 'средняя';
        }
        else {
            return 'небольшая';
        }
    }

    //region Settings

    $monsters_page_size = 5;
    $monsters_current_page = 0;
    $monsters_filtering_name = '';
    $monsters_filtering_level = '';
    $monsters_caching_time = 20;    // Минуты
    $monsters_caching_file = 'help/cache_monsters.data';

    //endregion

    $monsters = array();

    if (file_exists($monsters_caching_file) && (time() - $monsters_caching_time * 60 < filemtime($monsters_caching_file)))
    {
        $monsters_cached_data = file_get_contents($monsters_caching_file);
        $monsters = unserialize($monsters_cached_data);

        //region Filtering

        $filter_params = '';

        if (isset($name) && $name != '') {

            $filter_params .= "&name=$name";
            $monsters_filtered = array();

            foreach ($monsters as $monster) {

                if (strpos(mb_strtoupper($monster->name), mb_strtoupper($name)) !== false) {
                    array_push($monsters_filtered, $monster);
                }
            }

            $monsters = $monsters_filtered;
        }

        if (isset($level_from) || isset($level_to)) {

            $filter_params .= "&level_from=$level_from&level_to=$level_to";

            if (!isset($level_from) || !is_numeric($level_from)) {
                $search_level_from = 0;
            }
            else {
                $search_level_from = intval($level_from);
            }

            if (!isset($level_to) || !is_numeric($level_to)) {
                $search_level_to = 255;
            }
            else {
                $search_level_to = intval($level_to);
            }

            $monsters_filtered = array();

            foreach ($monsters as $monster) {

                if ($monster->level >= $search_level_from && $monster->level <= $search_level_to) {
                    array_push($monsters_filtered, $monster);
                }
            }

            $monsters = $monsters_filtered;
        }

        //endregion
    }
    else {

        //region Sql Filtering

        if (isset($name)) {
            $monsters_filtering_name = "and sw_users.name like '%$name%'";
        }

        if (isset($level_from) || isset($level_to)) {
            if (!isset($level_from) || !is_numeric($level_from)) {
                $search_level_from = 0;
            }
            else {
                $search_level_from = intval($level_from);
            }

            if (!isset($level_to) || !is_numeric($level_to)) {
                $search_level_to = 255;
            }
            else {
                $search_level_to = intval($level_to);
            }

            $monsters_filtering_level = "and sw_users.level >= $search_level_from and sw_users.level <= $search_level_to";
        }

        $filter_params = '';
        if ($monsters_filtering_name != '') {
            $filter_params .= "&name=$name";
        }
        if ($monsters_filtering_level != '') {
            $filter_params .= "&level_from=$level_from&level_to=$level_to";
        }

        //endregion

        $monsters_sw_stuff = array();

        $SQL = 'select id, level, name from sw_stuff';
        $row_num = SQL_query_num($SQL);

        while ($row_num) {

            $monsters_sw_stuff[$row_num[0]] = array('level' => $row_num[1], 'name' => $row_num[2]);

            $row_num = SQL_next_num();
        }

        if ($result) {
            mysql_free_result($result);
        }

        $SQL = "select sw_users.name, sw_users.pic, sw_users.level, sw_users.chp, sw_users.chp_percent, sw_users.resp_time, sw_users.def1, sw_users.def2, sw_users.bad, sw_users.givepercent, sw_users.give, sw_users.givemore, sw_users.inf_dev from sw_users where sw_users.npc = 1 and sw_users.display_in_library = 1 and sw_users.resp_room != 9999 $monsters_filtering_name $monsters_filtering_level order by sw_users.level, sw_users.name";
        $row_num = SQL_query_num($SQL);

        while ($row_num) {
            $monster_name = $row_num[0];

            if ($row_num[1] <> '') {
                $monster_pic = "<img src=\"maingame/pic/npc/$row_num[1]\">";
            } else {
                $monster_pic = "<img src=\"maingame/pic/npc/no.gif\">";
            }

            $monster_level = $row_num[2];
            $monster_hp = 80 + round(10 * $monster_level * 2); //ceil($row_num[3] / $row_num[4] * 100);
            $monster_resp_time = get_string_time_from_seconds($row_num[5]);
            $monster_def_p = get_string_defence_from_value($row_num[6]);
            $monster_def_m = get_string_defence_from_value($row_num[7]);

            $monster_bad = '<font color="green">Мирный</font>';
            switch ($row_num[8]) {
                case 2:
                    $monster_bad = '<font color="red">Агрессивный</font>';
                    break;

                case 1:
                    $monster_bad = 'Нейтральный';
                    break;
            }

            $monster_drop_first_chance = $row_num[9];
            $monster_drop_first = $row_num[10];
            $monster_drop_second_chance = $row_num[9] / 5;
            $monster_drop_second = $row_num[11];
            $monster_location = $row_num[12];

            $new_monster = new Monster();
            $new_monster->name = $monster_name;
            $new_monster->level = $monster_level;
            $new_monster->pic = $monster_pic;
            $new_monster->hp = $monster_hp;
            $new_monster->resp_time = $monster_resp_time;
            $new_monster->def_p = $monster_def_p;
            $new_monster->def_m = $monster_def_m;
            $new_monster->bad = $monster_bad;
            $new_monster->drop = array();
            $new_monster->drop_names = array();
            $new_monster->location = $monster_location;

            if ($monster_drop_first > 0) {
                $new_monster->drop[$monster_drop_first] = $monster_drop_first_chance;
                $new_monster->drop_names[$monster_drop_first] = $monsters_sw_stuff[$monster_drop_first]['name'];
            }

            if ($monster_drop_second > 0) {

                foreach ($monsters_sw_stuff as $stuff_id => $stuff) {
                    if ($stuff['level'] == $monster_drop_second) {
                        $new_monster->drop[$stuff_id] = $monster_drop_second_chance;
                        $new_monster->drop_names[$stuff_id] = $stuff['name'];
                    }
                }
            }

            $monster_is_already_saved = false;

            //region Duplications search

            foreach ($monsters as $monster)
            {
                if ($monster->is_duplicate($new_monster))
                {
                    $monster_is_already_saved = true;

                    foreach ($new_monster->drop as $drop_id => $drop_chance)
                    {
                        if (array_key_exists($drop_id, $monster->drop))
                        {
                            if ($monster->drop[$drop_id] < $drop_chance)
                            {
                                $monster->drop[$drop_id] = $drop_chance;
                            }
                        } else {
                            $monster->drop[$drop_id] = $drop_chance;
                            $monster->drop_names[$drop_id] = $new_monster->drop_names[$drop_id];
                        }
                    }

                    if ($monster->location == '' && $new_monster->location != '')
                    {
                        $monster->location = $new_monster->location;
                    }

                    break;
                }
            }

            //endregion

            if (!$monster_is_already_saved) {
                array_push($monsters, $new_monster);
            }

            $row_num = SQL_next_num();
        }

        file_put_contents($monsters_caching_file, serialize($monsters));

        if ($result) {
            mysql_free_result($result);
        }
    }

    //region Pagination

    if (isset($page) && is_numeric($page)) {
        $monsters_current_page = intval($page);
    }

    if (isset($page_size) && is_numeric($page_size)) {
        $monsters_page_size = intval($page_size);
        $filter_params .= "&page_size=$monsters_page_size";
    }

    $monsters_count = count($monsters);
    $monsters_paging_skip = $monsters_current_page * $monsters_page_size;
    if ($monsters_paging_skip > $monsters_count) {
        $monsters_paging_skip = $monsters_count - $monsters_page_size;
    }

    $monsters = array_slice($monsters, $monsters_paging_skip, $monsters_page_size);

    //endregion

    //region Filters selector

    $page_sizes = array(5, 10, 20);
    $page_size_selector = '<select name="page_size">';
    foreach ($page_sizes as $page_size_value) {
        $page_size_selector .= '<option value="'.$page_size_value.'" '.($monsters_page_size == $page_size_value ? 'selected' : '').'>'.$page_size_value.'</option>';
    }
    $page_size_selector .= '</select>';

    print "<div align=\"center\"><form action=\"/\">
                <input type=\"hidden\" name=\"show\" value=\"$show\">
                <input type=\"hidden\" name=\"load\" value=\"$load\">
                <input type=\"hidden\" name=\"subload\" value=\"$subload\">
                <span>Монстров на странице: </span>$page_size_selector<br />
                <span>Фрагмент имени: </span><input type=\"text\" name=\"name\" value=\"$name\" size=\"14\"><br />
                <span>Уровень: </span><input type=\"text\" name=\"level_from\" value=\"$level_from\" size=\"3\">&nbsp;-&nbsp;<input type=\"text\" name=\"level_to\" value=\"$level_to\" size=\"3\"><br />
                <input type=\"submit\" value=\"Поиск\" style=\"margin-top: 5px;\">&nbsp;<input type=\"button\" onclick=\"window.location.href='index.php?load=$load&show=$show&subload=$subload'\" value='Показать всех'>
               </form></div>";

    //endregion

    //region Page selector

    $p = "";
    $monsters_max_page = ceil($monsters_count / $monsters_page_size);
    for ($i = 0; $i < $monsters_max_page; $i++)
    {
        $from = $i * $monsters_page_size + 1;
        $to = ($i + 1) * $monsters_page_size;
        if ($to > $monsters_count) {
            $to = $monsters_count;
        }
        if ($i == $monsters_current_page) {
            $p .= "|<b><font color=\"#990000\">$from-$to</font></b>| ";
        }
        else {
            $p .= "|<a href=\"index.php?load=$load&subload=$subload&show=$show&page=$i$filter_params\" class=\"menu\">$from-$to</a>| ";
        }
    }

    if ($p <> "") {
        print "<div align=\"center\" style=\"display: block; width: 400px; height: auto;\">$p</div><br />";
    }

    //endregion

    //region Rendering Main Section

    foreach ($monsters as $monster)
    {
        print "<table class=\"blue\" cellpadding=\"5\" cellspacing=\"1\" height=\"100%\" width=\"100%\" style=\"margin-bottom: 10px;\">
                                        <tr>
                                            <td bgcolor=\"#F6FAFF\" align=\"center\">
                                                <b>$monster->name</b> ($monster->level уровень) <a href=\"/fullinfo.php?name=$monster->name\" target=\"_blank\"><img src=\"help/info.gif\">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor=\"#F6FAFF\" align=\"center\">
                                                $monster->pic
                                                <br />
                                                <hr />
                                                <b>Характеристики:</b>
                                                <table>
                                                    <tr>
                                                        <td>Жизни:</td><td>$monster->hp</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Склонность:</td><td>$monster->bad</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Физическая защита:</td><td>$monster->def_p</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Магическая защита:</td><td>$monster->def_m</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Время респа:</td><td>$monster->resp_time</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Местоположение:</td><td>".($monster->location != '' ? $monster->location : "Неизвестно")."</td>
                                                    </tr>
                                                </table>
                                                <br />
                                                <hr />
                                                <b>Список выбиваемых педметов:</b>".
                                                (count($monster->drop) > 0 ? $monster->get_formatted_drop() : '<br /><i>Несколько золотых</i>')
                                            ."</td>
                                        </tr>
                                    </table>";

    }

    //endregion

?>

