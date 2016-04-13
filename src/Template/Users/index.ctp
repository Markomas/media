<?php include 'menu.ctp'; ?>

<nav class="navbar navbar-default" style="margin-left: 20%; height: 30px;">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Ajouter un utilisateur'), ['action' => 'add']) ?></li>
    </ul>

</nav>
<div class="well" style="margin-left: 20%">
    <table class="table table-striped">
        <thead>
            <tr>
              <th>user</th>
              <th>role</th>
              <th class="actions">
                action
              </th>
          </tr>

        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->role) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Editer'), ['action' => 'edit', $user->id], array('class' => 'btn btn-sm btn-warning')) ?>
                    <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $user->id],
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
