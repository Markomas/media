<?php include 'menu.ctp'; ?>


<div class="well" style="margin-left: 20%">
    <table class="table table-striped table-condensed table-responsive">
        <tr>
            <th><?= __('Words') ?></th>
            <td><p>
              <?php echo str_replace(',', ', ', $rmword->words); ?>
            </p></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($rmword->id) ?></td>
        </tr>
        <tr>
            <th><?= __('End') ?></th>
            <td><?= $rmword->end ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
