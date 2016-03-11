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
      <li><?= $this->Html->link(__('TOUT'), ['action' => 'indexView']) ?></li>
      <li><?= $this->Html->link(__('Artistes'), ['action' => 'indexArtist']) ?></li>
      <li><?= $this->Html->link(__('Albums'), ['action' => 'indexAlbum']) ?></li>
      <li><?= $this->Paginator->sort('created', 'Les derniers ajouts', ['direction' => 'desc']) ?></li>
      <li><?= $this->Paginator->sort('year', 'Les + récents', ['direction' => 'desc']) ?></li>

    </ul>



    <?php     echo $this->Form->create('Properties', array('type' => 'get')); ?>

    <div class="input-group col-sm-2 nav navbar-nav navbar-right" style="margin-top: 0.7%; margin-right: 0.7%;">
               <input name="search" class="form-control" id="search" placeholder="  <?php if(isset($search)||isset($year)){echo $search.' - '.$year;} else {echo 'recherche';} ;?>" >
                <span class="input-group-btn">

                  <?php if(isset($search)||isset($year)){

              echo  $this->Html->link(__('
             <span class="glyphicon glyphicon-remove"></span>&nbsp;
             '),
                        ['action' => 'indexArtist'],
                        array('class' => 'btn btn-danger', 'escape' => false )

                    );
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


</div>
  </div>

</nav>
