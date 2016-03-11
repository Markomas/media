


<div class="col-xs-12">


<div class="form form-group col-xs-6 well">
  <h4>Uploader un film:</h4>

    <h5>Choisir un ou plusieurs fichiers </h5>
    <?php
    echo $this->Form->create($upload, array('action' => 'uploadUser', 'type' => 'file'));
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
          echo '<h5><b>'.$file_up['name'].'</b> est bien uploadé et en attente d\'un modérateur!</h5>';
        }

    }
    ?>

</div>

<div class="well col-xs-5 pull-right text-justify">
  <h4>Note :</h4>
  <p>
    Les fichiers uploadés sont vérifiés par l'équipe avant d'être mis à disposition des autres utilisateurs.
  </p>
</div>

</div>
