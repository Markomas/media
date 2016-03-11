<?php include 'menu.ctp'; ?>
<div class="well" style="margin-left:20%">
    <table class="table table-striped table-condensed table-responsive">
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($config->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Valeur') ?></th>
            <td><?= h($config->valeur) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($config->id) ?></td>
        </tr>
    </table>
</div>
