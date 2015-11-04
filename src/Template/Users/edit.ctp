<?= $this->Html->css(['bootstrap-switch.min', 'bootstrap-markdown.min'], ['block' => 'cssTop']); ?>
    <div class="row">
        <?= $this->cell('Sidebar::user', [$user->id]); ?>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <?= $this->Form->create($user); ?>
        <fieldset>
            <legend><?= __('Edit User') ?></legend>
            <div class="row-fluid">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 no-padding">
                    <?= $this->Form->input('firstName', ['label' => __('First name')]); ?>
                    <?= $this->Form->input('lastName', ['label' => __('Last name')]); ?>
                    <?php
                    $options[0] = __('Not specified');
                    foreach ($universities as $i => $university) {
                        $options[$i] = $university;
                    }
                    ?>
                    <div class="form-group">
                        <?= $this->Form->label('universitie_id', __('University'), ['class' => 'control-label']); ?>
                        <?= $this->Form->select('universitie_id', $options, ['class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="panel panel-primary" style="padding-right:0;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= __('Status'); ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <?= $this->Form->label('isStudent', __('Are you a student?'), ['class' => 'control-label', 'style' => 'width:100%;']); ?>
                                <?= $this->Form->input('isStudent', ['label' => false, 'class' => 'form-control']); ?>
                            </div>
                            <div class="form-group">
                                <?= $this->Form->label('isAvailableMentoring', __('Would you like to be a mentor?'), ['class' => 'control-label', 'style' => 'width:100%;']); ?>
                                <?= $this->Form->input('isAvailableMentoring', ['label' => false, 'class' => 'form-control']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-padding">
                    <?= $this->Form->input('biography',
                        [
                            'label' => __('Biography'),
                            'data-provide' => 'markdown',
                            'data-iconlibrary' => 'fa',
                            'data-hidden-buttons' => 'cmdImage',
                            'data-language' => ($this->request->session()->read('lang') == 'fr_CA' ? 'fr' : '')
                        ]
                    ); ?>
                    <?= $this->Form->input('portfolio', ['type' => 'text', 'label' => __('Portfolio'), 'placeholder' => __("http(s)://website.com")]); ?>
                    <?= $this->Form->input('phone', ['label' => __('Phone')]); ?>

                    <div class="form-group">
                        <?= $this->Form->label('gender', __('Gender'), ['class' => 'control-label']); ?>
                        <select class="form-control" name="gender">
                            <option
                                value="null" <?= (is_null($user->getGender()) ? "selected" : ""); ?>><?= __('Not specified'); ?></option>
                            <option
                                value="0" <?= (!$user->getGender() && !is_null($user->getGender()) ? "selected" : ""); ?>><?= __('Female'); ?></option>
                            <option value="1" <?= ($user->getGender() ? "selected" : ""); ?>><?= __('Male'); ?></option>
                        </select>
                    </div>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
                    <?= $this->Form->button(__('Cancel'), [
                        'type' => 'button',
                        'class' => 'btn btn-default',
                        'onclick' => 'location.href=\'' . $this->url->build([
                                'controller' => 'Users',
                                'action' => 'view',
                                $user->id
                            ]) . '\''
                    ]); ?>
                </div>
            </div>
        </fieldset>
        <?= $this->Form->end() ?>
    </div>
</div>
<?= $this->Html->script([
    'bootstrap/bootstrap-switch.min',
    'users/edit',
    'markdown/markdown',
    'markdown/to-markdown',
    'bootstrap/bootstrap-markdown',
], ['block' => 'scriptBottom']);
if ($this->request->session()->read('lang') == 'fr_CA')
echo $this->Html->script('locale/bootstrap-markdown.fr', ['block' => 'scriptBottom']);
?>
