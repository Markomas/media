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
  </ul>
  <br>
</div>

<div class="well" style="margin-left: 20%">
    <table class="table table-striped table-condensed table-responsive">
        <tr>
            <th><?= __('Words') ?></th>
            <td><p>
              <?php echo str_replace(',', ', ', $rmword->words); ?>
            </p></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($rmword->id) ?></td>
        </tr>
        <tr>
            <th><?= __('End') ?></th>
            <td><?= $rmword->end ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
