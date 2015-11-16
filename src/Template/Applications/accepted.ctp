<div class="row">
    <?= $this->cell('Sidebar::mission', [$mission->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($application, ['type' => 'post', 'action' => 'accepted']); ?>
        <fieldset>
            <legend><?= __('Accept an application for {0}', $application->getMission()->getName()); ?></legend>
            <p><?= __('You\'re about to accept the application of {0} for the mission {1}',
                        $this->Html->link(
                                $application->getUser()->getName(),
                                ['controller' => 'Users', 'action' => 'view', $application->getUser()->getId()]
                        ),
                        $this->Html->link(
                                $application->getMission()->getName(),
                                ['controller' => 'Missions', 'action' => 'view', $application->getMission()->getId()]
                        )
                ); ?>.</p>
            <p><?= __('We will warn the candidate of your choice by email'); ?>.</p><br/>
            <input type="text" style="display:none;">
            <?= $this->Form->input('old_password', ['label' => __('Please insert your password to finalise your choice'), 'type' => 'password', 'autocomplete' => 'off']); ?>

        </fieldset>
        <?= $this->Form->button(__('Accept the application'), ['class' => 'btn-success']); ?>
        <?= $this->Form->button(__('Cancel'), [
            'type' => 'button',
            'class' => 'btn btn-default',
            'onclick' => 'location.href=\'' . $this->url->build([
                    'controller' => 'Missions',
                    'action' => 'view',
                    $mission->id
                ]) . '\''
        ]); ?>
        <?= $this->Form->end(); ?>
    </div>
</div>

