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
