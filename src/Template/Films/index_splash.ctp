<div class="well" style="padding-bottom:0px;">
  <h4>Films ajoutés dernièrement :</h4>
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="min-height: 350px; color:black;">
    <!-- Indicators -->
    <ol class="carousel-indicators" style="border-color:black;">
      <li data-target="#myCarousel" data-slide-to="0" class="active" style="border-color:grey; background-color:grey;"></li>
      <li data-target="#myCarousel" data-slide-to="1" style="border-color:grey; background-color:grey;"></li>
      <li data-target="#myCarousel" data-slide-to="2" style="border-color:grey; background-color:grey;"></li>
      <li data-target="#myCarousel" data-slide-to="3" style="border-color:grey; background-color:grey;"></li>
      <li data-target="#myCarousel" data-slide-to="4" style="border-color:grey; background-color:grey;"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <?php
     $i=0;
     //then using while loop, it will display all the records inside the table
    foreach ($films as $film) {
       echo '<div class="item ';
       if ($i==0) {
         echo 'active';
       }
       echo '">
       <div class="col-xs-10 col-sm-offset-1">

       <div class="col-xs-3">
         <div class="view col-xs-12 text-center" style="vertical-align:middle; margin: auto;">';
       echo $this->Html->link(
         $this->Html->image('poster/'.$film->tmdb.'.jpg'),
         ['action' => 'viewUser', $film->id_film],
         ['escape' => false]
       );
       echo '<br></div>
       <div class="view_sign col-xs-12" >
       <span style="font-size:50%">&nbsp;</span>
       <span class="glyphicon glyphicon-eye-open"></span>

       </div>
       </div>
       <div class="col-xs-7"><b>';
   echo $this->Html->link(
       $film->titre_film,
       ['action' => 'viewUser', $film->id_film],
       ['escape' => false]
     );

     echo '</b><div class="pull-right">
       '. $this->Html->link(__('<span class="glyphicon glyphicon-download"></span>  Télecharger'), ['action' => 'download', $film->id_film], array('class' => 'btn btn-sm btn-success', 'escape' => false ))
       .'&nbsp;&nbsp;'. $this->Html->link(__('<span class="glyphicon glyphicon-eye-open"></span>  Streaming'), ['action' => 'stream', $film->id_film], array('class' =>'btn btn-sm btn-warning text-justify', 'data-toggle'=>'popover', 'data-placement'=>'bottom', 'data-html'=>'true', 'data-trigger'=>'focus',
       'title'=>'<b>Aide pour le streaming</b>', 'data-content'=>'Veuillez ouvrir le fichier *.m3u avec votre lecteur préféré. <br><br>En cas de problèmes veuillez installer <a href=\'http://www.videolan.org/vlc/\' target=\'_blank\'>VLC media player</a>.', 'escape' => false ))

 .'</div>
         <i> - '.substr($film->annee_film,0,4).'</i>
       <h4><i>'.
         $film->tagline_film
       .'</i></h4>
       <p class="text-justify"><br>'.$film->resume_film.'</p><br><br><br><br><br><br>';

     echo '
          </div>
       </div>
       </div>';
       $i=$i+1;
     }
       ?>
     </div>
     <!-- Left and right controls -->
     <a class="left carousel-control" href="#myCarousel"  data-slide="prev" style="background:none; color:black;">
       <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="right carousel-control" href="#myCarousel"  data-slide="next" style="background:none;  color:black;">
       <span class="glyphicon glyphicon-chevron-right" ></span>
     </a>
     </div>
     </div>



<!-- Séries -->

     <div class="well" style="padding-bottom:0px;">
       <h4>Séries ajoutés dernièrement :</h4>
       <br>
       <div id="myCarousel2" class="carousel slide" data-ride="carousel" style="min-height: 350px; color:black;">
         <!-- Indicators -->
         <ol class="carousel-indicators" style="border-color:black;">
           <li data-target="#myCarousel2" data-slide-to="0" class="active" style="border-color:grey; background-color:grey;"></li>
           <li data-target="#myCarousel2" data-slide-to="1" style="border-color:grey; background-color:grey;"></li>
           <li data-target="#myCarousel2" data-slide-to="2" style="border-color:grey; background-color:grey;"></li>
           <li data-target="#myCarousel2" data-slide-to="3" style="border-color:grey; background-color:grey;"></li>
           <li data-target="#myCarousel2" data-slide-to="4" style="border-color:grey; background-color:grey;"></li>
         </ol>
         <!-- Wrapper for slides -->
         <div class="carousel-inner" role="listbox">
           <?php
          $i=0;
          //then using while loop, it will display all the records inside the table
         foreach ($series as $film) {
            echo '<div class="item ';
            if ($i==0) {
              echo 'active';
            }
            echo '">
            <div class="col-xs-10 col-sm-offset-1">

            <div class="col-xs-3">
              <div class="view col-xs-12 text-center" style="vertical-align:middle; margin: auto;">';
            echo $this->Html->link(
              $this->Html->image('poster/'.$film->id_tmdb.'.jpg'),
              ['controller' => 'Series', 'action' => 'viewUser', $film->id],
              ['escape' => false]
            );
            echo '<br></div>
            <div class="view_sign col-xs-12" >
            <span style="font-size:50%">&nbsp;</span>
            <span class="glyphicon glyphicon-eye-open"></span>

            </div>
            </div>
            <div class="col-xs-7"><b>';
        echo $this->Html->link(
            $film->titre,
            ['controller' => 'Series', 'action' => 'viewUser', $film->id],
            ['escape' => false]
          );

          echo '</b>
            <p class="text-justify"><br>'.$film->resume.'</p><br><br><br><br><br><br>';

          echo '
               </div>
            </div>
            </div>';
            $i=$i+1;
          }
            ?>
          </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel2"  data-slide="prev" style="background:none; color:black;">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel2"  data-slide="next" style="background:none;  color:black;">
            <span class="glyphicon glyphicon-chevron-right" ></span>
          </a>
          </div>
          </div>

          <!-- Music -->

               <div class="well" style="padding-bottom:0px;">
                 <h4>Albums ajoutés dernièrement :</h4>
                 <br>
                 <div id="myCarousel3" class="carousel slide" data-ride="carousel" style="min-height: 350px; color:black;">
                   <!-- Indicators -->
                   <ol class="carousel-indicators" style="border-color:black;">
                     <li data-target="#myCarousel3" data-slide-to="0" class="active" style="border-color:grey; background-color:grey;"></li>
                     <li data-target="#myCarousel3" data-slide-to="1" style="border-color:grey; background-color:grey;"></li>
                     <li data-target="#myCarousel3" data-slide-to="2" style="border-color:grey; background-color:grey;"></li>
                     <li data-target="#myCarousel3" data-slide-to="3" style="border-color:grey; background-color:grey;"></li>
                     <li data-target="#myCarousel3" data-slide-to="4" style="border-color:grey; background-color:grey;"></li>
                   </ol>
                   <!-- Wrapper for slides -->
                   <div class="carousel-inner" role="listbox">
                     <?php
                    $i=0;
                    //then using while loop, it will display all the records inside the table
                   foreach ($albums as $film) {
                      echo '<div class="item ';
                      if ($i==0) {
                        echo 'active';
                      }
                      echo '">
                      <div class="col-xs-10 col-sm-offset-1">

                      <div class="col-xs-3">
                        <div class="view col-xs-12 text-center" style="vertical-align:middle; margin: auto; ">';
                      echo $this->Html->link(
                        $this->Html->image('album/'.$film->cover, ['style' => 'width: 200px;', 'escape' => false]),
                        ['controller' => 'Music', 'action' => 'IndexUser'],
                        ['escape' => false]
                      );
                      echo '<br></div>
                      <div class="view_sign col-xs-12" >
                      <span style="font-size:50%">&nbsp;</span>
                      <span class="glyphicon glyphicon-eye-open"></span>

                      </div>
                      </div>
                      <div class="col-xs-7"><b>';
                  echo $this->Html->link(
                      $film->album,
                      ['controller' => 'Music', 'action' => 'indexUser'],
                      ['escape' => false]
                    );

                    echo '</b>
                    <p>'.
                      $film->artist
                    .'</p>
                    <p>'.
                      $film->year
                    .'</p>
                    <br><br><br><br>
                         </div>
                      </div>
                      </div>';
                      $i=$i+1;
                    }
                      ?>
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel3"  data-slide="prev" style="background:none; color:black;">
                      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel3"  data-slide="next" style="background:none;  color:black;">
                      <span class="glyphicon glyphicon-chevron-right" ></span>
                    </a>
                    </div>
                    </div>
