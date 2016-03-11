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
            <?php foreach ($series_path as $index => $serie): ?>
            <tr>

              <td>
                <?= $series_name[$index] ?>
              </td>
              <td>
                <?= $series_season[$index].$series_episode[$index] ?>
              </td>
              <td>
                <?= $series_ext[$index] ?>
              </td>
              <td>
                <?= $series_move[$index] ?>
              </td>
              <td>
                <?= $series_ok[$index] ?>
              </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
