<?php

require_once ("funct_music.php");
$getID3 = new getID3();
$song = '/home/stf/Musique/ODEZENNE/Dolziger.Str..2-[2015]/01-Un.corps.à.prendre.mp3';
$songInfo = $getID3->analyze($song);
getGenre('',$songInfo);
print_r($songInfo);



 ?>
