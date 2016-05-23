
<div class="row row-offcanvas row-offcanvas-left">

  <div class="col-sm-4 sidebar-offcanvas " id="sidebar">
  <div class="col-sm-6 well">
    <ul class="" style="margin-left:-5%;">
      <li ><?= $this->Html->link(__('TOUS'), ['action' => 'index_user', $view, '']) ?></li>
      <li><?= $this->Html->link(__('Action'), ['action' => 'index_user', $view, 'Action']) ?></li>
      <li><?= $this->Html->link(__('Animation'), ['action' => 'index_user', $view, 'Animation']) ?></li>
      <li><?= $this->Html->link(__('Aventure'), ['action' => 'index_user', $view, 'Aventure']) ?></li>
      <li><?= $this->Html->link(__('Comédie'), ['action' => 'index_user', $view, 'Comédie']) ?></li>
      <li><?= $this->Html->link(__('Crime'), ['action' => 'index_user', $view, 'Crime']) ?></li>
      <li><?= $this->Html->link(__('Documentaire'), ['action' => 'index_user', $view, 'Documentaire']) ?></li>
      <li><?= $this->Html->link(__('Drame'), ['action' => 'index_user', $view, 'Drame']) ?></li>
      <li><?= $this->Html->link(__('Familial'), ['action' => 'index_user', $view, 'Familial']) ?></li>
      <li><?= $this->Html->link(__('Fantastique'), ['action' => 'index_user', $view, 'Fantastique']) ?></li>
      <li><?= $this->Html->link(__('Guerre'), ['action' => 'index_user', $view, 'Guerre']) ?></li>
      <li><?= $this->Html->link(__('Histoire'), ['action' => 'index_user', $view, 'Histoire']) ?></li>
      <li><?= $this->Html->link(__('Horreur'), ['action' => 'index_user', $view, 'Horreur']) ?></li>
      <li><?= $this->Html->link(__('Musique'), ['action' => 'index_user', $view, 'Musique']) ?></li>
      <li><?= $this->Html->link(__('Mystère'), ['action' => 'index_user', $view, 'Mystère']) ?></li>
      <li><?= $this->Html->link(__('Romance'), ['action' => 'index_user', $view, 'Romance']) ?></li>
      <li><?= $this->Html->link(__('Science-Fiction'), ['action' => 'index_user', $view, 'Science-Fiction']) ?></li>
      <li><?= $this->Html->link(__('Thriller'), ['action' => 'index_user', $view, 'Thriller']) ?></li>
      <li><?= $this->Html->link(__('Western'), ['action' => 'index_user', $view, 'Western']) ?></li>

    </ul>

  </div>



          </div>


<nav class="navbar navbar-default">

  <div class="container-fluid">

    <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar2">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
    </div>
<div class="collapse navbar-collapse" id="myNavbar2">
      <ul class="nav navbar-nav">
      <li><?= $this->Paginator->sort('created', 'Les derniers ajouts', ['direction' => 'desc']) ?></li>
      <li><?= $this->Paginator->sort('titre_film', 'A-Z', ['direction' => 'asc']) ?></li>
      <li><?= $this->Paginator->sort('annee_film', 'Les + récents', ['direction' => 'desc']) ?></li>
      <li><?= $this->Paginator->sort('note_film', 'Les mieux notés', ['direction' => 'desc']) ?></li>
      <li><?= $this->Paginator->sort('view', 'Les + vus', ['direction' => 'desc']) ?></li>
      <li><a data-toggle="offcanvas">Genres</a></li>

    </ul>



    <?php     echo $this->Form->create('Properties', array('type' => 'get')); ?>

    <div class="input-group col-sm-2 nav navbar-nav navbar-right" style="margin-top: 0.7%; margin-right: 0.7%;">
               <input name="search" class="form-control" id="search" placeholder="  <?php if(isset($search)||isset($year)){echo $search.' - '.$year;} else {echo 'recherche';} ;?>" >
                <span class="input-group-btn">
                  <?php if(isset($search)||isset($year)){
                echo '<button type="submit" class="btn btn-danger">
             <span class="glyphicon glyphicon-remove"></span>&nbsp;
             </button>';
           } else {
             echo '<button type="submit" class="btn btn-success">
          <span class="glyphicon glyphicon-search"></span>&nbsp;
          </button>';
           }
           ?>
           </span>




           </div>


<div class="nav navbar-nav navbar-right" style="margin-top: 0.7%; margin-right: 0.7%;">
  <select class="form-control"  name="year"  onchange="this.form.submit()">
 <option data-hidden="true" value=''>Année</option>

  <?php
  foreach ($annees as $annee ) {
    echo '<option value="'.$annee.'">'.$annee.'</option>';
  }
   ?>
  </select>

</div>
 <?php  echo $this->Form->end; ?>

    <div class="nav navbar-nav navbar-right">

      <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-th-large"></span>'),
      ['action' => 'index_user', 'grid', $genre], ['escape' => false, 'style' => 'padding-right: 0px;' ]) ?></li>
      <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-th-list"></span>'),
      ['action' => 'index_user', 'table', $genre], ['escape' => false ]) ?></li>


      <li>&nbsp;&nbsp;</li>

    </div>
</div>
  </div>

</nav>
<div class="">
<?php


if ($view == 'table') {
  echo '
  <table class="table table-striped text-justify" style="font-size: medium;">
    <thead>
      <tr>
        <th></th>
        <th class="col-xs-8 "></th>


      </tr>
    </thead>
      <tbody>';

      foreach ($films as $film){
        echo '<tr style="height: 300px;">
          <td class="col-xs-2 text-center" style="height: 300px;">
          <div class="view col-xs-12 text-center" style="vertical-align:middle; margin: auto;">';
        echo $this->Html->link(
          $this->Html->image('poster/'.$film->tmdb.'.jpg'),
          ['action' => 'viewUser', $film->id_film],
          ['escape' => false]
        );
        echo '</div>
        <div class="view_sign col-xs-12" >
        <span style="font-size:50%">&nbsp;</span>
        <span class="glyphicon glyphicon-eye-open"></span>

        </div>
        </td>
            <td style="vertical-align:middle; height: 300px; padding-right: 2%"><b>';
        echo $this->Html->link(
            $film->titre_film,
            ['action' => 'viewUser', $film->id_film],
            ['escape' => false]
          );

          echo '</b><div class="pull-right">
            '. $this->Html->link(__('<span class="glyphicon glyphicon-download"></span>  Télecharger'), ['action' => 'download', $film->id_film], array('class' => 'btn btn-sm btn-success', 'escape' => false ))
            .'&nbsp;&nbsp;'. $this->Html->link(__('<span class="glyphicon glyphicon-eye-open"></span>  Streaming'), ['action' => 'stream', $film->id_film], array('class' =>'btn btn-sm btn-warning text-justify', 'data-toggle'=>'popover', 'data-placement'=>'bottom', 'data-html'=>'true', 'data-trigger'=>'focus',
            'title'=>'<b>Aide pour le streaming</b>', 'data-content'=>'Veuillez ouvrir le fichier *.m3u avec votre lecteur préféré. <br><br>En cas de problèmes veuillez installer <a href=\'http://www.videolan.org/vlc/\' target=\'_blank\'>VLC media player</a>.', 'escape' => false ))

      .'</div>
              <i> - '.substr($film->annee_film,0,4).'</i>
            <h4><i>'.
              $film->tagline_film
            .'</i></h4>
            <p><br>'.$film->resume_film.'</p>';

          echo '
               </td></tr>';

      }
      echo '        </tbody>
          </table>';

} else {

foreach ($films as $film){
  echo '<div class="col-sm-3"><div class="panel panel-default" style="height: 370px;">
<div class="panel-heading text-center" style="display:flex;justify-content:center;align-items:center;height:61px;">'.$this->Html->link(
    $film->titre_film,
    ['action' => 'viewUser', $film->id_film],
    ['escape' => false]
  ).'</div>
<div class="panel-body" >

<div class="view col-xs-12">'.
$this->Html->link(
  $this->Html->image('poster/'.$film->tmdb.'.jpg'),
  ['action' => 'viewUser', $film->id_film],
  ['escape' => false]
)
.'




</div>
<div class="view_sign" >

<span class="glyphicon glyphicon-eye-open"></span>

</div>
</div>';
  echo "</div></div>";
}

}


 ?>

</div>
</div>


<div class="container">

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('<i class="glyphicon glyphicon-chevron-left"></i>', ['escape' => false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('<i class="glyphicon glyphicon-chevron-right"></i>', ['escape' => false]) ?>
        </ul>
    </div>

</div>

<script type="text/javascript">

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();

    $('[data-toggle="offcanvas"]').click(function () {
      $('.row-offcanvas').toggleClass('active')
    });
});


</script>
