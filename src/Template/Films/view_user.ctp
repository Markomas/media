


<nav class="navbar navbar-default">
  <div class="container-fluid">

<div class="nav navbar-nav"  style="margin-top: 0.7%; margin-right: 1%;">
  <a href="<?= $refer ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>  Retour</a>
  <?php
  $authUser = $this->request->Session()->read('Auth.User');
  if ($authUser['role']=='admin'){
    $file = str_replace('.', '-dot-', $film->file_film);
    $file = str_replace('/', '-slash-', $file);
    echo "&nbsp;&nbsp;";
    echo "&nbsp;&nbsp;";

  echo $this->Html->link(__('Edition semi-auto'), ['action' => 'manualEdit', $file], array('class' => 'btn btn-sm  btn-warning', 'escape' => false ));
  echo "&nbsp;&nbsp;";
  echo $this->Html->link(__('Edition manuelle'), ['action' => 'edit', $film->id_film], array('class' => 'btn btn-sm  btn-warning', 'escape' => false ));
  echo "&nbsp;&nbsp;";
  echo $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $film->id_film],
  array(
                        'class'    => 'btn btn-sm btn-danger',
                        'escape'   => false,
                        'confirm'  => 'Êtes vous sûr ?'
                      ) );
  echo "&nbsp;&nbsp;";

  echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;Supprimer Fiche & Fichier'), ['action' => 'deleteFicheFile', $film->id_film],
  array(
                        'class'    => 'btn btn-sm btn-danger',
                        'escape'   => false,
                        'confirm'  => 'Êtes vous sûr ?'
                      ) );

  }
  ?>
</div>

    <div class="nav navbar-right" style="margin-top: 0.7%; margin-right: 1%;">
      <a href="https://www.sous-titres.eu/search.html?q=<?= h($film->titre_film) ?>" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Sous-titres externes</a>
&nbsp;&nbsp;&nbsp;&nbsp;

      <?php
      if ($OS == "Windows") {

        echo $this->Html->link(__('<span class="glyphicon glyphicon-eye-open"></span>  Streaming'), ['action' => 'stream', $film->id_film], array('class' =>'btn btn-warning text-justify', 'data-toggle'=>'popover', 'data-placement'=>'bottom', 'data-html'=>'true', 'data-trigger'=>'focus',
        'title'=>'<b>Aide pour le streaming</b>', 'data-content'=> 'Veuillez ouvrir le fichier *.m3u avec votre lecteur préféré.
        <br><br>En cas de problèmes veuillez installer <a href=\'http://www.videolan.org/vlc/\' target=\'_blank\'>VLC media player</a>.'
        , 'escape' => false ));
      } else {
        echo $this->Html->link(__('<span class="glyphicon glyphicon-eye-open"></span>  Streaming'), ['action' => 'stream', $film->id_film], array('class' =>'btn btn-warning text-justify', 'data-toggle'=>'popover', 'data-placement'=>'bottom', 'data-html'=>'true', 'data-trigger'=>'focus',
        'title'=>'<b>Aide pour le streaming</b>', 'data-content'=>
        '<p><b>ATTENTION : Changement de fonctionnement depuis la nouvelle version !</b></p>
        Veuillez télécharger et installer l\'utilitaire suivant : <a href=\'../../Media_streamingVLC.exe\' target=\'_blank\'>VLCHandler</a>.
        <br><br>En cas de problèmes veuillez installer <a href=\'http://www.videolan.org/vlc/\' target=\'_blank\'>VLC media player</a>.'
        , 'escape' => false ));
      } ?>


      &nbsp;&nbsp;

      <?= $this->Html->link(__('<span class="glyphicon glyphicon-download"></span>  Télecharger'), ['action' => 'download', $film->id_film], array('class' => 'btn  btn-success', 'escape' => false )) ?>



    </div>


  </div>
</nav>
<div class="well col-xs-12">

  <div class="col-sm-3">
    <br>
      <?= $this->Html->image('poster/'.$film->tmdb.'.jpg'); ?>
  </div>


  <div class="col-sm-9">
        <h1><b><?= h($film->titre_film) ?></b></h1>
        <a <?php  if ($film->trailer_film=='') {echo 'disabled';}?> data-toggle="modal" data-theVideo="http://www.youtube.com/embed/<?= h($film->trailer_film) ?>" data-target="#myModal" target="_blank" class="btn btn-danger pull-right <?php  if ($film->trailer_film=='') {echo 'disabled';}?>"><span class="glyphicon glyphicon-eye-open"></span>  Bande annonce</a>

        <h5>Année : <?= substr($film->annee_film,0,4) ?>  -  Durée : <?= h($film->time_film) ?></h5>
        <br>
        <h4><em><?= h($film->tagline_film) ?></em></h4>
        <br>
        <h4><b>Résumé :</b></h4>
        <p class="text-justify">
          <?= h($film->resume_film) ?>
        </p>

        <div class="col-sm-3">
          <h5><b>Qualité :</b> <?= h($film->def_film) ?> <br><br>Taille : <?= $size ?></h5>
        </div>
        <div class="col-sm-3">
          <h5><?php
          if (!empty($film->audio)) {
            echo "<b>Audio :</b> ".$film->audio;
          }
           ?></h5>
        </div>
        <div class="col-sm-3">
          <h5><?php
          if (!empty($film->sub)) {
          echo "<b>Sous-titres :</b> ".$film->sub;
          }?></h5>
        </div>
        <br>

        <div class="col-sm-12">
          <h5><b>Note :</b> <?= h($film->note_film) ?></h5>
          <h5><b>Vues :</b> <?= h($film->view) ?></h5>

          <h5><b>Genre :</b> <?= h($film->genre_film) ?></h5>

        </div>



        <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content ">

          <iframe width="900" height="450"
          src="" frameborder="0">
          </iframe>
      </div>

    </div>
  </div>

  <div class="col-sm-12">
    <br>
          <h5><b>Réalisateurs : </b>
            <?php foreach ($reals as $real): ?>
              <?= $this->Html->link(__($real), ['action' => 'indexUser', 'search' => $real], array('escape' => false )) ?>
              -
            <?php endforeach; ?>
          </h5>
          <h5 class="text-justify"><b>Acteurs : </b>
          <?php foreach ($actors as $actor): ?>
            <?= $this->Html->link(__($actor), ['action' => 'indexUser', 'search' => $actor], array('escape' => false )) ?>
            -
          <?php endforeach; ?>

          </h5>

  </div>


  </div>
  <div class="pull-right"><br>
    <form role="form" method="post" >

    Une erreur dans la fiche ? <button type="submit" class="btn btn-xs btn-warning" value="alert" name="alert">Signalez le !</button>
  </form>
  </div>


  </div>

<script type="text/javascript">

function autoPlayYouTubeModal(){
var trigger = $("body").find('[data-toggle="modal"]');
trigger.click(function() {
  var theModal = $(this).data( "target" ),
  videoSRC = $(this).attr( "data-theVideo" ),
  videoSRCauto = videoSRC+"?autoplay=1" ;
  $(theModal+' iframe').attr('src', videoSRCauto);
  $(theModal+'.fade').click(function () {
      $(theModal+' iframe').attr('src', videoSRC);
  });

});
};

$(document).ready(function(){
  autoPlayYouTubeModal();

  $('[data-toggle="popover"]').popover();
});

</script>
