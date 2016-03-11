<?php include 'menu_admin.ctp'; ?>


<div class="well">
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('id_tmdb') ?></th>
                <th><?= $this->Paginator->sort('titre') ?></th>
                <th><?= $this->Paginator->sort('season') ?></th>
                <th><?= $this->Paginator->sort('episode') ?></th>
                <th><?= $this->Paginator->sort('titre_episode') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>


                <th class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($series as $series): ?>
            <tr>
                <td><?= $this->Number->format($series->id) ?></td>
                <td><?= $this->Number->format($series->id_tmdb) ?></td>
                <td><?= h($series->titre) ?></td>
                <td><?= $this->Number->format($series->season) ?></td>
                <td><?= $this->Number->format($series->episode) ?></td>
                <td><?= $series->titre_episode ?></td>
                <td><?= $series->created ?></td>


                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $series->id], array('class' => 'btn btn-sm btn-success')) ?>
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $series->id], array('class' => 'btn btn-sm btn-warning')) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $series->id],
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
