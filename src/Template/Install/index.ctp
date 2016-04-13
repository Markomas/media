<div class="well">

    <h1 class="text-center text-info">    Bienvenue dans l'installation de Media !</h1>
</div>

<div class="well col-xs-5">
<h3>Prérequis :</h3>
<br>

<?php if (phpversion() >= 5.5): ?>
  <div class="alert alert-success">
    <li>PHP 5.5 minimum : <?php echo ' '.phpversion().' ' ?> présent</li>
  </div>
  <?php else: ?>
    <div class="alert alert-danger">
      <li>PHP 5.5 minimum !</li>
    </div>
<?php endif; ?>

<?php if (phpversion('intl')): ?>
  <div class="alert alert-success">
    <li>PHP5_intl requis :<?php echo ' version '.phpversion('intl').' ' ?> présente</li>
  </div>
  <?php else: ?>
    <div class="alert alert-danger">
      <li>PHP_intl requis !</li>
    </div>
<?php endif; ?>

<?php if (in_array ("mod_rewrite", apache_get_modules())): ?>
  <div class="alert alert-success">
    <li>Mod_rewrite requis : Activé !</li>
  </div>
  <?php else: ?>
    <div class="alert alert-danger">
      <li>Mod_rewrite requis</li>
    </div>
<?php endif; ?>

</div>

<div class="well col-xs-6 col-xs-offset-1 text-center" >
  <h3>1ère installation</h3>
  <h4>Configuration de la base de données :</h4>
  <?= $this->Html->link(__('Suivant'), ['controller' => 'Install', 'action' => 'dbConfig'], array('class' => 'btn btn-success'))?>
</div>

<div class="well col-xs-6 col-xs-offset-1 text-center" >
  <h3>Mise à jour depuis v2.0 vers v2.1</h3>
  <h4>Migration et ajout des nouveaux schémas de donnée</h4>
  <?= $this->Html->link(__('Suivant'), ['controller' => 'Install', 'action' => 'migrate'], array('class' => 'btn btn-success'))?>
</div>
