<?php include 'menu.ctp'; ?>

<nav class="navbar navbar-default  col-xs-offset-2" style="margin-left: 20%">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Editer Url'), ['action' => 'edit', $url->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Supprimer Url'), ['action' => 'delete', $url->id], ['confirm' => __('Êtes vous sûr de vouloir supprimer # {0}?', $url->id)]) ?> </li>
        <li><?= $this->Html->link(__('Lister Urls'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nouveau Url'), ['action' => 'add']) ?> </li>
    </ul>
  </div>
</nav>
<div class="well col-xs-4 col-xs-offset-4">
    <table class="table table-striped table-condensed table-responsive">
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($url->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Valeur') ?></th>
            <td><?= h($url->valeur) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($url->id) ?></td>
        </tr>
    </table>
</div>
