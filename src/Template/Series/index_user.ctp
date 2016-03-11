<div class="row row-offcanvas row-offcanvas-left">


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
      <li><?= $this->Paginator->sort('id', 'Les derniers ajouts', ['direction' => 'desc']) ?></li>
      <li><?= $this->Paginator->sort('annee', 'Les + récents', ['direction' => 'desc']) ?></li>
      <li><?= $this->Paginator->sort('note', 'Les mieux notés', ['direction' => 'desc']) ?></li>
      <li><?= $this->Paginator->sort('view', 'Les + vus', ['direction' => 'desc']) ?></li>

    </ul>



    <?php     echo $this->Form->create('Properties', array('type' => 'get')); ?>

    <div class="input-group col-sm-2 nav navbar-nav navbar-right" style="margin-top: 0.7%; margin-right: 0.7%;">
               <input name="search" class="form-control" id="search" placeholder="  <?php if(isset($search)){echo $search;} else {echo 'recherche';} ;?>" >
                <span class="input-group-btn">
                  <?php if(isset($search)){
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


 <?php  echo $this->Form->end; ?>

    <div class="nav navbar-nav navbar-right">

      <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-th-large"></span>'),
      ['action' => 'index_user', 'grid'], ['escape' => false, 'style' => 'padding-right: 0px;' ]) ?></li>
      <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-th-list"></span>'),
      ['action' => 'index_user', 'table'], ['escape' => false ]) ?></li>


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

      foreach ($series as $serie){
        echo '<tr style="height: 300px;">
          <td class="col-xs-2 text-center" style="height: 300px;">
          <div class="view col-xs-12 text-center" style="vertical-align:middle; margin: auto;">';
        echo $this->Html->link(
          $this->Html->image('poster/'.$serie->id_tmdb.'.jpg'),
          ['action' => 'viewUser', $serie->id],
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
            $serie->titre,
            ['action' => 'viewUser', $serie->id],
            ['escape' => false]
          );

          echo '</b><div class="pull-right">
            &nbsp;&nbsp;'. $this->Html->link(__('<span class="glyphicon glyphicon-eye-open"></span>  Voir la fiche'), ['action' => 'view-user', $serie->id], array('class' =>'btn btn-sm btn-success text-justify', 'escape' => false ))

      .'</div>
              <i> - '.substr($serie->annee,0,4).'</i>

            <p><br>'.$serie->resume.'</p>';

          echo '
               </td></tr>';

      }
      echo '        </tbody>
          </table>';

} else {

foreach ($series as $serie){
  echo '<div class="col-sm-3"><div class="panel panel-default" style="height: 370px;">
<div class="panel-heading text-center" style="display:flex;justify-content:center;align-items:center;height:61px;">'.$this->Html->link(
    $serie->titre,
    ['action' => 'viewUser', $serie->id],
    ['escape' => false]
  ).'</div>
<div class="panel-body" >

<div class="view col-xs-12">'.
$this->Html->link(
  $this->Html->image('poster/'.$serie->id_tmdb.'.jpg'),
  ['action' => 'viewUser', $serie->id],
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
