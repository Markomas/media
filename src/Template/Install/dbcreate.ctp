
<div class="well col-xs-6 ">
<div class="form">
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Configurez le compte administrateur') ?></legend>
        <?= $this->Form->input('login') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
<?= $this->Form->button(__('Valider')); ?>
<?= $this->Form->end() ?>
</div>
</div>
