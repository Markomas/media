

<?php
$authUser = $this->request->Session()->read('Auth.User');
if ($authUser['role']=='admin'){
  echo '

  <div class="well">
  <div class="input-group col-xs-12">
      <h3 class="col-sm-3">Configuration : </h3>
  </div>
  </div>

  <div class="col-xs-2 well">
    <ul class="nav nav-pills nav-stacked">
      <li>'. $this->Html->link(__('Utilisateurs'), ['controller' => 'Users','action' => 'index']).'</li>
    <li>'.  $this->Html->link(__('Dossiers'), ['controller' => 'Folders','action' => 'index']).'</li>
      <li>'. $this->Html->link(__('Traitement'), ['controller' => 'Rmwords','action' => 'index']).'</li>
      <li>'. $this->Html->link(__('URL'), ['controller' => 'Urls','action' => 'index']).'</li>
      <li>'. $this->Html->link(__('Paramètres'), ['controller' => 'Config','action' => 'index']).'</li>

    </ul>
    <br>
  </div>';
}?>
