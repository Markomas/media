<nav class="navbar navbar-default">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><?= $this->Form->postLink(
                __('Supprimer'),
                ['action' => 'delete', $film->id_film],
                ['confirm' => __('Are you sure you want to delete # {0}?', $film->id_film)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lister Films'), ['action' => 'index']) ?></li>
    </ul>
    </div>
</nav>



<div class="films form form-group col-xs-12 well">
  <div class="col-sm-3">
    <br>
      <?= $this->Html->image('poster/'.$film->tmdb.'.jpg'); ?>
  </div>

<div class="form-horizontal">


    <?= $this->Form->create($film) ?>
    <fieldset>
        <?php
            echo $this->Form->input('titre_film', ['label' => 'Titre']);
            echo $this->Form->input('annee_film', ['label' => 'Année']);
            echo $this->Form->input('time_film', ['label' => 'Durée']);
            echo $this->Form->input('tagline_film', ['label' => 'Tagline']);
            echo $this->Form->input('trailer_film', ['label' => 'Id Youtube']);
            ?>
            <a class="btn btn-danger" target="_blank" href="https://www.youtube.com/results?q=<?php echo $film->titre_film.' '.substr($film->annee_film,0,4); ?>">Recherche Youtube</a>
            <p>
              <i>  Merci de copier seulement l'id de la video Youtube afin d'avoir un trailer lisible.</i>
                    </p>
                    <?php
            echo $this->Form->input('note_film', ['label' => 'Note']);
            echo $this->Form->input('resume_film', ['label' => 'Résumé']);

            echo $this->Form->input('acteur_film', ['label' => 'Acteurs']);
            echo $this->Form->input('real_film', ['label' => 'Réalisateur']);
            echo $this->Form->input('genre_film', ['label' => 'Genre']);


            echo $this->Form->input('alert');
            echo $this->Form->input('def_film', ['label' => 'Définition Vidéo']);
            echo $this->Form->input('audio',['label' => 'Bande son']);
            echo $this->Form->input('sub', ['label' => 'Sous-titres']);

            echo $this->Form->input('file_film', ['label' => 'Fichier', 'disabled' => 'true']);
            echo $this->Form->input('date_ajout', ['label' => 'Date d\'ajout', 'disabled' => 'true']);
            echo $this->Form->input('view', ['label' => 'Nombre de vues', 'disabled' => 'true']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enregistrer')) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
