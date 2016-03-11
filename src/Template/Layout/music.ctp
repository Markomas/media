<?php


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap/bootstrap');?>
    <?= $this->Html->css('jplayer.blue.monday');?>
    <?php
    echo $this->Html->script('jquery.min');
    echo $this->Html->script('jquery-ui.min');
    echo $this->Html->script('bootstrap/bootstrap');
    echo $this->Html->script('jplayer/jquery.jplayer');
    echo $this->Html->script('jplayer/jplayer.playlist');
     ?>

      <?= $this->Html->css('cake');?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script type="text/javascript">
    //<![CDATA[
    var myPlaylist;
    var playlist_view = 0;

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


    window.myPlaylist = new jPlayerPlaylist({
     jPlayer: "#jquery_jplayer_N",
     cssSelectorAncestor: "#jp_container_N"
   }, [
   ], {
     playlistOptions: {
       enableRemoveControls: true
     },
     swfPath: "../../dist/jplayer",
     supplied: "webmv, ogv, m4v, oga, mp3",
     useStateClassSkin: true,
     autoBlur: false,
     smoothPlayBar: true,
     keyEnabled: true,
     audioFullScreen: true
   });

   window.$("#playlist_btn").click(function() {
     if (window.playlist_view == 0) {
       window.$("#playlist_div").parent().fadeTo( 10, 0 );
       window.$("#playlist_div").parent().css("display", "none");

       window.playlist_view = 1;
     } else {
       window.$("#playlist_div").parent().fadeTo( 0, 10 );
       window.playlist_view = 0;
    }
   });



    });
    //]]>
    </script>

</head>
<body >
    <nav class="navbar navbar-inverse" data-topbar role="navigation">
        <div class="navbar-header">

  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">Media</a>

        </div>
<div class="collapse navbar-collapse" id="myNavbar">
  <ul class="nav navbar-nav">
      <li><?= $this->Html->link(__('Films'), ['controller' => 'Films', 'action' => 'indexUser']) ?></li>
      <li><?= $this->Html->link(__('Séries'), ['controller' => 'Series', 'action' => 'indexUser']) ?></li>
      <li><?= $this->Html->link(__('Musique'), ['controller' => 'Music', 'action' => 'indexUser']) ?></li>
      <li><?= $this->Html->link(__('Jeux'), ['controller' => 'Jeux', 'action' => 'indexUser']) ?></li>
      <li><?= $this->Html->link(__('Logiciels'), ['controller' => 'Logiciels', 'action' => 'indexUser']) ?></li>

  </ul>
  <?php
  $authUser = $this->request->Session()->read('Auth.User');
  if ($authUser['role']=='admin'){
    echo '

        <ul class="nav navbar-nav">
        <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;&nbsp;</a>




        </ul>

        <div class="input-group nav navbar-nav" >

        '.$this->Html->link(__('Films'), ['controller' => 'Films', 'action' => 'indexAdmin'], array('class' => 'btn btn-success', 'style' => 'margin-top: 10px; padding:5px 10px;')).'
        &nbsp;</div>
        <div class="input-group nav navbar-nav">

        '.$this->Html->link(__('Série'), ['controller' => 'Series', 'action' => 'indexAdmin'], array('class' => 'btn  btn-success', 'style' => 'margin-top: 10px; padding:5px 10px;')).'
        &nbsp;'.$this->Html->link(__('Musique'), ['controller' => 'Music', 'action' => 'indexAdmin'], array('class' => 'btn  btn-success', 'style' => 'margin-top: 10px; padding:5px 10px;')).'

        &nbsp;'.$this->Html->link(__('Administration'), ['controller' => 'Admin', 'action' => 'index'], array('class' => 'btn  btn-success', 'style' => 'margin-top: 10px; padding:5px 10px;')).'
        &nbsp;</div>


  ';

  };
    ?>

            <ul class="nav navbar-nav navbar-right">
              <li><?= $this->Html->link(__('<span class="glyphicon glyphicon-question-sign"></span>&nbsp;Aide'), ['action' => 'help'], array('escape' => false)) ?></li>

               <li><a href="mailto:preaultc@gmail.com?subject=[Media - Bug]&body=Adresse de la page : <?php echo $_SERVER['REQUEST_URI'] ?> %0A%0ADescription du problème :" ><span class="glyphicon glyphicon-ban-circle"></span>&nbsp;Un bug</a></li>



                <li> <?= $this->Auth->loginLink()  ?></span></li>
                <li><?= $this->Auth->logoutLink() ?></li>
            </ul>
            <?php if ($this->request->params['controller']=='Films'||$this->request->params['controller']=='Series'): ?>
              <div class="input-group  nav navbar-nav navbar-right" style="margin-top: 0.7%;">
                <?= $this->Html->link(__('<span class="glyphicon glyphicon-cloud-upload"></span>&nbsp;Partage tes '.$this->request->params['controller'].''),
                ['action' => 'upload_user'], array('class' =>'btn btn-sm btn-info', 'escape' => false )) ?>

              </div>
            <?php endif; ?>


          </div>

    </nav>

    <?= $this->Flash->render() ?>
     <div class="col-xs-12" id="target" name="target" style="left:auto; right: auto; position:relative;">

<iframe id="MyIframe" src="<?php echo $this->Url->build(['action' => $view], true); ?>" width="100%" frameBorder="0" scrolling="no" style="display: block; position:relative;" ></iframe>

        </div>
        <div id="jquery_jplayer_N" class="jp-jplayer navbar navbar-fixed-bottom pull-left" style="height:75px; margin:2px; background-url: '/img/album/no-cover.png'; " ></div>

    <div id="jp_container_N" class="jp-video pull-right navbar  navbar-fixed-bottom" role="application" aria-label="media player" style="padding-left: 79px; z-index:99;" >
    	<div class="jp-type-playlist">
    		<div id="jquery_jplayer_N" class="jp-jplayer" style="margin-left: auto;margin-right: auto; display:none" ></div>

    		<div class="jp-gui">

    			<div class="jp-interface">
    				<div class="jp-progress">
    					<div class="jp-seek-bar">
    						<div class="jp-play-bar"></div>
    					</div>
    				</div>
    				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
    				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
            <br>
            <div class="jp-title col-xs-5" aria-label="title">&nbsp;</div>

    				<div class="jp-controls-holder col-xs-7">

    					<div class="jp-controls">
    						<a class="jp-previous" role="button" tabindex="0"><span class="glyphicon glyphicon-backward"></span></a>
                <a class="jp-play" role="button" tabindex="0"><span class="jp-pl glyphicon"></span></a>
                <a class="jp-next" role="button" tabindex="0"><span class="glyphicon glyphicon-forward"></span></a>
    					</div>
              <div class="pull-right">
                <div class="jp-volume-controls">
                  <button class="jp-mute" role="button" tabindex="0">mute</button>
                  <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                  <div class="jp-volume-bar">
                    <div class="jp-volume-bar-value"></div>
                  </div>
                </div>
              </div>

    					<div class="jp-toggles pull-right">
    						<a class="jp-repeat" role="button" tabindex="0"><span class="glyphicon glyphicon-retweet"></span></a>
    						<a class="jp-shuffle" role="button" tabindex="0"><span class="glyphicon glyphicon-random"></span></a>
                <a href="javascript:;" id="playlist_btn" style="margin: 2px;padding: 5px;"><span class="glyphicon glyphicon-list"></span></a>
    					</div>
    				</div>


    			</div>
    		</div>
    		<div class="jp-playlist" style="display:none">
    			<ul>
    				<!-- The method Playlist.displayPlaylist() uses this unordered list -->
    			</ul>
    		</div>

    	</div>

    </div>

<br><br>
<div class="col-xs-12 pull-right">
  <div id="jp_container_N"  class="jp-video col-xs-3 col-xs-offset-9 pull-right navbar navbar-fixed-bottom" role="application" aria-label="media player" style="padding:0; display:none; margin-bottom:80px;" >
    <div id="playlist_div" class="jp-type-playlist" >
      <div  class="jp-playlist"  style="">
        <ul>
          <!-- The method Playlist.displayPlaylist() uses this unordered list -->
          <li>&nbsp;</li>
        </ul>
      </div>
    </div>
  </div>
</div>








</body>
</html>
