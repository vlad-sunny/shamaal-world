<?php

session_start( );
header( "Content-type: text/html; charset=win-1251" );
echo "<meta content=\"text/html; charset=windows-1251\" http-equiv=\"Content-Type\">\r\n";
if ( !isset( $player['id'] ) )
{
    exit( );
}
$player_id = $player['id'];
$player_name = $player['name'];
$cur_time = time( );
include( "../../mysqlconfig.php" );
$SQL = "select sw_city.name,sw_city.fromdate,sw_city.last,sw_city.http,sw_users.city_rank,sw_users.city,sw_city.pic from sw_users inner join sw_city on sw_users.city=sw_city.id where sw_users.id={$player_id}";
$row_num = sql_query_num( $SQL );
while ( $row_num )
{
    $city_name = $row_num[0];
    $city_fromdate = $row_num[1];
    $city_last = $row_num[2];
    $city_http = $row_num[3];
    $city_rank = $row_num[4];
    $city_id = $row_num[5];
    $city_pic = $row_num[6];
    $row_num = sql_next_num( );
}
if ( $result )
{
    mysql_free_result( $result );
}
print "<LINK REL=STYLESHEET TYPE=\"TEXT/CSS\" HREF=\"../style.css\" TITLE=\"STYLE\"><title>��������� ������ {$city_name}</title>";
if ( !isset( $city_id ) )
{
    sql_disconnect( );
    exit( );
}
$SQL = "select count(*) as num from sw_position where city=1 and owner={$city_id}";
$row_num = sql_query_num( $SQL );
while ( $row_num )
{
    $count = $row_num[0];
    $row_num = sql_next_num( );
}
if ( $result )
{
    mysql_free_result( $result );
}
if ( $do == "del" && $city_rank == 1 )
{
    $SQL = "delete from sw_position where id={$rank_id} and city=1";
    sql_do( $SQL );
    $SQL = "update sw_users SET city_rank=0,city_pay=0,city_text='' where city={$city_id} and city_rank={$rank_id}";
    sql_do( $SQL );
    --$count;
}
if ( $do == "saverank" && $city_rank == 1 )
{
    $rank_pay = round( $rank_pay - 1 + 2 );
    if ( $c_pay < 0 )
    {
        $c_pay = 0;
    }
    if ( 30 < $c_pay )
    {
        $c_pay = 30;
    }
    if ( $s_opt1 != 1 )
    {
        $s_opt1 = 0;
    }
    if ( $s_opt2 != 1 )
    {
        $s_opt2 = 0;
    }
    if ( $s_opt3 != 1 )
    {
        $s_opt3 = 0;
    }
    if ( $s_opt4 != 1 )
    {
        $s_opt4 = 0;
    }
    if ( $s_opt5 != 1 )
    {
        $s_opt5 = 0;
    }
    $SQL = "update sw_position SET name='{$c_name}',opt1={$s_opt1},opt2={$s_opt2},opt3={$s_opt3},opt4={$s_opt4},opt5={$s_opt5} where id={$rank_id} and city=1";
    sql_do( $SQL );
}
if ( $do == "new" && $count < 30 && $city_rank == 1 )
{
    $rank_pay = round( $rank_pay - 1 + 2 );
    if ( $c_pay < 0 )
    {
        $c_pay = 0;
    }
    if ( 30 < $c_pay )
    {
        $c_pay = 30;
    }
    if ( $s_opt1 != 1 )
    {
        $s_opt1 = 0;
    }
    if ( $s_opt2 != 1 )
    {
        $s_opt2 = 0;
    }
    if ( $s_opt3 != 1 )
    {
        $s_opt3 = 0;
    }
    if ( $s_opt4 != 1 )
    {
        $s_opt4 = 0;
    }
    if ( $s_opt5 != 1 )
    {
        $s_opt5 = 0;
    }
    $SQL = "insert into sw_position (owner,city,name,opt1,opt2,opt3,opt4,opt5) values ({$city_id},1,'{$c_name}',{$s_opt1},{$s_opt2},{$s_opt3},{$s_opt4},{$s_opt5})";
    sql_do( $SQL );
    ++$count;
}
else if ( $do == "new" && 30 <= $count )
{
    print "<script>alert('���������� �� ����� ���� ������ 30');</script>";
}
$info .= "<table width=100% cellpadding=1 cellspacing=1 bgcolor=7C8A9D>";
$info .= "<tr bgcolor=D7DBDF><td width=30></td><td align=center width=120><b>��������</b></td><td align=center width=70><b>����� ��������� �������<b></td><td align=center width=80><b>����� ������ �������</b></td><td align=center width=80><b>����� ����� ����������</b></td><td  align=center width=80><b>����� ��������� ��������</b></td><td  width=80 align=center><b>����� �������� �������</b></td><td align=center><b>��������</b></td></tr>";
if ( $count < 30 )
{
    $info .= "<tr bgcolor=F7FBFF><td></td><td  align=center>��� ������</td><td  align=center><input type=checkbox name=s_opt1 value=opt1 checked disabled class=rad></td><td  align=center><input type=checkbox name=s_opt2 value=opt2 checked disabled class=rad></td><td   align=center><input type=checkbox name=s_opt3 value=opt3 checked disabled class=rad></td><td   align=center><input type=checkbox name=s_opt4 value=opt4 checked disabled class=rad></td><td   align=center><input type=checkbox name=s_opt5 value=opt5 checked disabled class=rad></td><td align=center></td></tr>";
}
else
{
    $info .= "<tr bgcolor=F7FBFF><td ></td><td  align=center>��� ������</td><td  align=center><input type=checkbox name=s_opt1 value=opt1 checked disabled class=rad></td><td  align=center><input type=checkbox name=s_opt2 value=opt2 checked disabled class=rad></td><td   align=center><input type=checkbox name=s_opt3 value=opt3 checked disabled class=rad></td><td   align=center><input type=checkbox name=s_opt4 value=opt4 checked disabled class=rad></td><td   align=center><input type=checkbox name=s_opt5 value=opt5 checked disabled class=rad></td><td ></td></tr>";
}
if ( $do == "add" && $count < 30 )
{
    $info .= "<form action=poscity.php method=post><input type=hidden name=load value={$load}><input type=hidden name=action value={$action}><input type=hidden name=do value=new><tr bgcolor=F7FBFF><td  align=center></td><td  align=center ><input type=text name=c_name value=\"\" size=14></td><td    align=center><input type=checkbox name=s_opt1 value=1 class=rad></td><td   align=center><input type=checkbox name=s_opt2 value=1 class=rad></td><td   align=center><input type=checkbox name=s_opt3 value=1 class=rad></td><td   align=center><input type=checkbox name=s_opt4 value=1 class=rad></td><td     align=center><input type=checkbox name=s_opt5 value=1 class=rad></td><td align=center><input type=submit value=�������� style=width:60></td></tr></form>";
}
$SQL = "select id,name,opt1,opt2,opt3,opt4,opt5 from sw_position where city=1 and owner={$city_id}";
$row_num = sql_query_num( $SQL );
while ( $row_num )
{
    $rank_id = $row_num[0];
    $rank_name = $row_num[1];
    $rank_opt1 = $row_num[2];
    $rank_opt2 = $row_num[3];
    $rank_opt3 = $row_num[4];
    $rank_opt4 = $row_num[5];
    $rank_opt5 = $row_num[6];
    if ( $rank_opt1 == 1 )
    {
        $rop1 = "checked";
    }
    else
    {
        $rop1 = "";
    }
    if ( $rank_opt2 == 1 )
    {
        $rop2 = "checked";
    }
    else
    {
        $rop2 = "";
    }
    if ( $rank_opt3 == 1 )
    {
        $rop3 = "checked";
    }
    else
    {
        $rop3 = "";
    }
    if ( $rank_opt4 == 1 )
    {
        $rop4 = "checked";
    }
    else
    {
        $rop4 = "";
    }
    if ( $rank_opt5 == 1 )
    {
        $rop5 = "checked";
    }
    else
    {
        $rop5 = "";
    }
    if ( $city_rank == 1 )
    {
        $info .= "<form action=poscity.php method=post><input type=hidden name=rank_id value={$rank_id}><input type=hidden name=load value={$load}><input type=hidden name=action value={$action}><input type=hidden name=do value=saverank><tr bgcolor=F7FBFF><td  align=center><a href=poscity.php?load={$load}&action={$action}&do=del&rank_id={$rank_id}><img src=../pic/game/del.gif></a></td><td  align=center ><input type=text name=c_name value=\"{$rank_name}\" size=14></td><td    align=center><input type=checkbox name=s_opt1 value=1 {$rop1} class=rad></td><td     align=center><input type=checkbox name=s_opt2 value=1 {$rop2} class=rad></td><td     align=center><input type=checkbox name=s_opt3 value=1 {$rop3} class=rad></td><td   align=center><input type=checkbox name=s_opt4 value=1 {$rop4}  class=rad></td><td   align=center><input type=checkbox name=s_opt5 value=1 {$rop5} class=rad></td><td align=center><input type=submit value=�������� style=width:60></td></tr></form>";
    }
    else
    {
        $info .= "<tr bgcolor=F7FBFF><td  align=center></td><td  align=center ><input type=text name=c_name value=\"{$rank_name}\" size=14 disabled></td><td    align=center><input type=checkbox name=s_opt1 value=1 {$rop1} class=rad disabled></td><td     align=center><input type=checkbox name=s_opt2 value=1 {$rop2} class=rad disabled></td><td     align=center><input type=checkbox name=s_opt3 value=1 {$rop3} class=rad disabled></td><td   align=center><input type=checkbox name=s_opt4 value=1 {$rop4}  class=rad disabled></td><td   align=center><input type=checkbox name=s_opt5 value=1 {$rop5} class=rad disabled></td><td align=center><input type=submit value=�������� style=width:60 disabled></td></tr>";
    }
    $row_num = sql_next_num( );
}
if ( $result )
{
    mysql_free_result( $result );
}
if ( $count < 30 && $city_rank == 1 )
{
    $info .= "<tr bgcolor=D7DBDF><td height=20 colspan=7></td><td align=center><a href=poscity.php?load={$load}&action={$action}&do=add class=menu><b>��������</b></a></td></tr>";
}
$info .= "</table>";
print "{$info}";
sql_disconnect( );
?>
