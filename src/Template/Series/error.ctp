<?php include 'menu_admin.ctp'; ?>


<div class="well col-xs-12">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#alert">Alertes</a></li>
    <li ><a data-toggle="tab" href="#titre">Titre Episode</a></li>
    <li ><a data-toggle="tab" href="#audio">Audio</a></li>
    <li ><a data-toggle="tab" href="#def">Définition</a></li>
    <li ><a data-toggle="tab" href="#sub">Sous-titres</a></li>
    <li ><a data-toggle="tab" href="#note">Note</a></li>


  </ul>

  <div class="tab-content">

    <div id="alert" class="tab-pane fade in active">
        <table class="table table-striped">
          <?php foreach ($alerts as $series): ?>
          <tr>
              <td><?= $this->Number->format($series->id) ?></td>
              <td><?= $this->Number->format($series->id_tmdb) ?></td>
              <td><?= h($series->titre) ?></td>
              <td><?= $this->Number->format($series->season) ?></td>
              <td><?= $this->Number->format($series->episode) ?></td>
              <td><?= $series->titre_episode ?></td>
              <td><?= $series->created ?></td>


              <td class="actions">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $series->id], array('class' => 'btn btn-sm btn-success')) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $series->id], array('class' => 'btn btn-sm btn-warning')) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $series->id],
                  array(
                                        'class'    => 'btn btn-sm btn-danger',
                                        'escape'   => false,
                                        'confirm'  => 'Êtes vous sûr ?'
                                      ) ); ?>
          </td>
          </tr>
          <?php endforeach; ?>
        </table>
    </div>

    <div id="titre" class="tab-pane fade in">
        <table class="table table-striped">
          <?php foreach ($titres as $series): ?>
          <tr>
              <td><?= $this->Number->format($series->id) ?></td>
              <td><?= $this->Number->format($series->id_tmdb) ?></td>
              <td><?= h($series->titre) ?></td>
              <td><?= $this->Number->format($series->season) ?></td>
              <td><?= $this->Number->format($series->episode) ?></td>
              <td><?= $series->titre_episode ?></td>
              <td><?= $series->created ?></td>


              <td class="actions">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $series->id], array('class' => 'btn btn-sm btn-success')) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $series->id], array('class' => 'btn btn-sm btn-warning')) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $series->id],
                  array(
                                        'class'    => 'btn btn-sm btn-danger',
                                        'escape'   => false,
                                        'confirm'  => 'Êtes vous sûr ?'
                                      ) ); ?>
          </td>
          </tr>
          <?php endforeach; ?>
        </table>
    </div>
    <div id="audio" class="tab-pane fade in">
        <table class="table table-striped">
          <?php foreach ($audios as $series): ?>
          <tr>
              <td><?= $this->Number->format($series->id) ?></td>
              <td><?= $this->Number->format($series->id_tmdb) ?></td>
              <td><?= h($series->titre) ?></td>
              <td><?= $this->Number->format($series->season) ?></td>
              <td><?= $this->Number->format($series->episode) ?></td>
              <td><?= $series->titre_episode ?></td>
              <td><?= $series->created ?></td>


              <td class="actions">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $series->id], array('class' => 'btn btn-sm btn-success')) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $series->id], array('class' => 'btn btn-sm btn-warning')) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $series->id],
                  array(
                                        'class'    => 'btn btn-sm btn-danger',
                                        'escape'   => false,
                                        'confirm'  => 'Êtes vous sûr ?'
                                      ) ); ?>
          </td>
          </tr>
          <?php endforeach; ?>
        </table>
    </div>

    <div id="sub" class="tab-pane fade in">
        <table class="table table-striped">

          <?php foreach ($subs as $series): ?>
          <tr>
              <td><?= $this->Number->format($series->id) ?></td>
              <td><?= $this->Number->format($series->id_tmdb) ?></td>
              <td><?= h($series->titre) ?></td>
              <td><?= $this->Number->format($series->season) ?></td>
              <td><?= $this->Number->format($series->episode) ?></td>
              <td><?= $series->titre_episode ?></td>
              <td><?= $series->created ?></td>


              <td class="actions">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $series->id], array('class' => 'btn btn-sm btn-success')) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $series->id], array('class' => 'btn btn-sm btn-warning')) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $series->id],
                  array(
                                        'class'    => 'btn btn-sm btn-danger',
                                        'escape'   => false,
                                        'confirm'  => 'Êtes vous sûr ?'
                                      ) ); ?>
          </td>
          </tr>
          <?php endforeach; ?>
        </table>
    </div>
    <div id="def" class="tab-pane fade in">
        <table class="table table-striped">
          <?php foreach ($defs as $series): ?>
          <tr>
              <td><?= $this->Number->format($series->id) ?></td>
              <td><?= $this->Number->format($series->id_tmdb) ?></td>
              <td><?= h($series->titre) ?></td>
              <td><?= $this->Number->format($series->season) ?></td>
              <td><?= $this->Number->format($series->episode) ?></td>
              <td><?= $series->titre_episode ?></td>
              <td><?= $series->created ?></td>


              <td class="actions">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $series->id], array('class' => 'btn btn-sm btn-success')) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $series->id], array('class' => 'btn btn-sm btn-warning')) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $series->id],
                  array(
                                        'class'    => 'btn btn-sm btn-danger',
                                        'escape'   => false,
                                        'confirm'  => 'Êtes vous sûr ?'
                                      ) ); ?>
          </td>
          </tr>
          <?php endforeach; ?>
        </table>
    </div>
    <div id="note" class="tab-pane fade in">
        <table class="table table-striped">
          <?php foreach ($notes as $series): ?>
          <tr>
              <td><?= $this->Number->format($series->id) ?></td>
              <td><?= $this->Number->format($series->id_tmdb) ?></td>
              <td><?= h($series->titre) ?></td>
              <td><?= $this->Number->format($series->season) ?></td>
              <td><?= $this->Number->format($series->episode) ?></td>
              <td><?= $series->titre_episode ?></td>
              <td><?= $series->created ?></td>


              <td class="actions">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $series->id], array('class' => 'btn btn-sm btn-success')) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $series->id], array('class' => 'btn btn-sm btn-warning')) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $series->id],
                  array(
                                        'class'    => 'btn btn-sm btn-danger',
                                        'escape'   => false,
                                        'confirm'  => 'Êtes vous sûr ?'
                                      ) ); ?>
          </td>
          </tr>
          <?php endforeach; ?>
        </table>
    </div>


  </div>


</div>






  </div>
