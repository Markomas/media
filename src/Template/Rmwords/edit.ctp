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


<div class="rmwords form form-group well" style="margin-left: 20%">
    <?= $this->Form->create($rmword) ?>
    <fieldset>
        <?php
            echo $this->Form->input('words');
            echo $this->Form->input('end');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
