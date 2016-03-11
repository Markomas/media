<?php
include 'menu.ctp';
 ?>
<script type="text/javascript">
$(document).ready(function(){

  $.fn.resizeiframe=function(){
$(this).load(function() {
    $(this).height( $(this).contents().find("body").height() );
});
$(this).click(function() {
    $(this).height( $(this).contents().find("body").height() );
});

}
$('iframe').resizeiframe();
window.parent.$("html,body").scrollTop(0);

});
</script>


<div class="">

<?php
foreach ($artists as $artist) {
  echo '<h3>'.$artist['artist'].'</h3><hr>';
  foreach ($albums as $album) {
    if ($artist['artist'] == $album['artist']) {

      echo '<iframe src="'.$this->Url->build(['action' => 'album', $album['album']]).'" width="100%" frameBorder="0" scrolling="no" style="display: block; position:relative;" ></iframe>';
      echo '<br>';
    }
  }
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
