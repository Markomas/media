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

<div class="alert alert-info text-justify">
  Attention, l'instalation nécessite un serveur web complet : Apache ou Nginx ainsi que qu'un serveur Mysql.
   Il est nécessaire de correctement configurer l'ensemble.
   En cas de doute, consultez <a href="https://doc.ubuntu-fr.org/lamp" target="_blank">une documentation</a>.
</div>

</div>

<div class="well col-xs-6 col-xs-offset-1 text-center" >
  <h3>Mise à jour depuis v2.2 vers v2.3</h3>
  <h4>Migration et ajout des nouveaux schémas de donnée</h4>
  <?= $this->Html->link(__('Suivant'), ['controller' => 'Install', 'action' => 'migrate'], array('class' => 'btn btn-success'))?>
</div>


<div class="well col-xs-6 col-xs-offset-1 text-center" >
  <h3>1ère installation</h3>
  <h4>Configuration de la base de données :</h4>
  <?= $this->Html->link(__('Suivant'), ['controller' => 'Install', 'action' => 'dbConfig'], array('class' => 'btn btn-success'))?>
</div>

