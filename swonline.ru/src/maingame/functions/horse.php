<?php

if ( !isset( $player['id'] ) )
{
    exit( );
}
$SQL = "select sw_object.text,sw_object.id from sw_object inner join sw_users on sw_object.id=sw_users.room where sw_users.id={$player_id}  and what='horse'";
$row_num = sql_query_num( $SQL );
while ( $row_num )
{
    $text = $row_num[0];
    $objid = $row_num[1];
    $row_num = sql_next_num( );
}
if ( $result )
{
    mysql_free_result( $result );
}
if ( $text != "" )
{
    if ( !isset( $page ) )
    {
        $page = 0;
    }
    $p = "";
    $SQL = "select count(*) from sw_pettype";
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
    if ( $action == "buy" )
    {
        $SQL = "select count(*) from sw_pet where owner={$player_id}";
        $row_num = sql_query_num( $SQL );
        while ( $row_num )
        {
            $c = $row_num[0];
            $row_num = sql_next_num( );
        }
        if ( $result )
        {
            mysql_free_result( $result );
        }
        $SQL = "select gold from sw_users where id={$player_id}";
        $row_num = sql_query_num( $SQL );
        while ( $row_num )
        {
            $gold = $row_num[0];
            $row_num = sql_next_num( );
        }
        if ( $result )
        {
            mysql_free_result( $result );
        }
        $SQL = "select name,food,str,pic,min_speed,max_speed,id,loyalty,price from sw_pettype where id={$id}";
        $row_num = sql_query_num( $SQL );
        while ( $row_num )
        {
            $h_name = $row_num[0];
            $h_food = $row_num[1];
            $h_str = $row_num[2];
            $h_pic = $row_num[3];
            $h_min_speed = $row_num[4];
            $h_max_speed = $row_num[5];
            $h_id = $row_num[6];
            $h_loyalty = $row_num[7];
            $h_price = $row_num[8];
            $row_num = sql_next_num( );
        }
        if ( $result )
        {
            mysql_free_result( $result );
        }
        if ( $c < 3 )
        {
            if ( $h_price <= $gold )
            {
                $SQL = "insert into sw_pet (name,owner,food,max_food,str,max_str,min_speed,max_speed,loyalty,pic,active) values ('{$h_name}',{$player_id},{$h_food},{$h_food},{$h_str},{$h_str},{$h_min_speed},{$h_max_speed},{$h_loyalty},'{$h_pic}',1)";
                sql_do( $SQL );
                $SQL = "update sw_users set gold=GREATEST(0, gold-{$h_price}) where id={$player_id}";
                sql_do( $SQL );
                print "<script>alert('�� ������ ��������.');</script>";
            }
            else
            {
                print "<script>alert('� ��� ��� ������� ������.');</script>";
            }
        }
        else
        {
            print "<script>alert('���������� �������� �� ����� ��������� 3.');</script>";
        }
    }
    $i = 0;
    for ( ; $i < $count; ++$i )
    {
        $e = $i + 1;
        if ( $count < $e )
        {
            $e = $count;
        }
        if ( $i == $page )
        {
            $p .= " |<b>{$e}</b>| ";
        }
        else
        {
            $p .= " |<a href=menu.php?page={$i}&load={$load} class=menu2 target=menu>{$e}</a>| ";
        }
    }
    if ( $count != 0 )
    {
        $all = "<table width=98%><tr><td><table width=100%><tr><td height=40 align=center colspan=2>{$p}</td></tr>";
        $SQL = "select name,food,str,pic,min_speed,max_speed,id,loyalty,price from sw_pettype  limit {$page},1";
        $row_num = sql_query_num( $SQL );
        while ( $row_num )
        {
            $h_name = $row_num[0];
            $h_food = $row_num[1];
            $h_str = $row_num[2];
            $h_pic = $row_num[3];
            $h_min_speed = $row_num[4];
            $h_max_speed = $row_num[5];
            $h_id = $row_num[6];
            $h_loyalty = $row_num[7];
            $h_price = $row_num[8];
            if ( 9 <= $h_loyalty )
            {
                $loyalty = "������";
            }
            else if ( 7 <= $h_loyalty )
            {
                $loyalty = "�������";
            }
            else
            {
                $loyalty = "�������";
            }
            if ( 120 <= $h_str )
            {
                $str = "�������";
            }
            else if ( 100 <= $h_str )
            {
                $str = "�������";
            }
            else
            {
                $str = "������";
            }
            if ( 2 < ( $h_min_speed + $h_max_speed ) / 2 )
            {
                $speed = "�������";
            }
            else if ( 1.7 <= ( $h_min_speed + $h_max_speed ) / 2 )
            {
                $speed = "�������";
            }
            else
            {
                $speed = "������";
            }
            $else = "<tr><Td colspan=2 height=10></td></tr>";
            $else .= "<tr><td colspan=2><a href=menu.php?load={$load}&action=buy&id={$h_id}&page={$page} target=menu class=menu2><b>� ������ �������� {$h_price} ���.</b></a></td></tr>";
            $all .= "<tr><td colspan=2><table width=98%><tr><td width=150 align=center><img src=pic/pet/{$h_pic}></td><td valign=top align=right width=200><table cellpadding=2><tr><td width=150><b>��� ���������: </b></td><td>{$h_name}</td></tr><tr><td><b>�����������: </b></td><td>{$loyalty}</td></tr><tr><td><b>������������: </b></td><td>{$str}</td></tr><tr><td><b>��������: </b></td><td>{$speed}</td></tr>{$else}</table></td></tr></table></td></tr>";
            $row_num = sql_next_num( );
        }
        if ( $result )
        {
            mysql_free_result( $result );
        }
        $all .= "</table></td></tr></table>";
        print "<script>top.domir('������ ��������','{$all}');</script>";
    }
}
else
{
    print "<script>alert('������� ����������.')</script>";
}
?>
