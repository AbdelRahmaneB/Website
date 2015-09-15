<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Projects User'), ['action' => 'edit', $projectsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Projects User'), ['action' => 'delete', $projectsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Projects User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Missions'), ['controller' => 'Missions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Mission'), ['controller' => 'Missions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="projectsUsers view large-10 medium-9 columns">
    <h2><?= h($projectsUser->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $projectsUser->has('user') ? $this->Html->link($projectsUser->user->id, ['controller' => 'Users', 'action' => 'view', $projectsUser->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Project') ?></h6>
            <p><?= $projectsUser->has('project') ? $this->Html->link($projectsUser->project->name, ['controller' => 'Projects', 'action' => 'view', $projectsUser->project->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Cv') ?></h6>
            <p><?= h($projectsUser->cv) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($projectsUser->id) ?></p>
            <h6 class="subheader"><?= __('Accepted') ?></h6>
            <p><?= $this->Number->format($projectsUser->accepted) ?></p>
            <h6 class="subheader"><?= __('Is Mentor') ?></h6>
            <p><?= $this->Number->format($projectsUser->is_mentor) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($projectsUser->description)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Presentation') ?></h6>
            <?= $this->Text->autoParagraph(h($projectsUser->presentation)) ?>
        </div>
    </div>
</div>
<div class="related">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Comments') ?></h4>
    <?php if (!empty($projectsUser->comments)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Projects User Id') ?></th>
            <th><?= __('Text') ?></th>
            <th><?= __('User Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($projectsUser->comments as $comments): ?>
        <tr>
            <td><?= h($comments->id) ?></td>
            <td><?= h($comments->projects_user_id) ?></td>
            <td><?= h($comments->text) ?></td>
            <td><?= h($comments->user_id) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
<div class="related">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Missions') ?></h4>
    <?php if (!empty($projectsUser->missions)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Project Id') ?></th>
            <th><?= __('Role') ?></th>
            <th><?= __('Mission') ?></th>
            <th><?= __('Active') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($projectsUser->missions as $missions): ?>
        <tr>
            <td><?= h($missions->id) ?></td>
            <td><?= h($missions->project_id) ?></td>
            <td><?= h($missions->role) ?></td>
            <td><?= h($missions->mission) ?></td>
            <td><?= h($missions->active) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Missions', 'action' => 'view', $missions->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Missions', 'action' => 'edit', $missions->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Missions', 'action' => 'delete', $missions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $missions->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
