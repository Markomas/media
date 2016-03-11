<?php include 'menu_admin.ctp'; ?>
<div class="well"><h4>Séries uploadées par les utilisateurs</h4>
Une fois accepté les séries sont placées dans le dossier Serie_Upload. Il est donc nécessaire de les
 <?= $this->Html->link(__('Renommer'), ['action' => 'rename'], array('class' =>'btn btn-xs btn-warning', 'escape' => false )) ?>
 et de les importer.
</div>

<div class="well">
    <table class="table table-striped table-responsive">
      <thead>
          <tr>
          <th>Nom</th>
          <th>Stream</th>
          <th>Episode</th>
          <th>Qualité</th>
          <th>Taille</th>
          <th>Audio</th>
          <th>Sous-titres</th>
          <th>Existant</th>
          <th>Accepter</th>

          </tr>
      </thead>

        <tbody>

            <?php foreach ($series_file as $index => $serie): ?>

            <tr>

              <td>
                <b><?= $series_name[$index] ?></b> -
                <a target="_blank" class="btn btn-info btn-xs" href="https://www.themoviedb.org/search?query=<?= $series_name[$index] ?>">Fiche TMDB</a>

                <br>
                  <?= $serie ?>
              </td>
              <td>
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-eye-open"></span> Stream'), ['action' => 'moderateStream', $serie, $series_name[$index]], array('class' =>'btn btn-sm btn-warning', 'escape' => false )) ?>
              </td>
              <td>
                <?= 'S'.$series_season[$index].'E'.$series_episode[$index] ?>
              </td>
              <td>
                <?= $series_def[$index] ?>
              </td>
              <td>
                <?= $series_size[$index] ?>
              </td>
              <td>
                <?= $series_audio[$index] ?>
              </td>
              <td>
                <?= $series_sub[$index] ?>
              </td>
              <td>
                <?php if ($series_exist[$index] != false): ?>
                  <?= $this->Html->link(__('<span class="glyphicon glyphicon-warning-sign"></span>  Episode existant'), ['action' => 'view-user', $series_exist[$index]], array('class' =>'btn btn-sm btn-danger', 'escape' => false )) ?>
                <?php else: ?>
                  <span class="glyphicon glyphicon-remove">Non</span>
                <?php endif; ?>
              </td>
              <td>
                <?php
                $serie = str_replace('.', '-dot-', $serie);
                $serie = str_replace('/', '', $serie);
                 ?>
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-ok"></span>'), ['action' => 'moderate', 'accept', $serie], array('class' =>'btn btn-sm btn-success', 'escape' => false )) ?>
                &nbsp;
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'moderate', 'remove', $serie], array('class' =>'btn btn-sm btn-danger', 'escape' => false )) ?>
              </td>
            </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

</div>
