<?php $Parsedown = new Parsedown(); ?>
<div class="row">
    <?= $this->cell('Sidebar::user', [$user->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <h2>
            <?= (!(empty($user->getName())) ? $user->getName() : $user->getUsername()); ?>
        </h2>
        <?php if ($user->getUniversity() != null): ?>
            <h4>
                <?= $user->getUniversity()->getName(); ?>
            </h4>
        <?php endif; ?>

        <div class="bs-callout bs-callout-info" style="min-height:200px">
            <p><?= (!(empty($user->getBiography())) ? $Parsedown->text($user->getBiography()) : 'Votre biographie') ?></p>
        </div>
    </div>

    <?php if (!empty($user->getProjectsMentored())): ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __('Projects mentored') ?> <?= $this->Wiki->addHelper('Projects');?></h3>
                </div>
                <table class="table table-striped">
                    <?php foreach ($user->getProjectsMentored() as $project): ?>
                        <tr>
                            <td>
                                <!-- Name of project -->
                                <?= $this->html->link($project->getName(), ['controller' => 'Projects', 'action' => 'view', $project->id]) ?>
                                <!-- Badge pending-->
                                <?php
                                if (!$project->isAccepted() && !$project->isArchived()):
                                    ?>
                                    <span
                                        class="label label-warning label-as-badge"><?= __('Pending Validation'); ?></span>
                                    <?php
                                endif;
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($user->getOrganizationsJoined())): ?>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __('Organizations joined') ?> <?= $this->Wiki->addHelper('Organizations');?></h3>
                </div>
                <table class="table table-striped">
                    <?php foreach ($user->getOrganizationsJoined() as $organization): ?>
                        <tr>
                            <td>
                                <!-- Name of organization -->
                                <?= $this->html->link($organization->getName(), ['controller' => 'Organizations', 'action' => 'view', $organization->id]) ?>
                                <!-- Badge owner -->
                                <?php
                                if ($user->isOwnerOf($organization->id)):
                                    ?>
                                    <span class="label label-info label-as-badge"><?= __('Owner'); ?></span>
                                    <?php
                                endif;
                                ?>
                                <!-- Badge pending -->
                                <?php
                                if (!$organization->getIsValidated() && !$organization->getIsRejected()):
                                    ?>
                                    <span
                                        class="label label-warning label-as-badge"><?= __('Pending Validation'); ?></span>
                                    <?php
                                endif;
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>
