
<div class="well col-xs-6 ">
<div class="form">
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Configurez la base de données Mysql') ?></legend>
        <?= $this->Form->input('host') ?>
        <?= $this->Form->input('login') ?>
        <?= $this->Form->input('password') ?>
        <br>
        <?= $this->Form->input('database') ?>

    </fieldset>
<?= $this->Form->button(__('Valider')); ?>
<?= $this->Form->end() ?>
</div>
</div>
