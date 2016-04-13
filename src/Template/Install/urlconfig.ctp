
<div class="well col-xs-6 ">
<div class="form">
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Configurez les urls') ?></legend>
        <h5><i>Les champs peuvent être laissés vides pour les urls non utilisées</i></h5>
        <hr>
        <?= $this->Form->input('Base', ['value' => 'http://127.0.0.1/media']) ?>
        <hr>
        <?= $this->Form->input('Films',  ['value' => 'http://127.0.0.1/access/films']) ?>
        <?= $this->Form->input('Films_user',  ['value' => 'http://127.0.0.1/access/films_mod']) ?>
        <hr>
        <?= $this->Form->input('Series',  ['value' => 'http://127.0.0.1/access/series']) ?>
        <?= $this->Form->input('Series_user',  ['value' => 'http://127.0.0.1/access/series_mod']) ?>

        <hr>
        <?= $this->Form->input('Musique',  ['value' => 'http://127.0.0.1/access/musique']) ?>

        <hr>
        <?= $this->Form->input('Jeux',  ['value' => 'http://127.0.0.1/access/jeux']) ?>
        <hr>
        <?= $this->Form->input('Logiciels',  ['value' => 'http://127.0.0.1/access/logiciels']) ?>
    </fieldset>
<?= $this->Form->button(__('Valider')); ?>
<?= $this->Form->end() ?>
</div>
</div>
<div class="well col-xs-5 col-xs-offset-1 ">
  <legend>Pour chaque url, pensez bien à créer les alias correspondants aux dossiers précedements configurés et à donner à apache/nginx un accès en lecture/écriture: </legend>

  <br>
<h4>Pour Apache :</h4>
<pre>
  Alias /access/films /var/www/films/
    &lt;Directory "/var/www/films"&gt;
        Options -Indexes
        Require all granted
        Satisfy Any
        Header set Content-Disposition "attachment"
    &lt;/Directory&gt;
</pre>
<hr>
<h4>Pour Nginx :</h4>
<pre>
  location /access/films {
      alias /var/www/films;
      allow all;
      satisfy any;
      add_header Content-Disposition "attachment";
  }
</pre>



</div>
<div class="well col-xs-5 col-xs-offset-1 ">
<legend>Les urls Films_user et Series_user servent à verifier le fichier lors de la modération</legend>
</div>
