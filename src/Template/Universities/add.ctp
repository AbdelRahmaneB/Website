<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New University'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Universities'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="universities form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($university); ?>
    <fieldset>
        <legend><?= __('Add University') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('website');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
