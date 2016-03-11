<nav class="navbar navbar-default">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Liste des séries'), ['action' => 'indexAdmin']) ?></li>
        <li><?= $this->Html->link(__('Upload / Ajout automatique'), ['action' => 'upload']) ?></li>
        <li><?= $this->Html->link(__('Erreur'), ['action' => 'error']) ?></li>
    </ul>
    <div class="nav navbar-nav navbar-right" style="margin-top:0.7%;margin-right:0.7%">
<?php if (isset($user_path)): ?>
  <?= $this->Html->link(__('Modération des séries &nbsp;<span class="badge">'.$user_path.'</span>'), ['action' => 'moderate'], array('class' =>'btn btn-info', 'escape' => false )) ?>

<?php else: ?>
  <?= $this->Html->link(__('Modération des séries'), ['action' => 'moderate'], array('class' =>'btn btn-info', 'escape' => false )) ?>

<?php endif; ?>

    </div>
  </div>
</nav>
