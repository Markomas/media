<?php
include 'menu.ctp';
 ?>
<script type="text/javascript">
$(document).ready(function(){

window.parent.$("html,body").scrollTop(0);

});
</script>


<div class="">

<?php
  foreach ($artists as $artist) {

    echo '<div class="col-sm-3"><div class="panel panel-default" style="height: 300px;">
  <div class="panel-heading text-center" style="display:flex;justify-content:center;align-items:center;height:61px;">'.$this->Html->link(
      '<large><b>'.$artist['artist'].'</b></large>',
      ['action' => 'viewArtist', $artist['artist']],
      ['escape' => false]
    ).'</div>
  <div class="panel-body" >

  <div class="view col-xs-12">'.
  $this->Html->link(
    $this->Html->image('album/'.$artist['cover'], ['style' => 'width: 200px;', 'escape' => false]),
    ['action' => 'viewArtist', $artist['artist']],
    ['style' => 'width: 200px;', 'escape' => false]
  )
  .'
  </div>
  <div class="view_sign" >

  <span class="glyphicon glyphicon-eye-open"></span>

  </div>
  </div>';
    echo "</div></div>";
  }


 ?>
</div>
<br>
<div class="col-xs-12">
  <div class="paginator">
      <ul class="pagination">
          <?= $this->Paginator->prev('<i class="glyphicon glyphicon-chevron-left"></i>', ['escape' => false]) ?>
          <?= $this->Paginator->numbers() ?>
          <?= $this->Paginator->next('<i class="glyphicon glyphicon-chevron-right"></i>', ['escape' => false]) ?>
      </ul>
  </div>
</div>
