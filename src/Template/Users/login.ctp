<!-- src/Template/Users/login.ctp -->

<div class="users form col-xs-4 col-xs-offset-4 ">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __("Merci de rentrer vos identifiants") ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
    <div class="text-center">
      <?= $this->Form->button(__('Se Connecter')); ?>

    </div>
<?= $this->Form->end() ?>
</div>
