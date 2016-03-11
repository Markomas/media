<?php include 'menu_admin.ctp'; ?>
<div class="well">
  <br>
  <br>
  <h4>Ancien nom :</h4>
  <?= $file ?>
  <br>
  <br>
  <h4>Nouveau nom :</h4>
  <?php     echo $this->Form->create('Properties', array('type' => 'get')); ?>

  <div class="input-group" style="margin-top: 0.7%; margin-right: 0.7%;">
             <input name="rename" class="form-control" id="rename" value="<?= $file ?>">
              <span class="input-group-btn">
              <button type="submit" class="btn btn-success">
        <span class="glyphicon glyphicon-ok"></span>&nbsp;
        </button>

         </span>
         </div>
         <?php  echo $this->Form->end; ?>
<br><br>
</div>
