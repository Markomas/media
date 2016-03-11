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
<nav class="navbar navbar-default" style="margin-left: 20%; height: 30px;">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Nouveau Dossier'), ['action' => 'add']) ?></li>
    </ul>

</nav>
<div class="well" style="margin-left: 20%">
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('path') ?></th>
                <th><?= $this->Paginator->sort('filetype') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($folders as $folder): ?>
            <tr>
                <td><?= $this->Number->format($folder->id) ?></td>
                <td><?= h($folder->path) ?></td>
                <td><?= h($folder->filetype) ?></td>
                <td><?= h($folder->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $folder->id], array('class' => 'btn btn-sm btn-success')) ?>
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $folder->id], array('class' => 'btn btn-sm btn-warning')) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $folder->id],
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
