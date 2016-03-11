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

  echo ' <div class="col-xs-12">
<div class="col-xs-2">
<a href="'.$refer.'" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span>  Retour</a>

</div>
<div class="col-xs-10"><h3 style="display:inline">'.$artist.'</h3><hr></div></div>';

  foreach ($albums as $album) {

      echo '<iframe src="'.$this->Url->build(['action' => 'album', $album['album']]).'" width="100%" frameBorder="0" scrolling="no" style="display: block; position:relative;" ></iframe>';
      echo '<br>';

  }


 ?>
</div>
<br>
<br><br><br>
