
<?php include 'menu.ctp'; ?>

<nav class="navbar navbar-default" style="margin-left: 20%; height: 30px;">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Nouveau Dossier'), ['action' => 'add']) ?></li>
    </ul>

</nav>
<div class="well" style="margin-left: 20%">
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('path') ?></th>
                <th><?= $this->Paginator->sort('filetype') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($folders as $folder): ?>
            <tr>
                <td><?= h($folder->path) ?></td>
                <td><?= h($folder->filetype) ?></td>
                <td><?= h($folder->type) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $folder->id], array('class' => 'btn btn-sm btn-success')) ?>
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $folder->id], array('class' => 'btn btn-sm btn-warning')) ?>

            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
