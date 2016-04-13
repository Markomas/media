
<div class="well col-xs-6 ">
<div class="form">
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Configurez les dossiers où sont situés vos fichiers') ?></legend>
        <h5><i>Les champs peuvent être laissés vides pour les dossiers non utilisés</i></h5>
        <hr>
        <?= $this->Form->input('Films') ?>
        <?= $this->Form->input('Films_upload') ?>
        <?= $this->Form->input('Films_user') ?>
        <hr>
        <?= $this->Form->input('Series') ?>
        <?= $this->Form->input('Series_upload') ?>
        <?= $this->Form->input('Series_user') ?>
        <hr>
        <?= $this->Form->input('Musique') ?>
        <?= $this->Form->input('Musique_upload') ?>
        <hr>
        <?= $this->Form->input('Jeux') ?>
        <hr>
        <?= $this->Form->input('Logiciels') ?>
    </fieldset>
<?= $this->Form->button(__('Valider')); ?>
<?= $this->Form->end() ?>
</div>
</div>
