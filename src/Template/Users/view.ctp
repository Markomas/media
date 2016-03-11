<!-- File: src/Template/Articles/view.ctp -->

<?php include 'menu.ctp'; ?>

<div class="col-xs-4 col-xs-offset-4 well">

<div class="panel panel-default">
  <div class="panel-heading">
    <?= h($user->username) ?>
    <?= $this->Html->link('Editer', ['action' => 'edit', $id = $user->id], ['class' => 'btn btn-default btn-xs btn-danger pull-right']) ?>

  </div>
  <div class="panel-body">
    <p> Id : <?= h($user->id) ?></p>
    <p> Rôle : <?= h($user->role) ?></p>
  </div>

</div>



</div>
