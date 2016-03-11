<nav class="navbar navbar-default">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Lister Films'), ['action' => 'index']) ?></li>
    </ul>
    </div>
</nav>



<div class="films form form-group col-xs-10 well">
    <?= $this->Form->create($film) ?>
    <fieldset>
        <?php
            echo $this->Form->input('titre_film');
            echo $this->Form->input('annee_film');
            echo $this->Form->input('real_film');
            echo $this->Form->input('genre_film');
            echo $this->Form->input('time_film');
            echo $this->Form->input('resume_film');
            echo $this->Form->input('trailer_film');
            echo $this->Form->input('acteur_film');
            echo $this->Form->input('note_film');
            echo $this->Form->input('tagline_film');
            echo $this->Form->input('file_film');
            echo $this->Form->input('date_ajout');
            echo $this->Form->input('view');
            echo $this->Form->input('alert');
            echo $this->Form->input('def_film');
            echo $this->Form->input('audio');
            echo $this->Form->input('sub');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
</div>
