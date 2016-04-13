<?php include 'menu.ctp'; ?>

<div class="well  col-xs-offset-2" style="margin-left: 20%">
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('nom') ?></th>
                <th><?= $this->Paginator->sort('valeur') ?></th>
                <th class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($urls as $url): ?>
            <tr>
                <td><?= h($url->nom) ?></td>
                <td><?= h($url->valeur) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $url->id], array('class' => 'btn btn-sm btn-warning')) ?>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
