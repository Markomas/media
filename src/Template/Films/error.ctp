<?php include 'menu_admin.ctp'; ?>


<div class="well col-xs-12">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#alert">Alertes</a></li>
    <li ><a data-toggle="tab" href="#trailer">Trailer</a></li>
    <li ><a data-toggle="tab" href="#note">Note</a></li>
    <li ><a data-toggle="tab" href="#year">Annee</a></li>
    <li ><a data-toggle="tab" href="#time">Durée</a></li>


  </ul>

  <div class="tab-content">

    <div id="alert" class="tab-pane fade in active">
        <table class="table table-striped">
          <?php foreach ($alerts as $series): ?>
          <tr>
              <td><?= h($series->id_film) ?></td>
              <td><?= h($series->tmdb) ?></td>
              <td><?= h($series->titre_film) ?></td>
              <td><?= h($series->annee_film) ?></td>

              <td><?= $series->created ?></td>


              <td class="actions">
                  <?= $this->Html->link(__('Voir'), ['action' => 'view', $series->id_film], array('class' => 'btn btn-sm btn-success')) ?>
                  <?= $this->Html->link(__('Editer'), ['action' => 'edit', $series->id_film], array('class' => 'btn btn-sm btn-warning')) ?>
                  <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $series->id_film],
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

    <div id="trailer" class="tab-pane fade in">
        <table class="table table-striped">
          <?php foreach ($trailers as $series): ?>
            <tr>
                <td><?= h($series->id_film) ?></td>
                <td><?= h($series->tmdb) ?></td>
                <td><?= h($series->titre_film) ?></td>
                <td><?= h($series->annee_film) ?></td>

                <td><?= $series->created ?></td>


                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $series->id_film], array('class' => 'btn btn-sm btn-success')) ?>
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $series->id_film], array('class' => 'btn btn-sm btn-warning')) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $series->id_film],
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
                <td><?= h($series->id_film) ?></td>
                <td><?= h($series->tmdb) ?></td>
                <td><?= h($series->titre_film) ?></td>
                <td><?= h($series->annee_film) ?></td>

                <td><?= $series->created ?></td>


                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $series->id_film], array('class' => 'btn btn-sm btn-success')) ?>
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $series->id_film], array('class' => 'btn btn-sm btn-warning')) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $series->id_film],
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

    <div id="year" class="tab-pane fade in">
        <table class="table table-striped">

          <?php foreach ($annees as $series): ?>
            <tr>
                <td><?= h($series->id_film) ?></td>
                <td><?= h($series->tmdb) ?></td>
                <td><?= h($series->titre_film) ?></td>
                <td><?= h($series->annee_film) ?></td>

                <td><?= $series->created ?></td>


                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $series->id_film], array('class' => 'btn btn-sm btn-success')) ?>
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $series->id_film], array('class' => 'btn btn-sm btn-warning')) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $series->id_film],
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
    <div id="time" class="tab-pane fade in">
        <table class="table table-striped">
          <?php foreach ($times as $series): ?>
            <tr>
                <td><?= h($series->id_film) ?></td>
                <td><?= h($series->tmdb) ?></td>
                <td><?= h($series->titre_film) ?></td>
                <td><?= h($series->annee_film) ?></td>

                <td><?= $series->created ?></td>


                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $series->id_film], array('class' => 'btn btn-sm btn-success')) ?>
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $series->id_film], array('class' => 'btn btn-sm btn-warning')) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $series->id_film],
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
