<?php include 'menu.ctp'; ?>




<div class="config form form-group well" style="margin-left:20%">
    <?= $this->Form->create($config) ?>
    <fieldset>
        <?php
            echo $this->Form->input('nom');
            echo $this->Form->input('valeur');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
