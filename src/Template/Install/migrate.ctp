
<div class="well col-xs-6 ">
<div class="form">
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Configurez les paramètres suivants') ?></legend>
        <hr>
        <?= $this->Form->input('Access',  ['options' => ['public' => 'Public', 'private' => 'Privé'], 'label' => 'Accès']) ?>
        <hr>
        <?= $this->Form->input('Menu',  ['value' => 'Films,Séries,Musique,Jeux,Logiciels', 'label' => 'Module activés / Ordre du menu']) ?>
        <hr>
        <?= $this->Form->input('Upload',  ['options' => ['true' => 'Activé', 'false' => 'Désactivé'], 'label' => 'Upload utilisateur']) ?>
        <hr>
        <?= $this->Form->input('Symlink',  ['options' => ['false' => 'Déplacer / Renommer', 'true' => 'Symlink'], 'label' => 'Méthode de traitement des fichiers']) ?>
        <hr>
    </fieldset>
<?= $this->Form->button(__('Valider')); ?>
<?= $this->Form->end() ?>
</div>
</div>
<div class="well col-xs-5 col-xs-offset-1 text-justify ">
  L'accès public permet la lecture / téléchargement des fichiers sans s'indentifier sur le site, le mode privé nécessite un compte (admin ou juste viewer) afin d'accéder aux fichiers.
</div>
<div class="well col-xs-5 col-xs-offset-1 text-justify ">
  Il est possible de supprimer les sections inutilisées du menu. Il est aussi possible de modifier l'ordre du menu horizontal.
</div>
<div class="well col-xs-5 col-xs-offset-1 text-justify ">
  L'upload utilisateur permet aux utilisateurs du site (avec ou sans authentification > public/privé) de proposé du contenu. Les fichiers proposés passent par une phase de modération dans la partie administrateur.
</div>
<div class="well col-xs-5 col-xs-offset-1 text-justify ">
  Par défaut, le script renomme et déplace automatiquement les fichiers depuis le dossier Films_Upload vers Films.
  <br>
  Si vous ne souhaitez pas modifier la structure de votre bibliothèque, vous pouvez opter pour l'option symlink.
</div>
