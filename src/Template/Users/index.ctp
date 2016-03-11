<div class="well">
<div class="input-group col-xs-12">
    <h3 class="col-sm-3">Configuration : </h3>
</div>
</div>

<div class="col-xs-2 well">
  <ul class="nav nav-pills nav-stacked">
    <li><?= $this->Html->link(__('Utilisateurs'), ['controller' => 'Users','action' => 'index'])?></li>
    <li><?= $this->Html->link(__('Dossiers'), ['controller' => 'Folders','action' => 'index'])?></li>
    <li><?= $this->Html->link(__('Traitement'), ['controller' => 'Rmwords','action' => 'index'])?></li>
    <li><?= $this->Html->link(__('URL'), ['controller' => 'Config','action' => 'index'])?></li>

  </ul>
  <br>
</div>
<nav class="navbar navbar-default" style="margin-left: 20%; height: 30px;">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Ajouter un utilisateur'), ['action' => 'add']) ?></li>
    </ul>

</nav>
<div class="well" style="margin-left: 20%">
    <table class="table table-striped">
        <thead>
            <tr>
              <th>Id</th>
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
                <td><?=h($user->id) ?></td>
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
