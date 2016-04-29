
<?php include 'menu_admin.ctp';
?>


<div class="col-xs-12">


<div class="form form-group col-xs-6 well">
  <h4>Uploader une série:</h4>

    <h5>Choisir un fichier ou plusieurs fichiers</h5>
    <?php
    echo $this->Form->create($upload, array('action' => 'upload', 'type' => 'file'));
    echo '<div class="input-group col-xs-12">';

    echo $this->Form->input('file.',[
        'type' => 'file',
        'multiple' => true,
        'class' => 'input-group form-control ',
    ]);
    echo '  </div><br>'.$this->Form->submit(__('Upload', true),[
        'class' => 'btn btn-danger pull-right',
    ]);

    if (isset($files_up)) {

        echo '<br><br><br><br><br>';

        foreach ($files_up as $file_up) {
          echo '<h5><b>'.$file_up['name'].'</b> est bien uploadé !</h5>';
        }

    }
    ?>

</div>

<div class="well col-xs-5 pull-right text-justify">
  <h4>Upload massif :</h4>
  <p>
    En cas d'upload massif, il est preférable de passer par le ftp et d'uploader vos fichiers dans le dossier : Serie_upload.
  </p>
</div>

</div>

<div class="col-xs-12">

    <div class="well col-xs-6 container">
      <?php  function count_files($dir)
{
    $num = 0 ;
    $dir_handle = opendir($dir);
    while($entry = readdir($dir_handle)){
        if(is_file($dir.'/'.$entry)){
            $num++;
        }
        elseif(is_dir($dir.'/'.$entry) && $entry != ".." && $entry != "."){
            $num += count_files($dir.'/'.$entry);
        }
    }
    closedir($dir_handle);
    return $num;
}
echo count_files($upload_dir); ?>
       fichiers en attente dans le dossier d'upload <span class="glyphicon glyphicon-arrow-right"></span>
        1ère étape
               <span class="glyphicon glyphicon-arrow-right"></span>
   <?= $this->Html->link(__('Renommer'), ['action' => 'rename'], array('class' => 'btn  btn-warning', 'escape' => false )) ?>
    </div>



</div>


<br>
