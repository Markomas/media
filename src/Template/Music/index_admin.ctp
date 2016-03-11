<?php include 'menu_admin.ctp'; ?>
<div class="well">
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('song') ?></th>
                <th><?= $this->Paginator->sort('album') ?></th>
                <th><?= $this->Paginator->sort('artist') ?></th>
                <th><?= $this->Paginator->sort('num') ?></th>
                <th><?= $this->Paginator->sort('time') ?></th>
                <th><?= $this->Paginator->sort('year') ?></th>
                <th class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($music as $music): ?>
            <tr>
                <td><?= h($music->id) ?></td>
                <td><?= h($music->song) ?></td>
                <td><?= h($music->album) ?></td>
                <td><?= h($music->artist) ?></td>
                <td><?= h($music->num) ?></td>
                <td><?= h($music->time) ?></td>
                <td><?= h($music->year) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $music->id], array('class' => 'btn btn-sm btn-success')) ?>
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $music->id], array('class' => 'btn btn-sm btn-warning')) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $music->id],
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
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('<i class="glyphicon glyphicon-chevron-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="glyphicon glyphicon-chevron-right"></i>', ['escape' => false]) ?>
        </ul>
        <p><?= $this->Paginator->counter('Page {{page}} sur {{pages}}') ?></p>
    </div>
</div>
