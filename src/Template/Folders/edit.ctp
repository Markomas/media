
<?php include 'menu.ctp'; ?>



<div class="folders form form-group well" style="margin-left: 20%">
    <?= $this->Form->create($folder) ?>
    <fieldset>
        <?php
            echo $this->Form->input('path');
            echo $this->Form->input('filetype');
            echo $this->Form->input('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
