<?php include 'menu.ctp'; ?>



<div class="rmwords form form-group well" style="margin-left: 20%">
    <?= $this->Form->create($rmword) ?>
    <fieldset>
        <?php
            echo $this->Form->input('words');
            echo $this->Form->input('end');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
