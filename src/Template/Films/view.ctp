<nav class="navbar navbar-default">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Editer Film'), ['action' => 'edit', $film->id_film]) ?> </li>
        <li><?= $this->Form->postLink(__('Supprimer Film'), ['action' => 'delete', $film->id_film], ['confirm' => __('Êtes vous sûr de vouloir supprimer # {0}?', $film->id_film)]) ?> </li>
        <li><?= $this->Html->link(__('Lister Films'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nouveau Film'), ['action' => 'add']) ?> </li>
    </ul>
  </div>
</nav>
<div class="well">
    <table class="table table-striped table-condensed table-responsive">
        <tr>
            <th><?= __('Titre Film') ?></th>
            <td><?= h($film->titre_film) ?></td>
        </tr>
        <tr>
            <th><?= __('Annee Film') ?></th>
            <td><?= h($film->annee_film) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Film') ?></th>
            <td><?= h($film->time_film) ?></td>
        </tr>
        <tr>
            <th><?= __('Trailer Film') ?></th>
            <td><?= h($film->trailer_film) ?></td>
        </tr>
        <tr>
            <th><?= __('Def Film') ?></th>
            <td><?= h($film->def_film) ?></td>
        </tr>
        <tr>
            <th><?= __('Audio') ?></th>
            <td><?= h($film->audio) ?></td>
        </tr>
        <tr>
            <th><?= __('Sub') ?></th>
            <td><?= h($film->sub) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Film') ?></th>
            <td><?= $this->Number->format($film->id_film) ?></td>
        </tr>
        <tr>
            <th><?= __('Note Film') ?></th>
            <td><?= $this->Number->format($film->note_film) ?></td>
        </tr>
        <tr>
            <th><?= __('View') ?></th>
            <td><?= $this->Number->format($film->view) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Ajout') ?></th>
            <td><?= h($film->date_ajout) ?></td>
        </tr>
        <tr>
            <th><?= __('Alert') ?></th>
            <td><?= $film->alert ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>


          <h4><?= __('Real Film') ?></h4>
          <?= $this->Text->autoParagraph(h($film->real_film)); ?>
          <br>




          <h4><?= __('Genre Film') ?></h4>
          <?= $this->Text->autoParagraph(h($film->genre_film)); ?>
          <br>




          <h4><?= __('Resume Film') ?></h4>
          <?= $this->Text->autoParagraph(h($film->resume_film)); ?>
          <br>




          <h4><?= __('Acteur Film') ?></h4>
          <?= $this->Text->autoParagraph(h($film->acteur_film)); ?>
          <br>




          <h4><?= __('Tagline Film') ?></h4>
          <?= $this->Text->autoParagraph(h($film->tagline_film)); ?>
          <br>




          <h4><?= __('File Film') ?></h4>
          <?= $this->Text->autoParagraph(h($film->file_film)); ?>
          <br>


</div>
