<?php $this->start('actionAdminSidebar'); ?>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="<?= $this->Url->build(['action' => 'add']);  ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-plus fa-stack-1x" style="color:#fff;"></i>
                        </span> <?= __('Add an organization'); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php $this->end(); ?>
<?php $this->start('actionSidebar'); ?>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="<?= $this->Url->build(['action' => 'submit']);  ?>">
                        <span class="fa-stack">
                            <i class="fa fa-square fa-stack-2x"></i>
                            <i class="fa fa-plus fa-stack-1x" style="color:#fff;"></i>
                        </span> <?= __('Submit an organization'); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php $this->end(); ?>
