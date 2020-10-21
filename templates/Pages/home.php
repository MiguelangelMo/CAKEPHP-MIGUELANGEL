<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <header>
        <p class="lead" style="font-weight:bold;text-align:center;">
            Log in
        </p>
    </header>
    <main class="main" style="display:flex;justify-content:center">
        <div class="card" style=" width: 50%; border: .5px solid #000; padding: 1em; box-shadow: -1px 6px 5px 0px rgba(0,0,0,0.75">
            <div class="card-body">
                <?= $this->Flash->render('auth'); ?>
                <?= $this->Form->create(); ?>
                <div class="form-group">
                    <label for="email">Enter your E-Mail</label>
                    <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'Enter your E-Mail', 'label' => true, 'required' => true, 'id' => 'email']) ?>
                </div>
                <div class="form-group">
                    <label for="email">Enter your Password</label>
                    <?= $this->Form->input('password', ['class' => 'form-control', 'placeholder' => 'Enter your Password', 'label' => true, 'required' => true, 'id' => 'password']) ?>
                </div>
                <?= $this->Form->button('Log in', ['class' => 'btn btn-secondary btn-lg btn-block', 'type' => 'button']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </main>
</body>

</html>