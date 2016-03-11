
<?php include 'menu_admin.ctp'; ?>


<div class="col-xs-12">


<div class="form form-group col-xs-6 well">
  <h4>Uploader de la musique:</h4>
    <div class="well alert-danger">
      Pas d'upload pour le moment ! Veuillez passer par le FTP !
    </div>

</div>

<div class="well col-xs-5 pull-right text-justify">
  <h4>Upload massif :</h4>
  <p>
    En cas d'upload massif, il est preférable de passer par le ftp et d'uploader vos fichiers dans le dossier : Music_upload.
  </p>
</div>

</div>
<div class="col-xs-12">

    <div class="well col-xs-6 container">
      <?php  echo count(scandir($upload_dir))-2; ?>
       fichiers en attente dans le dossier d'upload <span class="glyphicon glyphicon-arrow-right"></span>
        1ère étape
               <span class="glyphicon glyphicon-arrow-right"></span>
   <?= $this->Html->link(__('Renommer'), ['action' => 'rename'], array('class' => 'btn  btn-warning', 'escape' => false )) ?>
    </div>



</div>




<br>
