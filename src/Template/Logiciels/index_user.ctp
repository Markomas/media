<div class="well"  style="margin-top: 0.7%; margin-right: 1%;">
  <?=  $this->Html->link(__('<span class="glyphicon glyphicon-home"></span>'), ['action' => 'indexUser'], array('escape' => false ));
 ?>
  &nbsp;&nbsp;
<?php
$size = count($dossier);
$url = $this->Url->build(null, true);
foreach ($dossier as $dos) {
  $url= str_replace('/'.$dos, '', $url);
}
    for ($i=1; $i < $size; $i++) {
      for ($j=1; $j < $i-1 ; $j++) {
        $url = $url.'/'.$dossier[$j];
      }
      $url = $url.'/'.$dossier[$i];
      echo '&nbsp;/&nbsp;<a href="'.$url.'/'.'">'.$dossier[$i].'</a>';
    }

 ?>
</div>

<div class="well">
  <table class="table table-striped">

      <tbody>
          <?php foreach ($folders as $folder): ?>
          <tr>
            <td>
              <?php

              if (substr($this->request->here, -10)=='logiciels/') {
                $link = $this->request->here.'index-user/'.$folder;
              }else {
                if (substr($this->request->here, -9) == 'logiciels') {
                  $link = $this->request->here.'/'.'index-user/'.$folder;
                }else {
                  if (substr($this->request->here, -1) == '/') {
                    $link = $this->request->here.$folder;
                  }else {
                  $link = $this->request->here.'/'.$folder;
                }
              }
              }
               ?>

               <a href="<?php echo $link; ?>"><span class="glyphicon glyphicon-folder-open"></span></a>

               <span>&nbsp;&nbsp;</span>

            <a href="<?php echo $link; ?>"><?= $folder ?></a>
            </td>

          </tr>
          <?php endforeach; ?>

      </tbody>
  </table>
    <table class="table table-striped">

        <tbody>
            <?php
            $link_file ='';
            for ($i=0; $i < $size-1 ; $i++) {
              $link_file = $link_file.$dossier[$i].'/';
            }
            $link_file = $link_file.$dossier[$size-1];

            foreach ($softs as $soft): ?>
            <tr>
              <td>
                <a href="<?= $link_file.'/'.$soft ?>"><span class="glyphicon glyphicon-download-alt"></span></a>
<span>&nbsp;&nbsp;</span>
                <a href="<?= $link_file.'/'.$soft ?>"><?= $soft ?></a>

              </td>

            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
