<?php include 'menu_admin.ctp'; ?>
<div class="well">
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id_film') ?></th>
                <th><?= $this->Paginator->sort('titre_film') ?></th>
                <th><?= $this->Paginator->sort('annee_film') ?></th>
                <th><?= $this->Paginator->sort('time_film') ?></th>
                <th><?= $this->Paginator->sort('note_film') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($films as $film): ?>
            <tr>
                <td><?= $this->Number->format($film->id_film) ?></td>
                <td><?= h($film->titre_film) ?></td>
                <td><?= h($film->annee_film) ?></td>
                <td><?= h($film->time_film) ?></td>
                <td><?= $this->Number->format($film->note_film) ?></td>
                <td><?= h($film->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Voir'), ['action' => 'view', $film->id_film], array('class' => 'btn btn-sm btn-success')) ?>
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $film->id_film], array('class' => 'btn btn-sm btn-warning')) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $film->id_film],
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
