<?php

$title = array();
$artist = array();
$mp3 = array();
$poster = array();


foreach ($musics as $music) {
  array_push($title, $music['song']);
  array_push($artist, $music['artist']);
  array_push($mp3, $url.'/'.$music['file']);
  array_push($poster, $this->Url->build('/', true).'img/album/'.$music['cover']);
}
// To download as zip !
$folder = $path.'/'.$musics->first()['file'];
$pos = strrpos($folder, '/', -1);
$folder = substr($folder, 0, $pos);
$folder = str_replace('/', '-slash-', $folder);
$zip = $musics->first()['album'].'.zip';
 ?>


<script type="text/javascript">
$(document).ready(function(){
  <?php foreach ($title as $key => $titre) {
    echo '$("#song'.$key.'").hover(function(){
      $(this).children().find("span").fadeTo( 0, 10 );
      $(this).children().find("#time").fadeTo( 10, 0 );

    },function(){
      $(this).children().find("span").fadeTo( 10, 0 );
      $(this).children().find("#time").fadeTo( 0, 10 );

    });';
}?>

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
    window.top.myPlaylist.option("autoPlay", true);
    window.top.myPlaylist.play();
    window.parent.$("#playlist_div").parent().fadeTo( 0, 1000 );;
    window.parent.$("#playlist_div").parent().delay(3000).fadeTo( 1000, 0 );;
    setTimeout(function(){window.parent.$("#playlist_div").parent().css("display", "none");},4000);
    window.parent.playlist_view = 1;
  });';
    } ?>

    <?php foreach ($title as $key => $titre) {
      echo '$("#playlist-set-'.$key.'").click(function() {
            window.top.myPlaylist.setPlaylist(';
      echo '[{';
      echo 'title: "'.$titre.'",';
      echo 'artist: "'.$artist[$key].'",';
      echo 'free:true,';
      echo 'mp3: "'.$mp3[$key].'",';
      echo 'poster: "'.$poster[$key].'",';
      echo '}]
    );
    window.top.myPlaylist.option("autoPlay", true);
    window.top.myPlaylist.play();
    window.parent.$("#playlist_div").parent().fadeTo( 0, 1000 );;
    window.parent.$("#playlist_div").parent().delay(3000).fadeTo( 1000, 0 );;
    setTimeout(function(){window.parent.$("#playlist_div").parent().css("display", "none");},4000);
    window.parent.playlist_view = 1;

  });';
    } ?>

      // Play d'un album entier !
      $("#playlist-set-album").click(function() {
            window.top.myPlaylist.setPlaylist([
              <?php foreach ($title as $key => $titre) {

                  echo '{';
                  echo 'title: "'.$titre.'",';
                  echo 'artist: "'.$artist[$key].'",';
                  echo 'free:true,';
                  echo 'mp3: "'.$mp3[$key].'",';
                  echo 'poster: "'.$poster[$key].'",';
                  echo '},';
            } ?>
            ]);
          window.top.myPlaylist.play();
          window.parent.$("#playlist_div").parent().fadeTo( 0, 1000 );;
          window.parent.$("#playlist_div").parent().delay(3000).fadeTo( 1000, 0 );;
          setTimeout(function(){window.parent.$("#playlist_div").parent().css("display", "none");},4000);
          window.parent.playlist_view = 1;
        });




});
</script>

<div class="well" style="overflow-y:auto">
<div class="col-xs-2">
  <img style="width: 150px;" src="<?= $this->Url->build('/', true).'img/album/'.$musics->first()['cover']?>" alt="" />

</div>
<div class="col-xs-10">
  <div class="pull-left" style="font-size:25px;">
    <?= $musics->first()['album'] ?>



  </div>

  <div class="pull-right">
    <a href="javascript:;" id="playlist-set-album"><span class="glyphicon glyphicon-play"></span></a>
    <?= $this->Html->link(__('<span class="glyphicon glyphicon-download-alt">'), ['action' => 'download', $folder, $zip], ['escape' => false]) ?>

&nbsp;&nbsp;
<?= $musics->first()['year'] ?>
  </div>
</div>
<div class="col-xs-5">
  <?php
  echo '<table class="table table-striped">';
  for ($i=0; $i < ceil(sizeof($title)/2); $i++) {
    $music = $musics->toArray();
    echo '<tr id="song'.$i.'">';
    echo '<td>'.$music[$i]['num'].' - '.$music[$i]['song'].'</td>
        <td class="col-xs-2">
        <div style="position:absolute">
        <a href="'.$mp3[$i].'"><span class="glyphicon glyphicon-download-alt" style="z-index: 999; display: none"></span></a>
        &nbsp;
        <a href="javascript:;" id="playlist-add-'.$i.'"><span class="glyphicon glyphicon-plus" style="z-index: 999; display: none"></span></a>
        &nbsp;
        <a href="javascript:;" id="playlist-set-'.$i.'"><span class="glyphicon glyphicon-play" style=" z-index: 999; display: none"></span></a>
        </div>
        <div id="time" style="display: inline; position: absolute;">'.$music[$i]['time'].'</div>
        </td></tr>';
  }
  echo "</table>";
   ?>
 </div>
 <div class="col-xs-5">
   <?php
   echo '<table class="table table-striped">';
   for ($i=ceil(sizeof($title)/2); $i < sizeof($title); $i++) {
     $music = $musics->toArray();
     echo '<tr id="song'.$i.'">';
     echo '<td>'.$music[$i]['num'].' - '.$music[$i]['song'].'</td>
         <td class="col-xs-2">
         <div style="position:absolute">
         <a href="'.$mp3[$i].'"><span class="glyphicon glyphicon-download-alt" style="z-index: 999; display: none"></span></a>
         &nbsp;
         <a href="javascript:;" id="playlist-add-'.$i.'"><span class="glyphicon glyphicon-plus" style="z-index: 999; display: none"></span></a>
         &nbsp;
         <a href="javascript:;" id="playlist-set-'.$i.'"><span class="glyphicon glyphicon-play" style=" z-index: 999; display: none"></span></a>
         </div>
         <div id="time" style="display: inline; position: absolute;">'.$music[$i]['time'].'</div>
         </td></tr>';
   }
   echo "</table>";
    ?>
  </div>




</div>
