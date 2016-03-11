<div class="well">
<div class="input-group col-xs-12">
    <h3 class="col-sm-3">Configuration : </h3>
</div>
</div>

<div class="col-xs-2 well">
  <ul class="nav nav-pills nav-stacked">
    <li><?= $this->Html->link(__('Utilisateurs'), ['controller' => 'Users','action' => 'index'])?></li>
    <li><?= $this->Html->link(__('Dossiers'), ['controller' => 'Folders','action' => 'index'])?></li>
    <li><?= $this->Html->link(__('Traitement'), ['controller' => 'Rmwords','action' => 'index'])?></li>
    <li><?= $this->Html->link(__('URL'), ['controller' => 'Config','action' => 'index'])?></li>

  </ul>
  <br>
</div>


<div class="well col-xs-offset-2" style="margin-left: 20%">
  <h4>Mots clés </h4>
<p>
  Mots supprimés lors du traitement des noms de fichiers
</p>
</div>
<div class="well col-xs-offset-2" style="margin-left: 20%">

    <table class="table table-striped">

        <tbody>
            <?php foreach ($rmwords as $rmword): ?>
            <tr>
              <td>
                <?php
                if ($rmword->end == true) {
                    echo 'Fin';
                }else {
                  echo 'Début';
                }

                 ?>
              </td>
                <td class="col-xs-8">
                  <p>
                    <?php echo str_replace(',', ', ', $rmword->words); ?>
                  </p>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $rmword->id], array('class' => 'btn btn-sm btn-success')) ?>
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $rmword->id], array('class' => 'btn btn-sm btn-warning')) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $rmword->id],
                    array(
                                          'class'    => 'btn btn-sm btn-danger',
                                          'escape'   => false,
                                          'confirm'  => 'Êtes vous sûr ?'
                                        ) ); ?>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
