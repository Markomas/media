<?php

$title = ["Drapeau blanc", "Crier tout bas"];
$artist = ["Coeur de Pirate","Coeur de Pirate"];
$mp3 = ["/access/musique/Coeur De Pirate - Roses (Deluxe) (2015)/05 - Drapeau blanc.mp3", "/access/musique/Coeur De Pirate - Roses (Deluxe) (2015)/03 - Crier tout bas.mp3"];
$poster = ["http://i.huffpost.com/gen/3277896/thumbs/o-COEUR-DE-PIRATE-570.jpg","http://i.huffpost.com/gen/3277896/thumbs/o-COEUR-DE-PIRATE-570.jpg"];

 ?>

<script type="text/javascript">
$(document).ready(function(){


    <?php foreach ($title as $key => $titre) {
      echo '$("#playlist-add-'.$key.'").click(function() {
            window.top.myPlaylist.add(';
      echo '{';
      echo 'title: "'.$titre.'",';
      echo 'artist: "'.$artist[$key].'",';
      echo 'free:true,';
      echo 'mp3: "'.$mp3[$key].'",';
      echo 'poster: "'.$poster[$key].'",';
      echo '}

    );
    window.parent.$("#playlist_div").parent().fadeTo( 0, 1000 );;
    window.parent.$("#playlist_div").parent().delay(3000).fadeTo( 1000, 0 );;
    window.parent.playlist_view = 0;

  });';
    } ?>



});
</script>


<div class="well">

<a href="javascript:;" id="playlist-add-0"><?php echo $title[0]." - ".$artist[0] ?></a>

<br>

<a href="javascript:;" id="playlist-add-1"><?php echo $title[1]." - ".$artist[1] ?></a>

<br><b>
<br></b><br>
<br><b>
<br></b><br>
<br><b>
<br></b><br>
<br><b>
<br></b><br>


</div>
