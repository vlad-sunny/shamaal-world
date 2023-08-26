<?
include_once('mysql_tools.php');

$sqllink=0;
$result=0;

function getmicrotime(){
    list($usec, $sec) = explode(" ",microtime()); 
    return ((float)$usec + (float)$sec); 
    } 
function SQL_connect(){
    global $sqllink;
    $sqllink = mysql_connect("localhost", "swlands_root", "xq1s1KLo") or die("Could not connect");
}

function SQL_query2($SQL){
    global $sqllink,$result;

    if(!$sqllink) {SQL_connect();};
    $result=mysql_query(removeSleepAndBenchmark($SQL),$sqllink);

    return $result;
}

function escape($param) {
    global $sqllink,$result;
    if(!$sqllink) {SQL_connect();};

    return mysql_real_escape_string($param, $sqllink);
}

function SQL_query($SQL){
    global $sqllink,$result;

    if(!$sqllink) {SQL_connect();};
    $result=mysql_db_query("swonline",removeSleepAndBenchmark($SQL),$sqllink);
    if ($result){
       return mysql_fetch_assoc($result);
	}
}

function SQL_query_num($SQL){
    global $sqllink,$result;
    if(!$sqllink) {SQL_connect();};
    $result=mysql_db_query("swonline",removeSleepAndBenchmark($SQL),$sqllink);
    if ($result){
       return mysql_fetch_row($result);
	}
}


function SQL_do($SQL){
    global $sqllink,$result, $player;
    $player_id = $player['id'];
	
    $SQL = str_replace("/*","", $SQL);
	$SQL = str_replace("//","", $SQL);
    return SQL_do_clean($SQL);
}

function SQL_do_clean($SQL)
{
	global $sqllink,$result, $player;

    if(!$sqllink) {SQL_connect();};
    $result=mysql_db_query("swonline",removeSleepAndBenchmark($SQL),$sqllink);
    return result;
}

function SQL_next_num(){
    global $sqllink,$result;
    return mysql_fetch_row($result);
}

function SQL_next(){
    global $sqllink,$result;
    return mysql_fetch_assoc($result);
}

function SQL_disconnect(){
	global $sqllink;
    if ($sqllink) {mysql_close($sqllink);};
}

?>