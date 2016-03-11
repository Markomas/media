<?php include 'menu.ctp'; ?>

<nav class="navbar navbar-default" style="margin-left:20%; height:30px;">
  <div class="">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Nouvelle configuration'), ['action' => 'add']) ?></li>
    </ul>
  </div>
</nav>
<div class="well" style="margin-left:20%">
    <table class="table table-striped">
      <thead>
          <tr>
            <th>id</th>

            <th>Nom</th>
            <th>URL</th>
            <th class="actions">
              action
            </th>
        </tr>

      </thead>

        <tbody>
            <?php foreach ($configs as $config): ?>
              <tr>
                  <td><?=h($config->id) ?></td>
                  <td><?= h($config->nom) ?></td>
                  <td><?= h($config->valeur) ?></td>
                  <td class="actions">
                      <?= $this->Html->link(__('Editer'), ['action' => 'edit', $config->id], array('class' => 'btn btn-sm btn-warning')) ?>
                      <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $config->id],
                      array(
                                            'class'    => 'btn btn-sm btn-danger',
                                            'escape'   => false,
                                            'confirm'  => 'Êtes vous sûr ?'
                                          ) ); ?>
              </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
