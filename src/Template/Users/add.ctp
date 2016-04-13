<!-- src/Template/Users/add.ctp -->
<?php include 'menu.ctp'; ?>
<div class="col-xs-4 col-xs-offset-4 ">
<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Ajouter un utilisateur') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->input('role', [
            'options' => ['admin' => 'Admin', 'viewer' => 'Invité']
        ]) ?>
    </fieldset>
<?= $this->Form->button(__('Ajouter')); ?>
<?= $this->Form->end() ?>
</div>
</div>
