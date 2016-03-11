<?php include 'menu_admin.ctp'; ?>





<div class="series form form-group col-xs-10 well">
    <?= $this->Form->create($series) ?>
    <fieldset>
        <?php
            echo $this->Form->input('id_tmdb');
            echo $this->Form->input('titre');
            echo $this->Form->input('resume');
            echo $this->Form->input('note');
            echo $this->Form->input('annee');
            echo $this->Form->input('encours');
            echo $this->Form->input('file');
            echo $this->Form->input('season');
            echo $this->Form->input('episode');
            echo $this->Form->input('titre_episode');
            echo $this->Form->input('view');
            echo $this->Form->input('alert');
            echo $this->Form->input('def');
            echo $this->Form->input('audio');
            echo $this->Form->input('sub');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
