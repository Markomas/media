
<?php include 'menu.ctp'; ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Lister Folders'), ['action' => 'index']) ?></li>
    </ul>
    </div>
</nav>



<div class="folders form form-group col-xs-10 well">
    <?= $this->Form->create($folder) ?>
    <fieldset>
        <?php
            echo $this->Form->input('path');
            echo $this->Form->input('filetype');
            echo $this->Form->input('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
