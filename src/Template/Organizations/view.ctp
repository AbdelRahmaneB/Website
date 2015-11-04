<div class="row">
    <?= $this->cell('Sidebar::organization', [$organization->id]); ?>
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <h2>
            <?= $organization->getName(); ?>
        </h2>

        <div class="bs-callout bs-callout-info" style="min-height:200px">
            <p><?= $organization->getDescription(); ?></p>
        </div>
    </div>

    <?php if (!empty($organization->projects)): ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= __('Projects') ?> <?= $this->Wiki->addHelper('Projects');?></h3>
                </div>
                <table class="table table-striped">
                    <?php foreach ($organization->projects as $project): ?>
                        <tr>
                            <td>
                                <?= $this->html->link($project->getName(), ['controller' => 'Projects', 'action' => 'view', $project->id]) ?>
                                <!-- Badge pending-->
                                <?php
                                if (!$project->isAccepted()):
                                    ?>
                                    <span
                                        class="label label-warning label-as-badge"><?= __('Pending Validation'); ?></span>
                                    <?php
                                endif;
                                ?>
                                <!-- Badge Archived-->
                                <?php
                                if ($project->isArchived()):
                                    ?>
                                    <span class="label label-danger label-as-badge"><?= __('Archived'); ?></span>
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
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('Members') ?></h3>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?= __('Name') ?></th>
                    <th><?= __('Owner') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $added = [] ?>
                <?php foreach ($members as $member): ?>
                    <tr>
                        <td><?= $this->html->link('(' . $member->getUsername() . ') ' . $member->getname(), ['controller' => 'Users', 'action' => 'view', $member->getId()]) ?></td>
                        <?php if ($member->isOwnerOf($organization->id)) { ?>
                            <td class="col-md-1 text-center"><i class="fa fa-check ico-green"></i></td>
                        <?php } else { ?>
                            <td class="col-md-1 text-center"><i class="fa fa-remove ico-red"></i></td>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>