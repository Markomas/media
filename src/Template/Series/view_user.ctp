


<nav class="navbar navbar-default">
  <div class="container-fluid">

<div class="nav navbar-nav"  style="margin-top: 0.7%; margin-right: 1%;">
  <a href="<?= $refer ?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>  Retour</a>
</div>


  </div>
</nav>
<div class="well col-xs-12">

  <div class="col-sm-3">
    <br>
      <?= $this->Html->image('poster/'.$serie->id_tmdb.'.jpg'); ?>
  </div>


  <div class="col-sm-9">
        <h1><b><?= h($serie->titre) ?></b></h1>

        <h5>Année : <?= substr($serie->annee,0,4) ?> </h5>
        <br>


        <h4><b>Résumé :</b></h4>
        <p class="text-justify">
          <?= h($serie->resume) ?>
        </p>

        <br>


          <h5><b>Note :</b> <?= h($serie->note) ?></h5>


          <div class="pull-right"><br>
            <form role="form" method="post" >

            Une erreur dans la fiche ? <button type="submit" class="btn btn-xs btn-warning" value="alert" name="alert">Signalez le !</button>
          </form>
          </div>

</div>
</div>


<div class="well col-xs-12">
  <ul class="nav nav-tabs">
    <?php
    foreach ($seasons as $key => $season) {
      if ($key == 0) {
        echo '<li class="active"><a data-toggle="tab" href="#season'.$season['season'].'">Saison '.$season['season'].'</a></li>';
      }else {
        echo '<li ><a data-toggle="tab" href="#season'.$season['season'].'">Saison '.$season['season'].'</a></li>';
      }
    }
     ?>
  </ul>

  <div class="tab-content">
    <?php
    foreach ($seasons as $key => $season) {
      if ($key == 0) {
        echo '<div id="season'.$season['season'].'" class="tab-pane fade in active">';
      }else {
        echo '<div id="season'.$season['season'].'" class="tab-pane fade in">';
      }
  echo '
    <br>
      <table class="table table-striped">
      <thead>
          <tr>
          <th>Episode</th>
          <th class="col-xs-3">Nom</th>
          <th>Qualité</th>
          <th>Audio</th>
          <th>Sous-titres</th>
          <th>Vues</th>
          <th></th>
          <th></th>

          </tr>
      </thead>
      ';
      foreach ($episodes as $episode) {

        if ($episode->season == $season['season'])
        echo '<tr>

        <td>S'. sprintf( "%02d",$episode->season).'E'.sprintf( "%02d",$episode->episode).'

        </td>
        <td>'.$episode->titre_episode.'
        </td>
        <td>'.$episode->def.'
        </td>
        <td>'.$episode->audio.'
        </td>
        <td>'.$episode->sub.'
        </td>
        <td>'.$episode->view.'
        </td>

        <td>
        <a href="http://www.addic7ed.com/search.php?search='.$serie->titre.' S'. sprintf( "%02d",$episode->season).'E'.sprintf( "%02d",$episode->episode).'&Submit=Search" target="_blank" class="btn btn-sm btn-default">Sous-titres externes</a>
        </td>
        <td class="">'.
        $this->Html->link(__('<span class="glyphicon glyphicon-download"></span>  Télecharger'), ['action' => 'download', $episode->id], array('class' => 'btn btn-sm btn-success', 'escape' => false ))
       .'&nbsp;&nbsp;'. $this->Html->link(__('<span class="glyphicon glyphicon-eye-open"></span>  Streaming'), ['action' => 'stream', $episode->id], array('class' =>'btn btn-sm btn-warning text-justify', 'data-toggle'=>'popover', 'data-placement'=>'bottom', 'data-html'=>'true', 'data-trigger'=>'focus',
       'title'=>'<b>Aide pour le streaming</b>', 'data-content'=>'Veuillez ouvrir le fichier *.m3u avec votre lecteur préféré. <br><br>En cas de problèmes veuillez installer <a href=\'http://www.videolan.org/vlc/\' target=\'_blank\'>VLC media player</a>.', 'escape' => false ))
       .'</td>';


      }

    echo '  </table>
    </div>';
  }
   ?>
  </div>


</div>






  </div>
