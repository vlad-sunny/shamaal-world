<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

header( "Content-type: text/html; charset=win-1251" );
echo "<html>\r\n<head>\r\n\t<title>��������� ���</title>\r\n</head>\r\n<LINK REL=STYLESHEET TYPE=\"TEXT/CSS\" HREF=\"site.css\" TITLE=\"STYLE\">\r\n<body>\r\n";
if ( !isset( $ger ) )
{
    $ger = 1;
}
if ( !isset( $lang ) )
{
    $lang = 1;
}
$sex[$ger] = "Selected";
$lng[$lang] = "Selected";
echo "<table width=400><form action=''><input type=\"hidden\" name=\"do\" value=\"gen\"><tr><td>���: </td><td>";
echo "<s";
echo "elect name=\"ger\"><option value=\"1\" ";
print $sex[1];
echo ">�������</option><option value=\"2\"  ";
print $sex[2];
echo ">�������</option></select></td><td>";
echo "<s";
echo "elect name=\"lang\"><option value=\"1\"  ";
print $lng[1];
echo ">�� �������</option><option value=\"2\"   ";
print $lng[2];
echo ">�� ����������</option></select></td><td><input type=submit value=�������������></td></tr></form></table>\r\n";
if ( $do == "gen" )
{
    $was = 0;
    if ( $ger == 1 && $lang == 1 )
    {
        $was = 1;
        $filename = "rus_male.txt";
    }
    else if ( $ger == 2 && $lang == 1 )
    {
        $was = 1;
        $filename = "rus_female.txt";
    }
    else if ( $ger == 1 && $lang == 2 )
    {
        $was = 1;
        $filename = "ang_male.txt";
    }
    else if ( $ger == 2 && $lang == 2 )
    {
        $was = 1;
        $filename = "ang_female.txt";
    }
    if ( $was == 1 )
    {
        print "<table cellpadding=5 width=400><tr><td>";
        $file = fopen( $filename, "r" );
        $i = 0;
        while ( !feof( $file ) )
        {
            ++$i;
            $name[$i] = fgets( $file, 12 );
        }
        $k = 1;
        for ( ; $k <= 15; ++$k )
        {
            $r = rand( 1, $i );
            if ( 3 < strlen( $name[$r] ) )
            {
                print $name[$r]."<br>";
            }
            else
            {
                --$k;
            }
        }
        print "</td></tr><tr><td class=small align=center>��������, ��� ������ ��������� ������� ��� ��������� ���� ���������� ���, ����������� �� ������ ������.</td></tr></table>";
    }
}
echo "</body>\r\n</html>\r\n";
?>
