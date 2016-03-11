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
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    })
    ->take(7);
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Nouveau <?= $singularHumanName ?>'), ['action' => 'add']) CakePHPBakeCloseTag></li>
<?php
    $done = [];
    foreach ($associations as $type => $data):
        foreach ($data as $alias => $details):
            if (!empty($details['navLink']) && $details['controller'] !== $this->name && !in_array($details['controller'], $done)):
?>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Liste <?= $this->_pluralHumanName($alias) ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'index']) CakePHPBakeCloseTag></li>
        <li><CakePHPBakeOpenTag= $this->Html->link(__('Nouveau <?= $this->_singularHumanName($alias) ?>'), ['controller' => '<?= $details['controller'] ?>', 'action' => 'add']) CakePHPBakeCloseTag></li>
<?php
                $done[] = $details['controller'];
            endif;
        endforeach;
    endforeach;
?>
    </ul>
  </div>
</nav>
<div class="well">
    <table class="table table-striped">
        <thead>
            <tr>
<?php foreach ($fields as $field): ?>
                <th><CakePHPBakeOpenTag= $this->Paginator->sort('<?= $field ?>') CakePHPBakeCloseTag></th>
<?php endforeach; ?>
                <th class="actions"></th>
            </tr>
        </thead>
        <tbody>
            <CakePHPBakeOpenTagphp foreach ($<?= $pluralVar ?> as $<?= $singularVar ?>): CakePHPBakeCloseTag>
            <tr>
<?php        foreach ($fields as $field) {
            $isKey = false;
            if (!empty($associations['BelongsTo'])) {
                foreach ($associations['BelongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                        $isKey = true;
?>
                <td><CakePHPBakeOpenTag= $<?= $singularVar ?>->has('<?= $details['property'] ?>') ? $this->Html->link($<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['displayField'] ?>, ['controller' => '<?= $details['controller'] ?>', 'action' => 'view', $<?= $singularVar ?>-><?= $details['property'] ?>-><?= $details['primaryKey'][0] ?>]) : '' CakePHPBakeCloseTag></td>
<?php
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
?>
                <td><CakePHPBakeOpenTag= h($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
<?php
                } else {
?>
                <td><CakePHPBakeOpenTag= $this->Number->format($<?= $singularVar ?>-><?= $field ?>) CakePHPBakeCloseTag></td>
<?php
                }
            }
        }

        $pk = '$' . $singularVar . '->' . $primaryKey[0];
?>
                <td class="actions">
                    <CakePHPBakeOpenTag= $this->Html->link(__('Voir'), ['action' => 'view', <?= $pk ?>], array('class' => 'btn btn-sm btn-success')) CakePHPBakeCloseTag>
                    <CakePHPBakeOpenTag= $this->Html->link(__('Editer'), ['action' => 'edit', <?= $pk ?>], array('class' => 'btn btn-sm btn-warning')) CakePHPBakeCloseTag>
                    <CakePHPBakeOpenTag= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', <?= $pk ?>],
                    array(
                                          'class'    => 'btn btn-sm btn-danger',
                                          'escape'   => false,
                                          'confirm'  => 'Êtes vous sûr ?'
                                        ) ); CakePHPBakeCloseTag>
            </td>
            </tr>
            <CakePHPBakeOpenTagphp endforeach; CakePHPBakeCloseTag>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <CakePHPBakeOpenTag= $this->Paginator->prev('<i class="glyphicon glyphicon-chevron-left"></i>', ['escape' => false]) CakePHPBakeCloseTag>
            <CakePHPBakeOpenTag= $this->Paginator->numbers() CakePHPBakeCloseTag>
            <CakePHPBakeOpenTag= $this->Paginator->next('<i class="glyphicon glyphicon-chevron-right"></i>', ['escape' => false]) CakePHPBakeCloseTag>
        </ul>
        <p><CakePHPBakeOpenTag= $this->Paginator->counter('Page {{page}} sur {{pages}}') CakePHPBakeCloseTag></p>
    </div>
</div>
