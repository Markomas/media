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

</head>
<body >

    <?= $this->Flash->render() ?>
      <?= $this->fetch('content') ?>

</body>
</html>
