<?php include 'menu_admin.ctp'; ?>
<div class="well"><h4>Films uploadés par les utilisateurs</h4>
Une fois accepté les films sont placés dans le dossier Film_Upload. Il est donc nécessaire de les
 <?= $this->Html->link(__('Renommer'), ['action' => 'rename'], array('class' =>'btn btn-xs btn-warning', 'escape' => false )) ?>
 et de les importer.
</div>

<div class="well">
    <table class="table table-striped table-responsive">
      <thead>
          <tr>
          <th>Nom</th>
          <th>Année</th>
          <th>Qualité</th>
          <th>Taille</th>
          <th>Audio</th>
          <th>Sous-titres</th>
          <th>Existant</th>
          <th>Accepter</th>

          </tr>
      </thead>

        <tbody>

            <?php foreach ($films_file as $index => $film): ?>

            <tr>

              <td>
                <b><?= $films_name[$index] ?></b> -
                <a target="_blank" class="btn btn-info btn-xs" href="https://www.themoviedb.org/search?query=<?= $films_name[$index] ?>">Fiche TMDB</a>
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-eye-open"></span> Stream'), ['action' => 'moderateStream', $film, $films_name[$index]], array('class' =>'btn btn-xs btn-warning', 'escape' => false )) ?>

                <br>
                  <?= $film ?>
              </td>

              <td>
                <?= $films_year[$index] ?>
              </td>
              <td>
                <?= $films_def[$index] ?>
              </td>
              <td>
                <?= $films_size[$index] ?>
              </td>
              <td>
                <?= $films_audio[$index] ?>
              </td>
              <td>
                <?= $films_sub[$index] ?>
              </td>
              <td>
                <?php if ($films_exist[$index] != false): ?>
                  <?= $this->Html->link(__('<span class="glyphicon glyphicon-warning-sign"></span>  Film existant'), ['action' => 'view-user', $films_exist[$index]], array('class' =>'btn btn-sm btn-danger', 'escape' => false )) ?>
                <?php else: ?>
                  <span class="glyphicon glyphicon-remove">Non</span>
                <?php endif; ?>

              </td>
              <td>
                <?php
                $film = str_replace('.', '-dot-', $film);
                $film = str_replace('/', '', $film);
                 ?>
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-ok"></span>'), ['action' => 'moderate', 'accept', $film], array('class' =>'btn btn-sm btn-success', 'escape' => false )) ?>
                &nbsp;
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'moderate', 'remove', $film], array('class' =>'btn btn-sm btn-danger', 'escape' => false )) ?>
              </td>
            </tr>

            <?php endforeach; ?>

        </tbody>
    </table>

</div>
