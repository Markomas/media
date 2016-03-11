<?php include 'menu_admin.ctp'; ?>
<div class="well">
  <?php     echo $this->Form->create('Properties', array('type' => 'get')); ?>

  <div class="input-group col-sm-4 nav navbar-nav navbar-right" style="margin-top: 0.7%; margin-right: 0.7%;">
             <input name="search" class="form-control" id="search" placeholder="recherche"  value="<?= $search ?>">
              <span class="input-group-btn">
              <button type="submit" class="btn btn-success">
        <span class="glyphicon glyphicon-search"></span>&nbsp;
        </button>

         </span>
         </div>
         <?php  echo $this->Form->end; ?>
<br><br>
</div>
<div class="well">


    <table class="table table-striped">
        <tbody>
          <!---Bug fix : pourquoi ? je l'ignore ! Mais il  faut un form entre les deux !-->
          <tr style="display:none;">
            <?php
            echo $this->Form->create($film);
            echo $this->Form->end();
             ?>
          </tr>
          <!--- FIN Bug fix : pourquoi ? je l'ignore ! -->
          
            <?php foreach ($id as $key => $id_tmdb ): ?>
            <tr>
                <td><?= $id_tmdb ?></td>
                <td>
                  <img src="<?= h($poster[$key]) ?>" alt="" />
                </td>
                <td><?= h($title[$key]) ?></td>
                <td><?= h($time[$key]) ?></td>
                <td><?= h($year[$key]) ?></td>
                <td>
                 <?php

                 echo $this->Form->create($film);

                 echo '<input type="text" name="tmdb" value="'.$id_tmdb.'" hidden="hidden">';
                 echo $this->Form->submit(__('Choisir cette fiche', true),[
                     'class' => 'btn btn-danger pull-right',
                 ]);
                 echo $this->Form->end();

                  ?>
                </td>


            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
