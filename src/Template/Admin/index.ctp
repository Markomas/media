<div class="well">
<div class="input-group col-xs-12">
    <h3 class="col-sm-3">Dashboard : </h3>


  <div class="pull-right">
    <br>
    Tu es perdu .onscrit ? <span class="glyphicon glyphicon-arrow-right"></span> <a href="admin_help.php" class="btn btn-info"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;Aide</a>
  </div>
  <br>
  <br>
  <br>
</div>
</div>

<div class="col-sm-2 well">
  <ul class="nav nav-pills nav-stacked">
    <li><?= $this->Html->link(__('Films'), ['controller' => 'Films','action' => 'indexAdmin'])?></li>
    <li><?= $this->Html->link(__('Séries'), ['controller' => 'Series','action' => 'indexAdmin'])?></li>
    <li><?= $this->Html->link(__('Musique'), ['controller' => 'Music','action' => 'indexAdmin'])?></li>

    <li><?= $this->Html->link(__('Configuration'), ['controller' => 'Admin','action' => 'configure'])?></li>
  </ul>
  <br>
</div>

<div class="col-sm-5">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>Films</h4>
    </div>
    <div class="panel-body">
      <?php

      echo $nb_films." films indexés"; ?>
      <br>
      <br>
      <?php
      echo $nb_films_alert." films signalés"; ?>
      <br>

    </div>
  </div>

</div>
<div class="col-sm-5">

<div class="panel panel-default">
  <div class="panel-heading">
    <h4>Séries</h4>
  </div>
  <div class="panel-body">
    <?php echo $nb_series." séries indexées"; ?>
    <br>
        <?php echo $nb_ep." épisodes indexées"; ?>
    <br>
    <?php echo $nb_series_alert." séries signalées"; ?>
  </div>
</div>
</div>

<div class="col-sm-5">
<div class="panel panel-default">
  <div class="panel-heading">
    <h4>Musiques</h4>
  </div>
  <div class="panel-body">
    <?php echo $nb_music." chansons indexées"; ?>
    <br>
        <?php echo $nb_album." albums indexés"; ?>
    <br>
    <?php echo $nb_artist." artistes indexés"; ?>
  </div>
</div>
</div>
<div class="col-sm-5">
<div class="panel panel-default">
  <div class="panel-heading">
    <h4>Utilisateurs</h4>
  </div>
  <div class="panel-body">
    <?php echo $nb_user." utilisateurs"; ?>
    <br>
        <?php echo $nb_admin." administrateurs"; ?>

  </div>
</div>
</div>
