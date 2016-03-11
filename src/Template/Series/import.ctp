<?php include 'menu_admin.ctp'; ?>

<div class="well">
    <table class="table table-striped">

        <tbody>
            <?php foreach ($series_path as $index => $serie): ?>
            <tr>

              <td>
                <?= $series_name[$index] ?>
              </td>
              <td>
                <?= 'S'.$series_season[$index].'E'.$series_episode[$index] ?>
              </td>
              <td>
                <?= $serie ?>
              </td>
              <td>
                <?php echo $series_ok[$index];

                      if ($series_ok[$index] == "Erreur") {
                        // on encode à notre sauce pour passer les variables !
                        $serie = str_replace('.', '-dot-', $serie);
                        $serie = str_replace('/', '-slash-', $serie);

                        //str_replace('.', '-dot-' $film )
                        echo '&nbsp;<span class="glyphicon glyphicon-arrow-right"></span>&nbsp;';
                        echo $this->Html->link(__('Renommer le fichier'), ['action' => 'renameFile', $file = $serie], array('class' => 'btn btn-sm btn-success', 'escape' => false ));
                          echo '&nbsp;&nbsp; ou &nbsp;&nbsp;';
                          echo $this->Html->link(__('Ajout manuel'), ['action' => 'manualAdd',$file = $serie, $search = $series_name[$index]], array('class' => 'btn btn-sm btn-warning', 'escape' => false ));
                      }
                 ?>
              </td>

            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
