<?php include 'menu_admin.ctp'; ?>



<div class="music form form-group col-xs-10 well">
    <?= $this->Form->create($music) ?>
    <fieldset>
        <?php
            echo $this->Form->input('song');
            echo $this->Form->input('album');
            echo $this->Form->input('artist');
            echo $this->Form->input('num');
            echo $this->Form->input('time');
            echo $this->Form->input('year');
            echo $this->Form->input('file');
            echo $this->Form->input('genre');
            echo $this->Form->input('cover');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
