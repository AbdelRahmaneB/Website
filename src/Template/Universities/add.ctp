<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Universities'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="universities form large-10 medium-9 columns">
    <?= $this->Form->create($university) ?>
    <fieldset>
        <legend><?= __('Add University') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('website');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
