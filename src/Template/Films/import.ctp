<?php include 'menu_admin.ctp'; ?>
<nav class="navbar navbar-default">
  <div class="container-fluid" style="margin-top:1%;">

<?= $this->Html->link(__('Retour'), ['action' => 'upload'], array('class' => 'btn btn-sm btn-default', 'escape' => false )) ?>
  <div class="pull-right">
    En cas de problème il suffit de relancer l'indexation
            <span class="glyphicon glyphicon-arrow-right"></span>
<?= $this->Html->link(__('Importer'), ['action' => 'import'], array('class' => 'btn btn-sm btn-danger', 'escape' => false )) ?>
  </div>
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
                <?php echo $films_ok[$index];

                      if ($films_ok[$index] == "Erreur") {
                        // on encode à notre sauce pour passer les variables !
                        $film = str_replace('.', '-dot-', $film);
                        $film = str_replace('/', '-slash-', $film);

                        //str_replace('.', '-dot-' $film )
                        echo '&nbsp;<span class="glyphicon glyphicon-arrow-right"></span>&nbsp;';
                        echo $this->Html->link(__('Renommer le fichier'), ['action' => 'renameFile', $file = $film], array('class' => 'btn btn-sm btn-success', 'escape' => false ));
                          echo '&nbsp;&nbsp; ou &nbsp;&nbsp;';
                          echo $this->Html->link(__('Ajout manuel'), ['action' => 'manualAdd',$file = $film, $search = $films_name[$index]], array('class' => 'btn btn-sm btn-success', 'escape' => false ));
                      }
                 ?>

              </td>

            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
