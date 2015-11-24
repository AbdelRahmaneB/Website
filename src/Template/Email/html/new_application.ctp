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

<?= __('Hello {0}', $mentorname) ?>,<br/><br/>

<?= __('{0} have applied to the mission {1}', [$username, $missionname]) ?>.<br/><br/>

<a href="<?= $linkMission ?>"><?= __('Click here to see your mission details') ?></a><br/>
<a href="<?= $linkUser ?>"><?= __("Click here to view the candidate's profile") ?></a><br/><br/>

<?= __('Go on the mission to accept or reject the candidate')?>