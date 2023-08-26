<?php

if ($show == 1 ) {
    include( "monsters.php" );
}
else {
    print "1. <a href=?load={$load}&subload={$subload}&show=1 class=menu>Монстрология.</a><br>";
}
?>
