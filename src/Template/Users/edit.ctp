<!-- File: src/Template/Articles/edit.ctp -->
<?php include 'menu.ctp'; ?>
<div class="col-xs-4 col-xs-offset-4 well">
<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Modifier un utilisateur') ?></legend>
        <?= $this->Form->input('username', ['disabled' => 'disabled']) ?>
        <?= $this->Form->input('password'); ?>
        <?php
        if ($authUser['role']=='admin'){?>
          <?=
          $this->Form->input('role', [
              'options' => ['admin' => 'Admin', 'author' => 'Author']
          ]);?><?php
        }else {?><?=
          $this->Form->input('role',  ['disabled' => 'disabled']);
        ?><?php }
         ?>
    </fieldset>
<?= $this->Form->button(__('Modifier')); ?>
<?= $this->Form->end() ?>
</div>
</div>
