<?php include 'menu_admin.ctp'; ?>

<nav class="navbar navbar-default">
  <div class="container-fluid" style="margin-top:1%;">
    2ème étape
            <span class="glyphicon glyphicon-arrow-right"></span>
<?= $this->Html->link(__('Importer'), ['action' => 'import'], array('class' => 'btn btn-sm btn-danger', 'escape' => false )) ?>
  </div>
</nav>
<div class="well">
    <table class="table table-striped">

        <tbody>
            <?php foreach ($musics_path as $index => $music): ?>
            <tr>

              <td>
                <?= $musics_num[$index] ?> - <?= $musics_song[$index] ?>
              </td>
              <td>
                <?= $musics_album[$index] ?>
              </td>
              <td>
                <?= $musics_artist[$index] ?>
              </td>
              <td>
                <?= $musics_move[$index] ?>
              </td>
              <td>
                <?= $musics_ok[$index] ?>
              </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
