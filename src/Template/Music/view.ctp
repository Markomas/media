<?php include 'menu_admin.ctp'; ?>

<div class="well">
    <table class="table table-striped table-condensed table-responsive">
        <tr>
            <th><?= __('song') ?></th>
            <td><?= h($music->song) ?></td>
        </tr>
        <tr>
            <th><?= __('Album') ?></th>
            <td><?= h($music->album) ?></td>
        </tr>
        <tr>
            <th><?= __('Artist') ?></th>
            <td><?= h($music->artist) ?></td>
        </tr>
        <tr>
            <th><?= __('Time') ?></th>
            <td><?= h($music->time) ?></td>
        </tr>
        <tr>
            <th><?= __('Genre') ?></th>
            <td><?= h($music->genre) ?></td>
        </tr>
        <tr>
            <th><?= __('Cover') ?></th>
            <td><?= h($music->cover) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($music->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Num') ?></th>
            <td><?= $this->Number->format($music->num) ?></td>
        </tr>
        <tr>
            <th><?= __('Year') ?></th>
            <td><?= $this->Number->format($music->year) ?></td>
        </tr>
    </table>


          <h4><?= __('File') ?></h4>
          <?= $this->Text->autoParagraph(h($music->file)); ?>
          <br>


</div>
