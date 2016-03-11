<nav class="navbar navbar-default">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Liste des musiques'), ['action' => 'indexAdmin']) ?></li>
        <li><?= $this->Html->link(__('Upload / Ajout automatique'), ['action' => 'upload']) ?></li>
        <li><?= $this->Html->link(__('Erreur'), ['action' => 'error']) ?></li>

    </ul>

  </div>
</nav>
