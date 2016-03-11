<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

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
</head>
<body>
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


    <div class="container">
    <br>
        <?= $this->fetch('content') ?>
    </div>
<br>
    <div class="navbar navbar-inverse navbar-fixed-bottom" role="navigation" style="margin-top: 30px; border: 1px solid #e3e3e3; background-color: #f5f5f5;  min-height:0px; height:20px;">
          <div class="container">
          <p class="text-muted pull-right">Media V2.0 - Fièrement codé par S'Tonfute 105-64Me213</p>
          </div>
        </div>


</body>
</html>
