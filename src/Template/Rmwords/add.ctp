<nav class="navbar navbar-default">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Lister Rmwords'), ['action' => 'index']) ?></li>
    </ul>
    </div>
</nav>



<div class="rmwords form form-group col-xs-10 well">
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
