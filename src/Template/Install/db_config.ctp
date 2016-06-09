
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
<div class="alert col-xs-5 alert-warning pull-right">
  Il est nécessaire de créer la base de donnée manuellement ! Le script ne peut la créer automatiquement.
</div>