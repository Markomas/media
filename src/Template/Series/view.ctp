<nav class="navbar navbar-default">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><?= $this->Html->link(__('Editer Series'), ['action' => 'edit', $series->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Supprimer Series'), ['action' => 'delete', $series->id], ['confirm' => __('Êtes vous sûr de vouloir supprimer # {0}?', $series->id)]) ?> </li>
        <li><?= $this->Html->link(__('Lister Series'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nouveau Series'), ['action' => 'add']) ?> </li>
    </ul>
  </div>
</nav>
<div class="well">
    <table class="table table-striped table-condensed table-responsive">
        <tr>
            <th><?= __('Titre') ?></th>
            <td><?= h($series->titre) ?></td>
        </tr>
        <tr>
            <th><?= __('Annee') ?></th>
            <td><?= h($series->annee) ?></td>
        </tr>
        <tr>
            <th><?= __('Encours') ?></th>
            <td><?= h($series->encours) ?></td>
        </tr>
        <tr>
            <th><?= __('Titre Episode') ?></th>
            <td><?= h($series->titre_episode) ?></td>
        </tr>
        <tr>
            <th><?= __('Def') ?></th>
            <td><?= h($series->def) ?></td>
        </tr>
        <tr>
            <th><?= __('Audio') ?></th>
            <td><?= h($series->audio) ?></td>
        </tr>
        <tr>
            <th><?= __('Sub') ?></th>
            <td><?= h($series->sub) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($series->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Id Tmdb') ?></th>
            <td><?= $this->Number->format($series->id_tmdb) ?></td>
        </tr>
        <tr>
            <th><?= __('Note') ?></th>
            <td><?= $this->Number->format($series->note) ?></td>
        </tr>
        <tr>
            <th><?= __('Season') ?></th>
            <td><?= $this->Number->format($series->season) ?></td>
        </tr>
        <tr>
            <th><?= __('Episode') ?></th>
            <td><?= $this->Number->format($series->episode) ?></td>
        </tr>
        <tr>
            <th><?= __('View') ?></th>
            <td><?= $this->Number->format($series->view) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($series->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($series->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Alert') ?></th>
            <td><?= $series->alert ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>


          <h4><?= __('Resume') ?></h4>
          <?= $this->Text->autoParagraph(h($series->resume)); ?>
          <br>



          <h4><?= __('File') ?></h4>
          <?= $this->Text->autoParagraph(h($series->file)); ?>
          <br>


</div>
