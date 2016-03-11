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
            <?php foreach ($films_path as $index => $film): ?>
            <tr>
              <td>
                <?= $film ?>

              </td>
              <td>
                <?= $films_name[$index] ?>
              </td>
              <td>
                <?= $films_year[$index] ?>
              </td>
              <td>
                <?= $films_ext[$index] ?>
              </td>
              <td>
                <?= $films_move[$index] ?>
              </td>
              <td>
                <?= $films_ok[$index] ?>
              </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
