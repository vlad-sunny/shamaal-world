<?php

$news_page_size = 15;

if (!isset($page))
{
    $page = 1;
}

$p = "";

$news_max_page = 0;
foreach (glob(getcwd()."/news/*.htm") as $file)
{
    $news_max_page++;
}

for ($i = 1; $i <= $news_max_page; $i++)
{
    if ($i == $page) {
        $p .= "|<b><font color=\"#990000\">$i</font></b>| ";
    }
    else {
        $p .= "|<a href=\"index.php?load=$load&page=$i\" class=\"menu\">$i</a>| ";
    }
}

if ($page == 1)
{
    $page = '';
}

if ($p != "") {
    print "<div align=\"center\" style=\"display: block; width: 400px; height: auto;\">$p</div><br />";
}

include("news$page.htm");

if ($p != "") {
    print "<div align=\"center\" style=\"display: block; width: 400px; height: auto;\">$p</div><br />";
}

?>
