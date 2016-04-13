<?php include 'menu.ctp'; ?>

<div class="well" style="margin-left:20%">
    <table class="table table-striped table-condensed table-responsive">
        <tr>
            <th><?= __('Path') ?></th>
            <td><?= h($folder->path) ?></td>
        </tr>
        <tr>
            <th><?= __('Filetype') ?></th>
            <td><?= h($folder->filetype) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($folder->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($folder->id) ?></td>
        </tr>
    </table>
</div>
