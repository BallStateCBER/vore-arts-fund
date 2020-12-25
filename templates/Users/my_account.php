<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

$this->disableAutoLayout();

$cakeDescription = 'CakePHP: the rapid development PHP framework';
$user = $this->request->getSession()->read('Auth.User');
$applications = TableRegistry::getTableLocator()->get('Applications')->find()->where(['user_id' => $user['id']])->all()->toArray();
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->element('head'); ?>
    <title>
        <?= $cakeDescription ?>
    </title>
</head>

<body class="home">
    <?= $this->element('navbar'); ?>
    <div class="container">
        <div class='pb-2 mt-4 mb-2 border-bottom'>
            <h1>My Account</h1>
        </div>
        <?= $this->Html->link('Change Account Info', '/change-account-info', array('class' => 'button')); ?>

        <h2>Applications</h2>
        <?php foreach ($applications as $application) { ?>
            <div>
                <h3><?php echo $application['title'] ?></h3>
                <?php if($application['status_id'] === 8) {?>
                    <p><?= 'Status: Withdrawn'; ?></p>
                <?php } ?>
                <?php echo $this->Html->link("View", 
                [ 
                    'controller' => 'Applications',
                    'action' => 'view',
                    'id' => $application['id'],
                    'slug' => '/view-application//'
                ], array('class' => 'button')); ?>
                <?php if($application['status_id'] !== 8){
                    echo $this->Html->link("Withdraw", 
                    [ 
                        'controller' => 'Applications',
                        'action' => 'withdraw',
                        'id' => $application['id'],
                    ], array('class' => 'button')); 
                }?>
                <?php if($application['status_id'] === 8){
                    echo $this->Html->link("Resubmit", 
                    [ 
                        'controller' => 'Applications',
                        'action' => 'resubmit',
                        'id' => $application['id'],
                    ], array('class' => 'button')); 
                }?>

                <?php if($application['status_id'] === 1 || $application['status_id'] ===4 || $application['status_id'] === 8){
                    echo $this->Html->link("Delete", 
                    [ 
                        'controller' => 'Applications',
                        'action' => 'delete',
                        'id' => $application['id'],
                    ], array('class' => 'button'));
                } ?>
            </div>
        <?php } ?>
    </div>
</body>

</html>