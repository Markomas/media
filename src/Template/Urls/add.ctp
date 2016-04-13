<?php include 'menu.ctp'; ?>



<div class="urls form form-group col-xs-10 well col-xs-offset-2" style="margin-left: 20%">
">
    <?= $this->Form->create($url) ?>
    <fieldset>
        <?php
            echo $this->Form->input('nom');
            echo $this->Form->input('valeur');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
