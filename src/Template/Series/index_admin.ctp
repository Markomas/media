<style>
  .table {
    margin-bottom: 0px;
  }
</style>

<?php include 'menu_admin.ctp'; ?>


<div class="well">

<table class="table table-striped">
  <thead>
    <th class="col-xs-1"></th>
    <th class="col-xs-7">
      <?= $this->Paginator->sort('titre') ?>
    </th>
    <th>
    </th>
  </thead>
</table>








            <?php foreach ($series as $serie): ?>

              <table class="row-fluid accordion-toggle table table-striped" data-toggle="collapse" data-target=<?= '#'.$serie->id_tmdb ?>>
                <tbody>
                  <tr>
                    <td class="col-xs-1">
                      <button type="button" class="btn btn-default btn-xs">
                        <b>+</b>
                      </button>
                    </td>
                    <td class="col-xs-6"><?= $serie->titre ?></td>
                  </tr>
                </tbody>

              </table>


          <table class="accordion-toggle table table-striped collapse" id=<?= $serie->id_tmdb ?> style="margin-left:5%" >
            <thead >
                <tr>
                    <th class="col-xs-1"></th>
                    <th class="col-xs-1"><?= $this->Paginator->sort('episode') ?></th>
                    <th class="col-xs-6"><?= $this->Paginator->sort('titre_episode') ?></th>
                    <th class="actions"></th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($series_all as $episode): ?>
                <?php if ($episode->id_tmdb == $serie->id_tmdb): ?>
                  <tr>
                    <td class="col-xs-1">
                      <input id=<?= $episode->id ?> type='checkbox' name='' value='' >

                    </td>
                    <td class="col-xs-1">S<?= sprintf( "%02d",$episode->season) ?>E<?= sprintf( "%02d",$episode->episode) ?></td>
                    <td class="col-xs-6"><?= $episode->titre_episode ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'view', $episode->id], array('class' => 'btn btn-sm btn-success')) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $episode->id], array('class' => 'btn btn-sm btn-warning')) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $episode->id],
                        array(
                                              'class'    => 'btn btn-sm btn-danger',
                                              'escape'   => false,
                                              'confirm'  => 'Êtes vous sûr ?'
                                            ) ); ?>
                                          </td>
                  </tr>
                <?php endif; ?>
              <?php endforeach; ?>
              <tr>
                <td></td><td></td><td></td>
                <td><button type="button" class="btn btn-danger btnrm" id='rmbtn' >
                  Supprimer les épisodes sélectionnés
                </button></td>

              </tr>


            </tbody>


          </table>



        <?php endforeach; ?>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('<i class="glyphicon glyphicon-chevron-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="glyphicon glyphicon-chevron-right"></i>', ['escape' => false]) ?>
        </ul>
        <p><?= $this->Paginator->counter('Page {{page}} sur {{pages}}') ?></p>
    </div>
</div>



<script type="text/javascript">
var listrm = [];
var string = '';
  $('.btnrm').each(function () {
    $(this).hide();
  });

  $('input[type=checkbox]').each(function () {
    $(this).change(function(){
      listrm = [];
      string = '';

      $(':checkbox:checked').each(function() {
        listrm.push($(this).attr('id'));
      });
      string = listrm.toString();
      if (string != '') {
        $(this).closest('table').find("tr").last().find("td:nth-child(4)").find(".btnrm").show();
      } else {
        $('.btnrm').each(function () {
          $(this).hide();
        });
      }
    });
   });

$(".btnrm").each(function () {
   $(this).click(function() {
     $.post('delmultiple', JSON.stringify(listrm));
     location.reload();
   });
   });
</script>
