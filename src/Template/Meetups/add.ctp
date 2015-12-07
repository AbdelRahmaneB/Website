<?php $Parsedown = new Parsedown(); ?>
<div class="row">
    <?= $this->cell('Sidebar::meetupAction'); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="page-header"><?= __('Add Meetup'); ?></h1>
                <?php
                $this->Html->addCrumb(__('Home'), '/');
                $this->Html->addCrumb(__('News'), '/News');
                $this->Html->addCrumb(__('Add'));

                echo $this->Html->getCrumbList(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="header-title"><?= __('Add Meetup') ?></h3>
                        <?= $this->Form->create($meetup) ?>
                        <?php
                        echo $this->Form->input('name');
                        echo $this->Form->input('description', ['type' => 'textarea']);
                        echo $this->Form->input('link');
                        echo $this->Form->input('date');
                        ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>