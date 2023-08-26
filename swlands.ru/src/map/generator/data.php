<?php

// toggle this to change the setting
define('DEBUG', false);
// you want all errors to be triggered
error_reporting(E_ALL);

// define either include debug info on map or no
define('MAP_DEBUG', isset($debug));

if(DEBUG == true)
{
    // you're developing, so you want all errors to be shown
    ini_set("display_errors", true);
    // logging is usually overkill during dev
    ini_set('log_errors', true);
}
else
{
    // you don't want to display errors on a prod environment
    ini_set("display_errors", false);
    // you definitely wanna log any occurring
    ini_set('log_errors', false);
}

// ToDo: Some sequrity?
if (!isset($name)) {
    echo 'Name of map is not defined';
    return;
}

include("../../mysqlconfig.php");

// We need this because PHP 5.3 json encoding - sucks
function raw_json_encode($input, $flags = 0) {
    $fails = implode('|', array_filter(array(
        '\\\\',
        $flags & JSON_HEX_TAG ? 'u003[CE]' : '',
        $flags & JSON_HEX_AMP ? 'u0026' : '',
        $flags & JSON_HEX_APOS ? 'u0027' : '',
        $flags & JSON_HEX_QUOT ? 'u0022' : '',
    )));
    $pattern = "/\\\\(?:(?:$fails)(*SKIP)(*FAIL)|u([0-9a-fA-F]{4}))/";
    $callback = function ($m) {
        return html_entity_decode("&#x$m[1];", ENT_QUOTES, 'UTF-8');
    };
    return preg_replace_callback($pattern, $callback, json_encode($input, $flags));
}

class MapDbCell {
    public $id;
    public $name;

    public $sz_id;
    public $sz_name;

    public $s_id;
    public $s_name;

    public $sv_id;
    public $sv_name;

    public $z_id;
    public $z_name;

    public $v_id;
    public $v_name;

    public $jz_id;
    public $jz_name;

    public $j_id;
    public $j_name;

    public $jv_id;
    public $jv_name;
}

class MapCell {
    public $id;
    public $name;
    public $links;
    public $directions;

    function __construct($id, $name, $links = array(), $directions = array()) {
        $this->id = $id;
        $this->name = $name;
        $this->links = $links;
        $this->directions = $directions;
    }
}

class MapErrorCell {
    public $id;
    public $name;
    public $links;
    public $directions;
    public $withError;

    function __construct(&$cell) {
        $this->id = 0;
        $this->name = print_r($cell, true);
        $this->links = array();
        $this->directions = array();
        $this->withError = true;
    }
}

class MapLinkCell {
    public $id;
    public $name;
    public $links;
    public $directions;
    public $mapName;
    public $isLink;

    function __construct($id, $name, $mapName, $directions) {
        $this->id = $id;
        $this->name = $name;
        $this->links = array();
        $this->directions = $directions;
        $this->mapName = $mapName;
        $this->isLink = true;
    }
}

class MapLink {
    public $id;
    public $mapName;

    function __construct($id, $mapName) {
        $this->id = $id;
        $this->mapName = $mapName;
    }
}

class MapQuestLink {
    public $fromId;
    public $toId;
    public $mapName;

    function __construct($fromId, $toId, $mapName) {
        $this->fromId = $fromId;
        $this->toId = $toId;
        $this->mapName = $mapName;
    }
}

class MapMapping {
    public $startCellId;
    public $links;

    function __construct($startCellId, $links = array()) {
        $this->startCellId = $startCellId;
        $this->links = $links;
    }
}

class MapDataGenerator {
    private $_mappings;

    function __construct() {
        $this->_mappings = array();

        $this->_mappings['academy_troglodits'] = new MapMapping(1716, array(new MapLink(43, 'academy')));
        $this->_mappings['academy_snowplace'] = new MapMapping(4089, array(new MapLink(4088, 'academy')));
        $this->_mappings['academy_osman'] = new MapMapping(94, array(new MapLink(93, 'academy')));
        $this->_mappings['academy_unera'] = new MapMapping(81, array(new MapLink(60, 'academy')));

        $this->_mappings['academy'] = new MapMapping(1, array(
            new MapQuestLink(43, 1716, 'academy_troglodits'),
            new MapLink(4089, 'academy_snowplace'),
            new MapLink(94, 'academy_osman'),
            new MapLink(81, 'academy_unera')
        ));

//        $this->_mappings['mainland'] = new MapMapping(170, array(
//            new MapLink(3870, 'mainland_arhon_trail'),  // Архон Лесная тропинка
//            new MapLink(1708, 'mainland_arhon_snowplace'),  // Архон Заснеженная тропинка
//            new MapLink(4374, 'mainland_arhon_fields'),  // Архон Поля
//            new MapLink(583, 'mainland_stapvell'),  // Восточный вход в Стапы
//            new MapLink(538, 'mainland_stapvell'),  // Южный вход в Стапы
//            new MapLink(187, 'mainland_chrono'),  // Западный вход в Хроно
//            new MapLink(3154, 'mainland_imperial_lion'),    // Вход в таверну Имперский Лев
//            new MapLink(322, 'mainland_shelter'),    // Северный вход в Шелтер
//            new MapLink(235, 'mainland_endler'),    // Северный вход в Эндлер
//            new MapLink(202, 'mainland_chrono'),    // Южный вход в Эндлер
//            new MapQuestLink(419, 414, 'mainland'), // Телепорт на западном причале
//            new MapLink(395, 'mainland_illuziv'),    // Южный вход в Иллюзив
//            new MapLink(3277, 'mainland_west_trail'),    // Западная тропинка у причала
//        ));
    }

    public function getData($mapName) {
        $mapping = $this->_mappings[$mapName];
        if (!$mapping) {
            throw new ErrorException('There is no map with this name');
        }

        $mapCells = $this->_getMapFromDb();

        $startCell = $mapCells[$mapping->startCellId];
        if (!$startCell) {
            throw new ErrorException("Wrong start cell $mapping->startCellId");
        }

        $usedCells = array();
        $map = $this->_getArrayFor($mapCells, $mapping->links, $startCell, 0, 0, $usedCells);

        $minColumnIndex = 0;
        $maxColumnIndex = 0;

        // removing not valid cells
        $filtered = array();
        foreach ($map as $rowIndex => $row) {
            foreach ($row as $columnIndex => $cell) {
                $normalizedColumnIndex = ltrim($columnIndex, 'c');

                if ($normalizedColumnIndex < $minColumnIndex) {
                    $minColumnIndex = $normalizedColumnIndex;
                }
                if ($normalizedColumnIndex > $maxColumnIndex) {
                    $maxColumnIndex = $normalizedColumnIndex;
                }

                if (is_array($cell) && is_array($cell['id'])) {
                    // ToDo: Handle, means 2 different cell have same coordinates, so map collision happened

                    // Display on map for debug mode, otherwise just ignore
                    if (MAP_DEBUG === true) {
                        $filtered[ltrim($rowIndex, 'r')][$normalizedColumnIndex] = new MapErrorCell($cell);
                    }
                } else {
                    $filtered[ltrim($rowIndex, 'r')][$normalizedColumnIndex] = $cell;
                }
            }
        }

        $emptyArrayInRange = array_fill_keys(range($minColumnIndex, $maxColumnIndex), new MapCell(0, ''));

        // sorting by rows and columns and normalizing indexes (so they're starting from 0 instead of negatives)
        ksort($filtered);
        $normalized = array();
        foreach ($filtered as &$row) {
            $row += $emptyArrayInRange;
            ksort($row);
            array_push($normalized, array_values($row));
        }

        return raw_json_encode($normalized);
    }

    private function _getArrayFor(&$cells, &$links, $cell, $rowIndex, $columnIndex, &$usedCells, $direction = null) {
        $array = array();
        $directions = $this->_getDirections($cell);

        $mapLink = $this->_getMapLink($cell, $links);
        if ($mapLink !== null) {
            $array["r$rowIndex"]["c$columnIndex"] = new MapLinkCell($cell->id, $cell->name, $mapLink->mapName, $directions);

            array_push($usedCells, $cell->id);
        } else {
            $cellQuestLinks = array();
            foreach ($links as $link) {
                // if that's for current cell and link is quest
                if ($link instanceof MapQuestLink && $link->fromId == $cell->id) {
                    array_push($cellQuestLinks, $link);
                }
            }

            $array["r$rowIndex"]["c$columnIndex"] = new MapCell($cell->id, $cell->name, $cellQuestLinks, $directions);

            array_push($usedCells, $cell->id);

            if ($direction !== 'sz' && $cell->sz_id && !in_array($cell->sz_id, $usedCells)) {
                $cellArray = $this->_getArrayForDirection($cells, $links, $cell->sz_id, $cell->sz_name, $rowIndex - 1, $columnIndex - 1, $usedCells, 'jv');
                if ($cellArray) {
                    $array = array_merge_recursive($array, $cellArray);
                }
            }

            if ($direction !== 's' && $cell->s_id && !in_array($cell->s_id, $usedCells)) {
                $cellArray = $this->_getArrayForDirection($cells, $links, $cell->s_id, $cell->s_name, $rowIndex - 1, $columnIndex, $usedCells, 'j');
                if ($cellArray) {
                    $array = array_merge_recursive($array, $cellArray);
                }
            }

            if ($direction !== 'sv' && $cell->sv_id && !in_array($cell->sv_id, $usedCells)) {
                $cellArray = $this->_getArrayForDirection($cells, $links, $cell->sv_id, $cell->sv_name, $rowIndex - 1, $columnIndex + 1, $usedCells, 'jz');
                if ($cellArray) {
                    $array = array_merge_recursive($array, $cellArray);
                }
            }

            if ($direction !== 'z' && $cell->z_id && !in_array($cell->z_id, $usedCells)) {
                $cellArray = $this->_getArrayForDirection($cells, $links, $cell->z_id, $cell->z_name, $rowIndex, $columnIndex - 1, $usedCells, 'v');
                if ($cellArray) {
                    $array = array_merge_recursive($array, $cellArray);
                }
            }

            if ($direction !== 'v' && $cell->v_id && !in_array($cell->v_id, $usedCells)) {
                $cellArray = $this->_getArrayForDirection($cells, $links, $cell->v_id, $cell->v_name, $rowIndex, $columnIndex + 1, $usedCells, 'z');
                if ($cellArray) {
                    $array = array_merge_recursive($array, $cellArray);
                }
            }

            if ($direction !== 'jz' && $cell->jz_id && !in_array($cell->jz_id, $usedCells)) {
                $cellArray = $this->_getArrayForDirection($cells, $links, $cell->jz_id, $cell->jz_name, $rowIndex + 1, $columnIndex - 1, $usedCells, 'sv');
                if ($cellArray) {
                    $array = array_merge_recursive($array, $cellArray);
                }
            }

            if ($direction !== 'j' && $cell->j_id && !in_array($cell->j_id, $usedCells)) {
                $cellArray = $this->_getArrayForDirection($cells, $links, $cell->j_id, $cell->j_name, $rowIndex + 1, $columnIndex, $usedCells, 's');
                if ($cellArray) {
                    $array = array_merge_recursive($array, $cellArray);
                }
            }

            if ($direction !== 'jv' && $cell->jv_id && !in_array($cell->jv_id, $usedCells)) {
                $cellArray = $this->_getArrayForDirection($cells, $links, $cell->jv_id, $cell->jv_name, $rowIndex + 1, $columnIndex + 1, $usedCells, 'sz');
                if ($cellArray) {
                    $array = array_merge_recursive($array, $cellArray);
                }
            }
        }

        return $array;
    }

    private function _getDirections(&$cell) {
        $array = array();

        if ($cell->sz_id) {
            array_push($array, 'sz');
        }
        if ($cell->s_id) {
            array_push($array, 's');
        }
        if ($cell->sv_id) {
            array_push($array, 'sv');
        }
        if ($cell->z_id) {
            array_push($array, 'z');
        }
        if ($cell->v_id) {
            array_push($array, 'v');
        }
        if ($cell->jz_id) {
            array_push($array, 'jz');
        }
        if ($cell->j_id) {
            array_push($array, 'j');
        }
        if ($cell->jv_id) {
            array_push($array, 'jv');
        }

        return $array;
    }

    private function _getMapLink(&$cell, &$links) {
        foreach($links as $link) {
            // we're looking only for map links
            if ($link instanceof MapLink && $link->id == $cell->id) {
                return $link;
            }
        }

        return null;
    }

    private function _getArrayForDirection(&$cells, &$links, $id, $name, $rowIndex, $columnIndex, &$usedCells, $direction) {
        $cell = $cells[$id];
        if ($cell) {
            if ($cell->name !== $name) {
                // ToDo: Handle somehow
            }

            return $this->_getArrayFor($cells, $links, $cell, $rowIndex, $columnIndex, $usedCells, $direction);
        }
        else {
            return null;
        }
    }

    private function _getMapFromDb() {
        $cells = array();

        $SQL = "select id, name, sz_id, sz_name, s_id, s_name, sv_id, sv_name, z_id, z_name, v_id, v_name, jz_id, jz_name, j_id, j_name, jv_id, jv_name from sw_map";
        $row_num = SQL_query_num($SQL);

        while ($row_num) {
            $mapCell = new MapDbCell();
            $mapCell->id = $row_num[0];
            $mapCell->name = $row_num[1];
            $mapCell->sz_id = $row_num[2];
            $mapCell->sz_name = $row_num[3];
            $mapCell->s_id = $row_num[4];
            $mapCell->s_name = $row_num[5];
            $mapCell->sv_id = $row_num[6];
            $mapCell->sv_name = $row_num[7];
            $mapCell->z_id = $row_num[8];
            $mapCell->z_name = $row_num[9];
            $mapCell->v_id = $row_num[10];
            $mapCell->v_name = $row_num[11];
            $mapCell->jz_id = $row_num[12];
            $mapCell->jz_name = $row_num[13];
            $mapCell->j_id = $row_num[14];
            $mapCell->j_name = $row_num[15];
            $mapCell->jv_id = $row_num[16];
            $mapCell->jv_name = $row_num[17];

            $cells[$mapCell->id] = $mapCell;
            $row_num = SQL_next_num();
        }

        if ($result) {
            mysql_free_result($result);
        }

        return $cells;
    }
}

header("Content-Type: text/plain; charset=utf-8");
header("Access-Control-Allow-Origin: *");

if (MAP_DEBUG === true) {
    $generator = new MapDataGenerator();
    $mapData = $generator->getData($name);

    echo $mapData;
}
else {
    $cachingTime = 1440;  // 1440 minutes = 24 hours
    $cachedFilePath = "./cache/$name.data";

    if (file_exists($cachedFilePath) && (time() - $cachingTime * 60 < filemtime($cachedFilePath))) {
        echo file_get_contents($cachedFilePath);
    } else {
        $generator = new MapDataGenerator();
        $mapData = $generator->getData($name);

        // writing file to cache
        file_put_contents($cachedFilePath, $mapData);

        echo $mapData;
    }
}

?>
